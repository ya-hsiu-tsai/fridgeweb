<?php require 'header.blade.php'; ?>
<?php
$pdo = new PDO('mysql:host=localhost; dbname=fridgeweb; charset=utf8', 'staff', 'password');
$sql = $pdo->prepare('select * from users where name=?');
if($sql->execute([htmlspecialchars($_REQUEST['name'])]))
{
    if(empty($sql->fetchAll()))
    {
        $pwd_hash = password_hash($_REQUEST['pwd'], PASSWORD_DEFAULT);
        if(empty($_REQUEST['company']))
            $company = '個人';
        else
            $company = $_REQUEST['company'];
        $sql = $pdo->prepare('insert into users values(null, ?, ?, ?, ?, ?)');
        $sql->execute([
            htmlspecialchars($_REQUEST['name']), $_REQUEST['mail'], $_REQUEST['tel'],
            $company, $pwd_hash
        ]);
        echo '新管理者帳戶註冊成功<br>';
        echo '<a href="home.blade.php">回首頁</a><br>';
        echo '<a href="login.blade.php">管理者登入</a>';
    }
    else
    {
        echo '新管理者帳戶註冊失敗<br>';
        echo '此帳號名稱已被使用<br>';
        echo '<a href="home.blade.php">回首頁</a><br>';
        echo '<a href="newuser.blade.php">重新註冊</a>';
    }
}
?>
<?php require 'footer.blade.php'; ?>