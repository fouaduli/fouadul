<?php
session_start();

include "../database/env.php";


$title = $_REQUEST ['title'];
$detail = $_REQUEST ['detail'];
$author = $_REQUEST ['author'];
$errors = [];
if ( empty ($title)){
    $errors ['title_error'] = "title koi?'";
} else if (strlen($title) > 50){
    $errors ['title_error'] ="aor kot";

}
if (empty($detail)){
    $errors ['detail_errors'] = "detail koi";
}

if (count($errors) > 0){

$_SESSION['old'] = $_REQUEST;

$_SESSION['form_errors'] = $errors;
header("Location: ../index.php");

} else {

$query = " INSERT INTO posts(title, detail, author) VALUES ('$title','$detail','$author')";

$resuil = mysqli_query($conn,$query);

  if ($resuil){
$_SESSION['mag'] = ' your post has been inserted';
  header("location: ../index.php");

  }
}