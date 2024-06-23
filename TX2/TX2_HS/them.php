 <?php
include("connect.php");
if(isset($_POST["them"])){
    $mahs = $_POST['mahs'];
    $tenhs = $_POST['tenhs'];
    $hinhanh = $_FILES["hinhanh"]["name"];
    $xeploai = $_POST['xeploai'];
    $hk1= $_POST['hk1'];
    $hk2 = $_POST['hk2'];
    $path="./img";
    
    $insert = "INSERT INTO hocsinh (`mahs`, `tenhs`, `hinhanh`, `xeploai`, `hk1`,`hk2`) VALUES('$mahs','$tenhs','$hinhanh', '$xeploai','$hk1','$hk2')";
    $kq = $conn->query($insert);
    if($kq){
        move_uploaded_file($_FILES["hinhanh"]["tmp_name"],$path."/".$hinhanh);
        header('Location:hienthi.php');
    } 
}
?> 
<form action="them.php" method="post" enctype="multipart/form-data" >
    <table>
        <tr>
            <td>MaHS</td>
            <td><input type="text" name="mahs" id=""></td>
        </tr>
        <tr>
            <td>TenHS</td>
            <td><input type="text" name="tenhs" id=""></td>
        </tr>
        <tr>
            <td>HinhAnh</td>
            <td><input type="file" name="hinhanh" id=""></td>
        </tr>
        <tr>
            <td>XepLoai</td>
            <td><input type="text" name="xeploai" id=""></td>
        </tr>
        <tr>
            <td>HK1</td>
            <td><input type="text" name="hk1" id=""></td>
        </tr>
        <tr>
            <td>HK2</td>
            <td><input type="text" name="hk2" id=""></td>
        </tr>  
        <tr>
            <td><a href="hienthi.php">Thoat</a></td>
            <td><input  type="submit" value="Them" name="them"></td>
           
        </tr> 
    </table>

</form>