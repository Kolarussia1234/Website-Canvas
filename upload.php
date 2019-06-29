<?php
require_once 'includes/dbh.inc.php';
$file = $_FILES["file"];
$name = $file["name"];
$textt = $_POST['userTextInput'];
$path = "uploads/" . basename($name);
$pic = mysqli_real_escape_string($conn,$path);
  if ($file["error"] > 0 && $textt = null) {
    echo "Return Code: " . $file["error"] . "<br />";
    header("Location: index.php?ImgUpload=failed");
    } else {   
      if($file["size"] == 0) {
          $sql = "INSERT INTO images(name,image) VALUES ('','$textt')";
          mysqli_query($conn, $sql);
          header("Location: index.php?ImgUpload=TextUpload");
      } elseif (file_exists("uploads/" . $name)) {
          $sql = "INSERT INTO images(name,image) VALUES ('$pic','$textt')";
          mysqli_query($conn, $sql);
          header("Location: index.php?ImgUpload=fileAlreadyExists,Success");
      } else {
          $sql = "INSERT INTO images(name,image) VALUES ('$pic','$textt')";
          mysqli_query($conn, $sql);
          move_uploaded_file($file["tmp_name"],
          "uploads/" . $name);
          echo "Stored in: " . "uploads/" . $name; 
          header("Location: index.php?ImgUpload=Good");
     }
   }

    
