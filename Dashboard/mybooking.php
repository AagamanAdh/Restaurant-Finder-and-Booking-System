<?php
session_start();
if(isset($_SESSION["username"]))
{
    
    ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="fullContainer">
        <div class="headerHome">

            <div class="logoHome">Restaurent Finder And Booking System</div>
            
                <div class="menuItemDiv">
                    <?php include "navMenuItem.php";?>
                 </div>

        </div>
        <h2>My Booking</h2>
    </div>
</body>
</html>
    <?php
}
else{
?>
<script>alert("Please login First");
   
</script>
<?php
header("Location:index.php");
}
?>
