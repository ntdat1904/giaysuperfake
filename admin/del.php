<?php
	include 'modules/config.php';
	$id=$_GET['id'];
	$sql="delete from sanpham where ID_SanPham='$id'";
	$objPDO->exec($sql);
	header('location:main.php');
 ?>