<?php require 'header.blade.php'; ?>
<?php
echo '<script> alert("是否確定已解決？"); </script>';
$pdo = new PDO('mysql:host=localhost; dbname=fridgeweb; charset=utf8', 'staff', 'password');
$sql = $pdo->prepare('update comment set solve=1 where id=?');
$sql->execute([$_REQUEST['id']]);
header("refresh:0.5; url=usercomment.blade.php")
?>
<?php require 'footer.blade.php'; ?>