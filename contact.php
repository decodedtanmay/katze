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
	<title>Contact</title>

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
						<p>Get 24/7 Support</p>
						<h1>Contact us</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- contact form -->
	<div class="contact-form-section mt-150 mb-150">
    <div class="container">
        <div class="form-title text-center">
            <h2>Have you any question?</h2>
            <p>At Katze we are dedicated to giving you a special and wonderful experience. Please give us your review!</p>
        </div>
        <div class="row">
            <!-- Left Section: Contact Form -->
            <div class="col-lg-8 col-md-6 d-flex align-items-center justify-content-center">
                <div class="w-100">
                    <div id="form_status"></div>			
                    <div class="contact-form">
                        <!-- ✅ PHP Submission Handler -->
                        <form action="contact_process.php" method="POST" id="katze-contact">
                            <p>
                                <input type="text" placeholder="Name" name="name" id="name" required>
                                <input type="email" placeholder="Email" name="email" id="email" required>
                            </p>
                            <p>
                                <input type="tel" placeholder="Phone" name="phone" id="phone" required>
                                <input type="text" placeholder="Subject" name="subject" id="subject" required>
                            </p>
                            <p><textarea name="message" id="message" cols="30" rows="10" placeholder="Message" required></textarea></p>
                            <p>
                                <button type="submit" class="btn-submit">
                                    Submit <i class="fas fa-paper-plane"></i>
                                </button>
                            </p>
                        </form>
                    </div>
                    <!-- ✅ Display success/error message -->
                    <?php
                        if (isset($_GET['status'])) {
                            if ($_GET['status'] == 'success') {
                                echo "<div class='alert alert-success mt-3'>Thank you! Your message has been sent.</div>";
                            } elseif ($_GET['status'] == 'error') {
                                echo "<div class='alert alert-danger mt-3'>Oops! Something went wrong. Please try again.</div>";
                            }
                        }
                    ?>
                </div>
            </div>
					
            <!-- Right Section: Contact Info -->
            <div class="col-lg-4 col-md-6">
                <div class="contact-form-wrap">
                    <div class="contact-form-box">
                        <h4><i class="fas fa-map"></i> Shop Address</h4>
                        <p>Pillai college of engineering. New Panvel, Maharashtra<br> India.</p>
                    </div>
                    <div class="contact-form-box">
                        <h4><i class="far fa-clock"></i> Shop Hours</h4>
                        <p>MON - FRIDAY: 8 to 9 PM <br> SAT - SUN: 10 to 8 PM </p>
                    </div>
                    <div class="contact-form-box">
                        <h4><i class="fas fa-address-book"></i> Contact</h4>
                        <p>Phone: +00 111 222 3333 <br> Email: support@katze.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>            



<!-- end contact form -->


	<!-- find our location -->
	<div class="find-location blue-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<p> <i class="fas fa-map-marker-alt"></i> Find Our Location</p>
				</div>
			</div>
		</div>
	</div>
	<!-- end find our location -->

	<!-- google map section -->
	<div class="embed-responsive embed-responsive-21by9">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3772.6694343953423!2d73.1250951750862!3d18.990200982196832!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7e866de88667f%3A0xc1c5d5badc610f5f!2sPillai%20College%20of%20Engineering%2C%20New%20Panvel%20(Autonomous)!5e0!3m2!1sen!2sin!4v1742049192442!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
	</div>
	<!-- end google map section -->


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
	<!-- form validation js -->
	<script src="assets/js/form-validate.js"></script>
	<!-- main js -->
	<script src="assets/js/main.js"></script>
	<!-- custom js -->
	<script src="assets/js/custom.js"></script>
	<script>
		document.addEventListener("DOMContentLoaded", function () {
    const contactForm = document.getElementById("katze-contact");

    if (contactForm) {
        contactForm.addEventListener("submit", function (event) {
            event.preventDefault(); // Prevent default form submission
            
            let formData = new FormData(contactForm);

            fetch("contact_process.php", {
                method: "POST",
                body: formData,
            })
            .then(response => response.json())
            .then(data => {
                let formStatus = document.getElementById("form_status");
                if (data.status === "success") {
                    formStatus.innerHTML = `<div class="alert alert-success">${data.message}</div>`;
                    contactForm.reset(); // Clear form fields
                } else {
                    formStatus.innerHTML = `<div class="alert alert-danger">${data.message}</div>`;
                }
            })
            .catch(error => {
                console.error("Error:", error);
                document.getElementById("form_status").innerHTML = 
                    `<div class="alert alert-danger">An error occurred. Please try again.</div>`;
            });
        });
    }
});
		</script>
</body>
</html>