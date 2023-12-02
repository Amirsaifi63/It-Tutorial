<?php
// PROJECT UPDATE DATA
include "config.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Sanitize input and prevent SQL injection
  $id = isset($_POST['id']) ? mysqli_real_escape_string($conn, $_POST['id']) : null;
  $name = isset($_POST['name']) ? mysqli_real_escape_string($conn, $_POST['name']) : null;
  $description = isset($_POST['description']) ? mysqli_real_escape_string($conn, $_POST['description']) : null;
  $category_id = isset($_POST['category_id']) ? mysqli_real_escape_string($conn, $_POST['category_id']) : null;
  $client_id = isset($_POST['client_id']) ? mysqli_real_escape_string($conn, $_POST['client_id']) : null;
  $hour = isset($_POST['hour']) ? mysqli_real_escape_string($conn, $_POST['hour']) : null;

  if (!empty($_FILES['image']['name'])) {
    // Image handling
    $image_name = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $image_error = $_FILES['image']['error'];

    // Validate image type and size here

    // Move uploaded image to a safe location
    if (move_uploaded_file($image_tmp, __DIR__ . "/upload/" . $image_name)) {
      $sql = "UPDATE project SET name='$name', description='$description', category_id='$category_id', client_id='$client_id', hour='$hour', image='$image_name' WHERE id=$id";
    } else {
      // Handle image upload failure
      echo "Image upload failed.";
      exit;
    }
  } else {
    // No new image provided, update without image
    $sql = "UPDATE project SET name='$name', description='$description', category_id='$category_id', client_id='$client_id', hour='$hour' WHERE id=$id";
  }

  // Execute the query
  $result = mysqli_query($conn, $sql);

  if ($result) {
    echo "1"; // Success
  } else {
    echo "0"; // Error during update
  }
}
?>
