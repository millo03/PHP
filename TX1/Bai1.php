<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<style>

   h3{
    font-family:Comic Sans MS;
    text-align:center;
    height:40px;
    margin:0px;
    background-color:#f7cb6d;
   }
   form{
    
    width:400px;
   }
   p{
    margin:0px 0px 10px 10px;
    height:30px;
   }

   span{
    width: 80px;
    display:inline-block;
    color:#6c506f;
   }
   input{
    margin:5px 20px;
   }

   #tinh{
    display:inline-block;
    width:50px;
    height:30px;
    margin-left:160px;
   }

   div{
    background-color:#feebca;
    margin:0px;
   }


</style>
    <?php 
    
    if(isset($_POST["tinh"])){
        $cd=$_POST["cd"];
        $cr=$_POST["cr"];
        $dt=$cd*$cr;
    }
    
    ?>
    <form action="Bai1.php" method="post">
    <h3 style="color: #996011">Diện tích hình chữ nhật</h3>
        <div name="nd">
         <p><span>Chiều dài:</span> <input type="text" value="<?php echo $cd;?>" name="cd"></p>
         <p><span>Chiều rộng:</span> <input type="text" value="<?php echo $cr;?>" name="cr"></p>
         <p><span>Diện tích:</span><input style="background:rgb(250 203 203);"  type="text" value="<?php echo $dt;?>" name="dt"></p>
         <p><input style="color:#6c506f;font-weight:800; " type="submit" value="Tính" name="tinh" id="tinh"><p>
        </div>
    </form>
    
    
</body>
</html>