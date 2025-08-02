<?php
session_start();

// Check if the user is logged in
if (isset($_SESSION['username'])) {
    $username = htmlspecialchars($_SESSION['username']); // prevent XSS
} else {
    // Redirect to login page if not logged in
    header("Location: login_page.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">
	<!-- title -->
	<title>Katze'</title>
	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="assets/img/favicon.png">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!-- fontawesome -->
	<link rel="stylesheet" href="assets/css/all.min.css">
	<!-- bootstrap -->
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<!-- owl carousel -->
	<link rel="stylesheet" href="assets/css/owl.carousel.css">
	<!-- magnific popup -->
	<link rel="stylesheet" href="assets/css/magnific-popup.css">
	<!-- animate css -->
	<link rel="stylesheet" href="assets/css/animate.css">
	<!-- mean menu css -->
	<link rel="stylesheet" href="assets/css/meanmenu.min.css">
	<!-- main style -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- responsive -->
	<link rel="stylesheet" href="assets/css/responsive.css">
<style>
	/* Product Section Styling */
.product-section {
    background-color: #f8f9fa;
    padding: 80px 0;
}

.product-filters ul li {
    display: inline-block;
    padding: 10px 20px;
    margin: 0 10px;
    cursor: pointer;
    border: 2px solid #3b82f6;
    border-radius: 25px;
    transition: all 0.3s ease;
}

.product-filters ul li.active {
    background-color: #3b82f6;
    color: #fff;
}

.product-filters ul li:hover {
    background-color: #3b82f6;
    color: #fff;
}

/* Product Card */
.single-product-item {
    background-color: #ffffff;
    border-radius: 15px;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
    padding: 25px;
    margin-bottom: 40px;
    transition: transform 0.3s, box-shadow 0.3s;
}

.single-product-item:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
}

/* Product Image */
.product-image img {
    width: 100%;
    height: 180px;
    object-fit: cover;
    border-radius: 12px;
}

/* Product Title */
.single-product-item h3 {
    font-size: 22px;
    font-weight: 700;
    color: #0f172a;
    margin-top: 20px;
}

/* Price */
.product-price {
    font-size: 20px;
    color: #10b981;
    font-weight: 700;
    margin: 15px 0;
}

/* Form Styling */
.single-product-item form {
    margin-top: 15px;
}

.single-product-item label {
    font-size: 14px;
    color: #334155;
    margin-right: 8px;
}

.single-product-item input[type="number"] {
    width: 70px;
    padding: 8px;
    border-radius: 8px;
    border: 1px solid #cbd5e1;
    font-size: 14px;
}

/* Add to Cart Button */
.cart-btn {
    background-color: #3b82f6;
    color: #fff;
    padding: 12px 20px;
    margin-top: 12px;
    border: none;
    border-radius: 20px;
    font-weight: 600;
    font-size: 15px;
    transition: background-color 0.3s, transform 0.2s;
    display: inline-flex;
    align-items: center;
}

.cart-btn i {
    margin-right: 8px;
}

.cart-btn:hover {
    background-color: #2563eb;
    transform: translateY(-3px);
}
.product-filters ul li.active {
    background-color: #3b82f6;
    color: #fff;
    border: 2px solid #3b82f6;
}


</style>
</head>
<body>
<script>
		document.addEventListener("DOMContentLoaded", function () {
			if (navigator.geolocation) {
				navigator.geolocation.getCurrentPosition(getLocationDetails, showError);
			} else {
				document.getElementById("geo-location").innerHTML = "Geolocation is not supported by this browser.";
			}
		});
	
		function getLocationDetails(position) {
			let lat = position.coords.latitude;
			let lon = position.coords.longitude;
			let apiKey = "4c3bb5b8070f4edcbff5925655f12d0e"; // Replace with your OpenCage API key
			let apiUrl = `https://api.opencagedata.com/geocode/v1/json?q=${lat}+${lon}&key=${apiKey}`;
	
			fetch(apiUrl)
				.then(response => response.json())
				.then(data => {
					if (data.results.length > 0) {
						let locationName = data.results[0].components.city || data.results[0].components.town || data.results[0].components.village;
						let country = data.results[0].components.country;
						document.getElementById("geo-location").innerHTML = `📍 ${locationName}, ${country}`;
					} else {
						document.getElementById("geo-location").innerHTML = "Location not found.";
					}
				})
				.catch(error => {
					console.error("Error fetching location data:", error);
					document.getElementById("geo-location").innerHTML = "Unable to retrieve location.";
				});
		}
	
		function showError(error) {
			switch (error.code) {
				case error.PERMISSION_DENIED:
					document.getElementById("geo-location").innerHTML = "User denied location access.";
					break;
				case error.POSITION_UNAVAILABLE:
					document.getElementById("geo-location").innerHTML = "Location information is unavailable.";
					break;
				case error.TIMEOUT:
					document.getElementById("geo-location").innerHTML = "The request to get user location timed out.";
					break;
				case error.UNKNOWN_ERROR:
					document.getElementById("geo-location").innerHTML = "An unknown error occurred.";
					break;
			}
		}
	</script>
	<!-- header -->
	<div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
	
	<div class="top-header-area" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<div class="site-logo">
							<a href="index.php">
								<img src="assets/img/logo.png" alt="">
							</a>
						</div>
						<!-- logo -->

						<!-- menu start -->
						<nav class="main-menu">
						<ul>
						<li><a href="index.php">Home</a></li>
								</li>
								<li><a href="about.php">About</a></li>
								<li><a href="news.php">News</a>
									<ul class="sub-menu">
										<li><a href="news.php">News</a></li>
									</ul>
								</li>
								<li><a href="contact.php">Contact</a></li>
								<li><a href="adoptionpage.php">Adoption</a></li>
								<li><a href="shop.php">Shop</a>
									<ul class="sub-menu">
										<li><a href="shop.php">Shop</a></li>
										<li><a href="checkout.php">Check Out</a></li>
										<li><a href="cart.php">Cart</a></li>
									</ul>
								</li>
								<li>
									
									<div class="header-icons" style="display: flex; align-items: center; gap: 15px; flex-wrap: nowrap;">
										<div>
											<a style="color:rgb(250, 250, 250);">Welcome, <?php echo $username; ?></a> | <a href="logout.php" style="color: #ffcc00;">Logout</a>
										</div>
										<a class="shopping-cart" href="cart.php"><i class="fas fa-shopping-cart"></i></a>
									</div>
									
								</li>
							</ul>
						</nav>
						<a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
						<div class="mobile-menu"></div>
						<!-- menu end -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end header -->
	<!-- search area -->
	<div class="search-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<span class="close-btn"><i class="fas fa-window-close"></i></span>
					<div class="search-bar">
						<div class="search-bar-tablecell">
							<h3>Search For:</h3>
							<input type="text" placeholder="Keywords">
							<button type="submit">Search <i class="fas fa-search"></i></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end search arewa -->	
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						
						<p>Love Your Pets!!</p>
						<h1>KATZE'</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->
	<!-- products -->
	
<!-- Product Section -->
<div class="product-section mt-150 mb-150">
    <div class="container">

        <!-- Filter Buttons -->
        <div class="row">
            <div class="col-md-12">
                <div class="product-filters text-center mb-5">
                    <ul class="list-inline">
                        <li class="list-inline-item filter-btn active" data-filter="all">All</li>
                        <li class="list-inline-item filter-btn" data-filter="cats">Cats</li>
                        <li class="list-inline-item filter-btn" data-filter="dogs">Dogs</li>
                        <li class="list-inline-item filter-btn" data-filter="other-animals">Other Animals</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Medicine Products -->
        <div id="medicine-container" class="row">
            <?php
            include 'db_connect.php';
            $query = "SELECT * FROM medicines";
            $result = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_assoc($result)) {
                // Convert category to a CSS-friendly class
                $category = strtolower(str_replace(' ', '-', $row['category'])); // "Other Animals" => "other-animals"
                $imagePath = htmlspecialchars($row['image_url']);
                $name = htmlspecialchars($row['name']);
                $price = number_format($row['price'], 2);
            ?>
                <div class="col-md-4 mb-4 product-item <?= $category ?>">
                    <div class="single-product-item shadow p-3 rounded bg-white text-center">
                        <div class="product-image mb-3">
                            <img src="<?= $imagePath ?>" alt="<?= $name ?>" style="max-width: 100%; border-radius: 10px; height: 200px; object-fit: cover;" onerror="this.src='images/default.jpg';">
                        </div>
                        <h3><?= $name ?></h3>
                        <p class="product-price text-success"><strong>Price: ₹<?= $price ?></strong></p>

                        <form action="add_to_cart.php?from=shop" method="POST">
                            <input type="hidden" name="medicine_id" value="<?= $row['medicine_id'] ?>">
                            <label>Quantity:</label>
                            <input type="number" name="quantity" value="1" min="1" class="form-control w-50 d-inline-block mb-2">
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="fas fa-shopping-cart"></i> Add to Cart
                            </button>
                        </form>
                    </div>
                </div>
            <?php
            }
            mysqli_close($conn);
            ?>
        </div>
    </div>
