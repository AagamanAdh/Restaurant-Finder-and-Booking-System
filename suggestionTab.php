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
        <h2>Suggestion Tab</h2>
        <div class="suggestionFormDiv">
            <form action="" class="suggestionForm">
                <label for="name">Business Name:<span class="imp">*</span> </label>
                <input type="text"  id="name" name="name"><br>

                <br><label for="category">Business Category:<span class="imp">*</span> </label>
                <input type="text"  id="category" name="category"><br>

                <br><label for="district">District:<span class="imp">*</span> </label>
                <input type="text"  id="district" name="district"><br>

                <br><label for="detailaddress">Detail Address:<span class="imp">*</span> </label>
                <input type="text"  id="detailaddress" name="detailaddress"><br>

                <br><label for="phone">Phone:<span class="imp">*</span> </label>
                <input type="text"  id="phone" name="phone"><br>

                <br><label for="description">Description:<span class="imp">*</span> </label>
                <textarea id="description" name="description" rows="4" cols="50" placeholder="Write a short description of your business"></textarea><br>

                <br><label for="image">Upload an image:<span class="imp">*</span></label>
                <input type="file" name="image" id="image" accept="image/*" required>


            </form>
        </div>
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
