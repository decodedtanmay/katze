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
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
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
						<h1>KATZE'</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->
	<div class="adoption-title">
		<h1>Find a Friend, Change a Life – <span>Adopt Today!</span></h1>
	</div>
	
	<style>
		.adoption-page {
			font-size: 14px;
		}
		
		.adoption-title {
			text-align: center;
			font-size: 1.5em; /* Reduced size */
			font-weight: bold;
			margin: 30px 0;
			color: white;
			background: linear-gradient(45deg, #FF9F43, #FF6B6B);
			padding: 20px;
			border-radius: 10px;
			box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
			border: 3px solid black;
		}
	
		.adoption-title h1 {
			font-size: 2em !important; /* Ensures it applies */
		}
	
		.adoption-title span {
			color: #fff; /* White for emphasis */
		}
	</style>
	
	

	<!-- products -->
	<div class="adoption-container">
		<div class="adoption-card">
			<div class="pet-content">
				<div class="pet-image">
					<a href="#">
						<img src="assets/img/products/product-img-2.jpg" alt="Max">
					</a>
				</div>
				<h2 class="pet-name">🐶 Max</h2>
			</div>
			<div class="extra-info">
				<p><strong>Breed:</strong> Golden Retriever</p>
				<p><strong>Age:</strong> 3 Years Old</p>
				<p><strong>Personality:</strong> Friendly, energetic, loves outdoor activities, great with children.</p>
			</div>
		</div>
	
		<div class="adoption-card">
			<div class="pet-content">
				<div class="pet-image">
					<a href="#">	
						<img src="assets/img/2.jpg" alt="Luna" style="transform: scale(1.2);">
						<br>
					</a>
				</div>
				<h2 class="pet-name">🐱 Luna</h2>
			</div>
			<div class="extra-info">
				<p><strong>Breed:</strong> Siamese Cat</p>
				<p><strong>Age:</strong> 2 Years Old</p>
				<p><strong>Personality:</strong> Intelligent, vocal, enjoys companionship, prefers calm environments.</p>
			</div>
		</div>
	
		<div class="adoption-card">
			<div class="pet-content">
				<div class="pet-image">
					<a href="#">
					<br>
						<img src="assets/img/3.jpg" alt="Charlie">
					</a>
				</div>
				<h2 class="pet-name">🐦 Charlie</h2>
			</div>
			<div class="extra-info">
				<p><strong>Breed:</strong> Cockatiel</p>
				<p><strong>Age:</strong> 1 Year Old</p>
				<p><strong>Personality:</strong> Playful, loves attention, enjoys whistling tunes, easy to train.</p>
			</div>
		</div>
	</div>
	
	<div class="adoption-container">
		<div class="adoption-card">
			<div class="pet-content">
				<div class="pet-image">
					<a href="#">
						<img src="assets/img/4.jpg" alt="Bella">
					</a>
				</div>
				<h2 class="pet-name">🐶 Bella</h2>
			</div>
			<div class="extra-info">
				<p><strong>Breed:</strong> Labrador Retriever</p>
				<p><strong>Age:</strong> 4 Years Old</p>
				<p><strong>Personality:</strong> Loyal, gentle, loves swimming and outdoor games, good with families.</p>
			</div>
		</div>
	
		<div class="adoption-card">
			<div class="pet-content">
				<div class="pet-image">
					<a href="#">
						<br>
						<img src="assets/img/5.jpg" alt="Milo" style="transform: scale(1.2);">
					</a>
				</div>
				<h2 class="pet-name">🐰 Milo</h2>
			</div>
			<div class="extra-info">
				<p><strong>Breed:</strong> Netherland Dwarf Rabbit</p>
				<p><strong>Age:</strong> 6 Months Old</p>
				<p><strong>Personality:</strong> Curious, loves exploring, enjoys being held gently, requires regular grooming.</p>
			</div>
		</div>
	
		<div class="adoption-card">
			<div class="pet-content">
				<div class="pet-image">
					<a href="#">
						<br>
						<img src="assets/img/6.jpg" alt="Rocky" style="transform: scale(1.2);">
					</a>
				</div>
				<h2 class="pet-name">🐶 Rocky</h2>
			</div>
			<div class="extra-info">
				<p><strong>Breed:</strong> German Shepherd</p>
				<p><strong>Age:</strong> 5 Years Old</p>
				<p><strong>Personality:</strong> Protective, highly intelligent, great for training and active lifestyles.</p>
			</div>
		</div>
	</div>
	
	<div class="adoption-container">
		<div class="adoption-card">
			<div class="pet-content">
				<div class="pet-image">
					<a href="#">
						<img src="assets/img/7.jpg" alt="Cleo">
					</a>
				</div>
				<h2 class="pet-name">🐱 Cleo</h2>
			</div>
			<div class="extra-info">
				<p><strong>Breed:</strong> Persian Cat</p>
				<p><strong>Age:</strong> 3 Years Old</p>
				<p><strong>Personality:</strong> Calm, affectionate, enjoys lounging indoors, requires regular grooming.</p>
			</div>
		</div>
	
		<div class="adoption-card">
			<div class="pet-content">
				<div class="pet-image">
					<a href="#">
						<img src="assets/img/8.jpg" alt="Sunny">
					</a>
				</div>
				<h2 class="pet-name">🦜 Sunny</h2>
			</div>
			<div class="extra-info">
				<p><strong>Breed:</strong> African Grey Parrot</p>
				<p><strong>Age:</strong> 2 Years Old</p>
				<p><strong>Personality:</strong> Highly intelligent, loves mimicking sounds and words, requires mental stimulation.</p>
			</div>
		</div>
		<div class="adoption-card">
			<div class="pet-content">
				<div class="pet-image">
					<a href="#">
						<img src="assets/img/9.jpg" alt="Maximus">
					</a>
				</div>
				<h2 class="pet-name">🐶 Maximus</h2>
			</div>
			<div class="extra-info">
				<p><strong>Breed:</strong> Rottweiler</p>
				<p><strong>Age:</strong> 5 Years Old</p>
				<p><strong>Personality:</strong> Protective yet affectionate, highly loyal, great for training and active households.</p>
			</div>
		</div>
	</div>

	<div class="adoption-container">
		<div class="adoption-card">
			<div class="pet-content">
				<div class="pet-image">
					<a href="#">
						<br>
						<img src="assets/img/10.jpg" alt="Daisy">
					</a>
				</div>
				<h2 class="pet-name">🐶 Daisy</h2>
			</div>
			<div class="extra-info">
				<p><strong>Breed:</strong> Beagle</p>
				<p><strong>Age:</strong> 3 Years Old</p>
				<p><strong>Personality:</strong> Curious, loves sniffing trails, very friendly, and enjoys long walks.</p>
			</div>
		</div>

		<div class="adoption-card">
			<div class="pet-content">
				<div class="pet-image">
					<a href="#">
						<img src="assets/img/11.jpg" alt="Oreo">
					</a>
				</div>
				<h2 class="pet-name">🐱 Oreo</h2>
			</div>
			<div class="extra-info">
				<p><strong>Breed:</strong> Tuxedo Cat</p>
				<p><strong>Age:</strong> 2 Years Old</p>
				<p><strong>Personality:</strong> Playful, loves climbing, enjoys cuddles, and is great with kids.</p>
			</div>
		</div>

		<div class="adoption-card">
			<div class="pet-content">
				<div class="pet-image">
					<a href="#">
						<br>
						<img src="assets/img/12.jpg" alt="Mango">
					</a>
				</div>
				<h2 class="pet-name">🦜 Mango</h2>
			</div>
			<div class="extra-info">
				<p><strong>Breed:</strong> Sun Conure Parrot</p>
				<p><strong>Age:</strong> 1 Year Old</p>
				<p><strong>Personality:</strong> Vibrant and talkative, loves interacting with people, enjoys treats like seeds and fruits.</p>
			</div>
		</div>
</div>

<div class="adoption-container">
    <div class="adoption-card">
        <div class="pet-content">
            <div class="pet-image">
                <a href="#">
                    <br>
					<img src="assets/img/13.jpg" alt="Shadow" style="transform: scale(1.2);">
                </a>
            </div>
            <h2 class="pet-name">🐶 Shadow</h2>
        </div>
        <div class="extra-info">
            <p><strong>Breed:</strong> Siberian Husky</p>
            <p><strong>Age:</strong> 4 Years Old</p>
            <p><strong>Personality:</strong> Energetic, loves running outdoors, highly intelligent, and good with active families.</p>
        </div>
    </div>

    <div class="adoption-card">
        <div class="pet-content">
            <div class="pet-image">
                <a href="#">
					<img src="assets/img/14.jpg" alt="Snowball">
                </a>
            </div>
            <h2 class="pet-name">🐰 Snowball</h2>
        </div>
        <div class="extra-info">
            <p><strong>Breed:</strong> Angora Rabbit</p>
            <p><strong>Age:</strong> 6 Months Old</p>
            <p><strong>Personality:</strong> Gentle and calm, enjoys being groomed, loves leafy greens and soft bedding.</p>
        </div>
    </div>

    <div class="adoption-card">
        <div class="pet-content">
            <div class="pet-image">
                <a href="#">
                    <img src="assets/img/products/product-img-3.jpg" alt="Pepper">
                </a>
            </div>
            <h2 class="pet-name">🐦 Pepper</h2>
        </div>
        <div class="extra-info">
            <p><strong>Breed:</strong> Macaw</p>
            <p><strong>Age:</strong> 2 Years Old</p>
            <p><strong>Personality:</strong> Whistles tunes, very social, loves attention, and enjoys millet treats.</p>
        </div>
    </div>
</div>
	<!-- end products -->

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

</body>
</html>