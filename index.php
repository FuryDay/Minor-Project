<html>


<?php
include "koneksi.php";
include("menu.php"); 		
?>

<head>
	
	<link href="style__.css" rel="stylesheet" type="text/css" />
	<title>Login</title>
	
</head>



<body>



<div id="back">
		<div id="content">
         <div class="products">
				 <?php
						$isi=mysql_query("SELECT * FROM ms_barang order by id  desc limit 8");
						$count=0;
						while($row=mysql_fetch_array($isi))
						{
							if($count==12)break;
					?>
								<ul>
					<li>
						<div class="product">
							<a href="detilproduct.php?id=<?=$row['id'];?>"  class="info">
								<span class="holder">
									<img src="Img/Products/<?=$row['image'];?>" alt="" />
									<span class="book-name"><?=$row['name'];?></span>
									<span class="author"><?=$row['type'];?></span>
									<span class="description"><p><?=substr($row['description'],0,60);?>.....</p></span>
								</span>
							</a>
							<a href="detilproduct.php?id=<?=$row['id'];?>" class="buy-btn">BUY NOW <span class="price"><span class="low">Rp</span> <?=$row['price'];?></span></a>
						</div>
					</li>
					</ul>
							
							<?php 
							$count++;
						} 
						?>
						
		</div>
		<div class="cl">&nbsp;</div>
</div>
</div>


<?php include ("footer.php");
?>

</body>
		