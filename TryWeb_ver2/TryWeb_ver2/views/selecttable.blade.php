<?php require 'header.blade.php'; ?>
<?php
$pdo = new PDO('mysql:host=localhost; dbname=fridgeweb; charset=utf8', 'staff', 'password');
$sql = $pdo->prepare('select * from fridge where address like ?');
$address = $_REQUEST['county'].$_REQUEST['area'];
$sql->execute(['%'.$address.'%']);
echo '<table>';
echo '<th>冰箱名稱</th><th>地點</th>';
$c = 0;
foreach($sql->fetchAll() as $row)
{
    $c++;
    echo '<tr>';
    echo '<td>';
    echo '<a href="fridgedetail.blade.php?id=', $row['id'], '" target="_parent">', $row['name'], '</a>';
    echo '</td>';
    echo '<td>', $row['address'], '</td>';
    echo '<td><button onclick="send_address("花蓮縣花蓮市國聯五路22號")">地圖</button></td>';
    echo '</tr>';
}
if($c == 0)
    echo '<tr><td colspan="2">目前此地區還沒有冰箱</td></tr>';
echo '</table>';
?>
<?php require 'footer.blade.php'; ?>