<?php
session_start();

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
<div class="card col-lg-4 mx-auto mt-3">
<div class="crad-header mx-auto">
 Enter Add post
</div>
<div class="crad-body">
<form action="./controller/steorpost.php" method="$_POST"> 
<input  name="title"
  value="<?= isset( $_SESSION['old']['title']) ? $_SESSION['old']['title'] : ''?>"
class="form-control my-3 "  type="text" placeholder="Enter your post title">
<?php 
if (isset($_SESSION['form_errors'] ['title_error'])){
?>
  <span class="text-danger"> <?=   $_SESSION['form_errors'] ['title_error']?></span>
<?php
}
?>
<textarea name="detail"  class="form-control my-3" placeholder="Enter your detail"><?= isset($_SESSION ['old'] ['detail']) ? $_SESSION['old']['detail'] :"" ?></textarea>


<?php
if (isset($_SESSION['form_errors'] ['detail_errors'])){
  ?>
  <span class="text-danger"> <?=   $_SESSION['form_errors'] ['detail_errors']?></span>
  <?php
}
?>
<input 
 value="<?= isset( $_SESSION['old']['author']) ? $_SESSION['old']['author'] : ''?>"

name="author" class="form-control my-3" type="text" placeholder="Enter your post name">
<button class="btn btn-info">subimt your post </button>
</form>
</div>
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