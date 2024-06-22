<?php
session_start();
require 'database.php';

// Check if the user is logged in
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

// Initialize variables
$menu_items = [];

// Create a connection
$conn = new mysqli("localhost", "root", "", "test_project_web");

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all menu items
$result = $conn->query("SELECT * FROM menu");

// Check if query executed successfully
if ($result) {
    // Fetch all rows as associative array
    $menu_items = $result->fetch_all(MYSQLI_ASSOC);
    $result->close();
} else {
    // Handle query error
    echo "Error fetching menu items: " . $conn->error;
}

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Add menu item
    if (isset($_POST['add'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];

        // Prepare and execute SQL statement to insert into database
        $stmt = $conn->prepare("INSERT INTO menu (id, name, description) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $id, $name, $description);
        
        if ($stmt->execute()) {
            echo '<script>alert("New menu item added successfully.");</script>';
            // Refresh page after successful insertion
            echo '<meta http-equiv="refresh" content="0">';
        } else {
            echo "Error adding menu item: " . $stmt->error;
        }

        $stmt->close();
    }

    // Update menu item
    if (isset($_POST['update'])) {
        $id_update = $_POST['id_update'];
        $name_update = $_POST['name_update'];
        $description_update = $_POST['description_update'];

        // Prepare and execute SQL statement to update database
        $stmt = $conn->prepare("UPDATE menu SET name = ?, description = ? WHERE id = ?");
        $stmt->bind_param("sss", $name_update, $description_update, $id_update);
        
        if ($stmt->execute()) {
            echo '<script>alert("Menu item updated successfully.");</script>';
            // Refresh page after successful update
            echo '<meta http-equiv="refresh" content="0">';
        } else {
            echo "Error updating menu item: " . $stmt->error;
        }

        $stmt->close();
    }

    // Delete menu item
    if (isset($_POST['delete'])) {
        $id_delete = $_POST['id_delete'];

        // Prepare and execute SQL statement to delete from database
        $stmt = $conn->prepare("DELETE FROM menu WHERE id = ?");
        $stmt->bind_param("s", $id_delete);
        
        if ($stmt->execute()) {
            echo '<script>alert("Menu item deleted successfully.");</script>';
            // Refresh page after successful deletion
            echo '<meta http-equiv="refresh" content="0">';
        } else {
            echo "Error deleting menu item: " . $stmt->error;
        }

        $stmt->close();
    }
}

// Close connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #ffcc99;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #000000;
            font-size: 2.5em; /* Adjust the font size for emphasis */
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 2px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3); /* Adds a subtle shadow */
            padding-bottom: 5px;
        }

        h2 {
            margin-top: 30px;
            color: #000000;
            font-size: 2.5em; /* Adjust the font size for emphasis */
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 2px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3); /* Adds a subtle shadow */
            padding-bottom: 5px;
}


        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
        }

        table th, table td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #FFFF66;
            color: #000000;
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        form {
            background-color: rgba(255, 255, 255, 0.95);
            padding: 30px;
            border-radius: 10px;
            margin: 20px auto;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 400px;
            border-top: 5px solid #ffeb3b;
            animation: fadeIn 1s ease-in-out;
            z-index: 1;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #333;
        }

        input[type="text"], button {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        button {
            background-color: #FFFF66;
            color: #333;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #ffa64d;
        }
    </style>
</head>
<body>
    <h1>Admin Dashboard</h1>
    
    <h2>All Menu Items</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
        </tr>
        <?php foreach ($menu_items as $item): ?>
        <tr>
            <td><?php echo htmlspecialchars($item['id']); ?></td>
            <td><?php echo htmlspecialchars($item['name']); ?></td>
            <td><?php echo htmlspecialchars($item['description']); ?></td>
        </tr>
        <?php endforeach; ?>
        <?php if (empty($menu_items)): ?>
        <tr>
            <td colspan="3">No menu items found.</td>
        </tr>
        <?php endif; ?>
    </table>

    <h2>Add New Menu Item</h2>
    <form method="POST">
        <label for="id">ID:</label>
        <input type="text" name="id" required>
        <label for="name">Name:</label>
        <input type="text" name="name" required>
        <label for="description">Description:</label>
        <input type="text" name="description" required>
        <button type="submit" name="add">Add</button>
    </form>

    <h2>Update Menu Item</h2>
    <form method="POST">
        <label for="id_update">ID:</label>
        <input type="text" name="id_update" required>
        <label for="name_update">Name:</label>
        <input type="text" name="name_update" required>
        <label for="description_update">Description:</label>
        <input type="text" name="description_update" required>
        <button type="submit" name="update">Update</button>
    </form>

    <h2>Delete Menu Item</h2>
    <form method="POST">
        <label for="id_delete">ID:</label>
        <input type="text" name="id_delete" required>
        <button type="submit" name="delete">Delete</button>
    </form>
</body>
</html>
