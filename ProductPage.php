<?php
session_start();
include 'db_conn.php'; // Kết nối MySQLi

// Khởi tạo giỏ hàng nếu chưa có
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Xử lý thêm sản phẩm vào giỏ hàng
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id']) && isset($_POST['qty'])) {
    $product_id = $_POST['id'];
    $quantity = intval($_POST['qty']); // Chuyển đổi sang số nguyên

    // Kiểm tra nếu sản phẩm đã tồn tại trong giỏ hàng
    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id] += $quantity; // Tăng số lượng
    } else {
        $_SESSION['cart'][$product_id] = $quantity; // Thêm sản phẩm mới
    }

    // Chuyển hướng về trang sản phẩm sau khi thêm
    header("Location: ProductPage.php");
    exit();
}

// Truy vấn tất cả sản phẩm từ cơ sở dữ liệu
$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $products = mysqli_fetch_all($result, MYSQLI_ASSOC); // Lấy tất cả kết quả dưới dạng mảng kết hợp
} else {
    $products = [];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Sản Phẩm</title>
    <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
	<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
	<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
	<link rel="stylesheet" type="text/css" href="styles/responsive.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/product.css">
</head>
<body>
<?php include("html/head.php"); ?>
<div class="container" style="margin-top: 100px">

    <h1>Danh Sách Sản Phẩm</h1>
    <div class="product-list">
        <?php if (!empty($products)): ?>
            <?php foreach ($products as $product): ?>
                <div class="product">
                    <h2><?php echo $product['NAME']; ?></h2>
                    <p>Giá: <?php echo number_format($product['price']); ?> VND</p>
                    <p><?php echo $product['description']; ?></p>

                    <!-- Form thêm sản phẩm vào giỏ hàng -->
                    <form action="ProductPage.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                        <label for="quantity">Số lượng:</label>
                        <input type="number" id="quantity" name="qty" value="1" min="1">
                        <button type="submit">Thêm vào giỏ hàng</button>
                    </form>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Không có sản phẩm nào.</p>
        <?php endif; ?>
    </div>

</div>
<?php include("html/footer.php"); ?>
</body>
</html>
