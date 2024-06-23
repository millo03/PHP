<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    div{
        text-align: left;
        background: #b3eb50;
        width: 410px;
    }
</style>
<body>
    
    <?php
    function hienThi($a){
        for($i =0; $i< sizeof($a) ; $i++){
            if($i< sizeof($a)-1) echo $a[$i].",";
            else echo $a[$i];
        }
    }
    error_reporting(E_ERROR| E_PARSE);
        if(isset($_POST['thucHien'])){
            $mang = $_POST['mang'];
            $arr = explode(",", $mang);
            $le = [];
            $chan = [];
            $chia3 = [];
            
            if(empty($mang) || !preg_match('/^-?\d+(?:,\s*-?\d+)*$/', $mang)){
            {
                echo '<script>alert("Mang chi co so va dau, thoi và ko thể trống")</script>';
                $arr = "";
            }
        }else{
            for($i =0; $i< sizeof($arr) ; $i++){
                if((int) $arr[$i] %3==0) array_push($chia3,$arr[$i]);
                if( (int)$arr[$i]%2==0){
                    array_push($chan,$arr[$i]);
                    $tongChan += (int)$arr[$i];
                }
                else {
                    array_push($le,$arr[$i]);
                    $tongLe += (int)$arr[$i];
                }
            }
        }

        }
    ?>
    <div>
        <form action="bai2.php" method = "post" >
            <table border = "1">
                <tr>
                    <th colspan = "2" > NHẬP MẢNG VÀ THỰC HIỆN </th>
                </tr>
                <tr>
                    <td><label for="mang"> Nhập mảng: </label></td>
                    <td> <input type="text" id = "mang"  name = "mang" value = "<?php if(!empty($arr)) hienThi($arr); else echo ""; ?>"></td>
                </tr>
                <tr>
                    <td colspan = "2" style="text-align: center;"> <input type="submit" value="Thực hiện" name= "thucHien"></td>
                </tr>
                <tr>
                    <td><label for="chia3">Chia hết cho 3: </label></td>
                    <td><input type="text" name = "chia3" value = "<?php if(!empty($chia3)) hienThi($chia3); else echo "";  ?>"></td>
                </tr>
                <tr>
                    <td><label for="mangLeASC">Mảng lẻ sắp sếp tăng dần đều:  </label></td>
                    <td><input type="text" name = "mangLeASC" value = "<?php 
                    
                    if(!empty($le)){ sort($le); hienThi($le);} else echo ""; ?>"></td>
                </tr>
                <tr>
                    <td><label for="mangChanDESC">Mảng chẵn sắp sếp giảm dần đều:  </label></td>
                    <td><input type="text"  name = "mangChanDESC" value = "<?php 
                         if(!empty($chan)){ rsort($chan); hienThi($chan);} else echo "";
                        ?>">
                    </td>
                </tr>
                <tr>
                    <td><label for="tbcLe">TBC lẻ:  </label></td>
                    <td><input type="text" name = "tbcLe" value = "<?php 
                        if(!empty($tongLe))  echo $tongLe/sizeof($le);else echo "";
                        ?>"> </td>
                </tr>
                <tr>
                    <td><label for="tbcChan">TBC Chẵn:  </label></td>
                    <td><input type="text" name = "tbcChan"value = "<?php 
                        if(!empty($tongChan))  echo $tongChan/sizeof($chan);else echo "";
                        ?>"></td>
                </tr>


            </table>

        </form>

    </div>
    
</body>
</html>