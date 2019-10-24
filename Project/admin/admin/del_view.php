<?php  

	if (isset($_GET['id'])) {
		$id = (int)$_GET['id'];
		$sql = "DELETE FROM tbl_baiviet WHERE id = $id";
		$query = mysqli_query($conn, $sql);
		if ($query) {
			header("Location:view_baiviet.php");
		}else{
			echo "<script>alert('Lỗi !');";
			echo "location.href='index.php';</script>";
		}
	}
	?>