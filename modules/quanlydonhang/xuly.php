<?php
	include ('../config.php');
	$id=$_GET['id'];
	if(isset($_POST['suasp'])){ 
		//$masp=$_POST['masp'];
		$ngayxuat=$_POST['ngayxuat'];
		$soluong=$_POST['soluong'];
		$dongia=$_POST['dongia'];
		$tinhtranggh=$_POST['tinhtranggh'];
		$tinhtrangtt=$_POST['tinhtrangtt'];
		$tinhtrangdh=$_POST['tinhtrangdh'];


   		// $hinhanh=$_FILES['hinh']['name'];
   		// $hinhanh_tmp=$_FILES['hinh']['tmp_name'];
    	// move_uploaded_file($hinhanh_tmp,'image/'.$hinhanh);

		$madonhang=$_POST['iddonhang'];
		$masanpham=$_POST['idsanpham'];
		$sql="update chitiethoadon set NgayXuat='$ngayxuat',SoLuong='$soluong',DonGia='$dongia',TinhTrangGiaoHang='$tinhtranggh',TinhTrangThanhToan='$tinhtrangtt',TinhTrangDonHang='$tinhtrangdh',ID_DonHangFK='$madonhang',ID_SanPhamFK='$masanpham' where ID_ChiTietHoaDon='$id'";
		
    //echo $sql;
		$objPDO->exec($sql);
    header('location:../../index.php?quanly=quanlydonhang&ac=sua&id='.$id);

	} 
 ?>