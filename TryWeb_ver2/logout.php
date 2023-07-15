<?php require 'header.php'; ?>
<?php
session_start();
if(isset($_SESSION['users']))
{
    unset($_SESSION['users']);
    header("location:home.php");
}
else
{
    echo "原本就已登出<br>";
}
?>
<?php require 'footer.php'; ?>