<?php
require("/var/config.php");
session_start();
$maxresult = mysqli_query($con, "SELECT photoid FROM PHOTOS WHERE owner = '" .$_SESSION["username"]. "' ORDER BY photoid DESC");
if (mysqli_num_rows($maxresult) == 0)
  $max = 1;
else
{
  $maxfetch = mysqli_fetch_array($maxresult);
  $max = $maxfetch["photoid"] + 1;
}

$target_dir = getcwd()."/images/";
$mysqlpath = "/images/" . $_SESSION["username"] . $max . basename($_FILES["fileToUpload"]["name"]);
$target_file = $target_dir . $_SESSION["username"] . $max . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        $cleansedurl = mysqli_real_escape_string($con, $mysqlpath);
        mysqli_query($con, "INSERT INTO PHOTOS (photoid, owner, uploaddate, photourl)
                            VALUES ('".$max."','".$_SESSION["username"]."', '".date("Y-m-d")."', '".$mysqlpath."')");
        mysqli_query($con, "UPDATE PEOPLE SET ppid='".$max."' WHERE username='".$_SESSION["username"]."'");
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
header("Location: ".$_POST["refer"]);
?>