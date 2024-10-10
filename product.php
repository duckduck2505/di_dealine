<?php
session_start();
include 'db.php'; // Include the database connection

// Get the product ID from the query string
$product_id = $_GET['id'];

// Fetch product details from the database
$stmt = $pdo->prepare("SELECT * FROM Products WHERE id = ?");
$stmt->execute([$product_id]);
$product = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$product) {
    echo "Product not found!";
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Categories - Bronx Luggage</title>
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
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/product.css?v=<?php echo time(); ?>">
</head>

<body>
<?php include("html/head.php"); ?>

<div class="super_container">

<!-- Header -->


        <div class="main_slider" style="background-color:#e0e0e0">
            <div class="container fill_height">
                <div class="row align-items-center fill_height">
                    <div class="col">
                    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <img src="<?php echo $product['thumbnail']; ?>" class="img-fluid" alt="<?php echo $product['name']; ?>">
            </div>
            <div class="col-md-6">
                <h2><?php echo $product['NAME']; ?></h2>
                <p><strong>Price:</strong> $<?php echo number_format($product['price'], 2); ?></p>
                <p><strong>In Stock:</strong> <?php echo $product['qty']; ?></p>
                <p><strong>Description:</strong> <?php echo $product['description']; ?></p>
                    <!-- Add to Cart Button -->
    <form method="post" action="add_to_cart.php">
        <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
        <input type="hidden" name="buy_qty" value="1"> <!-- Default quantity -->
        <button type="submit" class="btn btn-primary">Add to Cart</button>
    </form>
            </div>
        </div>
    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Categories -->

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