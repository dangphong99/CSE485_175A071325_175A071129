<?php  
	// $conn = mysqli_connect("localhost", "root", "", "ntt") or die("Can't connect database");
	// if ($conn) {
	// 	// echo "Kết nối database thành công!";
	// 	mysqli_set_charset($conn, 'utf8');
	// }else{
	// 	echo "Lỗi kết nối!";
	// }

	// if (isset($_POST['submit'])) {
	// 	$des = $_POST['description'];
	// 	echo $des;
	// 	$sql = "INSERT INTO tbl_mota(des) VALUES('$des')";
	// 	$query = mysqli_query($conn, $sql);
	// }
	include_once '../config/myConfig.php';
	if (isset($_POST['submit'])) {
		$tenbaiviet = $_POST['name'];
		$mota = $_POST['description'];
		$ngayviet=$_POST['ngayviet'];
	$sql = "INSERT into tbl_baiviet(name,des,ngayviet) values ('$tenbaiviet','$mota','$ngayviet')";
	$query=mysqli_query($conn,$sql);

		
	}
?>
<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Demo CKeditor - CKFinder</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<script src="ckd/ckeditor.js"></script>
		<script src="ckf/ckfinder.js"></script>
	</head>
	<body>
		<div class="container">
			<div class="col-md-9">
				<form action="" method="POST" role="form">
					<legend>Thêm mới bài viết</legend>
					<div class="form-group">
						<label for="">Tên bài viết </label>
						<input type="text" name="name" class="form-control" required>
					</div>
					<div class="form-group" >

						<label for="">Mô tả </label>
						<textarea class="form-control" name="description" id="description" cols="30" rows="10"></textarea>
						<script>
							CKEDITOR.replace('description');
						</script>
					</div>
					<div class="form-group">
						<label for="">Ngày viết </label>
						<input type="date" name="ngayviet" class="form-control" required>
					</div>
					
				
					<button type="submit" name="submit" class="btn btn-primary">Thêm mới</button>
				</form>
			</div>
		</div>


		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>
	</body>
</html>