<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="loginpage.css">
    <title>Forgot Password - Katze</title>
</head>

<body>

    <canvas id="backgroundCanvas"></canvas>

    <div class="login-container">
        <h1>Forgot Password</h1>

        <form id="forgotForm" action="send_otp.php" method="post">
            <div class="headingsContainer">
                <h3>Forgot Password</h3>
                <p>Enter your registered email to receive OTP</p>
            </div>

            <div class="mainContainer">
                <label for="email">Your Email</label>
                <input type="text" id="email" name="email" placeholder="Enter your email" required>
                <span id="emailError" class="error-message"></span>

                <button type="submit">Send OTP</button>

                <p class="register">Back to <a href="login.php">Login</a></p>

                <br>
                <div id="geo-location" style="color: white; font-size: 14px;"></div>
                <div id="geo-location1" style="color: white; font-size: 14px;"></div>
            </div>
        </form>
    </div>

    <script>
        // Real-time Email Validation
        document.getElementById("email").addEventListener("input", function () {
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

        // Form Validation on Submit
        document.getElementById("forgotForm").addEventListener("submit", function (event) {
            let email = document.getElementById("email").value;
            let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (!emailPattern.test(email)) {
                event.preventDefault();
                alert("Please enter a valid email!");
            }
        });

        // Geolocation
        document.addEventListener("DOMContentLoaded", function () {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(getLocationDetails, showError);
            } else {
                document.getElementById("geo-location").innerHTML = "Geolocation not supported.";
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
    </script>

</body>

</html>
