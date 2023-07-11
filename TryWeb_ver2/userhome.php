<?php require 'header.php'; ?>
//蛤這個警示蛤 Q
<?php
session_start();
if(!isset($_SESSION['user']))
{
    header("location:home.php");
    exit;
}
echo '<a href="userinfo.php">', $_SESSION['user']['name'], '</a><br>';
echo '愛心冰箱整合地圖<br>';
echo '<a href="addfridge.php"> 新增冰箱 </a>';
echo '<a href="usercomment.php"> 使用者回報 </a><br>';
$pdo = new PDO('mysql:host=localhost; dbname=fridgeweb; charset=utf8', 'staff', 'password');
$sql = $pdo->prepare('select * from fridge where user_id=?');
$sql->execute([$_SESSION['user']['id']]);
echo '我的冰箱<br>';
echo '<table>';
echo '<th>冰箱名稱</th><th>地點</th>';
$c = 0;
foreach($sql->fetchAll() as $row)
{
    $c++;
    echo '<tr>';
    echo '<td>';
    echo '<a href="userfridgedetail.php?id=', $row['id'], '">', $row['name'], '</a>';
    echo '</td>';
    echo '<td>', $row['address'], '</td>';
    echo '</tr>';
}
if($c == 0)
    echo '目前還沒有冰箱<br>';
?>
<?php require 'footer.php'; ?>