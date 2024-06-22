<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title>
    <style>
        body {
            background-color: #fffde7;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            width: 90%;
            max-width: 400px;
            border-top: 5px solid #ffeb3b;
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }

        input[type="email"], input[type="text"], input[type="password"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            transition: border 0.3s, transform 0.3s;
        }

        input[type="email"]:focus, input[type="text"]:focus, input[type="password"]:focus {
            border: 1px solid #ffeb3b;
            outline: none;
            transform: scale(1.05);
        }

        input[type="submit"] {
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

        input[type="submit"]:hover {
            background-color: #fdd835;
        }
    </style>
</head>

<body>
    <form action="insert.php" method="post">
        <h1>Sign Up Page</h1>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" placeholder="Enter your email" required>
        <label for="name">Full Name:</label>
        <input type="text" name="name" id="name" placeholder="Enter your full name" required>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" placeholder="Enter your password" required>
        <input type="submit" name="submit" value="Register">
    </form>
</body>

</html>
