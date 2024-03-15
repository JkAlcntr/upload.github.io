<?php
$directory = "uploads/";
$images = glob($directory . "*.{jpg,jpeg,png,gif}", GLOB_BRACE);
foreach($images as $image) {
  echo "<img src='$image' alt='Uploaded Image'>";
}
?>
