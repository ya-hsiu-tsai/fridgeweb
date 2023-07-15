<?php require 'header.php'; ?>
<?php
session_start();
$pdo = new PDO('mysql:host=localhost; dbname=fridgeweb; charset=utf8', 'staff', 'password');
$sql = $pdo->prepare('select * from fridge where users_id=?');
$sql->execute([$_SESSION['users']['id']]);
echo '使用者回報系統<br>';
echo '管理者：', $_SESSION['users']['name'], '<br>';
echo '回報內容（已解決）：<br>';
foreach($sql->fetchAll() as $row)
{
    echo '<table>';
    echo '<th align="left">冰箱：', $row['name'], '</th>';
    $sql_comment = $pdo->prepare('select * from comment where fridge_id=?');
    $sql_comment->execute([$row['id']]);
    $n = 1;
    foreach($sql_comment->fetchAll() as $row2)
    {
        if($row2['solve'] == 1)
        {
            echo '<tr><td>', $n, '</td><td>', $row2['content'], '</td></tr>';
            $n++;
        }
    }
    if($n == 1)
        echo '<tr><td colspan="3">冰箱沒有已解決問題</td></tr>';
    echo '</table>';
}
?>
<a href="usercomment.php">未解決問題</a><br>
<a href="userhome.php">回首頁</a><br>
<?php require 'footer.php'; ?>