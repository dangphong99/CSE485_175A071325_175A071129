<?php 
  session_start(); 
  if (!isset($_SESSION['id'])) {
    header("location:../index.php");
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
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

          <a class="dropdown-item" href="#">Thông tin </a>
          <a class="dropdown-item" href="../logout.php">Đăng Xuất</a>
        </div>

      </li>
      
    </ul>
    </div>
  
    </nav>
    
    <div class="row">
        <div class="col-md-12">
          <img src="" alt="" class="responsive" style="width: 100%;" />
        </div>
    </div>


    <div class="row main_member">
       
          <div class="col-md-3">
            <ul class="list-group">
              <li class="list-group-item"><b>QUẢN TRỊ</b></li>
              <li class="list-group-item">
                <a href="index.php">Danh sách học viên</a>
              </li>
              <li class="list-group-item">
                <a href="index.php?page=add_member">Thêm mới học viên</a>
              </li>
              <li class="list-group-item">
                <a href="index.php?page=post">Thêm mới bài viết </a>
              </li>
              <li class="list-group-item">
                <a href="index.php?page=view_baiviet">Xem bài viết </a>
              </li>
              
            </ul>
          </div>
          <div class="col-md-9" >
            <?php 
              if (isset($_GET['page'])) {
                $page = $_GET['page'];
              }else{
                $page = 'trang_chu';
              }

              switch ($page) {
                case 'add_member':
                  include 'add_member.php';
                  break;

                case 'edit':
                  include 'edit_member.php';
                  break;

                case 'del':
                  include 'del_member.php';
                  break;

                case 'trang_chu':
                  include 'list_member.php';
                  break;

                case 'search':
                  include 'search.php';
                  break;

                case 'post':
                  include 'post.php';
                  break;

                case 'view_baiviet':
                  include 'view_baiviet.php';
                  break;

                case 'edit_views':
                  include 'edit_views.php';
                  break;
                  
                case 'del_view':
                  include 'del_view.php';
                  break;
                
                default:
                  echo "<h4 style='color: red;'>ERROR 404, trang không tồn tại <span><a href='index.php' style='color: blue;'>Quay lại</a></span></h4>";
                  break;
              }
            ?>
          </div>
        </div>

         <div class=" text-center" style="background: #333;color: white;padding: 15px 0px; margin-top:20px;">
          Hệ thống học viên  <br>
          Copyright © 2019 All Rights Reserved
       
 </div>       
 





</body>
</html>

