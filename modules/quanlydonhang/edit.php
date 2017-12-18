<?php 
  // kt nếu tồn tại id thì mới show form sửa không thì k show
// mới load trang thì mạc định k xác định đc id truyền vô trừ khi truyền thẳng trên đường link 
    if(isset($_GET['id'])){
    $id=$_GET['id']; // <====== nó đây
    // echo $id; // <==== test xong r xóa
    $sql="select * from chitiethoadon where ID_ChiTietHoaDon='$id'";
    $objSTM=$objPDO->query($sql);
    $data=$objSTM->fetch(PDO::FETCH_ASSOC);
    
 ?>
<form action="modules/quanlydonhang/xuly.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data" onsubmit="return confirm('Xac nhan sua hay khong')">
<table width="500" border="0">
  <tr>
    <td colspan="2"><div align="center">Sửa sản phẩm</div></td>
  </tr>
  <tr>
    <td width="150">Mã hóa đơn:</td>
    <td><input type="text" name="mahd" id="mahd" value="<?php echo $data['ID_ChiTietHoaDon'] ?>" disabled="disable"></td>
  </tr>
  <tr>
    <td>Ngày Xuất :</td>
    <td><input type="date" name="ngayxuat" value="<?php echo $data['NgayXuat'] ?>"></td>
  </tr>
  <tr>
    <td>Số lượng :</td>
    <td><input type="text" name="soluong" value="<?php echo $data['SoLuong'] ?>"></td>
  </tr>
  <tr>
    <td>Đơn giá :</td>
    <!-- <td><input type="text" name="mota"></td> -->
    <td><input type="text" name="dongia" value="<?php echo $data['DonGia'] ?>"></td>
  </tr>
  <tr>
    <td>Tình trạng giao hàng: </td>
    <td><input type="text" name="tinhtranggh" value="<?php echo $data['TinhTrangGiaoHang'] ?>"></td>
  </tr>
  <tr>
    <td>Tình trạng thanh toán: </td>
    <td><input type="text" name="tinhtrangtt" value="<?php echo $data['TinhTrangThanhToan'] ?>"></td>
  </tr>
  <tr>
    <td>Tình trạng đơn hàng: </td>

    <td><input type="text" name="tinhtrangdh" value="<?php echo $data['TinhTrangDonHang'] ?>"></td>
  </tr>
  <!-- <tr>
    <td>Hình Ảnh :</td>
    <td><input type="file" name="hinh" style="width:150px;margin-bottom:20px"><img src="modules/quanlysanpham/image/<?php echo $data['HinhAnh']?>" style="width:70px;height:70px;margin-top:20px"</td>
  </tr> -->
 <?php 
  $sql="select ID_DonHang from donhang";
  $objSTM=$objPDO->query($sql);
  $data=$objSTM->fetchall(PDO::FETCH_ASSOC);
 ?>
 <tr>
  <td>Mã danh mục SP :</td>
  <td><select name="iddonhang" >
    <?php
    foreach($data as $row)
    {?>
      <option><?php echo $row['ID_DonHang'] ?></option> <!-- //echo $row['ID_DanhMuc'] -->
    <?php } ?> 
  </select></td>
  <!-- <input type="submit" name="themsp" value="Them"></table> -->
 </tr>

 <?php 
  $sql="select ID_SanPham from sanpham";
  $objSTM=$objPDO->query($sql);
  $data=$objSTM->fetchall(PDO::FETCH_ASSOC);
 ?>
 <tr>
  <td>Mã nhà cung cấp :</td>
  <td><select name="idsanpham">
    <?php
    foreach($data as $row)
    {?>
      <option><?php echo $row['ID_SanPham'] ?></option>
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

 <?PHP } ?>
