# Web_laravel_ver
進度：
2023.08.09
  檔案變更處
    ：app/Http/Controllers/FridgeController.php
    ：public/js
    ：resources/views/layouts/empty.blade.php
    ：resources/views/layouts/navigation.blade.php
    ：resources/views/dashboard.blade.php
    ：resources/views/selecttable.blade.php
    ：resources/views/welcome.blade.php
    ：routes/web.php
  1.於一般使用者首頁成功顯示下拉式選單及地圖
    ：因為新增冰箱功能未完成，無法確定他們是否有連結成功
  *目前dashboard壞掉*

# TryWeb_ver2
進度：
2023.07.24
  1.一般使用者首頁的下拉式選單和冰箱列表和地圖已連結
  2.修正了刪除冰箱功能
    ：刪除冰箱的同時，一併刪除所屬食物及回報內容
  *冰箱內食物的資料顯示方法待定*
  *尚無食物過期的警示系統*
2023.07.22
  1.將資料夾及檔名重新分配
    ：修改資料夾路徑
    ：改成.blade.php檔，並將程式碼中的引用也改名
  2.將一般使用者首頁的選單及冰箱列表連結
    ：能利用縣市鄉鎮過濾出符合條件的冰箱
  *一般使用者首頁的冰箱列表及地圖的連結未找到辦法* ✓
2023.07.15
  1.於管理者資料呈現頁面新增刪除帳號功能
    ：刪除帳號時，將一併刪除所屬冰箱、冰箱的回報內容及裡面的食物
  2.找到方法可以定位使用者目前所在位置，並顯示出地圖
    ：位置好像會跳走？
  *忘記密碼功能的驗證碼產生及郵件寄出未得出實作方法* ∅
  *一般使用者首頁的選單和冰箱列表和地圖的連結未找到方法* ✓
2023.07.12
  1.管理者的使用者回報內容輸出介面完成
  2.管理者可將問題標示已解決並分類至另一頁面
  3.增加資料庫中comment的欄位
    ：新增solve並預設為0，用來記錄問題是否解決
  4.一般使用者與管理者的冰箱明細介面中成功顯示地圖
  *不確定目前的使用者回報系統介面是否為最終版*
  *不確定一般使用者首頁的地圖怎麼放*
2023.07.11
  1.一般使用者的冰箱明細完成修改
  2.於一般使用者的冰箱明細介面中新增了使用者回報系統的輸入
  3.成功將回報內容存至資料庫
  *管理者的使用者回報內容輸出介面未完成* ✓
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
  *一般使用者首頁的冰箱明細未完成修改* ✓
