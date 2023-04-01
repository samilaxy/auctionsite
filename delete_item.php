<?php
  // Check if the form was submitted
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the ID of the item to be deleted
    $id = $_POST["id"];

    // Delete the item from the database
    $sql = "DELETE FROM item WHERE id = $id";
    $result = $conn->query($sql);

    if ($result) {
      echo "Item deleted successfully.";
    } else {
      echo "Error deleting item: " . $conn->error;
    }
  }
?>
