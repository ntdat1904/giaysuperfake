<?php 
	include 'modules/config.php';
	if(isset($_POST['themsp'])){
		$ma=$_POST['masp'];
		$ten=$_POST['tensp'];
		$soluongton=$_POST['soluongton'];
		$mota=$_POST['mota'];
    /*$hinh= $_FILES["hinhanh"];
        $ten = $h["name"];
        $tam = $h["tmp_name"];*/
		$hinhanh=$_FILES['hinh']['name'];
		$hinhanh_tmp=$_FILES['hinh']['tmp_name'];
		move_uploaded_file($hinhanh_tmp,'quanlysanpham/image/'.$hinhanh);
    //move_uploaded_file($tam, $ten);
		$madanhmuc=$_POST['iddanhmuc'];
		$manhacungcap=$_POST['idnhacc'];

		$sql="insert into sanpham(ID_SanPham,TenSanPham,SoLuongTon,MoTa,HinhAnh,ID_DanhMucFK,ID_NhaCungCapFK) values('$ma','$ten','$soluongton','$mota','$hinhanh','$madanhmuc','$manhacungcap')";
		$objPDO->exec($sql);
		header('location:main.php');
	}
 ?>
<form action="" method="post" enctype="multipart/form-data">
<table width="500" border="0">
  <tr>
    <td colspan="2"><div align="center">Thêm sản phẩm</div></td>
  </tr>
  <tr>
    <td>Mã sản phẩm :</td>
    <td><input type="text" name="masp" ></td>
  </tr>
  <tr>
    <td>Tên sản phẩm :</td>
    <td><input type="text" name="tensp"></td>
  </tr>
  <tr>
    <td>Số lượng tồn :</td>
    <td><input type="text" name="soluongton"></td>
  </tr>
  <tr>
    <td>Mô Tả :</td>
    <!-- <td><input type="text" name="mota"></td> -->
    <td><textarea name="mota" cols="45" rows="5"></textarea></td>
  </tr>
  <tr>
    <td>Hình Ảnh :</td>
    <td><input type="file" name="hinh"></td>
  </tr>
 <?php 
 	$sql="select ID_DanhMuc from danhmucsp";
 	$objSTM=$objPDO->query($sql);
 	$data=$objSTM->fetchall(PDO::FETCH_ASSOC);
 ?>
 <tr>
 	<td>Mã danh mục SP :</td>
 	<td><select name="iddanhmuc">
 		<?php
 		foreach($data as $row)
 		{?>
			<option><?php echo $row['ID_DanhMuc'] ?></option>
 		<?php } ?> 
 	</select></td>
 	<!-- <input type="submit" name="themsp" value="Them"></table> -->
 </tr>

 <?php 
 	$sql="select ID_NhaCungCap from nhacungcap";
 	$objSTM=$objPDO->query($sql);
 	$data=$objSTM->fetchall(PDO::FETCH_ASSOC);
 ?>
 <tr>
 	<td>Mã nhà cung cấp :</td>
 	<td><select name="idnhacc">
 		<?php
 		foreach($data as $row)
 		{?>
			<option><?php echo $row['ID_NhaCungCap'] ?></option>
 		<?php } ?> 
 	</select></td>
 	<!-- <input type="submit" name="themsp" value="Them"></table> -->
 </tr>
 <tr>
 	<td></td>
 	<td align="center"><input type="submit" name="themsp" value="Thêm Sản Phẩm"></td>
 </tr>
 </table>
 </form>
