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
	<title>Cart</title>

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
/* Table Styling */
.cart-table {
    width: 100%;
    background-color: #f9fafb;
    border-radius: 12px;
    overflow: hidden;
}

.cart-table thead th {
    background-color: #e2e8f0;
    padding: 15px;
    font-size: 16px;
    font-weight: 600;
    color: #1e293b;
}

.cart-table tbody td {
    vertical-align: middle;
    padding: 15px;
    font-size: 15px;
    color: #334155;
}

.cart-table img {
    width: 80px;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

/* Remove Button */
.cart-table .btn-danger {
    background-color: #ef4444;
    border: none;
    border-radius: 8px;
    padding: 8px 14px;
    font-weight: 600;
    transition: background-color 0.3s ease;
}

.cart-table .btn-danger:hover {
    background-color: #dc2626;
}

/* Cart Summary */
.text-end h4, .text-end h3 {
    color: #0f172a;
    margin: 10px 0;
}

.text-end h3 {
    font-size: 26px;
    font-weight: 700;
}

/* Checkout Button */
.btn-primary {
    background-color: #3b82f6;
    color: #fff;
    font-size: 16px;
    padding: 14px 28px;
    border: none;
    border-radius: 10px;
    font-weight: 600;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

.btn-primary:hover {
    background-color: #2563eb;
    transform: translateY(-2px);
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
	<!--PreLoader-->
    
    <!--PreLoader Ends-->
	
	<!-- header -->
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
						<h1>Cart</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<div class="container mt-5">
        
        <table class="table cart-table">
            <thead>
                <tr>
                    <th>Remove</th>
                    <th>Product Image</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
			<?php
include 'db_connect.php';

if (!isset($_SESSION['user_id'])) {
    die("You must be logged in to view the cart.");
}
$user_id = $_SESSION['user_id'];

// Fetch cart details along with medicine information
$sql = "SELECT c.*, m.name AS medicine_name, m.price, m.image_url, 
               (m.price * 0.05) AS shipping_cost 
        FROM cart c 
        JOIN medicines m ON c.medicine_id = m.medicine_id 
        WHERE c.user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$subtotal = 0;
$shipping_total = 0;

while ($row = $result->fetch_assoc()):
    $total = $row['price'] * $row['quantity'];
    $shipping_cost = $row['shipping_cost']; // Fetch shipping cost per item
    $subtotal += $total;
    $shipping_total += $shipping_cost; // Add shipping for each item
?>

<tr>
    <td>
        <a href="remove_from_cart.php?id=<?php echo htmlspecialchars($row['id']); ?>" 
           class="btn btn-danger btn-sm" 
           onclick="return confirm('Are you sure you want to remove this item?');">Remove</a>
    </td>
    <td><img src="<?php echo htmlspecialchars($row['image_url']); ?>" alt="<?php echo htmlspecialchars($row['medicine_name']); ?>" width="80"></td>
    <td><?php echo htmlspecialchars($row['medicine_name']); ?></td>
    <td>₹<?php echo number_format($row['price'], 2); ?></td>
    <td><?php echo $row['quantity']; ?></td>
    <td>₹<?php echo number_format($total, 2); ?></td>
</tr>
<?php endwhile; ?>
</tbody>

</table>

<!-- Cart Summary -->
<div class="text-end">
    <h5>Subtotal: <span class="subtotal-price">₹<?php echo number_format($subtotal, 2); ?></span></h5>
    <h5>Shipping: <span class="shipping-price">₹<?php echo number_format($shipping_total, 2); ?></span></h5>
    <h5>Total: <span class="total-price">₹<?php echo number_format($subtotal + $shipping_total, 2); ?></span></h5>
    <button class="btn btn-primary" onclick="window.location.href='checkout.php'">Proceed to Checkout</button>
</div>
</div>

	<!-- end cart -->

	<br></br>

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
	<?php
if (isset($_GET['removed']) && $_GET['removed'] === 'true') {
    echo "<script>document.addEventListener('DOMContentLoaded', function() { showRemovePopup(); });</script>";
}
?>
<div id="remove-popup" style="display:none; position:fixed; bottom:50px; right:50px; background:#dc3545; color:white; padding:20px; border-radius:10px; z-index:999;">
    Product removed from cart successfully!
    <button onclick="document.getElementById('remove-popup').style.display='none';" 
            style="margin-left:20px; background:white; color:#dc3545; border:none; padding:5px 10px; border-radius:5px;">Close</button>
</div>
<script>
function showRemovePopup() {
    document.getElementById('remove-popup').style.display = 'block';
}
</script>

</body>
</html>