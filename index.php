<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="headerlogin">
        <div class="logologin">Restaurent Finder And Booking System</div>
    </div>
    <main class="container">
        <h2 class="loginTitle">Login to your account</h2>
        <form action="" method="post">
            <div class="username">
                <input class="logininput" name="username" type="text" id="username" placeholder="Username/Email">
            </div>
            <br>
            <div class="password">    
                <input class="logininput" name="password" type="password" id="password" placeholder="Password">
            </div>
            <br>
            <div class="button">
                <button class="loginbutton registerandloginbutton" type="submit" value="login" id="button" name="login">Login</button>
                <p class="loginFormP">No account? <a href="register.php" style="color:#0e3013; text-transform: uppercase; text-decoration: none;">Register</a></p>
                <!-- Forgot Password Section -->
                <p class="loginFormP"><a href="Forgotpassword.php" style="color:#0e3013; text-decoration:none;">Forgot Password?</a></p>
            </div>
        </form>
    </main>
</body>
</html>

<?php
session_start();
include("DB.php"); //we also can use required
if(isset($_POST["login"]))
{
    
    $username=$_POST["username"];
    $password=$_POST["password"];
    $sql="SELECT * from user where  email='$username' OR user_name='$username'";
    $result=mysqli_query($con,$sql);
    $num=mysqli_fetch_row($result);
    if($num==0)
    {
        ?>
        <script> alert("Username or password is incorrect");</script> 
        <?php
    }
    else
    {
        mysqli_data_seek($result,0);
       $row= mysqli_fetch_assoc($result);
       $hashedpassword=$row["password"]; //database password
      // echo $hashedpassword;
      if(password_verify($password,$hashedpassword))
      {
        $_SESSION["username"] = $row["user_name"];
            header("Location:Dashboard.php");
            exit();
      } else{
        ?>
        <script> alert("Username or password is incorrect");</script> 
        <?php
      }


    }
}

?>