<?php
// Retrieve the item ID from the query string

if (isset($_GET["item_id"])) {
	$item_id = $_GET['item_id'];
}
// Connect to the database
$conn = new mysqli("localhost", "root", "", "auctionsite");

// Retrieve the item details from the database
$sql = "SELECT * FROM item WHERE id = $item_id";
$result = $conn->query($sql);

// Check if any rows were returned
if ($result->num_rows > 0) {
	// Output data of the first row
	$row = $result->fetch_assoc();
	$name = $row['name'];
	$description = $row['description'];
	$starting_price = $row['starting_price'];
	$image = $row['image'];
	$current_bid = $row['starting_price'];
} else {
	// If no rows were returned, display an error message
	echo "Error: Item not found";
	exit;
}

// If a bid has been submitted, update the current bid in the database
if (isset($_POST['amount'])) {
	$bid_amount = $_POST['amount'];
	if ($bid_amount > $current_bid) {
		$sql = "UPDATE bid SET amount = $bid_amount WHERE id = $item_id";
		if ($conn->query($sql) === TRUE) {
			$current_bid = $bid_amount;
			echo "Bid placed successfully";
		} else {
			echo "Error updating bid: " . $conn->error;
		}
	} else {
		echo "Bid must be higher than current bid";
	}
}

// Display the item details and bid form
?>
<!DOCTYPE html>
<html>

<head>
	<title>View Item -
		<?php echo $name; ?>
	</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
	    <!-- Top navigation bar -->
    <div class="topnav">
        <a href="server.php">Home</a>
		<a href="additem.php">Add Item</a>
        <a href="#">About</a>
    </div>

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
	<div style="width: 50%; margin: 0 auto; padding: 20px;">

		<img src="<?php echo $image; ?>" alt="<?php echo $name; ?>"
			style="max-width: 500px; max-height: 500px; margin-bottom: 20px;">
		<p style="font-size: 28px; margin-bottom: 15px;"><strong
				style="font-size: 18px; margin-bottom: 10px;">Name:</strong>
			<?php echo $name; ?>
		</p>
		<p style="font-size: 18px; margin-bottom: 10px;"><strong>Description:</strong>
			<?php echo $description; ?>
		</p>
		<p style="font-size: 18px; margin-bottom: 10px;"><strong>Starting Price:</strong>
			<?php echo $starting_price; ?>
		</p>
		<form method="post" action="">
			<label style="font-size: 18px; margin-bottom: 10px;">Place Bid:</label>
			<input type="text" name="bid_amount" style="font-size: 16px; padding: 5px; margin-right: 10px;">
			<button type="submit" style="font-size: 16px; padding: 5px 10px;">Submit</button>
			<a href="update_item.php?id=<?php echo $id; ?>">Update Item</a>
		</form>
	</div>

</body>

</html>