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
		<a href="#">Home</a>
		<a href="#">Categories</a>
		<a href="#">About</a>
	</div>

<!-- Page content -->
<div style="margin-left: 200px;">
	<h1>Categories</h1>
	<table>
		<tr>
			<th>ID</th>
			<th>Category Name</th>
		</tr>
		<?php
		// Retrieve data from the categories table
		$sql = "SELECT * FROM category";
		$result = $conn->query($sql);

		// Check if any rows were returned
		if ($result->num_rows > 0) {
			// Output data of each row
			while($row = $result->fetch_assoc()) {
				echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"] . "</td></tr>";
			}
		} else {
			echo "<tr><td colspan='2'>No categories found.</td></tr>";
		}

		$conn->close();
		?>
	</table>
</div>

</body>
</html>
