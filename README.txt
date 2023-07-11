# fridgeweb
進度：
2023.07.06
  1.將登入的密碼驗證變為hash方式
  2.更改了資料庫中user、fridge、product table欄位
    ：user新增tel及company，並將password改為password_hash
    ：fridge需保留tel及company
    ：product新增put_time, alarm_time, photo_name及exist
  3.增加了管理者註冊時應該輸入的資料
    ：聯絡電話及所屬機構
  4.增加了管理者資料呈現頁面的內容
    ：聯絡電話及所屬機構
  5.新增冰箱時需輸入的聯絡電話及所屬機構，預設值為管理者資料
    ：可依照需求更改
  *一般使用者首頁未完成修改*
