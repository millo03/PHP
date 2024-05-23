<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
        }

        td, th {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        input[type="text"] {
            width: 100%;
            box-sizing: border-box;
            padding: 4px;
        }

        input[type="submit"], input[type="reset"] {
            width: 100px;
            padding: 8px;
            border: none;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <?php
        $chuoi = "";
        $so_ky_tu = 0;
        $so_tu = 0;
        $tu_can_tim = "";
        $so_lan_xuat_hien = 0;
        $vi_tri_cat = "";
        $chuoi_sau_cat = "";
        error_reporting(E_ERROR|E_PARSE);
        if(isset($_POST["tinh"])){
            $chuoi = trim($_POST["chuoi"]); // Loại bỏ khoảng trắng thừa
            $so_ky_tu = strlen($chuoi);
            $so_tu = str_word_count($chuoi);
            $tu_can_tim = trim($_POST["tu_can_tim"]); // Loại bỏ khoảng trắng thừa
            $vi_tri_cat = trim($_POST["vi_tri_cat"]); // Vị trí cắt

            // Chuyển từ cần tìm thành chữ thường chỉ khi thực hiện tìm kiếm
            $so_lan_xuat_hien = substr_count(strtolower($chuoi), strtolower($tu_can_tim));

            // Cắt chuỗi từ vị trí cho trước
            $chuoi_sau_cat = substr($chuoi, $vi_tri_cat);
        }
    ?>
    <form action="BT_chuoi.php" method="post">
        <table>
            <tr>
                <th colspan="2" class="id">XỬ LÝ CHUỖI</th>
            </tr>
            <tr>
                <td>Nhập chuỗi</td>
                <td><input type="text" name="chuoi" value="<?php echo $chuoi; ?>"></td>
            </tr>
            <tr>
                <td colspan="2" class="id"><input type="submit" value="Thực hiện" name="tinh"></td>
            </tr>
            <tr>
                <td>Số ký tự trong chuỗi</td>
                <td><input type="text" name="so_ky_tu" value="<?php echo $so_ky_tu; ?>" readonly></td>
            </tr>
            <tr>
                <td>Số từ trong chuỗi</td>
                <td><input type="text" name="so_tu" value="<?php echo $so_tu; ?>" readonly></td>
            </tr>
            <tr>
                <td>Nhập từ cần tìm</td>
                <td><input type="text" name="tu_can_tim" value="<?php echo $tu_can_tim; ?>"></td>
            </tr>
            <tr>
                <td>Số lần xuất hiện của từ</td>
                <td><input type="text" name="so_lan_xuat_hien" value="<?php echo $so_lan_xuat_hien; ?>" readonly></td>
            </tr>
            <tr>
                <td>Vị trí cắt</td>
                <td><input type="text" name="vi_tri_cat" value="<?php echo $vi_tri_cat; ?>"></td>
            </tr>
            <tr>
                <td>Chuỗi sau khi cắt</td>
                <td><input type="text" name="chuoi_sau_cat" value="<?php echo $chuoi_sau_cat; ?>" readonly></td>
            </tr>
        </table>
    </form>
</body>
</html>
