SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `Productdata`
-- ----------------------------------------------------------------

-- Table structure for table `product`

CREATE TABLE products (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(255) NOT NULL,
    category VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL,
    rating FLOAT,
    image_name VARCHAR(255),
    quantity INT NOT NULL DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO `products` (`product_name`, `category`, `description`, `price`, `rating`, `image_name`, `quantity`)
VALUES 
("T-shirt with denim skirt", "Girls clothing", "This set includes a cute colorblock ruffle tee and a denim skirt. The tee features ruffle, button, and raw hem details with a round neckline. Made from rib knit material (93% polyester, 7% elastane) with regular sleeve and fit, offering medium stretch. The denim skirt is composed of 43% cotton, 31% viscose, and 26% polyester, providing durability and comfort. Perfect for versatile styling, from casual to dressy occasions.", 59, 4.98, "1.jpg", 50),
("T-shirt with Woven floral dress", "Girls clothing", "A trendy boho-inspired set featuring a spaghetti strap crop tee with plants and ditsy floral prints, complemented by a ruffle hem detail. Made from knitted fabric (100% cotton) for comfort. Paired with a long skirt crafted from woven fabric (95% polyester, 5% elastane) with a loose fit and slight stretch. Perfect for expressing your bohemian style with ease and comfort.", 49, 5.00, "2.jpg", 30),
("Shoulder Tee & Flare Leg Pants", "Girls clothing", "A casual set featuring a pink tee with letter patches, paired with long pants. The tee has a round neckline and short sleeves with a drop shoulder design. The pants are long and unlined, offering comfort and style. Perfect for a relaxed yet trendy look.", 39, 4.98, "3.jpg", 40),
("Mermaid formal dress with puff sleeves", "partywear", "A stunning party dress in burgundy featuring contrast sequin details and a zipper closure. The dress has a sweetheart neckline and short puff sleeves, adding a touch of elegance. With a high waistline and flared hem, it offers a flattering silhouette. Made from sequin material with a slight stretch (95% polyester, 5% elastane), ensuring comfort and style. Ideal for making a statement at any special occasion.", 149, 4.95, "4.jpg", 20),
("Solid Color Mesh Dress With Applique", "partywear", "A chic party dress in white featuring plain and plants patterns, adorned with delicate appliques and a zipper closure. The dress has a straps neckline and sleeveless design, exuding elegance and sophistication. With a high waistline and flared hem, it offers a flattering silhouette. Made from woven fabric with a slight stretch (95% polyester, 5% elastane), ensuring comfort and style. Perfect for making a statement at any party or special event.", 119, 4.93, "5.jpg", 15),
("Baggy wide leg denim jeans", "girls jeans", "Light wash denim jeans with a straight leg silhouette. Features include a zipper fly closure, pockets, split detail, and zipper embellishments. Designed with a natural waistline and a loose fit for comfort. Made from non-stretch denim fabric (90% cotton, 6% polyester, 4% viscose) with a polyester lining. Ideal for a casual and relaxed style.", 69, 4.98, "6.jpg", 25),
("White causal Baggy wide leg denim jeans ", "girls jeans", "Classic white denim jeans with a straight leg cut. Featuring a zipper fly closure, button detail, pockets, and zipper embellishments. Designed with a natural waistline and a long length. Crafted from non-stretch denim fabric (100% cotton) with a polyester lining for comfort. Offers a skinny fit for a sleek and stylish look. Ideal for versatile styling in any casual or semi-formal setting.", 59, 5.00, "7.jpg", 35),
("Dress & Headband", "Baby girl clothing", "A charming two-piece set in maroon featuring a heart pattern. The cami top is adorned with a bow and ruffle details, with spaghetti straps and a sleeveless design. The skirt is flared with a natural waistline and a short length. Both pieces are made from fabric with slight stretch (95% polyester, 5% elastane) for comfort. Suitable for girls, this set offers a regular fit and is perfect for various occasions. Easy to care for with machine wash or professional dry cleaning.", 29, 4.98, "8.jpg", 10),
("Baby Pink Short Sleeve Round Neck Jumpsuit", "Baby girl clothing", "A stylish jumpsuit in baby pink with a plain pattern. Features a round neckline and short sleeves for a chic look. Designed with a zipper closure for easy wear. The jumpsuit has a long length and offers medium stretch fabric for comfort and flexibility. Perfect for both casual outings and special occasions.", 39, 4.98, "9.jpg", 8),
("Mint Green Ruffle Smock Dress", "Baby girl clothing", "A charming smock dress in mint green, crafted from 100% cotton for ultimate comfort and breathability. Features include a round neckline, flounce sleeves, and a high waistline for a flattering silhouette. The dress boasts plain pattern with delightful details such as ruffle, bow front, and button front. Designed with a regular fit and flared hem for added style. Made from non-stretch fabric, ensuring durability and structure. Perfect for a casual day out or a special occasion.", 29, 4.96, "10.jpg", 12);
