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
    $cx=$_POST["cx"];
    $xl=$_POST["xl"];
    $lx=$_POST["lx"];
    $tg=$_POST["tg"];
    $thue=0;
    if(empty($cx)||empty($xl)||empty($lx)||empty($tg)){
        echo "Hãy nhập đầy đủ thông tin";
    }else{
        if($xl<=100){
            $thue=$tg*0.01;
        }
        elseif ($xl>100 && $xl<=200){
            $thue=$tg*0.03;
        }else{
            $thue=$tg*0.05;
        } 
        $loaiKhachHang=($tg>450000000)?"Thu nhập cao":"Thu nhập thấp";
    }  
 }
 ?>
</head>
<body>


<form action="De3_1_ThongTinDangKyXe.php" method="post">
    <table>
        <tr>
            <th colspan="4" align="center">THÔNG TIN ĐĂNG KÝ XE</th>
        </tr>
        <tr>
            <td>Tên chủ xe:</td>
            <td><input type="text" value="<?php echo $cx;?>" name="cx"></td>
            <td>Dung tích xi lanh:</td>
            <td><input type="text" value="<?php echo $xl;?>" name="xl"></td>
        </tr>
        <tr>
            <td>Loại xe:</td>
            <td><input type="text" value="<?php echo $lx;?>" name="lx"></td>
            <td>Trị giá:</td>
            <td><input type="text" value="<?php echo $tg;?>" name="tg"></td>
        </tr>
        <tr>
            <td>Thuế:</td>
            <td><input type="text" value="<?php echo $thue;?>" name="thue"></td>
            <td>Loại khách hàng:</td>
            <td><input type="text" value="<?php echo $loaiKhachHang;?>" name="loaiKH"></td>
        </tr>
        <tr>
            <td colspan="2" align="center"><input value="Tính Thuế"  name="tinh" id="tinh" type="submit"></td>
            <td colspan="2" align="center"><input value="Hủy bỏ" type="reset"></td>
        </tr>
    </table>
</form>
</body>
</html>
