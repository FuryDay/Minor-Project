<html>

<html>



<?php 
include("koneksi.php");
include("menu.php");




if($_SERVER['REQUEST_METHOD'] == "POST"){


$name=$_POST['name'];
$price=$_POST['price'];
$stock=$_POST['stock'];
$tipe=$_POST['Category'];
$description=$_POST['description'];
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

					$folder="./img/Products/";
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
				
				
if(empty($error)){
	move_uploaded_file($_FILES['image']['tmp_name'], $folder.$_FILES['image']['name']);
					
							$insert="INSERT INTO ms_barang(name,type,quantity,price,description,image) VALUES ('$name','$tipe','$stock','$price','$description','$image')";
							if(mysql_query($insert))
							{
							echo "bbbbb";
							} 
							else 
							{
								//header('location:insertitem.php');
							}
						}


}

?>

<head>
 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>


	<link rel="stylesheet" href="style__.css" type="text/css">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Products</title>
	
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
											<table width="500px"; style="margin-left:200px;" >
												<form method="post" enctype="multipart/form-data">
												
												<tr>
												<td class="label">Product Name   </td>
												<td> <input type="text" class="field" name="name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : '';?>" placeholder="Name"/></td>
												<td width="200"><div style="color:red"><?php echo isset($error['name']) ? $error['name'] : '';?></div>  </td>
												</tr>
												
												<tr>
													<td class="label">Category</td>
													<td><input type="text" id="tags" class="field" name="Category" value="<?php echo isset($_POST['Category']) ? $_POST['Category'] : '';?>">
												<!--
														<select name="cmbrole" width="100px" height="30px">
														   $query = "SELECT * FROM ms_barang";
															$result = mysql_query($query);
																while($row=mysql_fetch_array($result, MYSQL_ASSOC))
																{          
																   echo "<option value='".$row['id']."'>".$row['type']."</option>";
																}
														
														 </select>
												-->
														</td>
														<td width="200"><div style="color:red"><?php echo isset($error['Category']) ? $error['Category'] : '';?></div>  </td>
												</tr>
												
												
												<tr>
														<td class="label">Price</td>
														<td> <input type="text" class="field" name="price" value="<?php echo isset($_POST['price']) ? $_POST['price'] : '';?>" placeholder="Price"/></td>
														<td width="200"><div style="color:red"><?php echo isset($error['price']) ? $error['price'] : '';?></div>  </td>
												</tr>		
														
													<tr>
														<td class="label">Stock</td>
														<td> <input type="text" class="field" name="stock" value="<?php echo isset($_POST['stock']) ? $_POST['stock'] : '';?>" placeholder="Stock"/></td>
														<td width="200"><div style="color:red"><?php echo isset($error['stock']) ? $error['stock'] : '';?></div>  </td>
												</tr>
												
												<tr>
													<td class="label">Description</td>
													<td><textarea name="description" class="field"placeholder="Description" value="<?php echo isset($_POST['Description']) ? $_POST['Description'] : '';?>"></textarea></td>
													<td width="200"><div style="color:red"><?php echo isset($error['description']) ? $error['description'] : '';?></div>  </td>
												</tr>
												<tr>
													 <td class="label">Image   </td>
													  <td><input name="image" type="file" id="image" /></td>
													  <td width="200"><div style="color:red"><?php echo isset($error['image']) ? $error['image'] : '';?></div>  </td>
											  </tr>
														<tr>
															<td></td>
																<td>
																	<div class="form-buttons">
																		<input type="submit" value="Submit" class="submit-btn" />
																	</div>
																</td>
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