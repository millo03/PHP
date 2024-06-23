<?php
include("connect.php");
//include("hienthi.php");
$mahs = $_GET['mahs'];
$sql = "SELECT * FROM hocsinh  WHERE mahs ='$mahs'";
$kq= $conn->query($sql);
$hs = $kq->fetch_assoc();

if(isset($_POST["sua"])){
    $mahs1= $_POST['mahs1'];
    $tenhs = $_POST['tenhs'];
    $hinhanh = $_FILES["hinhanh"]["name"];
    $xeploai = $_POST['xeploai'];
    $hk1= $_POST['hk1'];
    $hk2 = $_POST['hk2'];
    $path="./img";
    $anhcu = $_POST['anhcu'];

    $insert = "UPDATE hocsinh SET tenhs='$tenhs',hinhanh= '$hinhanh', xeploai='$xeploai',hk1 ='$hk1', hk2='$hk2' WHERE mahs='$mahs1'";
    $kq = $conn->query($insert);
    if($kq){
        move_uploaded_file($_FILES["hinhanh"]["tmp_name"],$path."/".$hinhanh);
        unlink("./img/".$anhcu);
        header('Location:hienthi.php');
        //echo $mahs1;
    } 
}
?>
<form action="sua.php" method="post" enctype="multipart/form-data" >
    <table>
        <tr>
            <td>MaHS</td>
            <td><input type="text" name="mahs1" value="<?=$mahs?>"></td>
        </tr>
        <tr>
            <td>TenHS</td>
            <td><input type="text" name="tenhs"  value="<?=$hs['tenhs']?>"></td>
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
            <td>XepLoai</td>
            <td><input type="text" name="xeploai" value="<?=$hs['xeploai']?>"></td>
        </tr>
        <tr>
            <td>HK1</td>
            <td><input type="text" name="hk1"value="<?=$hs['hk1']?>"></td>
        </tr>
        <tr>
            <td>HK2</td>
            <td><input type="text" name="hk2" value="<?=$hs['hk2']?>"></td>
        </tr>  
        <tr>
            <td><a href="hienthi.php">Thoat</a></td>
            <td><input  type="submit" value="Sua" name="sua"></td>
           
        </tr> 
    </table>

</form>