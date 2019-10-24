<?php  
	if (isset($_POST['submit'])) {
		$key = trim($_POST['key']);
		$sql = "SELECT *FROM tbl_hocvien WHERE phoneHV LIKE '%".$key."%'";
		$query = mysqli_query($conn, $sql);
		$count = mysqli_num_rows($query);

		if ($count > 0) {
?>
		<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong>Có <?php echo $count; ?> kết quả tìm kiếm của: <?php echo $key; ?></strong> được tìm thấy!
		</div>
		<div class="table-responsive">
			<table class="table table-hover"> 
				<thead>
					<tr>
						<th>STT</th>
						<th>Name</th>
						<th>Phone</th>
						<th>Email</th>
						<th>Addres</th>
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
<?php
		}else{
			echo "<p style='color: red;'>Kết quả tìm kiếm không có!</p>";
		}
	}
?>

