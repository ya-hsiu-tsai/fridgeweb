<?php require 'header.blade.php'; ?>
<?php
session_start();
$pdo = new PDO('mysql:host=localhost; dbname=fridgeweb; charset=utf8', 'staff', 'password');
$sql = $pdo->prepare('insert into comment values(null, ?, ?, default)');
if($sql->execute([htmlspecialchars($_REQUEST['content']), $_SESSION['fridge_id']]))
{
    echo '回報成功<br>';
    echo '回報冰箱：', $_SESSION['fridge_name'], '<br>';
    echo '回報內容：<br>', $_REQUEST['content'], '<br>';
}
else
{
    echo '回報失敗';
}
unset($_SESSION['fridge_id'], $_SESSION['fridge_name']);
?>
<a href="home.blade.php">回首頁</a><br>
<?php require 'footer.blade.php'; ?>