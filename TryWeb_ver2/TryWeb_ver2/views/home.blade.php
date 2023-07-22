<?php require 'header.blade.php'; ?>
<script src="../js/twolayerselect.js"></script>
愛心冰箱整合地圖
<a href="login.blade.php">管理者登入</a>
<a href="newuser.blade.php">註冊新帳號</a><br>
<form name="select_location" action="selecttable.blade.php" target="table_iframe">
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
    <input type="submit" value="查詢"><br>
</form>
<iframe name="table_iframe" style="border:0;"></iframe>
<div id="map"></div>
<script src="../js/map.js"></script>
<script>
    navigator.geolocation.getCurrentPosition(getcoordinate);  
    function getcoordinate(position)
    {  
        var lat = position.coords.latitude;  
        var long = position.coords.longitude;  
        var address = lat + "," + long;
        showmap(address);
    }
    function send_address(address)
    {
        showmap(address);
    }
</script>
<?php require 'footer.blade.php'; ?>