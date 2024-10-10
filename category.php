<?php
include 'db.php'; // Include the database connection

// Fetch categories from the database
$stmt = $pdo->query("SELECT id, name, thumbnail FROM Categories");
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
    <link rel="stylesheet" type="text/css" href="styles/main_styles.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" type="text/css" href="styles/responsive.css">
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/product.css?v=<?php echo time(); ?>">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

</head>

<body>

    <div class="super_container">
    <?php include("html/head.php"); ?>
		<div class="fs_menu_overlay"></div>

        <div class="main_slider" style="background-image:url(images/store_bg.jpg)">
            <div class="container fill_height">
                <div class="row align-items-center fill_height">
                    <div class="col">
                        <div class="header-category" style="text-transform:uppercase">
                            <h1 style="font-size:160px" style="color=blue">Categories</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Categories -->
        <div class="store">
            <div class="d-flex flex-wrap">
                <?php foreach ($categories as $category): ?>

                <div class="product-item">
                    <div class="product discount product_filter">
                        <div class="product_image">
                            <img src="<?php echo htmlspecialchars($category['thumbnail']); ?>" class="img-fluid"
                                alt="<?php echo $category['name']; ?>">
                        </div>
                        <div class="product_info">
                            <h6 class="product_name"><?php echo $category['name']; ?></h6>
                            
                        </div>
                    </div>
                    <div class="red_button add_to_cart_button"><a
                            href="store.php?category_id=<?php echo $category['id']; ?>">View Category</a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
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