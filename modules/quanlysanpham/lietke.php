TRANG:
<?php 
	

	if(isset($_GET['trang'])){
		$get_trang=$_GET['trang'];
	}else{
		$get_trang='';
	}
	if($get_trang=='' || $get_trang==1)
	{
		$trang1=0;
	}else{
		$trang1=($get_trang*5)-5;// lấy vị trí sản phẩm bắt đầu mỗi trang
	}
	$sql="select * from sanpham limit $trang1,5"; // trang1 (vị trí sản phẩm hiện tại) , lấy 5 sản phẩm
	$objStm = $objPDO->query($sql);
	$data = $objStm->fetchAll(PDO::FETCH_ASSOC);
	
	//-------//đếm số dòng có trong sản phẩm -> tương ứng đếm số sản phẩm
	$sql_sql="SELECT * FROM sanpham"; //duyệt table sản phẩm
	$result = $objPDO->query($sql_sql);
	$row = $result->rowCount(); // đếm số sản phẩm
	
	$a=ceil($row/5); // chia số sản phẩm cho 5 lấy số trang làm tròn lên (5 sp 1 trang, thích nhiều thì chia nhiều hơn)
	for($b=1;$b<=$a;$b++){
		// duyệt vòng lập in ra số trang
		echo '<a href="index.php?quanly=quanlysanpham&ac=them&trang='.$b.'" style="text-decoration:none;">'.' '. $b .' '.'</a>';
	}
	echo '<br>';
	echo 'Số sản phẩm là: '.$row;
 ?>
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
 			<td align="center"><?php echo $row['ID_SanPham'] ?></td>
 			<td align="center"><?php echo $row['TenSanPham'] ?></td>
 			<td align="center"><?php echo $row['SoLuongTon'] ?></td>
 			<td align="center"><?php echo $row['MoTa'] ?></td>
            <!-- <td><?php echo  $row['HinhAnh'] ?></td> -->
 			<td><img src="modules/quanlysanpham/image/<?php echo $row['HinhAnh'] ?>" style="width:150px;height:150px" /></td>
 			<td align="center"><?php echo $row['ID_DanhMucFK'] ?></td>
 			<td align="center"><?php echo $row['ID_NhaCungCapFK'] ?></td>
 			<td width="50" align="center"><a href="modules/quanlysanpham/xuly.php?id=<?php echo $m;?>">Xóa</a></td>
 			<td width="50" align="center"><a href="index.php?quanly=quanlysanpham&ac=sua&id=<?php echo $m;?>">Sửa</a></td>
 		</tr>
 		<?php } ?>
 	</table>
 	<?php

 		 // số sản phẩm sau khi duyệt ở trên
 		
?> 