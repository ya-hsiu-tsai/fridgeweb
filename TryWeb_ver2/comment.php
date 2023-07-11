<?php require 'header.php'; ?>
使用者回報系統<br>
冰箱：
<?php
session_start();
$_SESSION['fridge_id'] = $_REQUEST['fridge_id'];
$pdo = new PDO('mysql:host=localhost; dbname=fridgeweb; charset=utf8', 'staff', 'password');
$sql = $pdo->prepare('select * from fridge where id=?');
$sql->execute([$_REQUEST['fridge_id']]);
foreach($sql->fetchAll() as $row)
{
    echo $row['name'];
    $_SESSION['fridge_name'] = $row['name'];
}
?>
<form name="comment" action="commentout.php" method="post">
    回報內容輸入：<br>
    <textarea type="text" name="content" style="width:50%; height:100px" required></textarea><br>
    <input type="submit" value="送出"><br>
</form>
<?php require 'footer.php'; ?>