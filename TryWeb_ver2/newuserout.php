<?php require 'header.php'; ?>
<?php
session_start();
$pdo = new PDO('mysql:host=localhost; dbname=fridgeweb; charset=utf8', 'staff', 'password');
$sql = $pdo->prepare('select * from user where name=?');
if($sql->execute([htmlspecialchars($_REQUEST['name'])]))
{
    if(empty($sql->fetchAll()))
    {
        $sql = $pdo->prepare('insert into user values(null, ?, ?, ?)');
        $sql->execute([
            htmlspecialchars($_REQUEST['name']), $_REQUEST['mail'], $_REQUEST['pwd']
        ]);
        echo '新管理者帳戶註冊成功<br>';
        echo '<a href="home.php">回首頁</a><br>';
        echo '<a href="login.php">管理者登入</a>';
        exit;
    }
    else
    {
        echo '新管理者帳戶註冊失敗<br>';
        echo '此帳號名稱已被使用<br>';
        echo '<a href="home.php">回首頁</a><br>';
        echo '<a href="newuser.php">重新註冊</a>';
    }
}
?>
<?php require 'footer.php'; ?>