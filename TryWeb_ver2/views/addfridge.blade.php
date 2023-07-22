<?php require 'header.blade.php'; ?>
<script src="../js/twolayerselect.js"></script>
<?php session_start(); ?>
<form name="select_location" action="addfridgeout.blade.php" method="post">
    新增冰箱<br>
    冰箱名稱：<input type="text" name="fridgename" required><br>
    冰箱所屬機構：<input type="text" name="fridgecomp" value="<?=$_SESSION['users']['company']?>" required><br>
    聯絡電話：<input type="tel" name="fridgephone" value="<?=$_SESSION['users']['tel']?>" placeholder="市話/手機號碼" required><br>
    冰箱地點：
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
    <input type="text" name="fridgeaddr" placeholder="村里/路名"required><br>
    冰箱座標：<input type="text" name="fridgecoor" placeholder="輸入經緯度" required><br>
    <input type="submit" value="送出"><br>
</form>
<?php require 'footer.blade.php'; ?>