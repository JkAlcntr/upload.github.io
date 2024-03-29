<?php
if(isset($_FILES['image'])) {
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["image"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  $check = getimagesize($_FILES["image"]["tmp_name"]);
  if($check !== false) {
    $uploadOk = 1;
  } else {
    $uploadOk = 0;
  }

  if (file_exists($target_file)) {
    $uploadOk = 0;
  }

  if ($_FILES["image"]["size"] > 500000) {
    $uploadOk = 0;
  }

  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
    $uploadOk = 0;
  }

  if ($uploadOk == 1 && move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    echo "Image uploaded successfully!";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
?>
