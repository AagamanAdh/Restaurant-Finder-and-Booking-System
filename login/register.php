<?php
include("DB.php");
$result = false; // initialize

if(isset($_POST["register"])) 
{
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];          // new password
    $confirmPassword = $_POST["cpassword"];  // confirm password

    // validate Email
    if(empty($email)){
        $errorEmail = "Email is empty";   
    } elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $errorEmail = "Invalid Email format";
    }

    if(empty($password) && empty($username)){
        $error1 = "Password is empty";
        $error2 = "Username is empty";  
        $result = false;
    }
    else if(empty($password)){
        $error1 = "Password is empty";
        $result = false;
    }
    else if(empty($username)){
        $error2 = "Username is empty";  
        $result = false;
    }
    else if($password !== $confirmPassword){
        $error1 = "Passwords do not match";  
        $result = false;
    }
    else{
        // ✅ check if email or username already exists
        $check_sql = "SELECT * FROM user WHERE email='$email' ";
        $check_result = mysqli_query($con, $check_sql);

        if(mysqli_num_rows($check_result) > 0){
            echo "<script>alert('Username or Email is already registered');</script>";
            $result = false;
        } else {
            // insert into database
            $hasedpassword = password_hash($password, PASSWORD_BCRYPT);
            $sql = "INSERT INTO user(user_name, email, password) 
                    VALUES ('$username','$email','$hasedpassword')";
            $result = mysqli_query($con,$sql);
        }
    }
}

if($result)
{
    ?>
    <script>
    alert("Data added successfully");
    window.location.href="index.php";
    </script>
    <?php
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .userred{color:red;}
        .passwordred{color: red;}
    </style>
</head>
<body>
    <div class="headerlogin">
    <div class="logologin">Restaurent Finder And Booking System</div>
  </div>
    <main class="registercontainer">
    <form action="" method="post">
        <h1 style="text-align: center; color:#0e3013;">Register</h1>
            
        <input type="text" class="registerInput" name="email" id="email" placeholder="E-Mail">
        <br>
        <?php
        if(isset($errorEmail)){
            echo "<span class='userred'>".$errorEmail."</span><br>";
        }
        ?>
        <br>

        <input type="text" class="registerInput" name="username" id="username" placeholder="Username">
        <br>
        <?php
        if(isset($error2)){
            echo "<span class='userred'>".$error2."</span><br>";
        }
        ?>
        <br>
        
        <input type="password" class="registerInput" name="password" id="password" placeholder="New Password">
        <br>

        <input type="password" class="registerInput" name="cpassword" id="cpassword" placeholder="Confirm Password">
        <br>
        <?php
        if(isset($error1)){
            echo "<span class='passwordred'>".$error1."</span><br>";
        } 
        ?>
        <br>
        <button class="registerButton registerandloginbutton" type="submit" name="register" value="register"> Register </button>
    </form>
</body>
</html>
