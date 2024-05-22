<?php
class Product {
    // Properties
    private $productId;
    private $productName;
    private $category;
    private $description;
    private $price;
    private $rating;
    private $imageName;
    private $quantity; 

    // Constructor
    public function __construct($productId, $productName, $category, $description, $price, $rating, $imageName, $quantity) {
        $this->productId = $productId;
        $this->productName = $productName;
        $this->category = $category;
        $this->description = $description;
        $this->price = $price;
        $this->rating = $rating;
        $this->imageName = $imageName;
        $this->quantity = $quantity; // Initialize quantity
    }

    // Getters
    public function getProductId() {
        return $this->productId;
    }

    public function getProductName() {
        return $this->productName;
    }

    public function getCategory() {
        return $this->category;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getRating() {
        return $this->rating;
    }

    public function getImageName() {
        return $this->imageName;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    // Method to display product details as an HTML table row
    public function displayInTable() {
        $tableRow = "<tr>";
        $tableRow .= "<td><a href='view.php?productId={$this->productId}'>{$this->productId}</a></td>";
        $tableRow .= "<td>{$this->productName}</td>";
        $tableRow .= "<td>{$this->category}</td>";
        $tableRow .= "<td>{$this->description}</td>";
        $tableRow .= "<td>{$this->price}</td>";
        $tableRow .= "<td>{$this->quantity}</td>"; // Display quantity in table
        $tableRow .= "<td>{$this->imageName}</td>";
        $tableRow .= "</tr>";
        return $tableRow;
    }

    // Method to display product page
    public function displayProductPage() {
        $productPage = "<main>";
        $productPage .= "<h2>{$this->productName}</h2>";
        $productPage .= "<p>Category: {$this->category}</p>";
        $productPage .= "<p>Description: {$this->description}</p>";
        $productPage .= "<p>Price: {$this->price}</p>";
        $productPage .= "<p>Rating: {$this->rating}</p>";
        $productPage .= "<p>Quantity: {$this->quantity}</p>"; // Display quantity
        $productPage .= "<img src='images/{$this->imageName}' alt='{$this->productName}'>";
        $productPage .= "</main>";
        return $productPage;
    }
}
?>
