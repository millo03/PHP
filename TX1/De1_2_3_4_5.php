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
        .id{
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
        $ketqua = 0;
        $mang_so = 0;
        $chiahet_3 = [];
        $le =[];
        $chan = [];
        $tb_le = 0;
        $tb_chan = 0;
        if(isset($_POST["tinh"])){
            $mang_so=explode(",",$_POST["nhap"]);
            $n=count($mang_so);
            for($i=0;$i<$n;$i++){
                if($mang_so[$i]%3==0){
                    $chiahet_3[]=$mang_so[$i];
                }
                if($mang_so[$i]%2!=0){
                    $le[]=$mang_so[$i];
                }else{
                    $chan[]=$mang_so[$i];
                }
               
            }

            sort($le);
            rsort($chan);
            $tb_le=round(array_sum($le)/count($le),1);
            $tb_chan=round(array_sum($chan)/count($chan),1);
            $lon_le=max($le);
            $nho_chan=min($chan);

        }
    
    ?>
    <form action="De1_2_3_4_5.php" method="post">
    <table>
        <tr>
            <th colspan="2" class="id">NHẬP MẢNG VÀ THỰC HIỆN</th>
        </tr>
        <tr>
            <td>Nhập mảng</td>
            <td><input type="text" name="nhap" value="<?php echo $_POST["nhap"];?>"></td>
        </tr>
        <tr>
            <td colspan="2" class="id"><input type="submit" value="Thực hiện" name="tinh"></td>
        </tr>

        <tr>
            <td>Phần tử mảng chia hết cho 3</td>
            <td><input type="text" name="chiahet_3" value="<?php echo implode(", ", $chiahet_3); ?>"></td>
        </tr>
        <tr>
            <td>Phần tử mảng lẻ xếp tăng dần</td>
            <td><input type="text" name="le" value="<?php echo implode(", ", $le); ?>" name="le"></td>
        </tr>
        <tr>
            <td>Phần tử mảng chẵn xếp giảm dần</td>
            <td><input type="text" name="chan" value="<?php echo implode(", ", $chan); ?>"></td>
        </tr>
        <tr>
            <td>Tính trung bình cộng các phần tử lẻ</td>
            <td><input type="text" name="tb_le" value="<?php echo $tb_le?>"></td>
        </tr>
        <tr>
            <td>Tính trung bình cộng các phần tử chẵn</td>
            <td><input type="text" name="tb_chan" value="<?php echo $tb_chan?>"></td>
        </tr>
        <tr>
            <td>Phần tử lẻ lớn nhất</td>
            <td><input type="text" name="tb_le" value="<?php echo $lon_le?>"></td>
        </tr>
        <tr>
            <td>Phần tử chẵn nhỏ nhất</td>
            <td><input type="text" name="tb_chan" value="<?php echo $nho_chan?>"></td>
        </tr>
    </table>
</form>
 
</body>
</html>