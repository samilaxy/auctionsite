<?php
// Retrieve the item information from the form
$id = $_POST['id'];
$name = $_POST['name'];
$description = $_POST['description'];
$starting_price = $_POST['starting_price'];

// Update the item information in the database
$sql = "UPDATE item SET name = '$name', description = '$description', starting_price = '$starting_price' WHERE id = $id";
$result = $conn->query($sql);

if ($result) {
  // Redirect the user back to the item details page
  header("Location: item.php?id=$id");
} else {
  // Display an error message
  echo "Error updating item: " . $conn->error;
}
?>
