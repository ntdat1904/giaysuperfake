<?php 
	include 'modules/config.php';
	$sql = "select * from sanpham ";
	$sanpham = $objPDO->query($sql);
	$n = $sanpham ->rowCount();
	echo "Có $n sản phẩm !";
	$data = $sanpham->fetchAll(PDO::FETCH_ASSOC);
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<title></title>
 	<link rel="stylesheet" href="">
 </head>
 <body>
 	<form action="add.php" method="post" enctype="multipart/form-data">
 	<table border="1">
 		<tr>
 			<th width="50">Mã Sản Phẩm</th>
 			<th width="200">Tên Sản Phẩm</th>
 			<th width="50">Số Lượng Tồn</th>
 			<th width="200">Mô Tả</th>
 			<th width="100">Hình Ảnh</th>
 			<th width="50">Mã Danh Mục SP</th>
 			<th width="50">Mã Nhà Cung Cấp</th>
 			<th colspan="2">Quản lý</th>
 		</tr>
 			<?php
 			 	foreach($data as $row)
 			 	{$m = $row['ID_SanPham'];
 			 		?>
 		<tr>
 			<td><?php echo $row['ID_SanPham'] ?></td>
 			<td><?php echo $row['TenSanPham'] ?></td>
 			<td><?php echo $row['SoLuongTon'] ?></td>
 			<td><?php echo $row['MoTa'] ?></td>
            <!-- <td><?php echo  $row['HinhAnh'] ?></td> -->
 			<td><img src="modules/quanlysanpham/image/<?php echo $row['HinhAnh'] ?>" style="width:150px;height:150px" /></td>
 			<td><?php echo $row['ID_DanhMucFK'] ?></td>
 			<td><?php echo $row['ID_NhaCungCapFK'] ?></td>
 			<td width="50"><a href="del.php?id=<?php echo $m;?>">Xóa</a></td>
 			<td width="50"><a href="edit.php?id=<?php echo $m;?>">Sửa</a></td>
 		</tr>
 		<?php } ?>
 	</table>
 	<br/>
 	<div align="center">
 	<tr>
 		<td>
 			<input type="submit" name="them" value="thêm"></td>
 	</tr>
 	</div>
 	
 	</form> 
 </body>
 </html>
