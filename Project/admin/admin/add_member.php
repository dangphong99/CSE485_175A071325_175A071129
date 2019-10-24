<?php
	include_once '../config/myConfig.php';
	// Lấy ra thông tin khoa
	$sqlKhoa = "SELECT *FROM tbl_khoa";
	$queryKhoa = mysqli_query($conn, $sqlKhoa);

	if (isset($_POST['add_member'])) {
		$name = $_POST['name'];
		$phone = trim($_POST['phone']);
		$e_mail = $_POST['e_mail'];
		$idKhoa = $_POST['fac'];
		$address = $_POST['address'];
		$error = '';

		$sqlCheck = "SELECT phoneHV FROM tbl_hocvien WHERE phoneHV = '$phone'";
		$queryCheck = mysqli_query($conn, $sqlCheck);
		$num = mysqli_num_rows($queryCheck);
		
		if ($num == 1) {
			$error = "Số điện thoại đã tồn tại!";
		}else{
			$sql = "INSERT INTO tbl_hocvien(id_khoa, tenHV, phoneHV, email, address) VALUES($idKhoa, '$name', '$phone', '$e_mail', '$address')";
			$query = mysqli_query($conn, $sql);
			if ($query) {
				// echo "<script>alert('Thêm mới thành công!');";
				// echo "location.href='index.php';</script>";
				
				$_SESSION['noti'] = 1; // thêm mới thành công!
				header("Location: index.php");
			}else{
				echo "<p style='color: red;'>Thêm mới không thành công!</p>";
			}
		}

	}
?>

<form action="" method="POST" role="form">
	<legend>Thêm mới học viên</legend>

	<div class="form-group">
		<label for="">Họ tên<span style="color: red;"> *</span></label>
		<input type="text" required class="form-control" name="name" placeholder="Họ tên học viên..." value="<?php if(isset($name)){ echo $name; } ?>" />
	</div>

	<div class="form-group">
		<label for="">Số điện thoại<span style="color: red;"> * <?php if(isset($error) && !empty($error)){ echo $error; } ?></span></label>
		<input type="number" required class="form-control" name="phone" placeholder=""value="<?php if(isset($phone)){ echo $phone; } ?>" />
	</div>

	<div class="form-group">
		<label for="">Email</label>
		<input type="email" class="form-control" name="e_mail" placeholder="" value="<?php if(isset($e_mail)){ echo $e_mail; } ?>" />
	</div>

	<div class="form-group">
		<label for="">Khoa</label>
		<select class="form-control" name="fac">
			<?php 
				while ($row = mysqli_fetch_array($queryKhoa)) {
			?>
					<option value="<?php echo $row['id_khoa']; ?>"><?php echo $row['tenKhoa']; ?></option>
			<?php
				}
			?>
		</select>
	</div>

	<div class="form-group">
		<label for="">Địa chỉ<span style="color: red;"> *</span></label>
		<input type="text" required class="form-control" name="address" placeholder="Địa chỉ học viên..." value="<?php if(isset($address)){ echo $address; } ?>" />
	</div>

	<button type="submit" name="add_member" class="btn btn-primary">Thêm mới</button>
</form>