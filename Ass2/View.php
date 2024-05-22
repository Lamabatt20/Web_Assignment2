<?php
// Include necessary files and establish database connection
require_once('dbconfig.in.php');
include_once('Product.php');

// Check if productId is provided in the query string
if(isset($_GET['productId'])) {
    // Retrieve productId from the query string
    $productId = $_GET['productId'];

    try {
        // Establish a connection to the database
        $conn = db_connect(); 
        // Set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Prepare SQL statement to retrieve product details based on productId
        $stmt = $conn->prepare("SELECT * FROM products WHERE product_id = :productId");
        $stmt->bindParam(':productId', $productId);
        
        // Execute the query
        $stmt->execute();
        
        // Fetch the product details
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if product exists
        if($row) {
            // Create a Product object
            $product = new Product(
                $row['product_id'],
                $row['product_name'],
                $row['category'],
                $row['description'],
                $row['price'],
                $row['rating'],
                $row['image_name'],
                $row['quantity']
            );
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<header>
 <h1><a href="Products.php" ><img src="Logo.jpeg" style="width: 100px; height:100px ;"  alt="Little Betterfly Boutique logo"> </a> Little Betterfly Boutique </h1>
 <nav>
 <ul>
 <li><a href="add.php">Add Product</a></li>
 <li><a href="edit.php">Edit Product</a></li>
 <li><a href="Delete.php">Delete Product</a></li>
 <li><a href="Products.php">Products</a></li>
 </ul>
 </nav>
 </header>
     <hr>
    <table>

        <tr>
<figure>
    <img src="Image/<?php echo $product->getImageName(); ?>" alt="<?php echo $product->getProductName(); ?>" style="width: 400px; height: 400px;">
    <figcaption><?php echo $product->getProductName(); ?></figcaption>
</figure>
        </tr>
        <tr>
            <h2>Product ID:<?php echo $product->getProductId() ?>,<?php echo $product->getProductName(); ?></h2>
        </tr>
        <ul>
            <tr>
        <li>
            Price:<?php echo $product->getPrice(); ?>
        </li>
        </tr>
        <tr>
        <li>
            Category:<?php echo $product->getCategory(); ?>
        </li>
        </tr>
        <tr>
        <li>
            Rating:<?php echo $product->getRating(); ?>
        </li>
        </tr>
        </ul>
        <tr>
            <h2>Description:</h2>
            <td><?php echo $product->getDescription(); ?></td>
        </tr>
        <!-- Add more rows for other product details as needed -->
    </table>
</hr>

<hr>
<footer>
    <p>Last updated on: <time datetime="2024-05-17">May 17, 2024</time></p>
    <p>Address: alarsal Street, Ramallah, Palestine</p>
    <p>Phone: 0596432687</p>
    <p>Email: info@littlebetterflyboutique.com</p>
    <nav>
        <a href="Contact.html">Contact Us</a>  
    </nav>
</footer>
</hr>
</body>
</html>
<?php
        } else {
            // Product not found, display error message
            echo "<p>Product not found.</p>";
        }

    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    // Close the database connection
    $conn = null;

} else {
    // productId not provided in query string, display error message
    echo "<p>Product ID not provided.</p>";
}
?>
