<!DOCTYPE html>
<html lang="en">
<?php
    $arr=array();
    $arr2=array();

    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "hack";

        
    
    $conn = mysqli_connect($servername, $username, $password, $database);
    
        
    $sql1 = "SELECT `email` FROM `usersa`";
    $result1 = mysqli_query($conn, $sql1);

    while( $row1 = mysqli_fetch_array( $result1, MYSQLI_NUM ) ){
        array_push($arr,$row1);   
    }
    
    $sql2 = "SELECT `password` FROM `usersa`";
    $result2 = mysqli_query($conn, $sql2);

    while( $row2 = mysqli_fetch_array( $result2, MYSQLI_NUM ) ){
        array_push($arr2,$row2);   
    }
        
    
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Example</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
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

        .form{
        font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-left: 20px;
            margin-right: 20px;
            height: 100vh;
            background-color: #28ead9;
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
            background-color: #2169b7;
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
        <h1>Login</h1>
        <form id="loginForm" action="http://localhost/QuickFlip/quickflip1.php">
            <div class="text-field">
                <input type="email" id="email" name="email" autocomplete="off" placeholder="Email" required>
            </div>
            <div class="text-field">
                <input id="password" type="password" name="password" placeholder="Password" required>
            </div>
            <button id = "sign" type="submit">Sign In</button>
            <div class="form-actions">
                <span>Don't have an account?</span>
                <a href="http://localhost/QuickFlip/how1.php" title="Sign Up">Sign Up Now</a>
            </div>
        </form>
    </div>

    <script>
        var e = <?= json_encode($arr)?>;
        console.log(e);

        var p = <?= json_encode($arr2)?>;
        console.log(p);

        const sign = document.getElementById('sign');


        // JavaScript Validation for Email Format
        document.getElementById("loginForm").addEventListener("submit", function(event) {
            var emailInput = document.getElementById("email");
            var password = document.getElementById("password");

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

            em = emailInput.value();
            ps = password.value();
            sign.addEventListener('click',()=>{

                if (e[0][0] === em && p[0][0]=== ps) {
                    alert('Login successful!');
                } else {
                    alert('Invalid username or password. Please try again.');
                }
            })
            

        });



        
    </script>
</body>

</html>

