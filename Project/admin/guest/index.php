<?php 
  session_start(); 
  if (!isset($_SESSION['id'])) {
    header("location:index.php");
  }

  include_once '../config/myConfig.php'; 

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <script type="text/javascript" src="js/index.js"></script>
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>


</head>
<body>


 <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div>
   <img src="http://ntt.edu.vn/web/frontend/images/logo_ntt.png">
  </div>

    <div class="collapse navbar-collapse" id="navbarSupportedContent" style="margin-left: 600px;">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
         <a href="#" class="dropdown-toggle" data-toggle="dropdown">Hello: <?php if (isset($_SESSION['name'])) { echo $_SESSION['name']; } ?></b>
         </a>
          <a class="dropdown-item" href="logout.php">Đăng Xuất</a>
     

      </li>
      
    </ul>
    </div>
  
    </nav>
  </div>