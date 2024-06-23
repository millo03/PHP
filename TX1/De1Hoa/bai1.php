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
        $maH= $_POST['maH'];
        $tenH= $_POST['tenH'];
        $loaiH= $_POST['loaiH'];
        $soL= $_POST['soL'];
        $thangN = $_POST['thangN'];
        if(empty($maH)|| empty($tenH)|| empty($loaiH)|| empty($soL)|| empty($thangN)){
            echo '<script> alert ("Ma hoa, ten hoa, loai hoa, so luong, thang nhap khong duoc de trong!")</script>';
        }else{
             if(!is_numeric($soL))  echo '<script> alert ("So luong can nhap la 1 so!")</script>';
            else {
                if(!is_numeric($thangN) || $thangN < 1 || $thangN > 12)  echo '<script> alert ("thang nhap trong khoang [1,12]")</script>';
                else{
                    switch($loaiH){
                    case 'h': case 'H': case "Hoa hong":
                        $loaiH = "Hoa hong";
                        $thanhT = $soL* 10000;
                        break;
                    case 'c': case 'C': case "Hoa cuc":
                        $loaiH = "Hoa cuc";
                        $thanhT = $soL* 75000;
                        break;
                    case 'm': case 'M': case "Hoa mai":
                        $loaiH = "Hoa mai";
                        $thanhT = $soL* 12000;
                        break;
                    case 'd': case 'D': case "Hoa dao":
                        $loaiH = "Hoa dao";
                        $thanhT = $soL* 30000;
                        break;
                    case 'l': case 'L': case "Hoaly":
                        $loaiH = "Hoa ly";
                        $thanhT = $soL* 35000;
                        break;
                    default:
                        echo '<script> alter ("Loai hoa nhan 4 gia tri: h,d,m,c,l")</script>';
                    }
                    if($thanhT > 5000000) $traT = $thanhT*0.75;
                    else $traT = $thanhT*0.5;
                    switch ($thangN){
                    case 1: case 2: case 3 :
                        $thue = $thanhT*0.012;
                        break;
                    case 4: case 5: case 6: case 7: case 8: case 9:
                        $thue = $thanhT*0.015;
                        break;
                    default:
                        $thue = $thanhT*0.0175;
                    }
                    $conL = $thanhT+ $thue -$traT;

                 }
            }
        }
    }
    ?>
    <div>
        <form action="bai1.php" method= "post">
            <table>
                <tr>
                    <th colspan = "2">THỐNG KÊ XUẤT NHẬP KHẨU HOA NĂM 2023</th>
                </tr>
                <tr>
                    <td>Ma hoa: </td>
                    <td><input type="text" name ="maH" value = "<?php if(!empty($maH)) echo $maH; else echo ""; ?>"></td>
                </tr>
                <tr>
                    <td>Tên hoa: </td>
                    <td><input type="text" name ="tenH" value = "<?php if(!empty($tenH)) echo $tenH; else echo ""; ?>"></td>
                </tr>
                <tr>
                    <td>Loai hoa:  </td>
                    <td><input type="text" name ="loaiH" value = "<?php if(!empty($loaiH)) echo $loaiH; else echo ""; ?>"></td>
                </tr>
                <tr>
                    <td>Số lượng:  </td>
                    <td><input type="text" name ="soL" value = "<?php if(!empty($soL)) echo $soL; else echo ""; ?>"></td>
                </tr>
                <tr>
                    <td>Tháng nhập:  </td>
                    <td><input type="text" name ="thangN" value = "<?php if(!empty($thangN)) echo $thangN; else echo ""; ?>"></td>
                </tr>
                <tr>
                    <td>Thành tiền:  </td>
                    <td><input type="text" name ="thanhT" value = "<?php if(!empty($thanhT)) echo $thanhT; else echo ""; ?>"></td>
                </tr>
                <tr>
                    <td>Thuế:  </td>
                    <td><input type="text" name ="thue" value = "<?php if(!empty($thue)) echo $thue; else echo ""; ?>"></td>
                </tr>
                <tr>
                    <td>Trả trước:  </td>
                    <td><input type="text" name ="traT" value = "<?php if(!empty($traT)) echo $traT; else echo ""; ?>"></td>
                </tr>
                <tr>
                    <td>Còn lại:  </td>
                    <td><input type="text" name ="conL" value = "<?php if(!empty($conL)) echo $conL; else echo ""; ?>"></td>
                </tr>
                <tr>
                    <td colspan = "2"  style = "text-align: center">
                        <input type="submit" name="tinhT" value="Tính tiền" id="">
                        <input type="submit" name="xoaT" value="Xoa" id="">
                    </td>
                </tr>

            </table>
        </form>
    </div>
</body>
</html>