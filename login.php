<?php
include 'loginheader.php';
require 'conn.php';

session_start(); // Start session at the beginning

$errors = []; // Initialize an array to store errors

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emp_email = $_POST['emp_email'];
    $emp_password = $_POST['emp_password'];

    // Use prepared statement to prevent SQL injection
    $stmt = $pdo->prepare("SELECT * FROM employee WHERE emp_email = :emp_email");
    $stmt->bindParam(':emp_email', $emp_email);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Compare passwords without hashing (for testing only)
        if ($emp_password === $user['emp_password']) {
            $_SESSION['emp_email'] = $user['emp_email'];
            header('Location: emp_summary.php');

        } else {
            $errors[] = "Invalid password";
        }
    } else {
        $errors[] = "User not found";
    }
}


?>

<!-- login form here -->

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <form action='login.php' method='post' class="border p-4 rounded">
                <h2 class="mb-4">Login</h2>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" placeholder="john.doe@example.com" name="emp_email" id="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="emp_password" id="password" class="form-control" required>
                </div>
                <?php foreach ($errors as $error) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error; ?>
                    </div>
                <?php endforeach; ?>
                <button type="submit" class="btn btn-primary">Log In</button>
                <a href="reset_password.php" class="btn btn-link">Reset Password</a>
            </form>
        </div>
    </div>
</div>
