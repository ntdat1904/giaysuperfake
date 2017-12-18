<?php 
	$sql = "select * from chitiethoadon ";
	$objSTM = $objPDO->query($sql);
	$n = $objSTM ->rowCount();
	echo "Có $n hóa đơn !";
	$data = $objSTM->fetchAll(PDO::FETCH_ASSOC);
 ?>
<table border="1">
 		<tr>
 			<th width="50">Mã Hóa Đơn</th>
 			<th width="200">Ngày Xuất</th>
 			<th width="50">Số Lượng</th>
 			<th width="200">Đơn Giá</th>
 			<th width="50">Tình trạng giao hàng</th>
 			<th width="50">Tình trạng thanh toán</th>
 			<th width="50">Tình trạng đơn hàng</th>
 			<th width="50">Mã Đơn Hàng</th>
 			<th width="50">Mã Sản Phẩm</th>
 			<th colspan="2">Quản lý</th>
 		</tr>
 			<?php
 			 	foreach($data as $row)
 			 	{$m = $row['ID_ChiTietHoaDon'];
 			 	
 			 		?>
 		<tr>
 			<td align="center"><?php echo $row['ID_ChiTietHoaDon'] ?></td>
 			<td align="center"><?php echo $row['NgayXuat'] ?></td>
 			<td align="center"><?php echo $row['SoLuong'] ?></td>
 			<td align="center"><?php echo $row['DonGia'] ?></td>
            <!-- <td><?php echo  $row['HinhAnh'] ?></td> -->
 			<!-- <td><img src="modules/quanlysanpham/image/<?php echo $row['HinhAnh'] ?>" style="width:150px;height:150px" /></td> -->
 			<td align="center"><?php echo $row['TinhTrangGiaoHang'] ?></td>
 			<td align="center"><?php echo $row['TinhTrangThanhToan'] ?></td>
 			<td align="center"><?php echo $row['TinhTrangDonHang'] ?></td>
 			<td align="center"><?php echo $row['ID_DonHangFK'] ?></td>
 			<td align="center"><?php echo $row['ID_SanPhamFK'] ?></td>
 			 <!-- id = mã hóa đơn để qua hàm sửa nó lấy đc -->
 			<td width="50" align="center"><a href="index.php?quanly=quanlydonhang&ac=sua&id=<?php echo  $row['ID_ChiTietHoaDon']?>">Sửa</a></td>
 		</tr>
 		<?php } ?>
 	</table>