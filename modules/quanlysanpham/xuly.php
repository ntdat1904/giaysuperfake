<?php 
	include ('../config.php');
	$id=$_GET['id'];
	if(isset($_POST['themsp'])){
		//$ma=$_POST['masp'];
		$ten=$_POST['tensp'];
		$soluongton=$_POST['soluongton'];
		$mota=$_POST['mota'];
    /*$hinh= $_FILES["hinhanh"];
        $ten = $h["name"];
        $tam = $h["tmp_name"];*/
		$hinhanh=$_FILES['hinh']['name'];
		$hinhanh_tmp=$_FILES['hinh']['tmp_name'];
		move_uploaded_file($hinhanh_tmp,'image/'.$hinhanh);
    //move_uploaded_file($tam, $ten);
		$madanhmuc=$_POST['iddanhmuc'];
		$manhacungcap=$_POST['idnhacc'];

		$sql="insert into sanpham(TenSanPham,SoLuongTon,MoTa,HinhAnh,ID_DanhMucFK,ID_NhaCungCapFK) values('$ten','$soluongton','$mota','$hinhanh','$madanhmuc','$manhacungcap')";
		$objPDO->exec($sql);
		header('location:../../index.php?quanly=quanlysanpham&ac=them');
	}else if(isset($_POST['suasp'])){ 
		$masp=$_POST['masp'];
		$ten=$_POST['tensp'];
		$soluongton=$_POST['soluongton'];
		$mota=$_POST['mota'];

   		$hinhanh=$_FILES['hinh']['name'];
   		$hinhanh_tmp=$_FILES['hinh']['tmp_name'];
    	move_uploaded_file($hinhanh_tmp,'image/'.$hinhanh);

		$madanhmuc=$_POST['iddanhmuc'];
		$manhacungcap=$_POST['idnhacc'];
		if($hinhanh!=''){
		$sql="update sanpham set TenSanPham='$tensp',SoLuongTon='$soluongton',MoTa='$mota',HinhAnh='$hinhanh',ID_DanhMucFK='$madanhmuc',ID_NhaCungCapFK='$manhacungcap' where ID_SanPham='$id'";}
		else{
			$sql="update sanpham set TenSanPham = '$ten',SoLuongTon = $soluongton,MoTa ='$mota',HinhAnh='$hinhanh',ID_DanhMucFK=$madanhmuc,ID_NhaCungCapFK=$manhacungcap where ID_SanPham=$masp";}
    //echo $sql;
		$objPDO->exec($sql);
    header('location:../../index.php?quanly=quanlysanpham&ac=sua&id='.$id);

	}else{
		$sql="delete from sanpham where ID_SanPham='$id'";
		$objPDO->exec($sql);
		header('location:../../index.php?quanly=quanlysanpham&ac=them');
	}
 ?>