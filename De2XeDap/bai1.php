<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if(isset($_POST['tinhT'])){
        $soX= $_POST['soX'];
        $hinhTT= $_POST['hinhTT'];
        $gioN= $_POST['gioN'];
        $gioT= $_POST['gioT'];
        $donG= $_POST['donG'];
        
        if(empty($soX) || empty($hinhTT) || empty($gioN) || empty($gioT) || empty($donG) ) echo '<script>alert ("Nhap day du cac o du lieu")</script>';
        else{
            // kiem tr la so
            if(!is_numeric($gioN) || !is_numeric($gioT) || !is_numeric($donG) )
            echo '<script>alert ("Gio nhan, gio tra, don gia la so.")</script>';
            else{
                $thoiGT = $gioT - $gioN;
                switch($hinhTT){
                    case "x1": case "X1": case "Theo gio":
                        $hinhTT = "Theo gio";
                        break;
                    case "x2": case "X2": case "Theo ngay":
                        $hinhTT = "Theo ngay";
                        $tienT = $thoiGT*$donG;
                        break;
                    case "x3": case "X3": case "Chon goi":
                        $hinhTT = "Chon goi";
                       $tienT = 350000;
                        break;
                    default: 
                    echo '<script>alert ("Hinh thuc thue co 3 gia tri la x1,x2,x3.")</script>';
                    
                }
            }
        }
    }
    ?>
    <div style="border: 1px solid black; width: max-content; margin: auto; background : #ccc">
        <form action="bai1.php" method ="post">
            <table border = '1'>
                <tr>
                    <th colspan = '2'> THỐNG KÊ THUÊ XE ĐẠP 2023 </th>
                </tr>
                <tr>
                    <td>Số xe</td>
                    <td><input type="text" name="soX" value="<?php if(!empty($soX)) echo $soX; else echo"";?>"></td>
                </tr>
                <tr>
                    <td>Hình thức thuê</td>
                    <td><input type="text" name="hinhTT" value="<?php if(!empty($hinhTT)) echo $hinhTT; else echo"";?>" ></td>
                </tr>
                <tr>
                    <td>Giờ nhận</td>
                    <td><input type="text" name="gioN" value="<?php if(!empty($gioN)) echo $gioN; else echo"";?>"></td>
                </tr>
                <tr>
                    <td>Giờ trả: </td>
                    <td><input type="text" name="gioT" value="<?php if(!empty($gioT)) echo $gioT; else echo"";?>"></td>
                </tr>
                <tr>
                    <td>Thời gian thuê</td>
                    <td><input type="text" name="thoiGT" value="<?php if(!empty($thoiGT)) echo $thoiGT; else echo"";?>"disabled></td>
                </tr>
                <tr>
                    <td>Đơn giá</td>
                    <td><input type="text" name="donG" value=" <?php if(!empty($donG)) echo $donG; else echo"a";?>"></td>
                </tr>
                <tr>
                    <td>Tiền thuê</td>
                    <td><input type="text" name="tienT" value="" disabled></td>
                </tr>
                <tr>
                    <td>Tiền giảm</td>
                    <td><input type="text" name="tienG" value="" disabled></td>
                </tr>
                <tr>
                    <td>Tiền phải trả</td>
                    <td><input type="text" name="tienPT" value="" disabled></td>
                </tr>
                <tr style=" text-align: center">
                    <td colspan ='2'>
                        <input type="submit" name ="tinhT" value = "Tính tiền">
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="submit" name ="xoa" value = "Xoa">
                    </td>
                </tr>
            </table>
        </form>
    </div>
    
</body>
</html>