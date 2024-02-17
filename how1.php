<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $password1 = $_POST['password'];
    $username1 = $_POST['username'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "hack";

    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn){
        die("Sorry we failed to connect: ". mysqli_connect_error());
    }
    else{
        $sql = "INSERT INTO `usersa` (`email`, `password`, `username`) VALUES ('$email', '$password1', '$username1')";
        $result = mysqli_query($conn, $sql);
    }
}
?>  
<!DOCTYPE html>
<html>
<head>
    <title>Registration Page</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #fbfcfe;
        }

        .form-wrapper {
            background-color: #4ebdec;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            padding: 40px;
            width: 400px;
            text-align: center;
        }

        .form-wrapper h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .form-wrapper input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-wrapper button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .form-wrapper button:hover {
            background-color: #3d6c72;
        }

        .form-wrapper .form-actions {
            margin-top: 20px;
        }

        .form-wrapper .form-actions a {
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="form-wrapper" id="formdiv">
        <h1>Create Your Account</h1>
       

        
        <form id="signupForm" method="post" action="http://localhost/QuickFlip/login.php">
            <div class="text-field">
                <input type="text" id="email" name="email" placeholder="Email" required>
            </div>
            <div class="text-field">
                <input id="username" type="username" name="username" placeholder="username" required>
            </div>
            <div class="text-field">
                <input id="Password" type="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit">Sign Up</button>
            <div class="form-actions">
                <span>Already have an account?</span>
                <a href="http://localhost/QuickFlip/login.php" title="Sign In">Sign In Now</a>
            </div>
        </form>
    </div>
    <script>
        // JavaScript Validation for Email Format
        document.getElementById("loginForm").addEventListener("submit", function(event) {
            var emailInput = document.getElementById("email");
            var email = emailInput.value.trim();
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (!emailRegex.test(email)) {
                // If email format is invalid, prevent form submission and show error message
                event.preventDefault();
                emailInput.setCustomValidity("Email is in incorrect format");
            } else {
                // If email format is valid, clear any previous error message
                emailInput.setCustomValidity("");
            }
        });
    </script>
</body>

</html>