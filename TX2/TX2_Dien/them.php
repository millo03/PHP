 <?php
include("connect.php");
if(isset($_POST["them"])){
    $makh = $_POST['makh'];
    $tenkh = $_POST['tenkh'];
    $hinhanh = $_FILES["hinhanh"]["name"];
    $sodien = $_POST['sodien'];
    $hinhthuc= $_POST['hinhthuc'];
   
    $path="./img";
    
    $insert = "INSERT INTO tiendien (`makh`, `tenkh`, `hinhanh`, `sodien`, `hinhthuc`) VALUES('$makh','$tenkh','$hinhanh', '$sodien','$hinhthuc')";
    $kq = $conn->query($insert);
    if($kq){
        move_uploaded_file($_FILES["hinhanh"]["tmp_name"],$path."/".$hinhanh);
        header('Location:hienthi.php');
    } else echo $insert;
}
?> 
<div style=" width:500px; margin: auto; ">
<form action="them.php" method="post" enctype="multipart/form-data" >
    <h3>Thêm khách hàng mới</h3>
    <table>
        <tr>
            <td>Makh</td>
            <td><input type="text" name="makh" id=""></td>
        </tr>
        <tr>
            <td>Tenkh</td>
            <td><input type="text" name="tenkh" id=""></td>
        </tr>
        <tr>
            <td>HinhAnh</td>
            <td><input type="file" name="hinhanh" id=""></td>
        </tr>
        <tr>
            <td>Sodien</td>
            <td><input type="text" name="sodien" id=""></td>
        </tr>
        <tr>
            <td>Hinhthuc</td>
            <td><input type="text" name="hinhthuc" id=""></td>
        </tr>
        <tr>
            <td><a href="hienthi.php">Thoat</a></td>
            <td><input  type="submit" value="Them" name="them"></td>
           
        </tr> 
    </table>

</form>
</div>