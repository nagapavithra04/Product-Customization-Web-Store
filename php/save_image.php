<?php 
  ob_start();
  session_start();
  include 'admin/db_connect.php';
?><?php
// Get the image data from the request body
$imgPath = $_POST['imgPath'];
$imgData = $_POST['imgData'];


// Insert the image data into your database table
$sql = "INSERT INTO custom_image (img_path) VALUES ('$imgData')";
$result = mysqli_query($conn, $sql);

if ($result) {
  $lastId = mysqli_insert_id($conn);
  $imgPath = 'images/' . $lastId . '.png'; // Generate a unique filename for the image
  $imgData = str_replace('data:image/png;base64,', '', $imgData); // Remove the data URL prefix
  $imgData = str_replace(' ', '+', $imgData); // Replace spaces with plus signs
  $imgData = base64_decode($imgData); // Decode the base64-encoded image data
  file_put_contents($imgPath, $imgData); // Save the image to disk
  echo 'Image saved successfully.';
} else {
  echo 'Error saving image.';
}
?>
