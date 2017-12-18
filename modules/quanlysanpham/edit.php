<?php 
    $id=$_GET['id'];
    $sql="select * from sanpham where ID_SanPham='$id'";
    $objSTM=$objPDO->query($sql);
    $data=$objSTM->fetch(PDO::FETCH_ASSOC);
    
 ?>
<form action="modules/quanlysanpham/xuly.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data" onsubmit="return confirm('Xac nhan sua hay khong')">
<table width="500" border="0">
  <tr>
    <td colspan="2"><div align="center">Sửa sản phẩm</div></td>
  </tr>
  <tr>
    <td width="150">Mã sản phẩm :</td>
    <td><input type="text" name="masp" id="masp" value="<?php echo $data['ID_SanPham'] ?>" disabled="disable"></td>
  </tr>
  <tr>
    <td>Tên sản phẩm :</td>
    <td><input type="text" name="tensp" value="<?php echo $data['TenSanPham'] ?>"></td>
  </tr>
  <tr>
    <td>Số lượng tồn :</td>
    <td><input type="text" name="soluongton" value="<?php echo $data['SoLuongTon'] ?>"></td>
  </tr>
  <tr>
    <td>Mô Tả :</td>
    <!-- <td><input type="text" name="mota"></td> -->
    <td><textarea name="mota" cols="30" rows="5" ><?php echo $data['MoTa']; ?></textarea></td>
  </tr>
  <tr>
    <td>Hình Ảnh :</td>
    <td><input type="file" name="hinh" style="width:150px;margin-bottom:20px"><img src="modules/quanlysanpham/image/<?php echo $data['HinhAnh']?>" style="width:70px;height:70px;margin-top:20px"</td>
  </tr>
 <?php 
  $sql="select ID_DanhMuc from danhmucsp";
  $objSTM=$objPDO->query($sql);
  $data=$objSTM->fetchall(PDO::FETCH_ASSOC);
 ?>
 <tr>
  <td>Mã danh mục SP :</td>
  <td><select name="iddanhmuc" >
    <?php
    foreach($data as $row)
    {?>
      <option><?php echo $row['ID_DanhMuc'] ?></option> //echo $row['ID_DanhMuc']
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
  <td align="center"><input type="submit" name="suasp" id="sua" value="Sửa Sản Phẩm"></td>
 </tr>
 </table>
 </form>
