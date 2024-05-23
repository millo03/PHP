<?php
include_once 'lib/session.php';
Session::checkSession('client');
include_once 'classes/cart.php';
include_once 'classes/orderDetails.php';
include_once 'classes/order.php';

$cart = new cart();
$orderDetails = new orderDetails();

$totalQty = $cart->getTotalQtyByUserId();
$size = $cart->getSize();
$result = $orderDetails->getOrderDetails($_GET['orderId']);

include_once './classes/user.php';
$totalPrice = $orderDetails->getTotalPriceByUserId($_GET['orderId']);
$totalQty = $orderDetails->getTotalQtyByUserId($_GET['orderId']);
$user = new user();
$userInfo = $user->get();

$order = new order();
$order_result = $order->getById($result[0]['orderId']);

// Include TCPDF library
require_once 'lib/TCPDF-main/tcpdf.php';


// Check if the print button is clicked
if (isset($_POST['print_invoice'])) {
    ob_start();
    // Create a new PDF instance
    $pdf = new TCPDF();

    // Add a page to the PDF
    $pdf->AddPage();

    // Set font
    $pdf->SetFont('dejavusans', '', 12);

    // Add content to the PDF
    $pdf->Write(10, 'Thông tin đơn đặt hàng:');
    $pdf->Ln(); // Add a new line

    // Add order information
    $pdf->Write(8, 'Người đặt hàng: ' . $userInfo['fullname']);
    $pdf->Ln();
    $pdf->Write(8, 'Người nhận hàng: ' . $order_result['fullname']);
    $pdf->Ln();
    $pdf->Write(8, 'Số điện thoại nhận hàng: ' . $order_result['phoneNumber']);
    $pdf->Ln();
    $pdf->Write(8, 'Số lượng: ' . $totalQty['total']);
    $pdf->Ln();
    $pdf->Write(8, 'Size ' . '40');
    $pdf->Ln();
    $pdf->Write(8, 'Tổng tiền: ' . number_format($totalPrice['total'], 0, '', ',') . 'VND');
    $pdf->Ln();
    $pdf->Write(8, 'Địa chỉ nhận hàng: ' . $order_result['address']);
    $pdf->Ln();

    // Add product details
    $pdf->Write(10, 'Chi tiết sản phẩm:');
$pdf->Ln(); // Thêm một dòng mới

$pdf->SetFillColor(200, 220, 255);
$pdf->SetTextColor(0);

$pdf->Cell(20, 10, 'STT', 1, 0, 'C', 1);
$pdf->Cell(80, 10, 'Tên sản phẩm', 1, 0, 'C', 1);
$pdf->Cell(30, 10, 'Đơn giá', 1, 0, 'C', 1); // Tăng chiều rộng ô Đơn giá
$pdf->Cell(20, 10, 'Số lượng', 1, 0, 'C', 1);
$pdf->Cell(20, 10, 'Size', 1, 0, 'C', 1);
$pdf->Ln(); // Thêm một dòng mới

$count = 1;
foreach ($result as $key => $value) {
    // Lưu vị trí bắt đầu của hàng
    $x = $pdf->GetX();
    $y = $pdf->GetY();
    
    // Vẽ ô STT
    $pdf->Cell(20, 30, $count++, 1, 0, 'C');
    
    // Vẽ ô Tên sản phẩm và nhớ vị trí mới
    $pdf->SetXY($x + 20, $y);
    $pdf->MultiCell(80, 30, $value['productName'], 1);
    
    // Điều chỉnh lại vị trí con trỏ sau khi vẽ MultiCell
    $pdf->SetXY($x + 100, $y); // 20 + 50 = 70
    
    // Vẽ các ô Đơn giá, Số lượng, Size
    $pdf->Cell(30, 30, number_format($value['productPrice'], 0, '', ',') . ' VND', 1, 0, 'C');
    $pdf->Cell(20, 30, $value['qty'], 1, 0, 'C');
    $pdf->Cell(20, 30, '40', 1, 0, 'C');
    $pdf->Ln(); // Thêm một dòng mới
}
// Xuất PDF ra trình duyệt
    $pdf->Output('hoa_don.pdf', 'D');
    ob_end_flush();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://use.fontawesome.com/2145adbb48.js"></script>
    <script src="https://kit.fontawesome.com/a42aeb5b72.js" crossorigin="anonymous"></script>
    <title>Order detail</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

    <script>
        $(function() {
            $('.fadein img:gt(0)').hide();
            setInterval(function() {
                $('.fadein :first-child').fadeOut().next('img').fadeIn().end().appendTo('.fadein');
            }, 5000);
        });
    </script>

</head>

<body>
    <nav>
        <label class="logo"><a href="index.php">HĐ-SHOP</a></label>
        <ul>
            <li><a href="index.php">Trang chủ</a></li>
            <li><a href="productList.php">Sản phẩm</a></li>

            <li><a href="order.php" id="order" class="active">Đơn hàng</a></li>
            <li>
                <a href="checkout.php">
                    Giỏ hàng
                    <i class="fa fa-shopping-bag"></i>
                    <sup class="sumItem">
                        <?= ($totalQty['total']) ? $totalQty['total'] : "0" ?>
                    </sup>
                </a>
            </li>
            <?php
            if (isset($_SESSION['user']) && $_SESSION['user']) { ?>
                <li><a href="info.php" id="signin">Thông tin cá nhân</a></li>
                <li><a href="logout.php" id="signin">Đăng xuất</a></li>
            <?php } else { ?>
                <li><a href="register.php" id="signup">Đăng ký</a></li>
                <li><a href="login.php" id="signin">Đăng nhập</a></li>
            <?php } ?>
        </ul>
    </nav>
    <section class="banner">
        <div class="fadein">
            <?php
            // display images from directory
            // directory path
            $dir = "./images/slider/";

            $scan_dir = scandir($dir);
            foreach ($scan_dir as $img) :
                if (in_array($img, array('.', '..')))
                    continue;
            ?>
                <img src="<?php echo $dir . $img ?>" alt="<?php echo $img ?>">
            <?php endforeach; ?>
        </div>
    </section>
    <div class="featuredProducts">
        <h1>Chi tiết đơn hàng <?= $_GET['orderId'] ?></h1>
    </div>

    <div class="infor_order">
        <h3>Thông tin đơn đặt hàng</h3>
        <div>
            Người đặt hàng: <b><?= $userInfo['fullname'] ?></b>
        </div>
        <div>
            Người nhận hàng: <b><?= $order_result['fullname'] ?></b>
        </div>
        <div>
            Số điện thoại nhận hàng: <b><?= $order_result['phoneNumber'] ?></b>
        </div>
        <div>
            Số lượng: <b id="qtycart"><?= $totalQty['total'] ?></b>
        </div>
        <div>
            Size: <b id="size"><?php echo '40'?></b>
        </div>
        <div>
            Tổng tiền: <b id="totalcart"><?= number_format($totalPrice['total'], 0, '', ',') ?>VND</b>
        </div>
        <div>
            Địa chỉ nhận hàng: <b><?= $order_result['address'] ?></b>
        </div>
    </div>

    <div class="container-single">
        <table class="order">
            <tr>
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Đơn giá</th>
                <th>Số lượng</th>
                <th>Size</th>
                <th>Lựa chọn</th>
            </tr>
            <?php $count = 1;
            foreach ($result as $key => $value) {
                $gia = $value['productPrice']; ?>
                <tr>
                    <td><?= $count++ ?></td>
                    <td><?= $value['productName'] ?></td>
                    <td><img class="image-cart" src="admin/uploads/<?= $value['productImage'] ?>" alt=""></td>
                    <td><?= number_format($value['productPrice'], 0, '', ',') ?>VND</td>
                    <td><?= $value['qty'] ?></td>
                    <td><?php echo '40' ?></td>
                    <td>
                        <form method="post" action="./atm_momo.php">
                            <!-- Input hidden để chứa giá trị productPrice -->
                            <input type="hidden" name="thanhtoan" value="<?= $gia ?>">
                            <!-- Nút "Thanh toán MoMo" cho mỗi sản phẩm -->
                            <button type="submit" name="redirect" >Thanh toán MoMo</button>
                        </form>
                        <form method="post" action="">
                            <input type="submit" name="print_invoice" value="In hóa đơn">
                        </form>
                    </td>
                </tr>

            <?php }
            ?>
        </table>


    </div>
    </div>

    <footer>
        <div class="social">
            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
        </div>
        <ul class="list">
            <li>
                <a href="./">Trang Chủ</a>
            </li>
            <li>
                <a href="productList.php">Sản Phẩm</a>
            </li>
        </ul>
        <p class="copyright">copy by HĐ-SHOP.com 2023</p>
    </footer>

</body>

</html>