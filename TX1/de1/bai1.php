<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
       .de1{
            width: 300px;
            background :#0303;
            margin-left: 300px;
       }
       .lb {
            width: 100px; 
            text-align: center;
        }
        .ip {
            width: 200px;
        }

      

    </style> 
</head>
<body>
<?php
        error_reporting(E_ERROR| E_PARSE);
        if(isset($_POST['tinh'])){
            // lay du lieu
            $ma = $_POST['maH'];
            $tenH = $_POST['tenH'];
            $loainH = $_POST['loaiH'];
            $sl = $_POST['sl'];
            $nhapThang = $_POST['thangNhap'];
            $loaiH = "";

            $error = "Dữ liệu nhập sai hoặc trống mời nhập lại";
            if(empty($ma)|| empty($loainH) || empty($nhapThang) || empty($tenH)  || empty($sl) ){
                echo '"<script>alert("'.$error.'")</script>"';
                //echo "<script>alert(".$error.")</script>";
            }else if (!is_numeric($sl) || ( $nhapThang < 0 || $nhapThang > 12 ) ){ 
                echo '<script>alert("Du lieu nhap la so")</script>';
                $sl = "";
                $nhapThang= "";
            }else {
                switch($loainH){
                    case 'K': case 'k':
                        $loaiH = "Vai kate";
                        $thanhTien = $sl * 10000;
                        break;
                    case 'G': case 'g':
                        $loaiH = "Gam T.Hai";
                        $thanhTien = $sl * 75000;
                        break;
                    case 'T': case 't':
                        $loaiH = "Vai Tole";
                        $thanhTien = $sl * 12000;
                        break;
                    case 'S': case 's': 
                        $loaiH = "Vai Silk";
                        $thanhTien = $sl * 30000;
                        break;
                    case 'X': case 'x':
                        $loaiH ="Vai xo";
                        $thanhTien = $sl * 35000;
                        break;
                    default:
                    echo "";
                }
            }
           // Thue
           if($nhapThang > 0 &&$nhapThang < 4 ) $thue = $thanhTien * 0.012;
           else if($nhapThang < 10) $thue = $thanhTien * 0.015;
           else $thue = $thanhTien * 0.0175;
        // tra truoc
            if ($thanhTien >= 5000000 ) {
                $traTruoc = ($thanhTien +$thue)*0.75;
                $conLai = ($thanhTien +$thue)*0.25;
            }
            else {
                $traTruoc = ($thanhTien +$thue)*0.5;
                $conLai = ($thanhTien +$thue)*0.5;
            }

        }
 ?>

    
    <div class = "de1" style = "border :1px solid black" >
        <form action = "bai1.php" method="post" >
            <table border ="1px" style="text-align: center;">
                <tr >
                    <th colspan = "2" >BẢNG THỐNG KÊ NHẬP XUẤT<br> HÀNG NĂM 2020 </th>
                <tr>
                <tr>
                    <td class = "lb"> <label for="maH"> Mã hàng: </label></td>
                    <td class = "ip"> <input type="text" name = "maH"  value = "<?php  echo $ma; ?>"></td>
                <tr>
                <tr>
                    <td class = "lb"> <label for="tenH"> Tên hàng: </label></td>
                    <td class = "ip"> <input type="text" name = "tenH" value = "<?php  echo $tenH ?>" ></td>
                <tr>
                <tr>
                    <td class = "lb"> <label for="loaiH">Loai hàng: </label></td>
                    <td class = "ip"> <input type="text" name = "loaiH"  value = "<?php echo $loaiH ?>" ></td>
                <tr>
                <tr>
                    <td class = "lb"> <label for="sl">Số lượng </label></td>
                    <td class = "ip"> <input type="text" name = "sl" value = "<?php  echo $sl ?>" ></td>
                <tr>
                <tr>
                    <td class = "lb"> <label for="thangNhap"> Tháng nhập: </label></td>
                    <td class = "ip"> <input type="text" name = "thangNhap"  value = "<?php echo $nhapThang; ?>" ></td>
                <tr> 
                <tr>
                    <td class = "lb"> <label for="thanhTien"> Thành tiền: </label></td>
                    <td class = "ip"> <input type="text" name = "thanhTien" value = "<?php if(!empty($thanhTien))   echo $thanhTien; else echo""; ?> "></td>
                <tr> 
                    <td class = "lb"> <label for="thue"> Thuế: </label></td>
                    <td class = "ip"> <input type="text" name = "thue"  value = "<?php if(!empty($thue))   echo $thue; else echo""; ?>  "></td>
                <tr> 
                <tr>
                    <td class = "lb"> <label for="traTruoc"> Trả trước: </label></td>
                    <td class = "ip"> <input type="text" name = "traTruoc" value = "<?php if(!empty($traTruoc))   echo $traTruoc; else echo""; ?>  " ></td>
                <tr> 
                <tr>
                    <td class = "lb"> <label for="conLai"> Còn Lại: </label></td>
                    <td class = "ip"> <input type="text" name = "conLai" value = "<?php if(!empty($conLai))   echo $conLai; else echo""; ?> "  ></td>
                <tr>
                <tr>
                    <td colspan = "2"> <input type="Submit" value="Xóa" name = "xoa">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     <input type="submit" value="Tính Tiền" name="tinh"> </td>
                <tr>  
            </table>

        </form>
       
    </div>
    
</body>
</html>