<?php  
	$sql = 'SELECT *FROM tbl_hocvien';
	$query = mysqli_query($conn, $sql); // câu lênh truy vấn
	$count = mysqli_num_rows($query); // đếm xem có bao nhiêu bản ghi trả ra
	if ($count > 0) {
?>
	<h4>Học viên Nguyễn Tất Thành</h4>
	<?php  
		if (isset($_SESSION['noti']) && $_SESSION['noti'] == 1) {
	?>
			<div class="alert alert-success alert-dismissable view_noti" role="alert">
			  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			  <strong>Thêm mới</strong> thành công!
			</div>
	<?php
		}else if (isset($_SESSION['noti']) && $_SESSION['noti'] == 2){
	?>
			<div class="alert alert-success alert-dismissable view_noti" role="alert">
			  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			  <strong>Cập nhật</strong> thành công!
			</div>
	<?php
		}
		unset($_SESSION['noti']);
	?>

	<div class="row">
		<div class="col-md-6">
			<form action="index.php?page=search" method="POST" name="frm_search">
				<input type="number" class="form-control" name="key" placeholder="Nhập số điện thoại cần tìm" />
		</div>
		<div class="col-md-6">
				<button class="btn btn-primary" type="submit" name="submit">Tìm kiếm</button>
			</form>
		</div>
	</div>

	
	
	<div class="table-responsive">
		<table class="table table-hover"> 
			<thead>
				<tr>
					<th>STT</th>
					<th>Name</th>
					<th>Phone</th>
					<th>Email</th>
					<th>Address</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$dem = 0;
					while ($row = mysqli_fetch_array($query)) {
						$dem += 1;
				?>
					<tr>
						<td><?php echo $dem; ?></td>
						<td><?php echo $row['tenHV']; ?></td>
						<td><?php echo $row['phoneHV']; ?></td>
						<td><?php echo $row['email']; ?></td>
						<td><?php echo $row['address']; ?></td>
						<td>
							<a href="index.php?page=edit&id=<?php echo $row['id_hocvien']; ?>">
								<button class="btn btn-primary">Sửa</button>
							</a>
							<a onclick="return confirm('Bạn có thực sự muốn xóa học viên này không?');" href="index.php?page=del&id=<?php echo $row['id_hocvien']; ?>">
								<button class="btn btn-danger">Xóa</button>
							</a>
						</td>
					</tr>
				<?php
					}
				?>

			</tbody>
		</table>
	</div>
	<ul class="pagination">
  <li class="page-item"><a class="page-link" href="#">Previous</a></li>
  <li class="page-item"><a class="page-link" href="#">1</a></li>
  <li class="page-item"><a class="page-link" href="#">2</a></li>
  <li class="page-item"><a class="page-link" href="#">3</a></li>
  <li class="page-item"><a class="page-link" href="#">Next</a></li>
</ul>
<?php
	}else{
?>
	<div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>Dữ liệu học viên</strong> chưa có
	</div>
<?php
	}
?>