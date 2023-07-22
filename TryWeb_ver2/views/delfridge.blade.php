<?php require 'header.blade.php'; ?>
<?php
session_start();
$pdo = new PDO('mysql:host=localhost; dbname=fridgeweb; charset=utf8', 'staff', 'password');
$sql = $pdo->prepare('delete from fridge where id=?');
if($sql->execute([$_REQUEST['id']]))
{
    unset($_SESSION['fridge']['$_REQUEST["id"]']);
    echo '<script> alert("已成功刪除冰箱"); </script>';
}
else
{
    echo '<script> alert("刪除冰箱失敗"); </script>';
}
header("refresh:0.5; url=userhome.blade.php");
?>
<?php require 'footer.blade.php'; ?>