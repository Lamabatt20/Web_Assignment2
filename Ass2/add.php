<?php
require_once('dbconfig.in.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate form data
    // Move uploaded image file to "images" folder and rename it
    
    // Example code for inserting product details into the database
    try {
        $conn = db_connect();
        // Prepare SQL statement
        $stmt = $conn->prepare("INSERT INTO products (product_name, category, description, price, rating, image_name, quantity) VALUES (:product_name, :category, :description, :price, :rating, :image_name, :quantity)");
        $imageFileName = $_FILES['image_name']['name'];
        // Bind values
        $stmt->bindValue(':product_name', $_POST['product_name']);
        $stmt->bindValue(':category', $_POST['category']);
        $stmt->bindValue(':description', $_POST['description']);
        $stmt->bindValue(':price', $_POST['price']);
        $stmt->bindValue(':rating', $_POST['rating']);
        $stmt->bindValue(':image_name', $imageFileName); // $imageFileName should contain the filename of the uploaded image
        $stmt->bindValue(':quantity', $_POST['quantity']);
        
        // Execute the statement
        $stmt->execute();
        
        echo "New record created successfully";
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    
    // Close the database connection
    $conn = null;
} else {
    // Display the form to allow users to input product details
?>
 <html>
<head>
</head>
   
<body>
 <header>
 <h1><a href="Products.php" ><img src="Logo.jpeg" style="width: 100px; height:100px ;"  alt="Little Betterfly Boutique logo"> </a> Little Betterfly Boutique </h1>
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
        <form action="add.php" method="POST" enctype="multipart/form-data">
            <!-- Add input fields for product details -->
            
            <label for="product_name"> Product Name:</label>
          <input type="text" id="product_name" name="product_name" required><br/><br/>

          <label for="category"> Category:</label>
<select id="category" name="category">
    <option value="">Select Category</option>
    <option value="Girls clothing">Girls clothing</option>
    <option value="partywear">Partywear</option>
    <option value="girls jeans">Girls jeans</option>
    <option value="Baby girl clothing">Baby girl clothing</option>
</select><br/><br/>

          <label for="price"> price:</label>
          <input type="text" id="price" name="price" required><br/><br/>

          <label for="quantity"> Quantity:</label>
          <input type="text" id="quantity" name="quantity" required><br/><br/>

          <label for="rating"> Rating:</label>
          <input type="text" id="rating" name="rating" required><br/><br/>

          <label for="description"> Description:</label><br/>
<textarea id="description" name="description" required style="width: 400px; height: 150px;" placeholder="Provide a full description about the Product."></textarea><br/><br/>

          <label for="image_name"> Product Photo:</label>
            <input type="file" name="image_name" accept="Image/jpg"><br/><br/>

            <button type="submit">insert</button>
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
