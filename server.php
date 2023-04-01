<?php
require_once 'connect.php';

// Create a new connection object
$connection = new Connection('localhost', 'root', '', 'auctionsite');

// Connect to the database
$conn = $connection->connect();

// Retrieve data from the categories table
$sql = "SELECT * FROM category";
$result = $conn->query($sql);

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
        <a href="server.php">Home</a>
        <a href="#">Categories</a>
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
        <a href="#">About</a>
    </div>

    <!-- Page content -->
    <div style="margin-left: 200px;">
        <h1>All Items</h1>
        <table>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Starting Price</th>
                <th>Category ID</th>
            </tr>
            <?php
            // Retrieve data from the categories table
            $sql = "SELECT * FROM item";
            $result = $conn->query($sql);

            // Check if any rows were returned
            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["name"] . "</td><td>" . $row["description"] . "</td><td>" . $row["starting_price"] . "</td><td>" . $row["category_id"] . "</td></tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No items found.</td></tr>";
            }

            //$conn->close();
            ?>
        </table>
    </div>

</body>

</html>