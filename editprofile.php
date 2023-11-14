<?php

require 'conn.php';

if (isset($_GET['email'])) {
    $email = $_GET['email'];

    try {
        // Fetch user information from userinfo and empinfo tables based on the email
        $sql = "SELECT userinfo.*, empinfo.*
                FROM userinfo
                LEFT JOIN empinfo ON userinfo.email = empinfo.email
                WHERE userinfo.email = :email";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            // Handle the case when user data is not found
            throw new Exception("User not found");
        }
    } catch (Exception $e) {
        // Log the error or display a user-friendly message
        echo "Error: {$e->getMessage()}";
        exit();
    }
} else {
    // Handle the case when email parameter is not set
    echo "Email parameter is missing";
    exit();
}
?>



<div class="container mx-auto">
<div class="row">
    <div class="col-md-3">
        <?php include "header.php"; ?>

    <h2>Edit Profile</h2>
    <form action="editprofile_confirm.php" method="post" id="">
    <!-- Flex container for tabs and button -->
    <div class="d-flex justify-content-between">
        <!-- Tabs -->
        <ul class="nav nav-tabs" id="profileTabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="personalInfo-tab" data-toggle="tab" href="#personalInfo" role="tab" aria-controls="personalInfo" aria-selected="true">Personal Info</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="employmentInfo-tab" data-toggle="tab" href="#employmentInfo" role="tab" aria-controls="employmentInfo" aria-selected="false">Employment Info</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="socialMedia-tab" data-toggle="tab" href="#socialMedia" role="tab" aria-controls="socialMedia" aria-selected="false">Social Media</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="misc-tab" data-toggle="tab" href="#misc" role="tab" aria-controls="misc" aria-selected="false">Misc</a>
            </li>
        </ul>
    </div>


        <!-- Add hidden input for passing email value to updateprofile.php -->
        <input type="hidden" name="email" value="<?php echo $user['email']; ?>">
        <input type="hidden" name="password" value="<?php echo $user['password']; ?>">
        <input type="hidden" name="id" value="<?php echo $user['password']; ?>">


        <!-- Tab Content -->
        <div class="tab-content mt-3">

        <!-- Personal Info Tab -->
        <div class="tab-pane fade show active" id="personalInfo" role="tabpanel" aria-labelledby="personalInfo-tab">
        
        <!-- Personal Info Section -->
        <div class="card mt-4">
            <div class="card-header d-flex justify-content-between">
                <h3>Personal Info</h3>
                    <button type="submit" class="btn btn-primary" name="submit_review">
                        <i class="fas fa-save"></i> Save Changes
                    </button>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $user['name']; ?>">
                </div>

                <div class="form-group">
                    <label for="nric">NRIC:</label>
                    <input type="text" class="form-control" id="nric" name="nric" value="<?php echo $user['nric']; ?>">
                </div>

                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $user['phone']; ?>">
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>">
                </div>
                <div class="form-group">
                    <label for="address">Address:</label>
                    <textarea class="form-control" id="address" name="address"><?php echo $user['address']; ?></textarea>
                </div>
            </div>
        </div>
        </div>

        <!-- Employment Info Tab -->
        <div class="tab-pane fade" id="employmentInfo" role="tabpanel" aria-labelledby="employmentInfo-tab">
        
        <!-- Employment Info Section -->
        <div class="card mt-4">
        <div class="card-header d-flex justify-content-between">
                <h3>Employment Info</h3>
                    <button type="submit" class="btn btn-primary" name="submit_review">
                        <i class="fas fa-save"></i> Save Changes
                    </button>
            </div>

            <div class="card-body">
                <div class="form-group">
                    <label for="designation">Designation:</label>
                    <input type="text" class="form-control" id="designation" name="designation" value="<?php echo $user['designation']; ?>">
                </div>

                <div class="form-group">
                    <label for="department">Department:</label>
                    <input type="text" class="form-control" id="department" name="department" value="<?php echo $user['department']; ?>">
                </div>

                <div class="form-group">
                    <label for="startdate">Start Date:</label>
                    <input type="date" class="form-control" id="startdate" name="startdate" value="<?php echo $user['startdate']; ?>">
                </div>

                <div class="form-group">
                    <label for="enddate">End Date:</label>
                    <input type="date" class="form-control" id="enddate" name="enddate" value="<?php echo $user['enddate']; ?>">
                </div>

                <div class="form-group">
                    <label for="epfno">EPF No:</label>
                    <input type="text" class="form-control" id="epfno" name="epfno" value="<?php echo $user['epfno']; ?>">
                </div>

                <div class="form-group">
                    <label for="status">Status:</label>
                    <input type="text" class="form-control" id="status" name="status" value="<?php echo $user['status']; ?>">
                </div>
            </div>
        </div>
        </div>

        <!-- Social Media Tab -->
        <div class="tab-pane fade" id="socialMedia" role="tabpanel" aria-labelledby="socialMedia-tab">
            <!-- Social Info Section -->
            <div class="card mt-4">
            <div class="card-header d-flex justify-content-between">
                <h3>Social Media Info</h3>
                    <button type="submit" name="submit_review" class="btn btn-primary">
                        <i class="fas fa-save"></i> Save Changes
                    </button>
            </div>

            <div class="card-body">
            <div class="form-group">
            <label for="linkedin">LinkedIn:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3">https://www.linkedin.com/in/</span>
                </div>
                <input type="text" class="form-control" id="linkedin" name="linkedin" value="<?php echo $user['linkedin']; ?>">
            </div>
            </div>


            <div class="form-group">
            <label for="facebook">Facebook:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3">https://www.facebook.com/</span>
                </div>
                <input type="text" class="form-control" id="facebook" name="facebook" value="<?php echo $user['facebook']; ?>">
            </div>
            </div>

            </div>
        </div>    
        </div>

        <!-- Misc Tab -->
        <div class="tab-pane fade" id="misc" role="tabpanel" aria-labelledby="misc-tab">
        <div class="card mt-4">
        <div class="card-header d-flex justify-content-between">
                <h3>Misc</h3>
                    <button type="submit" name="submit_review" class="btn btn-primary">
                        <i class="fas fa-save"></i> Save Changes
                    </button>
            </div>

            <div class="card-body">
            <div class="form-group">
            <label for="admin">Is Admin?:</label>
            <select class="form-control" id="admin" name="admin">
                <option value="1" <?php echo ($user['admin'] == 1) ? 'selected' : ''; ?>>Yes</option>
                <option value="0" <?php echo ($user['admin'] == 0) ? 'selected' : ''; ?>>No</option>
            </select>
            </div>
            </div>
        </div>
        </div>
    </div>
    </form>
</div></div></div>

<?php include "footer.php"; ?>
