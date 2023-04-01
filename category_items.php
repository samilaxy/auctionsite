<?php
require_once 'connect.php';

// Create a new connection object
$connection = new Connection('localhost', 'root', '', 'auctionsite');

// Connect to the database
$conn = $connection->connect();

?>
<!DOCTYPE html>
<html>

<head>
    <title>My Auction Site</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <a href="server.php">
            <h3>Home</h3>
        </a>
        <a href="#">
            <h3>Categories</h3>
        </a>
        <ul>
            <?php
            // Retrieve the categories from the database
            $sql = "SELECT * FROM category";
            $result = $conn->query($sql);

            // Output each category as a list item
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<li><a href="category_items.php?category_id=' . $row["id"] . '">' . $row["name"] . '</a></li>';
                }
            }
            ?>
        </ul>
        <!-- <a href="category_items.php?category_id=<?php echo $row["id"]; ?>"><?php echo $row["name"]; ?></a> -->
        <a href="#">
            <h3>About</h3>
        </a>
    </div>

    <!-- Page content -->
    <div style="margin-left: 200px;">
        <h1>Vehicle</h1>
        <table>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Starting Price</th>
                <th>Image</th>
            </tr>
            <?php
            // Check if any rows were returned
            // Retrieve data from the items table for the selected category
            if (isset($_GET["category_id"])) {
                $category_id = $_GET["category_id"];
                $sql = "SELECT `name`, `description`, `starting_price`, `category_id` FROM `item` WHERE `category_id` = $category_id";
                $result = $conn->query($sql);

                // Check if any rows were returned
                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row["name"] . "</td><td>" . $row["description"] . "</td><td>" . $row["starting_price"] . "</td><td><img src='" . $row["image_path"] . "' alt='Item Image'></td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No items found.</td></tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No category selected.</td></tr>";
            }


            $conn->close();
            ?>
        </table>
    </div>

</body>

</html>