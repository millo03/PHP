<?php
include("connect.php");
//include("hienthi.php");
$makh = $_GET['makh'];
$sql = "SELECT * FROM tiendien  WHERE makh ='$makh'";
$kq= $conn->query($sql);
$hs = $kq->fetch_assoc();

if(isset($_POST["sua"])){
    $makh1= $_POST['makh1'];
    $tenkh = $_POST['tenkh'];
    $hinhanh = $_FILES["hinhanh"]["name"];
    $sodien = $_POST['sodien'];
    $hinhthuc= $_POST['hinhthuc'];
   
    $path="./img";
    $anhcu = $_POST['anhcu'];

    $insert = "UPDATE tiendien SET tenkh='$tenkh',hinhanh= '$hinhanh', sodien='$sodien',hinhthuc ='$hinhthuc' WHERE makh='$makh1'";
    $kq = $conn->query($insert);
    if($kq){
        move_uploaded_file($_FILES["hinhanh"]["tmp_name"],$path."/".$hinhanh);
        unlink("./img/".$anhcu);
        header('Location:hienthi.php');
        //echo $makh1;
    } 
}
?>
<form action="sua.php" method="post" enctype="multipart/form-data" >
    <table>
        <tr>
            <td>MaKH</td>
            <td><input type="text" name="makh1" value="<?=$makh?>"></td>
        </tr>
        <tr>
            <td>Tenkh</td>
            <td><input type="text" name="tenkh"  value="<?=$hs['tenkh']?>"></td>
        </tr>
        <tr>
            <td>Anh Cu:</td>

            <td><img width="100px" height="100px" src="img/<?= $hs['hinhanh']?>"></td>
            <input type="hidden" value="<?= $hs['hinhanh']?>" name="anhcu">
        </tr>
        <tr>
            <td>HinhAnh</td>
            <td><input type="file" name="hinhanh" value="<?=$hs['hinhanh']?>"></td>
        </tr>
        <tr>
            <td>Sodien</td>
            <td><input type="text" name="sodien" value="<?=$hs['sodien']?>"></td>
        </tr>
        <tr>
            <td>Hinhthuc</td>
            <td><input type="text" name="hinhthuc"value="<?=$hs['hinhthuc']?>"></td>
        </tr> 
        <tr>
            <td><a href="hienthi.php">Thoat</a></td>
            <td><input  type="submit" value="Sua" name="sua"></td>
           
        </tr> 
    </table>

</form>