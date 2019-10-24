<?php 
	
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$sqlSelec = "SELECT *FROM tbl_baiviet WHERE id = $id";
		$querySelec = mysqli_query($conn, $sqlSelec);
		$rowSelec = mysqli_fetch_array($querySelec);
	}else{
		header("Location: index.php");
	}

	if (isset($_POST['submit'])) {
		$tenbaiviet=$_POST['name'];
		$ngayviet=$_POST['ngayviet'];
		$noidung=$_POST['description'];

		$sql="UPDATE tbl_baiviet set name='$tenbaiviet' , ngayviet='$ngayviet', des='$noidung' where id=$id";
		$query=mysqli_query($conn,$sql);
		if ($query) {
			header("Location: index.php");
		}else{
			echo "Lỗi không sửa dc!";
		}
	}
 ?>
<form action="" method="POST" role="form">
	<legend>Sửa bài viết</legend>
	<div class="form-group">
		<label for="">Tên bài viết </label>
		<input type="text" name="name" class="form-control" required value="<?php echo $rowSelec['name']; ?>">
	</div>
	<div class="form-group" >

		<label for="">Mô tả </label>
		<textarea class="form-control" name="description" id="description" cols="30" rows="10">
			<?php echo $rowSelec['des'] ?>
		</textarea>
		<script>
			CKEDITOR.replace('description');
		</script>
	</div>
	<div class="form-group">
		<label for="">Ngày viết </label>
		<input type="date" name="ngayviet" class="form-control" required value="<?php echo $rowSelec['ngayviet']; ?>">
	</div>


	<button type="submit" name="submit" class="btn btn-primary">Cập nhật</button>
</form>