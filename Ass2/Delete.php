<?php
// Include database configuration file
require_once('dbconfig.in.php');

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['productId'])) {
    try {
        // Get product ID from the query string
        $productId = $_GET['productId'];

        // Establish a database connection
        $conn = db_connect();

        // Prepare a SQL statement to delete the product record
        $stmt = $conn->prepare("DELETE FROM products WHERE product_id = :productId");

        // Bind the product ID parameter
        $stmt->bindValue(':productId', $productId);

        // Execute the delete statement
        $stmt->execute();

        // Close the database connection
        $conn = null;

        // Redirect the user back to the products page after deletion
        header("Location: Products.php");
        exit();
    } catch (PDOException $e) {
        // Handle any database errors
        echo "Error: " . $e->getMessage();
    }
} else {
    // Redirect the user back to the products page if the request method is not GET or product ID is not set
    header("Location: Products.php");
    exit();
}
?>