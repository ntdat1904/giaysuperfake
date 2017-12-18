<div class="content-left">
	<?php 
		if(isset($_GET['ac'])){
			$tam=$_GET['ac'];
		}else{
			$tam='';
		 }if($tam=='them'){
		 	include('modules/quanlysanpham/add.php');
		}if($tam=='sua'){
			include('modules/quanlydonhang/edit.php');
		}
	 ?>
</div>
<div class="content-right">
	<?php 
		include('modules/quanlydonhang/lietke.php');
	 ?>
</div>