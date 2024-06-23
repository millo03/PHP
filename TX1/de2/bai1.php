<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    function doiGioVeSo($a){
        $a= explode(":",$a);
        $sogio = (int) $a[0]+ (int)(int) $a[1]/60;
        return $sogio;
        
    }
    function doiSoVeGio($a){
        $a= $a[0].":".(string)$a[1]*60;
        
    }
    if(isset($_POST['timKiem'])){
        $soM= $_POST['soMay'];
        $hinhTT= $_POST['hinhTT'];
        $gioN=$_POST['gioNhan'];
        $gioT=$_POST['gioTra'];
        $donG= $_POST['donGia'];
        if(empty($soM)|| empty($hinhTT)|| empty($gioN)|| empty($gioT)|| empty($donG)){
            echo '<script> alert ("Du lieu khong duoc de trong.")</script>';
        }else if(empty($gioN)|| empty($gioT)|| !preg_match('/^-?\d+(?::\s*-?\d+)*$/', $gioN) || !preg_match('/^-?\d+(?::\s*-?\d+)*$/', $gioT)){
            echo '<script> alert ("Gio nhan, gio tra nhap dung theo : hh:mm")</script>';
        }else{
            $thoiGT= $gioT -$gioN;
        }
            switch($hinhTT){
                case 't': case 'T': 
                    $hinhTT = "Thuc hanh";
                    $tienThue= $thoiGT*$donG;
                    break;
                case 'i': case 'I': 
                    $hinhTT = "Internet";
                    $tienThue= $thoiGT*$donG;
                    break;
                case 'm': case 'M': 
                    $hinhTT = "Check mail";
                    $tienThue= 3500;
                    break;
                default:
                echo '<script> alert ("Hinh thuc thu co 3 gia tri i,t,m")</script>';
            }
            if($thoiGT > 2) {
                $tienGiam = $tienThue*0.2;
               
            }
            else $tienGiam =0;
            $tienTra = $tienThue - $tienGiam;
        }

    ?>
    <div  style=" margin: auto; background: #ccc; width : max-content;">
        <form action="bai1.php" method = "post">
            <table border = "1" >
                <tr>
                    <th colspan = "2"> QUẢN LÝ THUÊ MÁY TÍNH</th>
                </tr>
                <tr>
                    <td style="text-align: center">Số máy: </td>
                    <td><input type="text" name="soMay" value ="<?php if(!empty($soM)) echo $soM; else echo "";  ?>"> </td>
                </tr>
                <tr>
                    <td style="text-align: center">Hình thức thuê: </td>
                    <td><input type="text" name="hinhTT" value ="<?php if(!empty($hinhTT)) echo $hinhTT; else echo "";  ?>"></td>
                </tr>
                <tr>
                    <td style="text-align: center">Giờ nhận: </td>
                    <td><input type="text" name="gioNhan" value ="<?php if(!empty($gioN)) echo $gioN; else echo ""; ?>"> </td>
                </tr>
                <tr>
                    <td style="text-align: center">Giờ tra: </td>
                    <td><input type="text" name="gioTra" value ="<?php if(!empty($gioT))echo $gioT; else echo "";  ?>"> </td>
                </tr>
                <tr>
                    <td style="text-align: center">Thời gian thuê: </td>
                    <td><input type="text" name="thoiGT" value ="<?php if(!empty($thoiGT))echo $thoiGT." gio"; else echo "";  ?>"></td>
                </tr>
                <tr>
                    <td style="text-align: center">Đơn giá: </td>
                    <td><input type="text" name="donGia" value ="<?php if(!empty($donG))echo $donG; else echo "";  ?>"></td>
                </tr>
                <tr>
                    <td style="text-align: center">Tiền thuê: </td>
                    <td><input type="text" name="tienThue" value ="<?php if(!empty($tienThue))echo $tienThue; else echo "";  ?>"></td>
                </tr>
                <tr>
                    <td style="text-align: center">Tiền giảm: </td>
                    <td><input type="text" name="tienGiam" value ="<?php if(!empty($tienGiam))echo $tienGiam; else echo "0";  ?>"></td>
                </tr>
                <tr>
                    <td style="text-align: center">Tiền phải trả: </td>
                    <td><input type="text" name="tienPT" value ="<?php if(!empty($tienTra))echo $tienTra; else echo "";  ?>"></td>
                </tr>
                <tr>
                    <td colspan= "2" style="text-align: center"><input type="submit" name ="xoa" value="Xóa"> &nbsp;
                   <input type="submit" name ="timKiem" value="Tìm kiếm"></td>
                </tr>

            </table>
        </form>
    </div>
    
</body>
</html>