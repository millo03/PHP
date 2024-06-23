<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if(isset($_POST['sx'])) {
        $mang2= $_POST['mang'];
        $le="";
        $chan="";
        $khong="";
       
        if(empty($mang2) || !preg_match('/^-?\d+(?:,\s*-?\d+)*$/', $mang2)){
            echo '<script>alert("Mang chi có số và dấu phẩy, ko để trống")</script>';
            $mang = "";
        }
        else{
            $mang = explode(",",$mang2);
            for($i = 0; $i< sizeof($mang);$i++){
                if((int)$mang[$i]%2==0 && $mang[$i]!=0 ) $chan= $chan.$mang[$i].",";
                else if((int)$mang[$i]%2==1 && $mang[$i]!=0 ) $le = $le.$mang[$i].",";
                else $khong=$khong. $mang[$i].",";
            }
            $mang1= $chan.$khong.$le;
            $mang1 = substr($mang1,0,strlen($mang1)-1);  
        }
    }


    ?>
    <div style ="background: #ccc; width : max-content;" >
        <form action="bai2.php" method ="post">
            <table border= "1">
                <tr>
                    <th colspan = "2">SẮP XẾP MẢNG</th>
                </tr>
                <tr>
                    <td style= "text-align : center;">Nhập mảng:  </td>
                    <td><input type="text" name="mang" id="" value ="<?php if (!empty($mang) ){
                        for($i = 0; $i < sizeof($mang);$i++){
                            
                            if($i < sizeof($mang)-1 ||!empty($mang[$i]))echo $mang[$i].",";
                            else echo $mang[$i];
                        
                        }
                    } else echo"";  ?>"> </td>
                </tr>
                <tr>
                    <td style= "text-align : center;"> Sắp xếp:  </td>
                    <td><input type="text" name="" id="" value ="<?php if (!empty($mang1) ) echo $mang1; else echo"";  ?>"></td>
                </tr>
                <tr>
                    <td  style= "text-align : center; "colspan= "2">
                        <input type="submit" value="Hủy" name = "huy">
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="submit" value="Sắp xếp" name= "sx">
                    </td>
                </tr>
            </table>
        </form>
    </div>
    
</body>
</html>