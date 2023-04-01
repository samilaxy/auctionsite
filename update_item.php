<?php
// Retrieve the item ID from the URL parameter
$id = $_GET['id'];

// Retrieve the item information from the database
$sql = "SELECT * FROM item WHERE id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!-- Display a form with the current item information -->
<form method="POST" action="process_update_item.php">
  <label for="name">Name:</label>
  <input type="text" name="name" value="<?php echo $row['name']; ?>" required><br>

  <label for="description">Description:</label>
  <textarea name="description" required><?php echo $row['description']; ?></textarea><br>

  <label for="starting_price">Starting Price:</label>
  <input type="number" name="starting_price" value="<?php echo $row['starting_price']; ?>" required><br>

  <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
  <input type="submit" value="Update Item">
</form>

