<?php require 'header.php'; ?>
<script src="scripts/pwdcheck.js"></script>
註冊新管理者帳號<br>
<form name="sign_up" action="newuserout.php" method="post" onsubmit="return check()">
    帳號名稱：<input type="text" name="name" required><br>
    email：<input type="email" name="mail"required><br>
    設置密碼：<input type="password" name="pwd" required><br>
    *密碼須包含大寫英文字母、小寫英文字母、數字各一，且長度為8以上*<br>
    再次輸入密碼：<input type="password" name="pwdcheck" required><br>
    <input type="submit" value="註冊新帳號"><br>
</form>
<a href="home.php">回首頁</a>
<?php require 'footer.php'; ?>