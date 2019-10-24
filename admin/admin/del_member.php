<?php  

	if (isset($_GET['id'])) {
		$id = (int)$_GET['id'];
		$sql = "DELETE FROM tbl_hocvien WHERE id_hocvien = $id";
		$query = mysqli_query($conn, $sql);
		if ($query) {
			header("Location: index.php");
		}else{
			echo "<script>alert('Lỗi ràng buộc hệ thống liên quan tới điểm học viên!');";
			echo "location.href='index.php';</script>";
		}
	}
	?>