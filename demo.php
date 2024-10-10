<?php
session_start();
include 'db_conn.php'; // Kết nối MySQLi

// Truy vấn lịch sử mua hàng từ bảng order_items
$sql = "SELECT oi.order_id, p.NAME, oi.buy_qty, oi.price, oi.buy_qty * oi.price AS total_price
        FROM order_items oi 
        JOIN products p ON oi.product_id = p.id 
        ORDER BY oi.order_id DESC";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Contact Us</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Colo Shop Template">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
	<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
	<link rel="stylesheet" href="plugins/themify-icons/themify-icons.css">
	<link rel="stylesheet" type="text/css" href="plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="styles/contact_styles.css">
	<link rel="stylesheet" type="text/css" href="styles/contact_responsive.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    
    <link rel="stylesheet" href="./css/order_history.css">
</head>

<body>

	<div class="super_container">
	<?php include("html/head.php"); ?>

		<div class="container contact_container">
			<div class="row">
				<div class="col">

					<!-- Breadcrumbs -->

					<div class="breadcrumbs d-flex flex-row align-items-center">
						<ul>
							<li><a href="index.php">Home</a></li>
							<li class="active"><a href="#"><i class="fa fa-angle-right"
										aria-hidden="true"></i>Contact</a></li>
						</ul>
					</div>

				</div>
			</div>

			<!-- Map Container -->
            <div class="container">
    <h1>Lịch Sử Mua Hàng</h1>

    <table>
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Tổng giá</th>
                <th>Ngày mua</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><?php echo $row['order_id']; ?></td>
                        <td><?php echo $row['NAME']; ?></td>
                        <td><?php echo $row['buy_qty']; ?></td>
                        <td><?php echo number_format($row['total_price'], 2); ?> VND</td>
                        <td><?php echo date('Y-m-d'); ?></td>
                    </tr>
                    <?php
                }
            } else {
                echo "<tr><td colspan='5'>Không có lịch sử mua hàng.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

		<!-- Footer -->
		<?php include("html/footer.php"); ?>

	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="styles/bootstrap4/popper.js"></script>
	<script src="styles/bootstrap4/bootstrap.min.js"></script>
	<script src="plugins/Isotope/isotope.pkgd.min.js"></script>
	<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
	<script src="plugins/easing/easing.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>
	<script src="plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
	<script src="js/contact_custom.js"></script>
</body>

</html>