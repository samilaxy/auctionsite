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

    <!-- Page content -->
    <div style="margin-left: 200px;">


    <form method="POST" action="add_item.php">
  <label for="name">Name:</label>
  <input type="text" name="name" required><br>

  <label for="description">Description:</label>
  <textarea name="description" required></textarea><br>

  <label for="starting_price">Starting Price:</label>
  <input type="number" name="starting_price" required><br>

  <label for="category_id">Category:</label>
  <select name="category_id" required>
    <option value="">Select a category</option>
    <option value="1">Vehicle</option>
    <option value="2">House</option>
    <option value="2">Furniture</option>
    <option value="3">Computer</option>
    <!-- Add more options as needed -->
  </select><br>

  <input type="submit" value="Add Item">
  <?php
// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the form data
  $name = $_POST["name"];
  $description = $_POST["description"];
  $starting_price = $_POST["starting_price"];
  $category_id = $_POST["category_id"];

  // Validate the form data
  // ...

  // Insert the item into the database
  $sql = "INSERT INTO item (name, description, starting_price, category_id) VALUES ('$name', '$description', $starting_price, $category_id)";
  $result = $conn->query($sql);

  if ($result) {
    echo "Item added successfully.";
  } else {
    echo "Error adding item: " . $conn->error;
  }
}
?>

</form>

    
    </div>

</body>

</html>