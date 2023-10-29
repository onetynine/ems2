<?php
include 'loginheader.php';
require 'conn.php';

session_start(); // Start session at the beginning

$errors = []; // Initialize an array to store errors

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Use prepared statement to prevent SQL injection
    $stmt = $pdo->prepare("SELECT * FROM userinfo WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // For now, compare passwords without hashing (not recommended for production)
        if ($password === $user['password']) {
            $_SESSION['email'] = $user['email'];
            header('Location: index.php');
            exit();
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
                    <input type="email" placeholder="test@test.my" name="email" id="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
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