</div>

<!-- footer -->
<div class="footer-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<div class="footer-box about-widget">
						<h2 class="widget-title">About us</h2>
						<p>At Katze, we rescue, rehabilitate, and rehome animals, giving them a second chance at a loving home. With dedicated care and community support, we strive to make a lasting impact—one life at a time.</p>
						
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box get-in-touch">
						<h2 class="widget-title">Get in Touch</h2>
						<ul>
							<li>Location: Pillai College of Engineering, New Panvel, Maharashtra, India</li>
							<li>Email: support@katze.com	</li>
							<li>
								Phone: +00 111 222 3333
								
								</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-2 col-md-6">
					<div class="footer-box pages">
						<h2 class="widget-title">Pages</h2>
						<ul>
							<li><a href="index.php">Home</a></li>
							<li><a href="about.php">About</a></li>
							<li><a href="services.php">Shop</a></li>
							<li><a href="news.php">News</a></li>
							<li><a href="contact.php">Contact</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="footer-box subscribe">
						<h2 class="widget-title">Subscribe</h2>
						<p>Subscribe to our mailing list to get the latest updates.</p>
						<form action="index.php">
							<input type="email" placeholder="Email">
							<button type="submit"><i class="fas fa-paper-plane"></i></button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end footer -->
	
	<!-- copyright -->
	<div class="copyright">
    <div class="container">
        <div class="row" style="display: flex; align-items: center; justify-content: space-between;">
            
            <!-- Left Section: User Location -->
            <div style="display: flex; align-items: center; gap: 10px;">
                <div id="geo-location" style="color: white; font-size: 14px; display: flex; align-items: center; white-space: nowrap;">
                    <i class="fas fa-map-marker-alt" style="color: #ff4081; margin-right: 5px;"></i> 
                    <span id="user-location">Detecting location...</span>
                </div>
                <p> | </p> <!-- Separator -->
                <p>All Rights Reserved. 2020-2025</p>
            </div>

            <!-- Right Section: Social Icons -->
            <div class="social-icons">
                <ul style="display: flex; gap: 10px; list-style: none; padding: 0; margin: 0;">
				<li><a href="https://www.facebook.com/groups/2134934466835304/" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="https://x.com/animalfndlv" target="_blank"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="https://www.instagram.com/animaladoptionindia/?hl=en" target="_blank"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="https://www.linkedin.com/company/adopt-a-pet-com/" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                </ul>
            </div>

        </div>
    </div>
