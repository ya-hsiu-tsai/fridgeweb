<?php require 'header.php'; ?>
<?php
session_start();
$pdo = new PDO('mysql:host=localhost; dbname=fridgeweb; charset=utf8', 'staff', 'password');
$sql = $pdo->prepare('select * from fridge where name=?');
$address = $_REQUEST['county'].$_REQUEST['area'].$_REQUEST['fridgeaddr'];
if($sql->execute([htmlspecialchars($_REQUEST['fridgename'])]))
{
    if(empty($sql->fetchAll()))
    {
        $sql = $pdo->prepare('insert into fridge values(null, ?, ?, ?, ?, ?, ?)');
        $sql->execute([
            htmlspecialchars($_REQUEST['fridgename']), $_REQUEST['fridgecomp'], $_REQUEST['fridgephone'],
            $address, $_REQUEST['fridgecoor'], $_SESSION['users']['id']
        ]);
        echo '冰箱新增成功<br>';
    }
    else
    {
        echo '冰箱新增失敗<br>';
        echo '此冰箱名稱已被使用<br>';
    }
}
echo '冰箱管理者：', $_SESSION['users']['name'], '<br>';
echo '冰箱名稱：', $_REQUEST['fridgename'], '<br>';
echo '冰箱所屬機構：', $_REQUEST['fridgecomp'], '<br>';
echo '聯絡電話：', $_REQUEST['fridgephone'], '<br>';
echo '冰箱地點：', $address, '<br>';
echo '冰箱座標：', $_REQUEST['fridgecoor'], '<br>';
echo '<a href="userhome.php">回首頁</a><br>';
echo '<a href="addfridge.php">繼續新增冰箱</a>';
?>
<?php require 'footer.php'; ?>