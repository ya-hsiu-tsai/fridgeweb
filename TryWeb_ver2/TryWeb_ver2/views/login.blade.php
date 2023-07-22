<?php require 'header.blade.php'; ?>
管理者登入<br>
<form name="sign_in" action="loginout.blade.php" method="post">
    帳號名稱：<input type="text" name="name" required><br>
    密碼：<input type="password" name="pwd" required><br>
    <input type="submit" value="登入"><br>
</form>
<a href="forgetpwd.blade.php">忘記密碼</a><br>
<a href="home.blade.php">回首頁</a>
<?php require 'footer.blade.php'; ?>