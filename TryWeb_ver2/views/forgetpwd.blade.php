<?php require 'header.blade.php'; ?>
希望寫ㄉ出來<br>
<form action="forgetpwdout.blade.php" method="post">
    帳號名稱：<input type="text" name="login" required><br>
    <input type="submit" value="傳送驗證碼"><br>
</form>
<?php require 'footer.blade.php'; ?>