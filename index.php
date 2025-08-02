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
	<title>Katze</title>

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
	<!-- AOS Animation Library -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">


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
										
										
										
										<!-- Geo Location -->
										
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
	<!-- end search area -->

	<!-- hero area -->
	<div class="hero-area hero-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-9 offset-lg-2 text-center">
					<div class="hero-text">
						<div class="hero-text-tablecell">
							<p class="subtitle">Best care for your lovely pets!!</p>
							<h1>Adoption and Medical Care</h1>
							<div class="hero-btns">
								<a href="adoptionpage.php" class="boxed-btn">Pet Collection</a>
								<a href="contact.php" class="bordered-btn">Contact Us</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end hero area -->

	<!-- features list section -->
	<div class="list-section pt-80 pb-80">
		<div class="container">

			<div class="row">
				<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
					<div class="list-box d-flex align-items-center">
						<div class="list-icon">
							<i class="fas fa-shipping-fast"></i>
						</div>
						<div class="content">
							<h3>Medical Services</h3>
							<p>All over India!</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
					<div class="list-box d-flex align-items-center">
						<div class="list-icon">
							<i class="fas fa-phone-volume"></i>
						</div>
						<div class="content">
							<h3>24/7 Support</h3>
							<p>Get support all day</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="list-box d-flex justify-content-start align-items-center">
						<div class="list-icon">
							<i class="fas fa-sync"></i>
						</div>
						<div class="content">
							<h3>Refund</h3>
							<p>Get refund within 3 days!</p>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
	<!-- end features list section -->

	<!-- product section -->
	<div class="product-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3><span class="orange-text">Our</span> Pets</h3>
						<p>"Find your perfect furry friend with us! 🐾 Our adoption center connects loving pets with caring homes. From playful puppies and cuddly kittens to gentle senior pets, we have a variety of adorable companions waiting for you. Every pet is health-checked, vaccinated, and ready to bring joy into your life. Adopt today and give a forever home to a pet in need! ❤️🐶🐱"</p>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.php"><img src="assets/img/products/product-img-1.jpg" alt=""></a>
						</div>
						<h3>Cats Meds</h3>
						<p class="product-price"><span>Starting From</span> Rs.1000 </p>
						<a href="shop.php" class="cart-btn"><i class="fas fa-shopping-cart"></i> Shop</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.php"><img src="assets/img/products/product-img-2.jpg" alt=""></a>
						</div>
						<h3>Dogs Meds</h3>
						<p class="product-price"><span>Starting From</span> Rs.1000 </p>
						<a href="shop.php" class="cart-btn"><i class="fas fa-shopping-cart"></i> Shop</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.php"><img src="assets/img/products/product-img-3.jpg" alt=""></a>
						</div>
						<h3>Birds Meds</h3>
						<p class="product-price"><span>Starting From</span> Rs.1000 </p>
						<a href="shop.php" class="cart-btn"><i class="fas fa-shopping-cart"></i> Shop</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end product section -->

	<!-- cart banner section -->
	

	<!-- testimonail-section -->
	<div class="testimonail-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1 text-center">
					<div class="testimonial-sliders">
						<div class="single-testimonial-slider">
							<div class="client-avater">
								<img src="assets/img/avaters/avatar1.png" alt="">
							</div>
							<div class="client-meta">
								<h3>Aditya Acharya <span>Katze Co-founder</span></h3>
								<p class="testimonial-body">
									"At Katze, we are dedicated to connecting loving families with pets in need while providing top-notch medical care and pet essentials. As a one-stop destination for pet adoption and veterinary services, we ensure that every pet finds a safe, caring home and receives the best possible health care."
								</p>
								<div class="last-icon">
									<i class="fas fa-quote-right"></i>
								</div>
							</div>
						</div>
						<div class="single-testimonial-slider">
							<div class="client-avater">
								<img src="assets/img/avaters/avatar2.png" alt="">
							</div>
							<div class="client-meta">
								<h3>Tanmay Gawade<span>Katze Co-founder</span></h3>
								<p class="testimonial-body">
									"Welcome to Katze, your trusted partner in pet adoption and healthcare! We are passionate about helping pets find loving homes while ensuring they receive the best medical care. Whether you're looking to adopt a furry companion or need high-quality pet supplies and veterinary services, Katze is here for you."
								</p>
								<div class="last-icon">
									<i class="fas fa-quote-right"></i>
								</div>
							</div>
						</div>
						<div class="single-testimonial-slider">
							<div class="client-avater">
								<img src="assets/img/avaters/avatar3.png" alt="">
							</div>
							<div class="client-meta">
								<h3>Anamika Ashokkumar<span>Pet Care Expert</span></h3>
								<p class="testimonial-body">
									"Hi there! I’m Anamika Ashokkumar, a passionate pet expert at Katze, dedicated to helping pets live happy, healthy lives. With years of experience in pet care, adoption, and veterinary support, I’m here to guide you in finding the perfect furry friend and ensuring they receive the best care possible."
								</p>
								<div class="last-icon">
									<i class="fas fa-quote-right"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end testimonail-section -->
	
	<!-- advertisement section -->
	<div class="abt-section mb-150">
		<div class="container">
			<div class="row">
					<div class="abt-text">
						<h2>How to take care of your <span class="orange-text">Pets!</span></h2>
						<p>Taking care of your pet is a rewarding experience that requires love, patience, and dedication. At Katze, we believe that pets are more than just companions—they are family. Ensuring their well-being means providing them with proper nutrition, regular veterinary care, and a safe, loving environment.</p>
						<p>Regular vet visits are crucial in keeping your pet healthy. Preventive care, such as vaccinations, deworming, and parasite control, helps protect them from common illnesses. If you ever notice changes in their behavior or health, seeking professional advice promptly can make a big difference.</p>
						<a href="https://www.wikihow.com/Take-Care-of-Your-Pet" class="boxed-btn mt-4">know more</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end advertisement section -->
	
	<!-- shop banner -->
	<section class="shop-banner">
    	<div class="container">
        	<h3>Summer sale is on! <br> with big <span class="orange-text">Discount...</span></h3>
            <div class="sale-percent"><span>Sale! <br> Upto</span>50% <span>off on Select medicines</span></div>
            <a href="shop.php" class="cart-btn btn-lg">Shop Now</a>
        </div>
    </section>
	<!-- end shop banner -->

	<!-- latest news -->
	<div class="latest-news pt-150 pb-150">
		<div class="container">

			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3><span class="orange-text">Our</span> News</h3>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-4 col-md-6">
					<div class="single-latest-news">
						<div class="latest-news-bg news-bg-1"></div>
						<div class="news-text-box">
							<h3>Dogs Prefer Electric Vehicles.</h3>
							<p class="blog-meta">
								<span class="author"><i class="fas fa-user"></i> Admin</span>
								<span class="date"><i class="fas fa-calendar"></i>  December, 2019</span>
							</p>
							<p class="excerpt">A study led by Dr. Scott Miller found that dogs experience less stress traveling in electric vehicles (EVs) compared to petrol and diesel cars. Monitoring a cocker spaniel named Mango, the research showed that the dog's heart rate increased less in an EV, suggesting a smoother, quieter ride enhances canine comfort.</p>
							
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="single-latest-news">
						<div class="latest-news-bg news-bg-2"></div>
						<div class="news-text-box">
							<h3>Cat Containment Discussions in Scotland.</h3>
							<p class="blog-meta">
								<span class="author"><i class="fas fa-user"></i> Admin</span>
								<span class="date"><i class="fas fa-calendar"></i> 27 December, 2019</span>
							</p>
							<p class="excerpt"> Proposals for "cat containment areas" have been introduced in Scotland to protect wildlife from predation by domestic cats. While restrictive measures are controversial, alternatives like collars with bells or feeding cats high meat-content food have been suggested to reduce hunting behavior.</p>
							
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0">
					<div class="single-latest-news">
						<div class="latest-news-bg news-bg-3"></div>
						<div class="news-text-box">
							<h3>Pet Abduction Act 2024.</h3>
							<p class="blog-meta">
								<span class="author"><i class="fas fa-user"></i> Admin</span>
								<span class="date"><i class="fas fa-calendar"></i> 27 December, 2019</span>
							</p>
							<p class="excerpt">The UK enacted the Pet Abduction Act 2024, making the abduction of pets, such as cats and dogs, a specific criminal offense. Convictions can result in fines and/or up to five years in prison, reflecting the recognition of pets as sentient beings capable of experiencing distress when stolen. </p>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end latest news -->
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