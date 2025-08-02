<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="loginpage.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <title>Login to Katze!</title>
<style>
.subcontainer {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin: 10px 0;
}

.subcontainer label {
  display: flex;
  align-items: center;
  color: var(--text-color);
  font-size: 14px;
  gap: 8px; /* Adds spacing between the checkbox and text */
}

.subcontainer input[type="checkbox"] {
  width: 16px;
  height: 16px;
  cursor: pointer;
}

.subcontainer .forgotpsd a {
  color: #e67e22;
  font-weight: 600;
  text-decoration: none;
}

.subcontainer .forgotpsd a:hover {
  text-decoration: underline;
}


.forgotpsd a, .register a, .aboutus a {
  color: var(--accent-color);
  text-decoration: none;
  font-weight: 600; /* Bold links */
}

.forgotpsd a:hover, .register a:hover, .aboutus a:hover {
  color: var(--text-color);
  text-decoration: underline;
}
</style>
</head>
<body>

    <canvas id="backgroundCanvas"></canvas>

    <div class="login-container animate__animated animate__fadeInDown">
        <h1>Login to Katze!</h1>

        <form id="loginForm" action="connect.php" method="post">
            <!-- Headings for the form -->
            <div class="headingsContainer">
                <h3>Sign in</h3>
                <p>Sign in with your email and password</p>
            </div>

            <!-- Main container for all inputs -->
            <div class="mainContainer">
                <!-- Email -->
                <label for="email">Your Email</label>
                <input type="text" id="email" placeholder="Enter Email" name="email" required>
                <span id="emailError" class="error-message"></span>
                <br></br>
                <!-- Password -->
                <label for="password">Your Password</label>
                <input type="password" id="password" placeholder="Enter Password" name="password" required>
                <span id="passwordError" class="error-message"></span>

                <!-- Sub-container for the checkbox and forgot password link -->
                <div class="subcontainer">
                    <label>
                      <input type="checkbox" checked="checked" name="remember"> Remember me
                    </label>
                    <p class="forgotpsd"> <a href="reset_password.php">Forgot Password?</a></p>
                </div>

                <!-- Submit button -->
                <button type="submit">Login</button>

                <!-- Sign up and About Us links -->
                <p class="register">Not a member?  <a href="Sign Up.php">Register here!</a></p>
                
                
                <br>
                <div id="geo-location" style="color: white; font-size: 14px;"></div>
                <div id="geo-location1" style="color: white; font-size: 14px;"></div>
            </div>
        </form>
    </div>

    <script>
        // Real-time Email Validation
        document.getElementById("email").addEventListener("input", function() {
            let email = this.value;
            let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            let emailError = document.getElementById("emailError");

            if (emailPattern.test(email)) {
                emailError.textContent = "✔ Valid Email";
                emailError.style.color = "green";
            } else {
                emailError.textContent = "✖ Invalid Email Format";
                emailError.style.color = "red";
            }
        });

        // Real-time Password Validation (Ensuring Data Accuracy)
        document.getElementById("password").addEventListener("input", function() {
            let password = this.value;
        });

        // Form Submission Prevention if Invalid
        document.getElementById("loginForm").addEventListener("submit", function(event) {
            let email = document.getElementById("email").value;
            let password = document.getElementById("password").value;
            let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            let passwordPattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;

            if (!emailPattern.test(email) || !passwordPattern.test(password)) {
                event.preventDefault(); // Prevent form submission
                alert("Please enter valid email and password!");
            }
        });

        // Geolocation functionality
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
                        let locationName = data.results[0].components.city || 
                                           data.results[0].components.town || 
                                           data.results[0].components.village;
                        let country = data.results[0].components.country;
                        document.getElementById("geo-location").innerHTML = `📍 ${locationName}, ${country}`;
                        document.getElementById("geo-location1").innerHTML = `📍 ${lat}, ${lon}`;
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

        // Canvas Background
       
    </script>

</body>
</html>
