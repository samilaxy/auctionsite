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
    <!-- Top navigation bar -->
	<div class="topnav">
		<a href="#">Home</a>
		<a href="#">Categories</a>
		<a href="#">About</a>
	</div>
    
	<!-- Sidebar -->
	<div class="sidebar">
		<a href="">Home</a>
		<a href="#">Categories</a>
        <ul>
		<?php

		// Retrieve data from the categories table
		$sql = "SELECT * FROM category";
		$result = $conn->query($sql);

		// Check if any rows were returned
		if ($result->num_rows > 0) {
			// Output data of each row
			while($row = $result->fetch_assoc()) {
				echo "<li><a href='category_items.php?category_id=" . $row["id"] . "'>" . $row["name"] . "</a></li>";
			}
		} else {
			echo "<li>No categories found.</li>";
		}

		$conn->close();
		?></ul>
        <a href="category_items.php?category_id=<?php echo $row["id"]; ?>"><?php echo $row["name"]; ?></a>
		<a href="#">About</a>
	</div>

<!-- Page content -->
<div style="margin-left: 200px;">
	<h1>Items</h1>
    
	<table>
    <tr>
			<th>Name</th>
			<th>Description</th>
            <th>starting_price</th>
		</tr>
		<?php
		// Retrieve data from the categories table
		$sql = "SELECT * FROM item";
		$result = $conn->query($sql);

		// Check if any rows were returned
if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["name"] . "</td><td>" . $row["description"] . "</td><td>" . $row["starting_price"] . "</td><td>" . $row["category_id"] . "</td></tr>";
    }
} else {
    echo "<tr><td colspan='4'>No items found.</td></tr>";
}

$conn->close();
?>
	</table>
</div>

</body>
</html>
?>






// Check if any rows were returned
// Retrieve data from the items table for the selected category
            if (isset($_GET["category_id"])) {
                $category_id = $_GET["category_id"];
                $sql = "SELECT * FROM item WHERE category_id = $category_id";
                $result = $conn->query($sql);
                echo "$result";
                // Check if any rows were returned
                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row["name"] . "</td><td>" . $row["description"] . "</td><td>" . $row["starting_price"] . "</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No items found.</td></tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No category selected.</td></tr>";
            }

            $conn->close();