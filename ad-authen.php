<?php
session_start();
require 'database.php'; // Assuming you have a config file to handle your database connection

if (isset($_POST['login'])) {
    $admin_id = $_POST['admin_id'];
    $password = $_POST['password'];

    if (!empty($admin_id) && !empty($password)) {
        // Create a connection
        $conn = new mysqli("localhost", "root", "", "test_project_web");

        // Check the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare and bind
        $stmt = $conn->prepare("SELECT password FROM admin WHERE admin_id = ?");
        $stmt->bind_param("s", $admin_id);

        // Execute the statement
        $stmt->execute();

        // Bind result variables
        $stmt->bind_result($stored_password);

        // Fetch the value
        if ($stmt->fetch()) {
            // Directly compare plain-text password
            if ($password === $stored_password) {
                // Password is correct, set session and redirect to dashboard
                $_SESSION['admin_id'] = $admin_id;
                header("Location: ad-dashboard.php");
                exit();
            } else {
                // Password is incorrect
                echo "Invalid password.";
            }
        } else {
            // No such admin_id found
            echo "Invalid admin ID.";
        }

        // Close statement and connection
        $stmt->close();
        $conn->close();
    } else {
        echo "Please fill in both fields.";
    }
} else {
    echo "Invalid request.";
}
?>
