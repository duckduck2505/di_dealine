<?php 
session_start();
include 'db_conn.php';
if (!isset($_SESSION['id'])) {
    header("Location: index.php");
    exit();
}

// Get current user data
$id = $_SESSION['id'];
$sql = "SELECT * FROM users WHERE id='$id'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/profile.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
    <link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
	<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
	<link rel="stylesheet" type="text/css" href="styles/responsive.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>

    <div class="container mt-5">
    <?php include("html/header.php"); ?>
        <div class="row">
            <div class="col-lg-4 pb-5">
                <!-- Account Sidebar-->
                <div class="author-card pb-3">
                    <div class="author-card-cover" style="background-image: url(https://bootdey.com/img/Content/flores-amarillas-wallpaper.jpeg);"></div>
                    <div class="author-card-profile">
                        <div class="author-card-avatar"><img src="https://us-tuna-sounds-images.voicemod.net/52b55937-bedc-4227-9988-4dc72ed813e5-1649292319932.png" alt="Daniel Adams">
                        </div>
                        <div class="author-card-details">
                            <h5 class="author-card-name text-lg" readonly><?php echo $user['full_name']; ?></h5>
                        </div>
                    </div>
                </div>
            </div>
   
                <!-- Profile Settings-->
                <div class="col-lg-8 pb-5">
                    <form action="controlProfile.php" method="post" class="row">
                        <input class="form-control" type="hidden" name="id" value="<?php echo $user['id']; ?>" id="account-fn" readonly>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="account-fn">Username</label>
                                <input class="form-control" type="text" name="username" value="<?php echo $user['username']; ?>" id="account-fn" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="account-ln">E-mail</label>
                                <input class="form-control" type="email" name="email" value="<?php echo $user['email']; ?>" id="account-ln"  required>
                            </div>
                        </div>
                        <div class="col-md-6 mt-3">
                            <div class="form-group">
                                <label for="account-email">Phone</label>
                                <input class="form-control" type="text" name="phone"  value="<?php echo $user['phone']; ?>" id="account-email" required>
                            </div>
                        </div>
                        <div class="col-md-6 mt-3">
                            <div class="form-group">
                                <label for="account-phone">Address</label>
                                <input class="form-control" type="text" name="address" value="<?php echo $user['address']; ?>" id="account-phone" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <hr class="mt-2 mb-3">
                            <div class="d-flex flex-wrap justify-content-between align-items-center">
                                <button class="btn btn-style-1 btn-primary" type="submit" data-toast="" data-toast-position="topRight" data-toast-type="success" data-toast-icon="fe-icon-check-circle" data-toast-title="Success!" data-toast-message="Your profile updated successfuly.">Update Profile</button>
                            </div>
                        </div>
                    </form>
                </div>

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
