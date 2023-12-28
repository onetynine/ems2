<?php
require "conn.php";
include "header.php";  // Make sure to include your header file

// Check for registration success
if (isset($_SESSION['emp_id'])) {
    $emp_id = $_SESSION['emp_id'];

    // Clear session variables
    unset($_SESSION['emp_id']);
} else {
    // Handle cases where the user directly accesses this page without a successful registration
    echo '<script>history.back();</script>';
    exit();
}

// Output HTML after processing PHP logic
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <br>
    <h3>Employee Profile</h3><hr>
    <br>

    <div class="container">
        <div class="mt-5">
            <h2>Registration Successful</h2>
            <p>Your registration was successful!</p>
            <p>
                <a href="emp_profile.php?id=<?= $emp_id ?>" class="btn btn-primary">Go to Profile</a>
                <a href="emp_register.php" class="btn btn-secondary">Register Another One</a>
            </p>
        </div>
    </div>
</main>
</body>
</html>
