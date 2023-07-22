<?php require 'header.blade.php'; ?>
<?php
session_start();
unset($_SESSION['users']);
$pdo = new PDO('mysql:host=localhost; dbname=fridgeweb; charset=utf8', 'staff', 'password');
$sql = $pdo->prepare('select * from users where name=?');
$sql->execute([htmlspecialchars($_REQUEST['name'])]);
foreach($sql->fetchAll() as $row)
{
    if(password_verify($_REQUEST['pwd'], $row['password_hash']))
        $_SESSION['users'] = [
            'id' => $row['id'], 'name' => $row['name'], 'mail' => $row['mail'],
            'tel' => $row['tel'], 'company' => $row['company'], 'password_hash' => $row['password_hash']
        ];
}
if(isset($_SESSION['users']))
{
    header("location:userhome.blade.php");
}
else
{
    echo '<script> alert("帳號名稱或密碼錯誤"); </script>';
    header("refresh:0.5; url=login.blade.php");
}
?>
<?php require 'footer.blade.php'; ?>