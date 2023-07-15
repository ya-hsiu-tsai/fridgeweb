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
<?php
$pdo = new PDO('mysql:host=localhost; dbname=fridgeweb; charset=utf8', 'staff', 'password');
$sql = $pdo->prepare('select * from fridge where address like ?');
$address = $_REQUEST['county'].$_REQUEST['area'];
$sql->execute(['%'.$address.'%']);
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
    echo '<tr><td colspan="2">目前還沒有冰箱</td></tr>';
echo '</table>';
?>
<div id="map"></div>
<script src="scripts/map.js"></script>
<script>
    navigator.geolocation.getCurrentPosition(getcoordinate);  
    function getcoordinate(position)
    {  
        var lat = position.coords.latitude;  
        var long = position.coords.longitude;  
        var address = lat + "," + long;
        showmap(address);
    }
</script>
<?php require 'footer.php'; ?>