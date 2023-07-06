<?php require 'header.php'; ?>
<?php
session_start();
unset($_SESSION['user']);
$pdo = new PDO('mysql:host=localhost; dbname=fridgeweb; charset=utf8', 'staff', 'password');
$sql = $pdo->prepare('select * from user where name=?');
$sql->execute([htmlspecialchars($_REQUEST['name'])]);
foreach($sql->fetchAll() as $row)
{
    if(password_verify($_REQUEST['pwd'], $row['password_hash']))
        $_SESSION['user'] = [
            'id' => $row['id'], 'name' => $row['name'], 'mail' => $row['mail'],
            'tel' => $row['tel'], 'company' => $row['company'], 'password_hash' => $row['password_hash']
        ];
}
if(isset($_SESSION['user']))
{
    header("location:userhome.php");
}
else
{
    echo '<script> alert("帳號名稱或密碼錯誤"); </script>';
    header("refresh:0.5; url=login.php");
}
?>
<?php require 'footer.php'; ?>