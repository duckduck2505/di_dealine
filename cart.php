<?php 
    session_start();
    require_once("./functions/cart.php");
    $items = getCartItems();
    $grand_total = 0;
?>
<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Colo Shop Template">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
	<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
	<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
	<link rel="stylesheet" type="text/css" href="styles/responsive.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
<body>
    
	<div class="super_container">
	<?php include("html/head.php"); ?>

<main>
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h1>Shopping cart</h1>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Thumbnail</th>
                        <th scope="col">Name</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Price</th>
                        <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($items as $index=>$item):?>
                            <?php $grand_total +=   $item["price"] * $item["buy_qty"];?>
                            <tr>
                                <th scope="row"><?php echo $index + 1; ?></th>
                                <td><img src="<?php echo $item["thumbnail"];?>" width="80"/></td>
                                <td><?php echo $item["NAME"];?></td>
                                <td><?php echo $item["buy_qty"];?></td>
                                <td><?php echo $item["price"];?></td>
                                <td><?php echo $item["price"] * $item["buy_qty"];?></td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
            <div class="col">
                <h2>Summary</h2>
                <h3>Grand total: <?php echo $grand_total;?></h3>
                <a href="/payment.php" class="btn btn-outline-danger">
                    Checkout
                </a>
            </div>
        </div>
    </div>
</main>

		<!-- Footer -->
		<?php include("html/footer.php"); ?>

	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="styles/bootstrap4/popper.js"></script>
	<script src="styles/bootstrap4/bootstrap.min.js"></script>
	<script src="plugins/Isotope/isotope.pkgd.min.js"></script>
	<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
	<script src="plugins/easing/easing.js"></script>
	<script src="js/custom.js"></script>
</body>
</html>