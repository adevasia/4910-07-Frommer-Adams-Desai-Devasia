<?php
$msg = "";
$css_class = "";


$db = mysqli_connect("instance1.cxuvlwohim3v.us-east-1.rds.amazonaws.com", "master", "password", "cloud337");

if ($db->connect_error) {
            echo("Connection failed");
        }
        

if(isset($_POST['save-user'])) {
  echo "<pre>",print_r($_FILES['profileImage']['name']), "</pre>";
  
  $bio = $_POST['bio'];
  $profileImageName = time() . '_' . $_FILES['profileImage']['name'];
  
  //$target = 'images/' . $profileImageName;
  
  //if(move_uploaded_file($_FILES['profileImage']['tmp_name'], $target)) {
  $sql = "INSERT INTO usertest (profile_image, bio) VALUES ('$profileImageName','$bio')";
  if(mysqli_query($db, $sql)){
    $msg = "Image uploaded to database";
    $css_class = "alert-success";
  }else{
     $msg = "Failed to save user";
     $css_class = "alert-danger";
  }
  
  /*
  }else{
  $msg = "Failed to upload to upload to folder";
  $css_class = "alert-danger"; 
  }
  */
}