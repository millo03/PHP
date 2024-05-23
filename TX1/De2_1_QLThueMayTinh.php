<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
        if(isset($_POST['tinh'])){
            $hinhthuc = $_POST['hinhthuc'];
            $somay = $_POST['somay'];
            $gionhan = $_POST['gionhan'];
            $giotra = $_POST['giotra'];
            $dongia = $_POST['dongia'];

            if(empty($somay) || empty($hinhthuc) || empty($gionhan) || empty($giotra) || empty($dongia)){
                echo "Yeu cau nhap day du thong tin so may, hinh thuc thue, gio nhan, gio tra va don gia";
            }else{
                if($hinhthuc != 'T' && $hinhthuc != 'I' && $hinhthuc != 'M'){
                    echo "Yeu cau nhap hinh thuc thi 1 trong 3 hinh thuc thi sau: T, I , M";
                }else{
                    if(!is_numeric($gionhan) || !is_numeric($giotra) || !is_numeric($dongia)){
                        echo "yeu cau nhap gio nhan , gio tra, don gia la so";
                    }else{
                        $TGthue = $giotra - $gionhan;
                        if($hinhthuc == 'M'){
                            $tienthue = 3500;
                        }else{
                            $tienthue = $TGthue*$dongia;
                        }

                        if($TGthue>2){
                            $tiengiam = $tienthue*0.2;    
                        }else{
                            $tiengiam = 0;
                        }
                        $tienphaitra = $tienthue-$tiengiam;
                    }
                }
            }



        }
    ?>
    <form action="De2_1_QLThueMayTinh.php" method="post">
        <table>
            <tr>
                <td colspan="2">QUẢN LÝ THUÊ MÁY TÍNH</td>
            </tr>
            <tr>
                <td>Số máy:</td>
                <td><input type="text" name="somay" value="<?php  echo $somay ?>"></td>
            </tr>
            <tr>
                <td>Hình thức thuê:</td>
                <td><input type="text" name="hinhthuc" value="<?php  echo $hinhthuc ?>"></td>
            </tr>
            <tr>
                <td>Giờ nhận:</td>
                <td><input type="text" name="gionhan" value="<?php  echo $gionhan?>"></td>
            </tr>
            <tr>
                <td>Giờ trả:</td>
                <td><input type="text" name="giotra" value="<?php  echo $giotra?>"></td>
            </tr>
            <tr>
                <td>Thời gian thuê:</td>
                <td><input type="text" name="TGthue" value="<?php  echo $TGthue?>"></td>
            </tr>
            <tr>
                <td>Đơn giá:</td>
                <td><input type="text" name="dongia" value="<?php  echo $dongia?>"></td>
            </tr>
            <tr>
                <td>Tiền thuê:</td>
                <td><input type="text" name="tienthue" value="<?php  echo $tienthue?>"></td>
            </tr>
            <tr>
                <td>Tiền giảm:</td>
                <td><input type="text" name="tiengiam" value="<?php  echo $tiengiam?>"></td>
            </tr>
            <tr>
                <td>Tiền phải trả:</td>
                <td><input type="text" name="tienphaitra" value="<?php  echo $tienphaitra?>"></td>
            </tr>
            <tr colspan="2">
                <td >
                    <input type="submit" name="tinh" value="Tính tiền">
                   
                </td>
                <td> <input type="submit" name="xoa" value="Xóa"></td>
            </tr>
        </table>
    </form>
    
</body>
</html>