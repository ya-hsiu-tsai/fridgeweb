<?php require 'header.php'; ?>
管理者登入<br>
<form name="sign_in" action="loginout.php" method="post">
    帳號名稱：<input type="text" name="name" required><br>
    密碼：<input type="password" name="pwd" required><br>
    <input type="submit" value="登入"><br>
</form>
<a href="forgetpwd.php">忘記密碼</a><br>
<a href="home.php">回首頁</a>
<?php require 'footer.php'; ?>