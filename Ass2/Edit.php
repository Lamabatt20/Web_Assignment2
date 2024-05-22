<?php
// Include database configuration file
require_once('dbconfig.in.php');

// Check if product ID is provided in the query string
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['productId'])) {
    try {
        // Get product ID from the query string
        $productId = $_GET['productId'];

        // Fetch product details from the database
        $conn = db_connect();
        $stmt = $conn->prepare("SELECT * FROM products WHERE product_id = :productId");
        $stmt->bindValue(':productId', $productId);
        $stmt->execute();
        $product = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if product exists
        if ($product) {
            // Display the HTML form with product details filled in
            renderEditForm($product);
        } else {
            // Redirect to products page if product does not exist
            header("Location: Products.php");
            exit();
        }
    } catch (PDOException $e) {
        // Handle any database errors
        echo "Error: " . $e->getMessage();
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['productId'])) {
    // Handle form submission to update product details
    try {
        // Extract product details from the POST data
        $productId = $_POST['productId'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $description = $_POST['description'];
        $productName=$_POST['product_name'];

        // Establish a database connection
        $conn = db_connect();

        // Prepare SQL statement to update product details
        $stmt = $conn->prepare("UPDATE products SET price = :price, quantity = :quantity,product_name=:product_name,description = :description WHERE product_id = :productId");
        $stmt->bindValue(':price', $price);
        $stmt->bindValue(':quantity', $quantity);
        $stmt->bindValue(':description', $description);
        $stmt->bindValue(':productId', $productId);
        $stmt->bindValue(':product_name', $productName);
        $stmt->execute();

        // Close the database connection
        $conn = null;

        // Redirect to the view page for the edited product
        header("Location: view.php?productId=" . $productId);
        exit();
    } catch (PDOException $e) {
        // Handle any database errors
        echo "Error: " . $e->getMessage();
    }
} else {
    // Redirect to products page if product ID is not provided or if request method is not supported
    header("Location: Products.php");
    exit();
}

function renderEditForm($product) {
    ?>
    <html>
    <head>
    </head>
    <body>
    <header>
        <h1><a href="Products.php"><img src="Logo.jpeg" style="width: 100px; height:100px;" alt="Little Betterfly Boutique logo"></a> Little Betterfly Boutique </h1>
        <nav>
            <ul>
                <li><a href="View.php">View Product</a></li>
                <li><a href="edit.php">Edit Product</a></li>
                <li><a href="Delete.php">Delete Product</a></li>
                <li><a href="Products.php">Products</a></li>
            </ul>
        </nav>
    </header>

    <fieldset>
        <legend>Product Record: </legend>
        <form action="edit.php" method="POST">
            <input type="hidden" name="productId" value="<?php echo $product['product_id']; ?>">
            <label for="product_name"> Product Name:</label>
            <input type="text" id="product_name" name="product_name" value="<?php echo $product['product_name']; ?>" required><br/><br/>   
            <label for="category"> Category:</label>
<select id="category" name="category" required disabled>
    <option value="">Select Category</option>
    <option value="Girls clothing" <?php if($product['category'] === 'Girls clothing') echo 'selected'; ?>>Girls clothing</option>
    <option value="partywear" <?php if($product['category'] === 'partywear') echo 'selected'; ?>>Partywear</option>
    <option value="girls jeans" <?php if($product['category'] === 'girls jeans') echo 'selected'; ?>>Girls jeans</option>
    <option value="Baby girl clothing" <?php if($product['category'] === 'Baby girl clothing') echo 'selected'; ?>>Baby girl clothing</option>
</select>
<br/><br/>
            <label for="price"> Price:</label>
            <input type="text" id="price" name="price" value="<?php echo $product['price']; ?>" required><br/><br/>
            <label for="quantity"> Quantity:</label>
            <input type="text" id="quantity" name="quantity" value="<?php echo $product['quantity']; ?>" required><br/><br/>
            <label for="rating"> Rating:</label>
            <input type="text" id="rating" name="rating" value="<?php echo $product['rating']; ?>" required disabled><br/><br/>
            <label for="description"> Description:</label><br/>
            <textarea id="description" name="description" required style="width: 400px; height: 150px;"><?php echo $product['description']; ?></textarea><br/><br/>
            <label for="image_name"> Product Photo:</label>
            <input type="file" name="image_name" accept="Image/jpg"><br/><br/>
            <button type="submit">Update</button>
        </form>
    </fieldset>

    <footer>
        <p>Last updated on: <time datetime="2024-05-17">May 17, 2024</time></p>
        <p>Address: alarsal Street, Ramallah, Palestine</p>
        <p>Phone: 0596432687</p>
        <p>Email: info@littlebetterflyboutique.com</p>
        <nav>
            <a href="Contact.html">Contact Us</a>
        </nav>
    </footer>
    </body>
    </html>
    <?php
}
?>