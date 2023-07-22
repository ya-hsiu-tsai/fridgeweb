function check()
{
    var pwd = document.forms["sign_up"]["pwd"].value;
    var pwdcheck2 = document.forms["sign_up"]["pwdcheck"].value;
    const regexp = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

    if(pwd != pwdcheck2)
    {
        alert("兩次輸入的密碼不一樣，請重新輸入");
        return false;
    }
    else if(regexp.test(pwd) == false)
    {
        alert("密碼須包含大寫英文字母、小寫英文字母、數字、特殊符號至少各一，且長度為8以上");
        return false;
    }
    else
    {
        return true;
    }
}