</div>

	<!-- end copyright -->
	<!-- jquery -->
	<script src="assets/js/jquery-1.11.3.min.js"></script>
	<!-- bootstrap -->
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<!-- count down -->
	<script src="assets/js/jquery.countdown.js"></script>
	<!-- isotope -->
	<script src="assets/js/jquery.isotope-3.0.6.min.js"></script>
	<!-- waypoints -->
	<script src="assets/js/waypoints.js"></script>
	<!-- owl carousel -->
	<script src="assets/js/owl.carousel.min.js"></script>
	<!-- magnific popup -->
	<script src="assets/js/jquery.magnific-popup.min.js"></script>
	<!-- mean menu -->
	<script src="assets/js/jquery.meanmenu.min.js"></script>
	<!-- sticker js -->
	<script src="assets/js/sticker.js"></script>
	<!-- main js -->
	<script src="assets/js/main.js"></script>	
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<?php
if (isset($_GET['added']) && $_GET['added'] === 'true') {
    echo "<script>document.addEventListener('DOMContentLoaded', function() { showConfirmationPopup(); });</script>";
}
?>
<div id="confirmation-popup" style="display:none; position:fixed; bottom:50px; right:50px; background:#28a745; color:white; padding:20px; border-radius:10px; z-index:999;">
    Product added to cart successfully!
    <button onclick="document.getElementById('confirmation-popup').style.display='none';" style="margin-left:20px; background:white; color:#28a745; border:none; padding:5px 10px; border-radius:5px;">Close</button>
</div>
<script>
function showConfirmationPopup() {
    document.getElementById('confirmation-popup').style.display = 'block';
}
</script>
<!-- Include jQuery CDN -->


<script>
    $(document).ready(function() {
        $('.filter-btn').click(function() {
            var filter = $(this).attr('data-filter');

            // Set Active Class
            $('.filter-btn').removeClass('active');
            $(this).addClass('active');

            // Filtering Logic
            if (filter === 'all') {
                $('.product-item').show(300);
            } else {
                $('.product-item').hide(300);
                $('.' + filter).show(300);
            }
        });
    });
</script>

	
</body>
</html>