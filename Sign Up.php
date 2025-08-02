<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="loginpage.css">
    <title>Sign Up - Katze</title>
</head>
<body>
    <canvas id="backgroundCanvas"></canvas>

    <div class="login-container">
        <h1>Sign Up to Katze!</h1>

        <form id="signupForm" action="signup.php" method="post">
            <!-- Headings for the form -->
            <div class="headingsContainer">
                <h3>Create Your Account</h3>
                <p>Enter your details below</p>
            </div>

            <!-- Email -->
            <label for="email">Your Email</label>
            <input type="text" id="email" placeholder="Enter Email" name="email" required>
            <span id="emailError" class="error"></span>
            <br></fbr>

            <!-- Username -->
            <label for="username">Your Username</label>
            <input type="text" id="username" placeholder="Enter Username" name="username" required>

            <!-- Password -->
            <label for="password">Your Password</label>
            <input type="password" id="password" placeholder="Enter Password" name="password" required>
            <span id="passwordStrength" class="error"></span>
            <br></fbr>

            <!-- Confirm Password -->
            <label for="confirmPassword">Confirm Password</label>
            <input type="password" id="confirmPassword" placeholder="Confirm Password" name="confirmPassword" required>
            <span id="confirmPasswordError" class="error"></span>
            <br></fbr>

            <!-- Stay Logged in Checkbox -->
            <div class="subcontainer">
                <label>
                    <input type="checkbox" checked="checked" name="dontlogoff"> Stay Logged in
                </label>
            </div>

            <!-- Submit button -->
            <button type="submit">Sign Up</button>

            <!-- Sign in link -->
            <p class="register">Already a member? <a href="login_page.php">Login here!</a></p>
            

            <div id="geo-location" style="color: white; font-size: 14px;"></div>
            <div id="geo-location1" style="color: white; font-size: 14px;"></div>
        </form>
    </div>

    <script>
        // Real-time email validation
        document.getElementById("email").addEventListener("input", function() {
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            const emailInput = this.value;
            document.getElementById("emailError").innerText = emailPattern.test(emailInput) ? "" : "Invalid email format.";
        });

        // Password strength validation
        document.getElementById("password").addEventListener("input", function() {
            const passwordInput = this.value;
            const strengthMessage = document.getElementById("passwordStrength");
            if (passwordInput.length < 8) {
                strengthMessage.innerText = "Password must be at least 8 characters.";
            } else if (!/[A-Z]/.test(passwordInput)) {
                strengthMessage.innerText = "Include at least one uppercase letter.";
            } else if (!/[0-9]/.test(passwordInput)) {
                strengthMessage.innerText = "Include at least one number.";
            } else if (!/[!@#$%^&*]/.test(passwordInput)) {
                strengthMessage.innerText = "Include at least one special character.";
            } else {
                strengthMessage.innerText = "";
            }
        });

        // Confirm password validation
        document.getElementById("confirmPassword").addEventListener("input", function() {
            document.getElementById("confirmPasswordError").innerText = 
                this.value !== document.getElementById("password").value ? "Passwords do not match." : "";
        });

        // Prevent form submission if validation fails
        document.getElementById("signupForm").addEventListener("submit", function(event) {
            if (document.getElementById("emailError").innerText || 
                document.getElementById("passwordStrength").innerText || 
                document.getElementById("confirmPasswordError").innerText) {
                event.preventDefault();
                alert("Please fix the errors before submitting.");
            }
        });

        // Geolocation API
        document.addEventListener("DOMContentLoaded", function () {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(getLocationDetails, showError);
            } else {
                document.getElementById("geo-location").innerText = "Geolocation not supported.";
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
                        document.getElementById("geo-location").innerText = `📍 ${locationName}, ${country}`;
                        document.getElementById("geo-location1").innerText = `📍 ${lat}, ${lon}`;
                    } else {
                        document.getElementById("geo-location").innerText = "Location not found.";
                    }
                })
                .catch(() => {
                    document.getElementById("geo-location").innerText = "Unable to retrieve location.";
                });
        }

        function showError() {
            document.getElementById("geo-location").innerText = "Geolocation access denied.";
        }

        // Background animation
        
    </script>
</body>
</html>
