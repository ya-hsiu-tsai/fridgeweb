<?php require 'header.php'; ?>
<script src="scripts/twolayerselect.js"></script>
愛心冰箱整合地圖
<a href="login.php">管理者登入</a>
<a href="newuser.php">註冊新帳號</a><br>
<form name="select_location">
    <select name="nearfridge">
        <option value="near" selected>附近冰箱</option>
        <option value="distance">依距離推薦</option>
        <option value="foodamount">依食物量推薦</option>
    </select>
    查詢冰箱：
    <select name="county" onchange="select_area(this.selectedIndex);">
        <option value="none" selected disabled hidden>請選擇縣市</option>
        <?php
            $county = [
                "基隆市", "臺北市", "新北市", "桃園市", "新竹市", "新竹縣",
                "苗栗縣", "臺中市", "彰化縣", "南投縣", "雲林縣", "嘉義市",
                "嘉義縣", "臺南市", "高雄市", "屏東縣", "臺東縣", "花蓮縣",
                "宜蘭縣", "澎湖縣", "金門縣", "連江縣"
            ];
            foreach($county as $i)
                echo '<option value="', $i, '">', $i, '</option>';
        ?>
    </select>
    <select name="area">
        <option value="none" selected disabled hidden>請選擇鄉鎮市區</option>
    </select>
</form>
//這裡不知道怎辦<br>
//地圖？表格？嗯？？<br>
//地圖選單表格全部連動在一起我不會QAQ<br>
//不管怎樣我先把所有冰箱列出來好ㄌ<br>
<?php
$pdo = new PDO('mysql:host=localhost; dbname=fridgeweb; charset=utf8', 'staff', 'password');
$sql = $pdo->prepare('select * from fridge');
$sql->execute([]);
echo '<table>';
echo '<th>冰箱名稱</th><th>地點</th>';
$c = 0;
foreach($sql->fetchAll() as $row)
{
    $c++;
    echo '<tr>';
    echo '<td>';
    echo '<a href="fridgedetail.php?id=', $row['id'], '">', $row['name'], '</a>';
    echo '</td>';
    echo '<td>', $row['address'], '</td>';
    echo '</tr>';
}
if($c == 0)
    echo '目前還沒有冰箱<br>';
?>
<?php require 'footer.php'; ?>