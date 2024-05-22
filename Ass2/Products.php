<html>
    <head>
    </head>
    <body>
<?php
require_once('dbconfig.in.php');

// Include the Product class definition
include_once('Product.php');

// Establish a connection to the database
try {
    $conn = db_connect(); 
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql="SELECT * FROM products";
    $products = [];
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $searchName = isset($_POST['searchName']) ? $_POST['searchName'] : '';
    $searchType = isset($_POST['searchType']) ? $_POST['searchType'] : '';
    $searchCategory = isset($_POST['searchCategory']) ? $_POST['searchCategory'] : '';
        if ($searchType === 'name') {
            $sql .= " WHERE product_name LIKE '%$searchName%'";
        } elseif ($searchType === 'category') {
            $sql .= " WHERE category = '$searchCategory'";
        } elseif ($searchType === 'price') {
            $sql .= " WHERE price >= '$searchName'";
        }
    }
    // Query to retrieve product records
    $stmt = $conn->query($sql);
    
    // Fetch all rows as associative arrays
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Initialize an empty array to store Product objects
    
    // Loop through the fetched rows and create Product objects
    foreach ($rows as $row) {
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
        // Add the Product object to the products array
        $products[] = $product;
    }
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Close the database connection
$conn = null;
?>

<header>
 <h1><a href="Products.php" ><img src="Logo.jpeg" style="width: 100px; height:100px ;"  alt="Little Betterfly Boutique logo"> </a> Little Betterfly Boutique </h1>
 <nav>
 <ul>
 <li><a href="add.php">Add Product</a></li>
 <li><a href="edit.php">Edit Product</a></li>
 <li><a href="Delete.php">Delete Product</a></li>
 <li><a href="view.php">View Product</a></li>
 </ul>
 </nav>
 </header>
 <hr> 
<p>To Add a new Product click on the following link <a href="add.php">Add Product</a></p>
 <p>Or use the actions below to edit or delete a Product's record.</p>
</hr>
<fieldset>
 <legend>Advanced Product Search </legend>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
        <input type="text" name="searchName" placeholder="Search Product Name">
        <label><input type="radio" name="searchType" value="name">Name</label>
        <label><input type="radio" name="searchType" value="category">Category</label>
        <label><input type="radio" name="searchType" value="price">Price</label>
        <select name="searchCategory">
            <option value="">Select Category</option>
            <option value="Girls clothing">Girls clothing</option>
            <option value="partywear">partywear</option>
            <option value="girls jeans">girls jeans</option>
            <option value="Baby girl clothing">Baby girl clothing</option>
        </select>
        <button type="submit">Filter</button>
    </form>
<center>Products Table Result</center>
<table border=\"0\">
    <thead>
        <tr>
            <th>Product Image</th>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <!-- Loop through products and display each as a table row -->
        <?php foreach ($products as $product): ?>
            <tr>
                <td><img src="Image/<?php echo $product->getImageName(); ?>" alt="<?php echo $product->getProductName(); ?>" style="width: 100px; height: auto;"></td>
                <td><a href="view.php?productId=<?php echo $product->getProductId(); ?>"><?php echo $product->getProductId(); ?></a></td>
                <td><?php echo $product->getProductName(); ?></td>
                <td><?php echo $product->getCategory(); ?></td>
                <td><?php echo $product->getPrice(); ?></td>
                <td><?php echo $product->getQuantity(); ?></td>
                <td>
                   
                    <!-- Edit button -->
                    <a href="edit.php?productId=<?php echo $product->getProductId(); ?>"><button><img src="icons8-edit-24.png" alt="Edit" style="width: 20px; height: 20px;"></button></a>
                    <!-- Delete button -->
                    <a href="Delete.php?productId=<?php echo $product->getProductId(); ?>"><button><img src="icons8-delete-30.png" alt="Delete" style="width: 20px; height: 20px;"></button></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
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

