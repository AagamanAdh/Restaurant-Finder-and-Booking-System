<?php
session_start();
session_destroy();
?>
<script>alert("You have log out");</script>
<?php
header("Location:index.php");
?>