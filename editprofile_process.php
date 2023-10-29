<?php
include "header.php";
require 'conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $pdo->beginTransaction();

        $email = $_POST['email'];
        $password = $_POST['password'];
        $name = $_POST['name'];
        $nric = $_POST['nric'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $admin = ($_POST['admin'] == 'Yes') ? 1 : 0;
        $designation = $_POST['designation'];
        $department = $_POST['department'];
        $startdate = $_POST['startdate'];
        $enddate = $_POST['enddate'];
        $epfno = $_POST['epfno'];
        $status = $_POST['status'];
        $linkedin = $_POST['linkedin'];
        $facebook = $_POST['facebook'];

        // Update user data
        $sqlUser = "UPDATE userinfo 
                    SET name = :name, nric = :nric, password = :password, phone = :phone, address = :address, 
                    linkedin = :linkedin, facebook = :facebook, admin = :admin
                    WHERE email = :email";
        $stmtUser = $pdo->prepare($sqlUser);
        $stmtUser->bindParam(':email', $email);
        $stmtUser->bindParam(':password', $password);
        $stmtUser->bindParam(':name', $name);
        $stmtUser->bindParam(':nric', $nric);
        $stmtUser->bindParam(':phone', $phone);
        $stmtUser->bindParam(':address', $address);
        $stmtUser->bindParam(':linkedin', $linkedin);
        $stmtUser->bindParam(':facebook', $facebook);
        $stmtUser->bindParam(':admin', $admin);
        $stmtUser->execute();

        // Update empinfo data
        $sqlEmp = "UPDATE empinfo 
                    SET designation = :designation, department = :department,
                    startdate = :startdate, enddate = :enddate,
                    epfno = :epfno, status = :status
                    WHERE email = :email";
        $stmtEmp = $pdo->prepare($sqlEmp);
        $stmtEmp->bindParam(':email', $email);
        $stmtEmp->bindParam(':designation', $designation);
        $stmtEmp->bindParam(':department', $department);
        $stmtEmp->bindParam(':startdate', $startdate);
        $stmtEmp->bindParam(':enddate', $enddate);
        $stmtEmp->bindParam(':epfno', $epfno);
        $stmtEmp->bindParam(':status', $status);
        $stmtEmp->execute();

        // Commit transaction
        $pdo->commit();
        $_SESSION['data_updated'] = true;
        header('Location: profile.php?email=' . $_POST['email']);
exit;
    } catch (Exception $e) {
        $pdo->rollBack();
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Invalid request method.";
}

?>
    