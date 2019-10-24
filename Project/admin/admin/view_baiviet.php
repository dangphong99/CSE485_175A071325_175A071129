<?php 
	include_once '../config/myConfig.php';
	$sql="SELECT * from tbl_baiviet";
	$query=mysqli_query($conn, $sql);
 ?>
<div class="table-responsive">
		<table class="table table-hover"> 
			<thead>
				<tr>
					<th>STT</th>
					<th>Tên bài viết</th>
					<th>Mô tả bài viết</th>
					<th>Ngày viết</th>
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
						<td><?php echo $row['name']; ?></td>
						<td><?php echo $row['des']; ?></td>
						<td><?php echo $row['ngayviet']; ?></td>
						
						<td>
							<a href="index.php?page=edit_views&id=<?php echo $row['id']; ?>">
								<button class="btn btn-primary">Sửa</button>
							</a>
							<a onclick="return confirm('Bạn có thực sự muốn xóa học viên này không?');" href="index.php?page=del_view&id=<?php echo $row['id']; ?>">
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