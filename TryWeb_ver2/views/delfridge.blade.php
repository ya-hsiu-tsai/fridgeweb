<?php require 'header.blade.php'; ?>
<?php
$pdo = new PDO('mysql:host=localhost; dbname=fridgeweb; charset=utf8', 'staff', 'password');
$sql_comment = $pdo->prepare('delete from comment where fridge_id=?');
$sql_comment->execute([$_REQUEST['id']]);
$sql_product = $pdo->prepare('delete from product where fridge_id=?');
$sql_product->execute([$_REQUEST['id']]);
$sql_fridge = $pdo->prepare('delete from fridge where id=?');
$sql_fridge->execute([$_REQUEST['id']]);
echo '<script> alert("已成功刪除冰箱"); </script>';
header("refresh:0.5; url=userhome.blade.php");
?>
<?php require 'footer.blade.php'; ?>