<?php
$con= mysqli_connect("localhost","root","", "login", 3337);
if($con==false)
{
    ?>
    <script> die("Database not connected") </script>
    <?php
}

?>