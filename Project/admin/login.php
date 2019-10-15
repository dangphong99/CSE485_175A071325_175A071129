<?php  
  //echo password_hash('123', PASSWORD_BCRYPT);
  
  include_once 'config/myConfig.php'; 

  if (isset($_POST['sm_login'])) {
    
    $userName = mysqli_real_escape_string($conn, $_POST['user']);
    $password = mysqli_real_escape_string($conn, $_POST['passw']);
    

    $sql = "SELECT *FROM tbl_user WHERE email = '$userName'"; // câu lệnh sql
    $query = mysqli_query($conn, $sql); // truy vấn câu lệnh lên csdl
    $count = mysqli_num_rows($query); // Đếm số bản ghi trả ra
    $row = mysqli_fetch_assoc($query);

    if (isset($count) && $count == 1) {
      if (password_verify($password, $row['passw'])) {
        $_SESSION['id'] = $row['id'];
        $_SESSION['name'] = $row['name'];
        header("Location: admin/index.php");
      }
      
    }else{
      echo "<p style='color: red'>UserName hoặc Password không đúng!</p>";
    }

  }
?>
<!DOCTYPE html>
<html lang="">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <script type="text/javascript" src="js/index.js"></script>
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

</head>
<body>
     <div class="container">
      
      <div class="row" style="margin: 150px;">
        <div class="col-md-6 col-md-push-3" style="margin: 0 auto;">
        	 <form action="" method="POST">
          <legend>Đăng nhập hệ thống</legend>

          <div class="form-group">
            <label for="">Username</label>
            <input type="email" required name="user" class="form-control" value="<?php if(isset($userName)){ echo $userName; } ?>" placeholder="Nhập email của bạn">
          </div>

          <div class="form-group">
            <label for="">Password</label>
            <input type="password" required name="passw" class="form-control" value="" placeholder="Nhập pass">
          </div>

          <button type="submit" name="sm_login" class="btn btn-primary">Đăng nhập</button>
          <span>Nếu bạn chưa có tài khoản? <a href="index.php?page=register" style="color: red;">Đăng ký</a></span>
        </form>
      </div>
    </div>
  </div>
</body>
</html>