<?php
include 'db.php'; // Include the database connection

// // Check if 'category_id' is provided in the URL
// if (!isset($_GET['category_id']) || empty($_GET['category_id'])) {
//     echo "No category selected!";
//     exit;
// }

$category_id = intval($_GET['category_id']); // Sanitize input

// Fetch products from the selected category
$stmt = $pdo->prepare("SELECT * FROM Products WHERE category_id = ?");
$stmt->execute([$category_id]);
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch category name for display
$category_stmt = $pdo->prepare("SELECT name FROM Categories WHERE id = ?");
$category_stmt->execute([$category_id]);
$category_name = $category_stmt->fetchColumn();
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
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/product.css?v=<?php echo time(); ?>">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

</head>

<body>

<div class="super_container">

<!-- Header -->
<?php include("html/head.php"); ?>

        <div class="main_slider" style="background-image:url(images/store_bg.jpg)">
            <div class="container fill_height">
                <div class="row align-items-center fill_height">
                    <div class="col">
                        <div class="header-store" style="text-transform:uppercase">
                            <h1 style="font-size:160px" style="color:gray"><?php echo htmlspecialchars($category_name); ?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Categories -->
        <div class="store">
            <div class="d-flex flex-wrap">
                <?php if (empty($products)): ?>
                <p>No products found in this category.</p>
                <?php else: ?>
                <?php foreach ($products as $product): ?>
                <div class="product-item">
                    <div class="product discount product_filter">
                        <div class="product_image">
                            <img src="<?php echo htmlspecialchars($product['thumbnail']); ?>" class="img-fluid"
                                alt="<?php echo $product['NAME']; ?>">
                        </div>
                        <div class="product_info">
                            <h6 class="product_name"><?php echo $product['NAME']; ?></h6>
                            <div class="product_price">$<?php echo number_format($product['price'], 2); ?></div>

                        </div>
                    </div>
                    <div class="red_button add_to_cart_button"><a href="product.php?id=<?php echo urlencode($product['id']); ?>" class="stretched-link">View Product</a></div>
                </div>
                <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
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