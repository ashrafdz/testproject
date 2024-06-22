<?php
require_once 'Database.php';
require_once 'User.php';

// Get the database connection
$database = new Database();
$db = $database->getConnection();

// Create a new User object
$user = new User($db);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['reset'])) {
    $email = $_POST['email'];
    $new_password = $_POST['new_password'];

    // Update the user's password (without hashing for demonstration purposes)
    $sql = "UPDATE users SET password = ? WHERE email = ?";
    $stmt = $db->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ss", $new_password, $email); // Store password in plain text
        $result = $stmt->execute();

        if ($result) {
            echo "Password has been reset successfully.";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error: " . $db->error;
    }
}
?>
