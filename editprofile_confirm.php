<?php
include "header.php";
require 'conn.php';



// Check if the email is set in the URL
if (isset($_POST['email'])) {
    $email = $_POST['email'];
    
    // Fetch original user data
    $sqlOriginal = "SELECT * FROM userinfo
                    LEFT JOIN empinfo ON userinfo.email = empinfo.email
                    WHERE userinfo.email = :email";

    $stmtOriginal = $pdo->prepare($sqlOriginal);
    $stmtOriginal->bindParam(':email', $email);
    $stmtOriginal->execute();
    $originalUserData = $stmtOriginal->fetch(PDO::FETCH_ASSOC);

    // Compare original and new data
    $changes = [];
    foreach ($originalUserData as $field => $originalValue) {
        // Skip the email and id fields as they are identifiers or not editable
        if ($field === 'email' || $field === 'id') {
            continue;
        }

        // Get the new value from the POST data
        $newValue = $_POST[$field];

        // Compare original and new values
        if ($originalValue !== $newValue) {
                $changes[$field] = [
                    'original' => $originalValue,
                    'new' => $newValue,
                ];
            }
    }
    }

    // Display original and updated data
    echo '<div class="container mt-4">';
    echo '<h2>Edit Profile Confirmation</h2>';
    echo '<form action="editprofile_process.php" method="post">'; // Form to submit confirmed changes
    foreach ($_POST as $field => $value) {
        echo '<input type="hidden" name="' . $field . '" value="' . $value . '">';
    }
    
    if (!empty($changes)) {
        echo '<h3>Changed Data</h3>';
        displayChanges($changes);
    

        echo '<button type="submit" class="btn btn-success" name="confirm_changes">Confirm</button>';
        echo '<button type="button" class="btn btn-danger" onclick="window.history.back();">Cancel</button>';
        echo '</form>';

    echo '</div>';
} else {
    echo '<p>No data is being modified. <button type="button" class="btn btn-danger" onclick="window.history.back();">Send to previous page.</button></p>';
}

function displayChanges($changes) {
    echo '<table class="table">';
    echo '<thead><tr><th>Field</th><th>Current Value</th><th>New Value</th></tr></thead>';
    echo '<tbody>';

    foreach ($changes as $field => $change) {
        echo '<tr>';
        echo '<td>' . ucfirst($field) . '</td>';
        echo '<td>' . $change['original'] . '</td>';
        echo '<td>' . $change['new'] . '</td>';
        echo '</tr>';
    }

    echo '</tbody></table>';
    
}

include "footer.php";
?>