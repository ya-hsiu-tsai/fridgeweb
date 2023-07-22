<?php require 'header.blade.php'; ?>
//蛤這個警示蛤 Q
<?php
session_start();
if(!isset($_SESSION['users']))
{
    header("location:home.blade.php");
    exit;
}
echo '<a href="userinfo.blade.php">', $_SESSION['users']['name'], '</a><br>';
echo '愛心冰箱整合地圖<br>';
echo '<a href="addfridge.blade.php"> 新增冰箱 </a>';
echo '<a href="usercomment.blade.php"> 使用者回報 </a><br>';
$pdo = new PDO('mysql:host=localhost; dbname=fridgeweb; charset=utf8', 'staff', 'password');
$sql = $pdo->prepare('select * from fridge where users_id=?');
$sql->execute([$_SESSION['users']['id']]);
echo '我的冰箱<br>';
echo '<table>';
echo '<th>冰箱名稱</th><th>地點</th>';
$c = 0;
foreach($sql->fetchAll() as $row)
{
    $c++;
    echo '<tr>';
    echo '<td>';
    echo '<a href="userfridgedetail.blade.php?id=', $row['id'], '">', $row['name'], '</a>';
    echo '</td>';
    echo '<td>', $row['address'], '</td>';
    echo '</tr>';
}
if($c == 0)
    echo '目前還沒有冰箱<br>';
?>
<?php require 'footer.blade.php'; ?>