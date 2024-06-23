<?php 
include("connect.php");
//include("hienthi.php");
$mahs = $_GET['mahs'];
$sql = "SELECT * FROM hocsinh  WHERE mahs ='$mahs'";
$kq= $conn->query($sql);
?>
<div style=" width:1000px; margin: auto; "  >
<table border ='1' width="1000" style="border-collapse: collapse;text-align:center ">
<tr >
        <th>MaHS</th>
        <th>Ten_HS</th>
        <th>HinhAnh</th>
        <th>XepLoai</th>
        <th>HK1</th>
        <th>HK2</th>
        <th>HocBong</th>
    </tr>
<?php
    if($kq->num_rows > 0){
    while($sv= $kq->fetch_assoc()){
    ?>
            <tr>
                <td><?=$sv['mahs']?></td>
                <td><?=$sv['tenhs']?></td>
                <td><img width="100px" height="100px" src="img/<?=$sv['hinhanh']?>" alt=""></td>
                <td><?=$sv['xeploai']?></td>
                <td><?=$sv['hk1']?></td>
                <td><?=$sv['hk2']?></td>
                <td><?php
                    $tbc = ($sv['hk1']+ $sv['hk2']*2)/3;
                    if($sv['xeploai']== 'A'&&$tbc> 9) $hb = 1000000;
                    else if($sv['xeploai']== 'B'&&$tbc> 8) $hb = 500000;
                    else $hb = 0;
                ?><?=$hb ?></td>
            </tr>
    <?php 
            }
        }
    ?>
</table>
<a href="hienthi.php">Thoát</a>
</div>