<?php
require_once 'includes/dbh.inc.php';
$file = $_FILES["file"];
$name = $file["name"];
$id = $_POST['id'];
$textt = $_POST['userTextOutput'];
$path = "uploads/" . basename($name);
$pic = mysqli_real_escape_string($conn,$path);
  if ($file["error"] > 0 && $textt = null )
    {
    echo "Return Code: " . $file["error"] . "<br />";
    header("Location: index.php?ImgUpdate=failed");
    }else{   
      if ($file['size'] == 0) {
          $sql = "UPDATE images SET image='$textt' WHERE id = $id";
          mysqli_query($conn, $sql);
          header("Location: index.php?ImgUpload=UpdateTextSuccess");
      } if (file_exists("uploads/" . $name)) {
      $sql = "UPDATE images SET name='$pic',image='$textt' WHERE id = $id";
      mysqli_query($conn, $sql);
      header("Location: index.php?ImgUpdate=fileAlreadyExists,Success");
      }
    else
      {
      $sql = "UPDATE images SET name='$pic',image='$textt' WHERE id = $id";
      mysqli_query($conn, $sql);
      move_uploaded_file($file["tmp_name"],
      "uploads/" . $name);
      echo "Stored in: " . "uploads/" . $name; 
      }
      header("Location: index.php?ImgUpdate=Success");
    }