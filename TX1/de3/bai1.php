<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if(isset($_POST['tinh'])){
            $ten = $_POST['tenChuXe'];
            $dungTich= $_POST['dungTich'];
            $loai = $_POST['loaiXe'];
            $triGia = $_POST['triGia'];
            if(empty($ten) || empty($dungTich) || empty ($loai) || empty($triGia)){
                echo '<script> alert ("Khong de trong gia tri nay.")</script>';
            }else if(!is_numeric($dungTich) || !is_numeric($triGia)){
                echo '<script> alert ("Dung tich, tri gia la so! ")</script>';
            } else{
                if( $dungTich > 200) $thue = 0.05*$triGia;
                else if( $dungTich > 100) $thue = 0.03*$triGia;
                else if( $dungTich > 0) $thue = 0.01*$triGia;
                else  echo '<script> alert ("Dung tich la so > 0")</script>';
                $loaiKH = $triGia >45000000? "Thu nhap cao": "Thu nhap pho thong";
            }
        }
    ?>
    <div style ="border: 1px solid black; width: max-content">
        <form action="bai1.php" method= "post" >
            <table>
                <tr>
                    <th colspan = "4"> THÔNG TIN ĐĂNG KÍ XE</th>
                </tr>
                <tr>
                    <td style ="width: 80px; padding-left:10px"  ><b>Ten chu xe: </b></td>
                    <td><input type="text" name="tenChuXe" value="<?php if(!empty($ten)) echo $ten; else echo ""; ?>"></td>
                    <td style ="width: 150px; padding-left:10px" ><b>Dung tich xi lanh: </b></td>
                    <td><input type="text" name="dungTich" value="<?php if(!empty($dungTich)) echo $dungTich; else echo ""; ?>"></td>
                </tr>
                <tr>
                    <td style ="width: 80px; padding-left:10px"  ><b>Loại xe: </b></td>
                    <td><input type="text" name="loaiXe" value="<?php if(!empty($loai)) echo $loai; else echo ""; ?>"></td>
                    <td style ="width: 150px; padding-left:10px" ><b>Trị giá: </b></td>
                    <td><input type="text" name="triGia" value="<?php if(!empty($triGia)) echo $triGia; else echo ""; ?>"></td>
                </tr>
                <tr>
                    <td style ="width: 80px; padding-left:10px"  ><b>Thuế: </b></td>
                    <td><input type="text" name="thue"value="<?php if(!empty($thue)) echo $thue; else echo ""; ?>"></td>
                    <td style ="width: 150px; padding-left:10px" ><b>Loại khách hàng: </b></td>
                    <td><input type="text" name="loaiKH" value="<?php if(!empty($loaiKH)) echo $loaiKH; else echo ""; ?>"></td>
                </tr>
                <tr>
                    <td colspan = "2" style ="text-align: center">
                        <input type="submit" value="Tính Thuế" name = "tinh" >
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="submit" value="Hủy bỏ">
                    </td>
                    <td colspan = "2"></td>
                </tr>
            </table>
        </form>
    </div>
    
</body>
</html>