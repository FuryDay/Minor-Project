<?php
include("koneksi.php");
include("menu.php");
$current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
   


if(!empty($_GET['id']))
{
$isi=mysql_query("select * from ms_barang where id='$_GET[id]'");
$data=mysql_fetch_array($isi);


/* LOAD DATA SAMA GAMBAR DARI PRODUK*/
if(!empty($_GET['act']))
{

$act=$_GET['act'];
	

	if($act='qty')
	{

		$qty=$_POST['qty'];
		
		
		
		$stock=(int)$data['quantity'];
		$error = array();
		if (empty($qty))
		{
			$error['qty'] = 'Quantity must be filled';
		}
		else if(!preg_match('/[0-9]/',$qty))
		{
			$error['qty'] = 'Quantity must contain only numbers';  
		}
		else if($qty>$stock)
			{
				 $error['qty'] = 'Quantity must be less than or equal to the current stock'; 
			}
					
					if(empty($error))
					{                           
						$total=((int)$qty)*((int)$data['price']);
						$status="pending";
						$purchase="no";
						$id=$_SESSION['id'];
						$namme=$_SESSION['name'];
						
							if(mysql_query($insert))
							{
								header('location:cart.php');
							} 
							else 
							{
								header('location:index.php');
							}
					
					}
				
			}		
		

	}	
	
	



					
}
	

if($_SERVER['REQUEST_METHOD'] == "POST")
{


$name=$_POST['Name'];
$price=$_POST['Price'];
$stock=$_POST['Stock'];
$tipe=$_POST['Category'];
$description=$_POST['Description'];
$error = array();

if(empty($name))
					{
					  $error['name'] = 'Name must be filled';  
					} 
if(empty($description))
					{
					  $error['description'] = 'Description must be filled';  
					} 
					
if(empty($price))
					{
					  $error['price'] = 'Price must be filled';  
					} 
					else if(!preg_match('/[0-9]/',$price))
					{
					  $error['price'] = 'Price must contain only numbers';  
					}
					else if(((int)$price)<200000)
					{
					 $error['price'] = 'Price must equals or more than 200000';  
					} 
if(empty($stock))
					{
					  $error['stock'] = 'stock must be filled';  
					} 
					else if(!preg_match('/[0-9]/',$stock))
					{
					  $error['stock'] = 'stock must contain only numbers';  
					}
					else if(((int)$stock)<10)
					{
					 $error['price'] = 'Stock must equals or more than 10';  
					} 
if(empty($tipe))
					{
					  $error['tipe'] = 'Tipe gak boleh kosong';  
					} 

//validasi gambar
			if (empty($_FILES['image']['tmp_name']))
				{

				 $error['image'] = 'Image must be chosen';  
				} 
				else
				{

					$folder="./img/Products".'/';
					$type=$_FILES['image']['type'];     
					
					if($type=="image/jpg" || $type=="image/jpeg"||$type=="image/png"||$type="image/gif")     
						{                    
							$image = basename($_FILES['image']['name']);     		
						} 
					else 
						{

						  $error['image'] = 'Image must be chosen from a file with ".jpg", ".jpeg", ".gif" , ".png" format';  
						 } 

				} 
							if(empty($error))
							{
							echo "masuk";
										move_uploaded_file($_FILES['image']['tmp_name'], $folder.$_FILES['image']['name']);
					
							$update="UPDATE ms_barang SET name='$name',type='$tipe',quantity='$stock',price='$price',description='$description',image='$image' WHERE id='$_GET[id]' ";
							if(mysql_query($update))
							{
							echo "bbbbb";
								header('location:index.php');
							} 
							else 
							{
							echo "zxcxzc";
								//header('location:insertitem.php');
							}
						}


}

?>					
					
					
					



<html>

<head>
<link rel="stylesheet" href="style__.css" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Products</title>
</head>

<body>

