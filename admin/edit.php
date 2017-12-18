<?php 
	include 'modules/config.php';

 
    if(isset($_GET['id']))
    {
   $masp=$_GET['id'];
 }

	if(isset($_POST['themsp'])){
    $masp=$_POST['masp'];
		$ten=$_POST['tensp'];
		$soluongton=$_POST['soluongton'];
		$mota=$_POST['mota'];
    $hinhanh=$_FILES['hinh']['name'];
    $hinhanh_tmp=$_FILES['hinh']['tmp_name'];
    move_uploaded_file($hinhanh_tmp,'quanlysanpham/image/'.$hinhanh);
		$madanhmuc=$_POST['iddanhmuc'];
		$manhacungcap=$_POST['idnhacc'];
		$sql="update sanpham set TenSanPham = '$ten',SoLuongTon = $soluongton,MoTa ='$mota',HinhAnh='$hinhanh',ID_DanhMucFK=$madanhmuc,ID_NhaCungCapFK=$manhacungcap where ID_SanPham=$masp";
    //echo $sql;
		$objPDO->exec($sql);
    header('location:main.php');
	}

  $sql="select * from sanpham where ID_SanPham='$masp'";
  $objSTM=$objPDO->query($sql);
  $data=$objSTM->fetch(PDO::FETCH_ASSOC);

 ?>

<form action="" method="post" enctype="multipart/form-data">
<table width="500" border="0">
  <tr>
    <td colspan="2"><div align="center">Sửa Sản Phẩm</div></td>
  </tr>
  <tr>
    <td>Mã sản phẩm :</td>
    <td><input type="text" name="masp" value=" <?php echo $data['ID_SanPham']; ?> "  readonly></td>
  </tr>
  <tr>
    <td>Tên sản phẩm :</td>
    <td><input type="text" name="tensp" value=" <?php echo $data['TenSanPham']; ?>"></td>
  </tr>
  <tr>
    <td>Số lượng tồn :</td>
    <td><input type="text" name="soluongton" value=" <?php echo $data['SoLuongTon']; ?>"></td>
  </tr>
  <tr>
    <td>Mô Tả :</td>
    <td><textarea name="mota" cols="45" rows="5" ><?php echo $data['MoTa']; ?></textarea></td>
  </tr>
  <tr>
    <td>Hình Ảnh :</td>
    <!-- <td><input type="file" name="hinh"></td> -->
    <td><input type="file" name="hinh" style="width:150px;margin-bottom:20px"/><img src="modules/quanlysanpham/image/<?php echo $data['HinhAnh']?>" style="width:50px;height:50px;margin-top:20px" /> </td>
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
 </tr>

 <?php 
 	$sql="select ID_NhaCungCap from nhacungcap";
 	$objSTM=$objPDO->query($sql);
 	$data=$objSTM->fetchall(PDO::FETCH_ASSOC);
 ?>
 <tr>
 	<td>Mã nhà cung cấp :</td>
 	<td><select name="idnhacc" >
 		<?php
 		foreach($data as $row)
 		{?>
			<option><?php echo $row['ID_NhaCungCap'] ?></option>
 		<?php } ?> 
 	</select></td>
 </tr>
 <tr>
 	<td></td>
 	<td align="center"><input type="submit" name="themsp" value="Save"></td>
 </tr>
 </table>
 </form>
