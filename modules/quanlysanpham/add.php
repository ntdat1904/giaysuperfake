<script type="text/javascript" >
 function ktra()
 {
     tensp = document.getElementById('ten').value;
    soluongton=document.getElementById('slt').value;
    mota=document.getElementById('mt').value;
     if (tensp=='')
     {
         alert('nhập tên sản phẩm'); return false; 
     }
     if (soluongton=='')
     {
         alert('chưa nhập số lượng tồn'); return false; 
     }
     if (mota=='')
     {
         alert('chưa thêm mô tả cho sản phẩm'); return false; 
     }
 }
</script>
<form action="modules/quanlysanpham/xuly.php" method="post" enctype="multipart/form-data" onSubmit="return ktra()" >
<table width="500" border="0">
  <tr>
    <td colspan="2"><div align="center">Thêm sản phẩm</div></td>
  </tr>
  <tr>
    <td width="150">Mã sản phẩm :</td>
    <td><input type="text" name="masp" id="ma" disabled="disable"></td>
  </tr>
  <tr>
    <td>Tên sản phẩm :</td>
    <td><input type="text" name="tensp" id="ten"></td>
  </tr>
  <tr>
    <td>Số lượng tồn :</td>
    <td><input type="text" name="soluongton" id="slt"></td>
  </tr>
  <tr>
    <td>Mô Tả :</td>
    <!-- <td><input type="text" name="mota"></td> -->
    <td><textarea name="mota" id="mt" cols="30" rows="5"></textarea></td>
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