<div id="back">
<?php 



					if(isset($_SESSION['role']))
					{
					
					$isi=mysql_query("select * from ms_user where role='$_SESSION[role]' and id='$_SESSION[id]'");
				$isi2=mysql_query("select * from ms_barang where id='$_GET[id]'");
				$data2=mysql_fetch_array($isi2);
								
								//============================================admin==========================================
						if($_SESSION['role']=="admin")
						{?>
					<form method="post" action="">
					<!--DETAIL PRODUCTS-->
						
						<div id="content">
							<div class="products">
								
									<div id="gbrinfo">
										<img src="Img/Products/<?=$data['image'];?>" />
								</div>
								
								<div id="info">
								<div class="col" id="form">
								
								<table boorder="1" width="350" style="margin-top:20px;"  >
									<tr>
										<td width="10" class="label">Name  </td>
										<td width="180" class="label"><input type="text" name="Name" value="<?=$data['name'];?>"></td>
								     	<td width="200"><div style="color:red"><?php echo isset($error['name']) ? $error['name'] : '';?></div>  </td>
								</tr>
								
							
								
									<tr>
										<td width="50" class="label">Price  </td>
										<td width="120" class="label"><input type="text" name="Price" value="<?=$data['price'];?>"></td>
									   <td width="200"><div style="color:red"><?php echo isset($error['price']) ? $error['price'] : '';?></div>  </td>
								  </tr>
								
								
								
									<tr>
										<td width="50" class="label">Stock  </td>
										<td width="120" class="label"><input type="text" name="Stock" value="<?=$data['quantity'];?>"></td>
										<td width="200"><div style="color:red"><?php echo isset($error['stock']) ? $error['stock'] : '';?></div>  </td>
								  </tr>
									
									<tr>
										<td width="50" class="label">Category  </td>
										<td width="120" class="label"><input type="text" name="Category" value="<?=$data['type'];?>"></td>
										<td width="200"><div style="color:red"><?php echo isset($error['Category']) ? $error['Category'] : '';?></div>  </td>
								</tr>
								
								<tr><td></br></td></tr>
								
									<tr>
										<td width="50" class="label">Description  </td>
										<td width="120" class="label"><textarea name="Description" style="height:200px;"> <?=$data['description'];?></textarea></td>
										<td width="200"><div style="color:red"><?php echo isset($error['description']) ? $error['description'] : '';?></div>  </td>
									</tr>
								
								
								<tr>
										 <td class="label">Image   </td>
										<td><input name="image" type="file" id="image"/></td>
										 <td width="200"><div style="color:red"><?php echo isset($error['image']) ? $error['image'] : '';?></div>  </td>
								</tr>
								
								
								</table>
								</div>
							
						</br>
								<div style='font-size:35px; margin-left:180px;' align='left'>
										
												
												
											
												<input type='submit' class='submit-btn' value='Edit'>
												<input type='reset' name='reset' value='Reset'>
												<div style="margin-top:10px;font-size:20px;color:red"><?php echo isset($error['qty']) ? $error['qty'] : '';?></div>
												
											
								</div>
								</div>
							</div>
									<div class="cl">&nbsp;</div>
									</form>
					<?php
					}
		
		
		//============================================USER==========================================
		else if($_SESSION['role']=="user")
		{?>
		<form method="post" action="cart_update.php">
						<div id="content">
									<div class="products">
		
				
							<h3>Purchase</h3>
							
						
						
						<div id="gbrinfo">
							<img src="Img/Products/<?=$data['image'];?>" />
						</div>
						
						<div id="info">
						<div class="col" id="form">
						
						<table border="1" width="350" style="margin-top:20px;"  >
							<tr>
							<td width="180" class="label" colspan="2"><?php echo $data['name'];?></td>
							</tr>
							
						
							
							<tr>
							<td width="50" class="label">Price  </td>
							<td width="120" class="label">Rp <?=$data['price'];?></td>
							</tr>
							
							
							
							<tr>
							<td width="50" class="label">Stock  </td>
							<td width="120" class="label"><?=$data['quantity'];?></td>
							</tr>
							
							<tr>
									<td width="50" class="label">Category  </td>
									<td width="120" class="label" ><?=$data['type'];?></td>
							</tr>
							
							<tr><td></br></td></tr>
							
							<tr>
							<td width="50" class="label">Description  </td>
							<td width="120" class="label"><?=$data['description'];?></td>
							</tr>
							
							
						
						</table>
						</div>
						</br>
						<div style='font-size:35px;' align='center'>
								
										
										<form method='POST' action="index.php">
									
										<!--AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA-->
										            <?php
													$vd=$data2['id'];
													echo 'Quantity <input type="text" name="product_qty" value="1" size="3" />';
													echo '<button class="add_to_cart">Add To Cart</button>';
													echo '<input type="hidden" name="product_code" value="'.$vd.'" />';
													echo '<input type="hidden" name="type" value="add" />';
													echo '<input type="hidden" name="return_url" value="'.$current_url.'" />';
													echo '</form>';
													?>
										<!--AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA-->
										</form>
									
						</div>
						</div>
						
								
						<!-- End Products -->
						</div>
						
					</div>
		<div class="cl">&nbsp;</div>
		
		
		</form>
		
		
		
		
		<?php
		}
		//============================================SUPLLIER==========================================
		else if($_SESSION['role']=="supplier")
		{
							
			?>
						<div id="content">
									<div class="products">
		
				
							<h3>Product Info</h3>
							
						
						
						<div id="gbrinfo">
							<img src="Img/Products/<?=$data['image'];?>" />
						</div>
						
						<div id="info">
						<div class="col" id="form">
						
						<table width="350" style="margin-top:20px;"  >
						<tr>
						<td width="180" class="label" colspan="2"><?php echo $data['name'];?></td>
						</tr>
						
					
						
						<tr>
						<td width="50" class="label">Price  </td>
						<td width="120" class="label">Rp <?=$data['price'];?></td>
						</tr>
						
						
						
						<tr>
						<td width="50" class="label">Stock  </td>
						<td width="120" class="label"><?=$data['quantity'];?></td>
						</tr>
						
						<tr>
								<td width="50" class="label">Category  </td>
								<td width="120" class="label" ><?=$data['type'];?></td>
						</tr>
						
						
						<tr><td></br></td></tr>
						
						<tr>
						<td width="50" class="label">Description  </td>
						<td width="120" class="label"><?=$data['description'];?></td>
						</tr>
						
						
						
						</table>
						</div>
						</br>
						<div style='font-size:35px;' align='center'>
								
									
						</div>
						</div>
						
								
						<!-- End Products -->
						</div>
						
					</div>
		<div class="cl">&nbsp;</div>
						
		<?php
		}	
		}
		
				//============================================GUEST==========================================
		  else if(!isset($_SESSION['role']))
			{
			
				//	$isi=mysql_query("select * from ms_user where id='$_SESSION[id]'");
				$isi2=mysql_query("select * from ms_barang where id='$_GET[id]'");
				$data2=mysql_fetch_array($isi2);
			?>
		<form method="post" action="cart_update.php">
						<div id="content">
									<div class="products">
		
				
							<h3>Purchase</h3>
							
						
						
						<div id="gbrinfo">
							<img src="Img/Products/<?=$data['image'];?>" />
						</div>
						
						<div id="info">
						<div class="col" id="form">
						
						<table width="350" style="margin-top:20px;"  >
						<tr>
						<td width="180" class="label" colspan="2"><?php echo $data['name'];?></td>
						</tr>
						
					
						
						<tr>
						<td width="50" class="label">Price  </td>
						<td width="120" class="label">Rp <?=$data['price'];?></td>
						</tr>
						
						
						
						<tr>
						<td width="50" class="label">Stock  </td>
						<td width="120" class="label"><?=$data['quantity'];?></td>
						</tr>
						
						<tr>
								<td width="50" class="label">Category  </td>
								<td width="120" class="label" ><?=$data['type'];?></td>
						</tr>
						
						
						<tr><td></br></td></tr>
						
						<tr>
						<td width="50" class="label">Description  </td>
						<td width="120" class="label"><?=$data['description'];?></td>
						</tr>
						
						
						
						</table>
						</div>
						</br>
						<div style='font-size:35px;' align='center'>
								
										
										<form method='POST' action="">
									
										<!--AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA-->
										            <?php
													$vd=$data2['id'];
													echo 'Quantity <input type="text" name="product_qty" value="1" size="3" />';
													echo '<button class="add_to_cart">Add To Cart</button>';
													echo '<input type="hidden" name="product_code" value="'.$vd.'" />';
													echo '<input type="hidden" name="type" value="add" />';
													echo '<input type="hidden" name="return_url" value="'.$current_url.'" />';
													echo '</form>';
													?>
										<!--AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA-->
										</form>
									
						</div>
						</div>
						
								
						<!-- End Products -->
						</div>
						
					</div>
		<div class="cl">&nbsp;</div>
		
		</form>
		<?php
		}
		
		
		
		?>
		
	</div>
	

</div>

<?php include("footer.php");?>
</body>

</html>

