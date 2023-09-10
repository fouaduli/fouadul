<?php
session_start();
include "./database/env.php";
 $query = "SELECT * FROM posts ";
  $response = mysqli_query( $conn,$query);
 $posts = mysqli_fetch_all($response , 1);
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <title>Document</title>
</head>
<body>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="./index.php">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./index.php"> Add post</a>   
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./allpost.php">All post</a>
       </li>
    </div>
  </div>
</nav>

<!--table  -->
<div class="col-lg-6 mx-auto mt-4 ">
<table class="table">
<tr>
    <th>#</th>
    <th>title</th>
    <th>detail</th>
    <th>author</th>
</tr>
<?php 
if (count($posts) > 0 ){


foreach ( $posts as $key=>$post){
  ?>
  <tr>
     <td><?= ++$key ?></td>
     <td><?= $post['title']  ?></td>
     <td><?= strlen($post['detail']) >  50 ?  substr($post['detail'], 0, 50 ). '...' : $post['detail'] ?></td>
     <td><?= $post ['author']?></td>
  </tr>
 <?php
}
} else {
  ?>
  <tr>
  <td colspan="4" class="text-center" > 
<h2>on data😂</h2>
  </td>
</tr>
<?php
}
?>
</table>
</div>

<div class="toast <?= isset($_SESSION['mag']) ? "show" : ""?>" style="position: absolute; bottom : 50px; right: 50px" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header">
    <strong class="me-auto">post </strong>
    <small>10 s</small>
    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
  <div class="toast-body">
  your post has been inserted
  </div>
</div>
</body>
</html>

<?php

session_unset();
?>