<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        span{
            color: red;
        }
        table {
            width: 50%;
            border-collapse: collapse;
            background-color: bisque;
        }

        td {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th{
            padding: 8px;
            border: 1px solid #ddd;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        td input[type="text"] {
            width: 100%;
            box-sizing: border-box;
            padding: 4px;
        }

        td input[type="submit"], td input[type="reset"] {
            width: 100px;
            padding: 8px;
            border: none;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }




    </style>
    <?php
    error_reporting(E_ERROR|E_PARSE);
    if(isset($_POST["tinh"])){
        $maHang=$_POST["maHang"];
        $tenHang=$_POST["tenHang"];
        $loaiHang=$_POST["loaiHang"];
        $soLuong=$_POST["soLuong"];
        $thangNhap=$_POST["thangNhap"];

        $error="Lỗi dữ liệu hoặc nhập thiếu thông tin yêu cầu!";
        if(isset($_POST["tinh"])){
            if(empty($maHang)||empty($tenHang)||empty($loaiHang)||empty($soLuong)||empty($thangNhap)){
                $error;
            }else{
                switch($loaiHang){
                    case "K":
                        $thanhTien=$soLuong*10000;
                        break;
                    case "G":
                        $thanhTien=$soLuong*75000;
                        break;
                    case "T":
                        $thanhTien=$soLuong*12000;
                        break;
                    case "S":
                        $thanhTien=$soLuong*30000;
                        break;
                    case "X":
                        $thanhTien=$soLuong*35000;
                        break;
                    default:
                    echo $error;
                    break;
            }

            if($thangNhap==1||$thangNhap==2||$thangNhap==3){
                $thue=$thanhTien*1.2/100;
            }elseif($thangNhap==4||$thangNhap==5||$thangNhap==6||$thangNhap==7||$thangNhap==8||$thangNhap==9){
                $thue=$thanhTien*1.5/100;
            }elseif($thangNhap==10||$thangNhap==11||$thangNhap==12){
                $thue=$thanhTien*1.75/100;
            }else{
                echo "Lỗi nhập tháng, yêu cầu nhập lại (1<=thang<=12)";
            }
            if($thanhTien>=5000000){
                $traTruoc=$thanhTien*0.75;
                $conLai=$thanhTien-$traTruoc;
            }else{
                $traTruoc=$thanhTien*0.5;
                $conLai=$thanhTien-$traTruoc;
            }

            }
        }    
    }
    ?>
    <form action="De1_1_ThongKeXuatNhapKhau.php" method="post">
        <table>
            <tr>
                <th colspan="2">BẢNG THỐNG KÊ XUẤT NHẬP KHẨU HÀNG NĂM 2020</th>
            </tr>
            <tr>
                <td>Mã hàng<span>*</span>:</td>
                <td><input type="text" name="maHang" value="<?php echo $maHang ?>"></td>
            </tr>
            <tr>
                <td>Tên hàng<span>*</span>:</td>
                <td><input type="text" name="tenHang" value="<?php echo $tenHang ?>"></td>
            </tr>
            <tr>
                <td>Loại hàng<span>*</span>:</td>
                <td><input type="text" name="loaiHang" value="<?php echo $loaiHang ?>"></td>
            </tr>
            <tr>
                <td>Số lượng<span>*</span>:</td>
                <td><input type="text" name="soLuong" value="<?php echo $soLuong ?>"></td>
            </tr>
            <tr>
                <td>Tháng nhập<span>*</span>:</td>
                <td><input type="text" name="thangNhap" value="<?php echo $thangNhap ?>"></td>
            </tr>
            <tr>
                <td>Thành tiền:</td>
                <td><input type="text" name="thanhTien" value="<?php echo $thanhTien ?>"></td>
            </tr>
            <tr>
                <td>Thuế:</td>
                <td><input type="text" name="thue" value="<?php echo $thue ?>"></td>
            </tr>
            <tr>
                <td>Trả trước:</td>
                <td><input type="text" name="traTruoc" value="<?php echo $traTruoc ?>"></td>
            </tr>
            <tr>
                <td>Còn lại:</td>
                <td><input type="text" name="conLai" value="<?php echo $conLai ?>"></td>
            </tr>
            <tr>
                <td><input name="tinh" id="tinh" type="submit" value="Tính"> </td>
                <td><input  name="" value="Xóa" type="submit"></td>
            </tr>
        </table>
    </form>
</body>
</html>