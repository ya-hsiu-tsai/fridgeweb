<?php require 'header.php'; ?>
<?php
session_start();
$pdo = new PDO('mysql:host=localhost; dbname=fridgeweb; charset=utf8', 'staff', 'password');
$sql_users = $pdo->prepare('select * from users where id=?');
$sql_users->execute([$_SESSION['users']['id']]);
foreach($sql_users->fetchAll() as $usersrow)
{
    $sql_fridge = $pdo->prepare('select * from fridge where users_id=?');
    $sql_fridge->execute([$usersrow['id']]);
    foreach($sql_fridge->fetchAll() as $fridgerow)
    {
        $sql_comment = $pdo->prepare('delete from comment where fridge_id=?');
        $sql_comment->execute([$fridgerow['id']]);
        $sql_product = $pdo->prepare('delete from product where fridge_id=?');
        $sql_product->execute([$fridgerow['id']]);
    }
    $sql_fridge = $pdo->prepare('delete from fridge where users_id=?');
    $sql_fridge->execute([$usersrow['id']]);
}
$sql_users = $pdo->prepare('delete from users where id=?');
$sql_users->execute([$_SESSION['users']['id']]);
unset($_SESSION['users']);
header("location:home.php");
?>
<?php require 'footer.php'; ?>