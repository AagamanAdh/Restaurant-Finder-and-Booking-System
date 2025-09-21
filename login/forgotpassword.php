<?php
include "DB.php"; // database connection
$message = "";

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $username = $_POST['username'];
    $new_password = $_POST['password'];

    // Check if email and username both exist in the same record
    $sql = "SELECT * FROM user WHERE email='$email' AND user_name='$username'";
    $result = mysqli_query($con, $sql);

    if(mysqli_num_rows($result) > 0){
        // Update password
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        $sql_update = "UPDATE user SET password='$hashed_password' WHERE email='$email' AND user_name='$username'";
        if(mysqli_query($con, $sql_update)){
            $message = "<script>alert('Password successfully updated!'); window.location='index.php';</script>";
        } else {
            $message = "<script>alert('Error updating password. Try again.');</script>";
        }
    } else {
        // Either email or username is wrong
        $message = "<script>alert('Email or Username is incorrect!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="Forgotpasswordcontainer">
        <div class="headerlogin">
        <div class="logologin">Restaurent Finder And Booking System</div>
    </div>
        <div class="forgotformdiv">
        <h2>Change Password</h2>
        <form class="ForgotForm" method="POST">
            <label>Email:</label>
            <input type="email" name="email" placeholder="Enter your Email" required>
            
            <label>Username:</label>
            <input type="text" name="username" placeholder="Enter your Username" required>
            
            <label>New Password:</label>
            <input type="password" name="password" placeholder="Enter new password" required>
            
            <button type="submit" name="submit">Change Password</button>
        </form>

        <?php if($message != "") { echo $message; } ?>
        </div>
    </div>
</body>
</html>
