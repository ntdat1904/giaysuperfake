<?php
//Load cac file can thiet cho ung dung
include "config/config.php";
include ROOT."/include/function.php";
spl_autoload_register("loadClass");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<link rel="stylesheet" type="text/css" href="fonts/glyphicons-halflings-regular.woff"/>
<title>Products</title>
</head>
<body>
<?php /*
$objPdo = new PDO("mysql:host=localhost; dbname=dbquanlygiay", "root", "");
$objPdo->query("set names 'utf8' ");*/
?>
<?php /*
$sql = "SELECT
sanpham.HinhAnh,
sanpham.TenSanPham,
chitietbanggia.Gia
FROM
chitietbanggia ,
sanpham
"; $objStm = $objPdo->query($sql);
$data = $objStm->fetchAll(PDO::FETCH_ASSOC);*/
	$obj = new Db();//tu dong load file classes/Db.class.php
	$product = new Products();
	/*$rows = $obj->select("SELECT sanpham.HinhAnh,
					sanpham.TenSanPham,
					chitietbanggia.Gia
					FROM
					chitietbanggia ,
					sanpham");*/
	$data = $product->getAll();
?>
<!--Top-->
<div class="container-fluid" id="header">
    		<div class="container">
				<div class="row" id="title">
					<div class="col-sm-8 loichao"></div>
                    <div class="col-sm-4 text-login">
						<ul class="list-inline" >
						  <li><a class="login" href="">Log in</a><small style="color: #656262"> or </small><a class="login" href="">Create an account</a>	</li>
						</ul>
					</div>
					<div style="clear:both"></div>
				</div>	
			</div>
		</div>
    <div style="clear:both"></div>
    <!--Banner-->
    <div style="clear:both"></div>
    <!--Menu Tổng -->
    <div class="container-fluid" id="menu">
		<nav class="navbar navbar-expand-xl navbar-light bg-faded">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-content" aria-controls="nav-content" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
			</button>

		<!-- Brand -->
<a class="navbar-brand" href="Newspaper.html"><img src="images/logo.PNG"/></a>
		<!-- Links -->
<div class="collapse navbar-collapse" id="nav-content">   
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="text.php">Trang Chủ</a>
				</li>
 			   	<li class="nav-item">
					<a class="nav-link" href="gocnhin.html">Tin Tức</a>
				</li>
                <li class="nav-item">
					<a class="nav-link" href="text2.php">Sản Phẩm</a>
				</li>
                <li class="nav-item">
        			<a class="nav-link" href="kinhdoanh.html">Danh Mục</a>	
     			</li>                          
 			</ul>
          	<!-- Search -->
			<form class="form-inline" role="search">
				<input type="text" class="form-control">
				<button type="submit" class="btn btn-secondary">Search</button>
			</form>
			</div>
		</nav>
   </div>
   <div style="clear:both"></div>
   <div class= "container-fluid product">
	   <div class=" container">
	   <div class="row">
		   <div class="col-md-9 products" ><span>Quản lý</span>
			</div>
			 <div class=" col-md-3 " >
				 <ul class="row bread" style="list-style-type: none;" >
				  <li><a href="index.html" style="color: #686868;text-decoration: none">Quản lý Sản Phẩm&nbsp;</a>/&nbsp;</li>
				  <li><a href="products.html" style="color: #686868;text-decoration: none">Quản lý đơn hàng&nbsp;</a>/&nbsp;</li>
				  <li class="active">Products View</li>
				</ul>
			</div>
			</div>
			</div>
   </div>
   
   	<!--Side-->
    <div class="container mid">
    <div class="row">
		<div class="col-md-3">
			<div class="filtereds" with="171px" height="180px">
			<div style="background-color: #47BAC1;border: solid #47BAC1 ;padding: 4px;">Danh mục</div>
				<div class="filtered">Nam (n)</div>
				<div class="filtered">Nữ (n)</div>
				<div class="filtered">Mùa Hè (n)</div>
				<div class="filtered">Mùa Đông (n)</div>
				<div class="filtered">Thể Thao (n)</div>
				<div class="filtered" style="border-bottom: solid #DBDBDB">Thời Trang</div>
			</div>
			<div class="filtereds" with="171px" height="180px">
			<div style="background-color: #47BAC1;border: solid #47BAC1 aqua ;padding: 4px;">Price</div>
				<div class="filtered">	&#60;2000000</div>
				<div class="filtered">200000-900000</div>
				<div class="filtered" style="border-bottom: solid #DBDBDB">	&#62;900000</div>
			</div>
			<div  class="filtereds"  with="171px" height="180px">
			<div style="background-color: #47BAC1;border: solid #47BAC1 ;padding: 4px;">Size</div>
				<div class="filtered">39</div>
				<div class="filtered">40</div>
				<div class="filtered">41</div>
				<div class="filtered">42</div>
				<div class="filtered">43</div>
				<div class="filtered" style="border-bottom: solid #DBDBDB">44</div>
			</div>
		</div>
 		<div class="col-md-9 " >
		  <div class="row"  >
		 		<?php
				foreach($data as $row)
				{
					$image=$row["HinhAnh"];
				?>
			  <div  class="detail">
				  <a href="#" class="thumbnail">
					  <img src="images/<?php echo $image;?>" with="171px" height="180px" alt="feature-collection-image" />
					</a>
						<p class="name"><?php echo $row["TenSanPham"];?></p>
						<p class="price"><?php echo $row["Gia"];?></p></div>
				<?php
				}
				?>
				 </div>
			</div>
		<div class="col-md-3"></div>
		<div class="col-md-9 container-fluid ">
			<ul style="list-style-type: none" class="row pager">
			  <a href="#" class="paper-text"> <li class="previous" style="border-radius: 25px; border: 2px solid #868484;">Previous</li></a>
			  <a href="#" class="paper-text"><li class="next"  style="border-radius: 25px; border: 2px solid #868484;">Next</li> </a>
			</ul>
</div>
		</div>
    </div>
    <!--footer-->
    <div>
    <div style="border: solid 4px #47BAC1"></div>
    	<div class="container-fluid text-center box" style="background-color:#252525; color: #868484">
			<strong style="color: black">BIG</strong><strong style="color: #47BAC1">BAG</strong>: Giày SUPERFake tốt nhất<br><strong style="color: black">Xem thêm :</strong>
             giaysuperfake.tk<br />
			<strong style="color: black">Hotline:</strong> 012xxxxxxxx – 098xxxxxx&nbsp;&nbsp;&nbsp;<strong style="color: black">Adress:</strong>123 đường abc, phường 8 , quận 1.
 
        </div>    
    </div>
    	
        <div style="clear:both"></div>
</body>
</html>