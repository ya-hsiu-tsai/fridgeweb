<?php require 'header.blade.php'; ?>
<div id="map"></div>
<script src="../js/map.js"></script>
<a href="userhome.blade.php">回首頁</a><br>
<?php
$pdo = new PDO('mysql:host=localhost; dbname=fridgeweb; charset=utf8', 'staff', 'password');
$sql = $pdo->prepare('select * from fridge where id=?');
$sql->execute([$_REQUEST['id']]);
foreach($sql->fetchAll() as $row)
{
    echo '冰箱名稱：', $row['name'], '<br>';
    echo '冰箱所屬機構：', $row['company'], '<br>';
    echo '聯絡電話：', $row['tel'], '<br>';
    echo '冰箱地點：', $row['address'], '<br>';
    echo '冰箱座標：', $row['coordinate'], '<br>';
    echo '<script> showmap("', $row['address'], '"); </script>';
}
$sql = $pdo->prepare('select * from product where fridge_id=?');
$sql->execute([$_REQUEST['id']]);
echo '冰箱內食物<br>';
echo '<table>';
echo '<th>名稱</th><th>種類</th><th>數量</th>';
$c = 0;
foreach($sql->fetchAll() as $row)
{
    $c++;
    echo '<tr>';
    echo '<td>', $row['name'], '</td>';
    echo '<td>', $row['kind'], '</td>';
    echo '<td>', $row['num'], '</td>';
    echo '</tr>';
}
if($c == 0)
    echo '<tr><td colspan="3">冰箱內沒有食物</td></tr>';
echo '</table>';
echo '<a href="delfridge.blade.php?id=', $_REQUEST['id'], '"onclick="return confirm(\'是否確認要刪除冰箱？\')"> 移除冰箱 </a><br>';
?>
<?php require 'footer.blade.php'; ?>