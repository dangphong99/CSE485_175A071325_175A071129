<?php  
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$sqlSelect = "SELECT *FROM tbl_hocvien WHERE id_hocvien = $id";
		$querySelect = mysqli_query($conn, $sqlSelect);
		$rowSelect = mysqli_fetch_array($querySelect);
	}else{
		header("Location: index.php");
	}

	if (isset($_POST['update_member'])) {
		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$e_mail = $_POST['e_mail'];
		$address = $_POST['address'];

		$sql = "UPDATE tbl_hocvien SET tenHV = '$name', phoneHV = '$phone', email = '$e_mail', address = '$address' WHERE id_hocvien = $id";
		$query = mysqli_query($conn, $sql);
		if ($query) {
			$_SESSION['noti'] = 2;
			header("Location: index.php");
		}else{
			echo "Lỗi không sửa dc!";
		}
	}


?>

<form action="" method="POST" role="form">
	<legend>Sửa thông tin học viên</legend>

	<div class="form-group">
		<label for="">Họ tên<span style="color: red;">*</span></label>
		<input type="text" required class="form-control" name="name" value="<?php echo $rowSelect['tenHV']; ?>" />
	</div>

	<div class="form-group">
		<label for="">Số điện thoại<span style="color: red;">*</span></label>
		<input type="number" required class="form-control" name="phone" value="<?php echo $rowSelect['phoneHV']; ?>" />
	</div>

	<div class="form-group">
		<label for="">Email</label>
		<input type="mail" class="form-control" name="e_mail" value="<?php echo $rowSelect['email']; ?>" />
	</div>

	<div class="form-group">
		<label for="">Địa chỉ<span style="color: red;">*</span></label>
		<input type="text" required class="form-control" name="address" value="<?php echo $rowSelect['address']; ?>" />
	</div>

	<button type="submit" name="update_member" class="btn btn-primary">Cập nhật</button>
</form>