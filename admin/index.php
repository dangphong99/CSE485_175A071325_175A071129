<?php 
 session_start();

if (isset($_SESSION['id'])) {
    header("Location: admin/");
  }

 include_once 'config/myConfig.php'; 
?> 
<!DOCTYPE html>
<html lang="">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <script type="text/javascript" src="js/index.js"></script>
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

</head>
<body>
	 <div class="container">
      
      <div class="row" style="margin: 150px;">
        <div class="col-md-6 col-md-push-3" style="margin: 0 auto;">
           <?php 
          
            if (isset($_GET['page'])) {
              $page = $_GET['page'];
            }else{ $page = 'login'; }
          
            switch ($page) {
              case 'register':
                include 'register.php';
                break;
              
              case 'login':
                include 'login.php';
                break;
          
              default:
                echo "<h3 style='color: red;'>EROR 404 trang không tồn tại!</h3>";
                break;
            }
          
           ?>
        </div>
      </div>

    </div>
    
</body>
</html>