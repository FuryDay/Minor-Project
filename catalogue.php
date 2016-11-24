<html>




<?php 
include("koneksi.php");
include("menu.php");

if(isset($_SESSION['role'])!="user"){

	header('location:index.php');
}

$isi=mysql_query("select * from ms_catalogue ");


if(!empty($_GET['id']))
{

	$status="approved";
		mysql_query("UPDATE ms_catalogue SET status='$status' where id='$_GET[id]' ");

}
if(!empty($_GET['reject']))
{
	$status="rejected";
	mysql_query("UPDATE ms_catalogue SET status='$status' where id='$_GET[reject]' ");
}

if(!empty($_GET['publish']))
{
	$status="published";
		mysql_query("UPDATE ms_catalogue SET status='$status' where id='$_GET[publish]' ");
	
	$isi=mysql_query("SELECT * FROM detil_catalogue where id='$_GET[publish]' ");
	$data=mysql_fetch_array($isi);
	
	$gbr=$data['Image'];
	$path="./img/Catalogue/".$gbr;
	$newdes="./img/Products/";
copy($path,$newdes .$gbr);
	

	$insert="INSERT INTO ms_barang(name,type,quantity,price,description,image) VALUES ('$data[name]','$data[type]','$data[Quantity]','$data[Price]','$data[Description]','$data[Image]')";
							if(mysql_query($insert))
							{
							header("catalogue.php");
							} 
							else 
							{
								//header('location:insertitem.php');
							}
}


?>

<head>
 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>


	<link rel="stylesheet" href="style__.css" type="text/css">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Catalogue/</title>
	
<script>
    $(function() {
        var availableTags = 				
	<?php
										$isi=mysql_query("SELECT distinct type from ms_barang");
										echo '[';
										while($data=mysql_fetch_array($isi))
										{
									echo '"'.$data['type'].'", ';
										}
										echo ']';
?> 
		;
        $( "#tags" ).autocomplete({
            source: availableTags
        });
    });
</script>
	
	
	
</head>



	<body>
		<div id="back"> 

				<div id="content">
				
								<div class="products">
				
										<div class="col" id="form">
			
											<br/><br/>
											<table border="1" width="500px"  >
												<form method="post" enctype="multipart/form-data">
												
												<tr>
													<td> Username</td>
													<td >Product Name   </td>
													<td>Category</td>
													<td>Price</td>
													<td>Stock</td>
													<td>Description</td>
													<td>Image</td>
													<td>Status</td>
													<td>Action</td>
												</tr>
												
												<tr>
												
												<?php
													$isi=mysql_query("SELECT usr.username, 
													ct.* , 
													dc.name as name,
													dc.type as type,
													dc.price as price,
													dc.quantity as quantity,
													dc.description as description,
													dc.image as image
													FROM detil_catalogue dc inner join ms_catalogue ct on ct.id=dc.id join ms_user usr on usr.id=ct.userid ");
													
													
												while($data=mysql_fetch_array($isi))
														{
															$imagez="img/Catalogue/".$data['image'];
														echo"
															
															
															<tr align='center'>
															<td><a href='profile.php?id=$data[id]'>$data[username]</a></td>
															<td>$data[name]</td>
															<td >$data[type]</td>
															<td > Rp. $data[price]</td>
															<td > $data[quantity]</td>	
															<td > <textarea>$data[description]</textarea></td>
															<td > <img src=$imagez></td>				
															<td> $data[status]</td>
															";
														
															if($data['status']=="waiting for approval")
															{
															echo"
														<td>
																	<a href='catalogue.php?id=$data[id]'><input type='button' value='APPROVED'></a>
																	<a href='catalogue.php?reject=$data[id]'><input type='button' value='REJECTED'></a>
															</td>
															
															";
															}
															else if($data['status']=="approved")
															{
															echo"
																				<td>
																					<a href='catalogue.php?publish=$data[id]'><input type='button' value='PUBLISHED'></a>
																				</td>
															";
															}
															
															
															
															
															}?>
												</tr>
												
												</form>
											</table>	
											
									</div>
											<!-- End Products -->
												<h3> </h3>
											<br/><br/>
								</div>
			
				</div>

		</div>
		
<?php include("footer.php");?>
	</body>


</html>