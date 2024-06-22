<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            background-color: #ffcc99;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
        }

        .floating-food {
            position: absolute;
            width: 80px;
            height: 80px;
            opacity: 0.8;
            animation: float 8s ease-in-out infinite;
        }

        @keyframes float {
            0% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
            100% {
                transform: translateY(0);
            }
        }

        .food1 {
            top: -10%;
            left: 10%;
            animation-duration: 7s;
        }

        .food2 {
            top: 45%;
            left: 47%;
            animation-duration: 6s;
        }

        .food3 {
            top: -15%;
            left: 70%;
            animation-duration: 8s;
        }

        .food4 {
            top: 50%;
            left: -10%;
            animation-duration: 5s;
        }

        form {
            background-color: rgba(255, 255, 255, 0.95);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 400px;
            border-top: 5px solid #ffeb3b;
            animation: fadeIn 1s ease-in-out;
            z-index: 1;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .logo {
            display: block;
            margin: 0 auto 10px auto;
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
        }

        h1 {
            color: #333;
            text-align: center;
            margin: 10px 0;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }

        input[type="email"],
        input[type="password"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            transition: border 0.3s, transform 0.3s;
        }

        input[type="email"]:focus,
        input[type="password"]:focus {
            border: 1px solid #ffeb3b;
            outline: none;
            transform: scale(1.05);
        }

        input[type="submit"],
        .signup-btn,
        .admin-btn {
            background-color: #ffeb3b;
            color: #333;
            border: none;
            padding: 10px;
            cursor: pointer;
            text-align: center;
            display: block;
            margin: auto;
            margin-top: 10px;
            border-radius: 5px;
            text-decoration: none;
            width: calc(100% - 20px);
            box-sizing: border-box;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover,
        .signup-btn:hover,
        .admin-btn:hover {
            background-color: #fdd835;
        }

        .signup-btn,
        .admin-btn {
            text-align: center;
            line-height: 30px;
        }

        .forgot-password {
            text-align: center;
            display: block;
            margin-top: 10px;
            color: #f44336;
            text-decoration: none;
            font-size: 14px;
            transition: color 0.3s;
        }

        .forgot-password:hover {
            color: #d32f2f;
        }
    </style>
</head>

<body>
    <div class="floating-food food1"><img src="placeholder.png" alt="Food 1"></div>
    <div class="floating-food food2"><img src="placeholder.png" alt="Food 2"></div>
    <div class="floating-food food3"><img src="placeholder.png" alt="Food 3"></div>
    <div class="floating-food food4"><img src="placeholder.png" alt="Food 4"></div>

    <form action="homepagev2.html" method="post">
        <img src="logo.jpg" alt="Logo" class="logo">
        <h1>Login Page</h1>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" placeholder="Enter your email" required>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" placeholder="Enter your password" required>
        <input type="submit" name="login" value="Log In">
        <a href="reset_password.html" class="forgot-password">Forgot Password?</a>
        <a href="signup.php" class="signup-btn">Sign Up</a>
        <a href="admin-login.php" class="admin-btn">Sign in as Admin</a>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var images = ['food1.png', 'food2.png', 'food3.png', 'food4.png'];
            var elements = document.querySelectorAll('.floating-food img');

            elements.forEach(function(element) {
                var randomIndex = Math.floor(Math.random() * images.length);
                element.src = images[randomIndex];
                // Remove the used image from the array to avoid duplication
                images.splice(randomIndex, 1);
            });
        });
    </script>
</body>

</html>
