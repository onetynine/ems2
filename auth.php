<?php
function checkLoggedIn() {
   

    // Check if user is logged in
    if (!isset($_SESSION['emp_email'])) {
        header('Location: login.php'); // Redirect to login page if not logged in
        
        exit();
    }

    
    // // Check for inactivity timeout
    // $inactiveTimeout = 10; // 30 minutes (in seconds)
    // $currentTime = time();
    
    // // Check if the last activity timestamp is set
    // if (isset($_SESSION['last_activity'])) {
    //     $lastActivity = $_SESSION['last_activity'];
        
    //     // Check if the user has been inactive for too long
    //     if (($currentTime - $lastActivity) > $inactiveTimeout) {
    //         // Log out the user
    //         session_unset();
    //         session_destroy();
    //         exit();
    //     }
    // }

    // // Update the last activity timestamp
    // $_SESSION['last_activity'] = $currentTime;
}

?>
