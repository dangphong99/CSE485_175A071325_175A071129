<?php

		// error_reporting(E_ALL);
  //   ini_set('display_errors', 1);

if (isset($_POST["submit"])) {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $password2 = password_hash($password, PASSWORD_BCRYPT);
    $re_password = $_POST['re_password'];
    $phone = $_POST["phone"];

    $sqlCheck = "SELECT email FROM tbl_user WHERE email = '$email'";
    $queryCheck = mysqli_query($conn, $sqlCheck);
    $count = mysqli_num_rows($queryCheck);
    $error_1 =0 ;
    if($password != $re_password){
      echo "<p class='alert alert-danger'>Mật khẩu không trùng khớp</p>";
      $error_1 += 1;
    }
    if($count > 0 ){
      $error = "Tài khoản đã tồn tại!";
      $error_1 += 1;
    }

    if ($error_1 == 0) {
        $sql = "INSERT into tbl_user(name,email,phone,passw) values('$name','$email',$phone,'$password2')";
        $query = mysqli_query($conn,$sql);

        if ($query) {
          $_SESSION['success'] = 1;
          header('location: index.php');
        }else{
          echo "";
        }
    }
   

}
?>
<form action="" method="POST">
  <legend>Đăng ký tài khoản</legend>

  <div class="form-group">
    <label for="">Họ tên <span style="color: red;">(*)</span></label>
    <input type="text" required class="form-control" name="name"  placeholder="Nhập họ tên của bạn">
  </div>

  <div class="form-group">
    <label for="">Tài khoản (Email) <span style="color: red;">(*) <?php if(isset( $error)){echo  $error;} ?></span></label>
    <input type="email" required class="form-control"  name="email" placeholder="Nhập email của bạn">
  </div>


<div class="form-group">
    <label for="">Nhập mật khẩu <span style="color: red;">(*)</span></label>
    <input type="password" class="form-control" name="password" placeholder="Nhập password của bạn">

  </div>

  <div class="form-group">
    <label for="">Nhập lại mật khẩu <span style="color: red;">(*)</span></label>
    <input type="password" class="form-control" name="re_password" placeholder="Xác nhận password của bạn">
  </div>

  <div class="form-group">
    <label for="">Số điện thoại <span style="color: red;">(*)</span></label>
   <input type="text" class="form-control" name="phone" placeholder="Nhập sđt  của bạn"><br><br>

  </div>
  

  <button type="submit" name="submit" class="btn btn-danger">Đăng ký </button>
  <span>Bạn đã có tài khoản <a href="index.php">Đăng nhập</a></span>

</form>

