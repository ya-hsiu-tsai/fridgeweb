<?php require 'header.php'; ?>
<?php
session_start();
if(isset($_SESSION['user']))
{
    unset($_SESSION['user']);
    header("location:home.php");
}
else
{
    echo "原本就已登出<br>";
}
?>
<?php require 'footer.php'; ?>