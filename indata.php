<?php
include('menu.php');



if($_SERVER['REQUEST_METHOD'] == "POST")

{		
		$name=$_POST['name'];
		$add=$_POST['address'];
		$bdate=$_POST['birtdate'];
		$email=$_POST['email'];
		$gender=$_POST['gender'];
		$mobile=$_POST['mphone'];
		$phone=$_POST['phone'];
		$noktp=$_POST['noktp'];
		$error = array();
		
		$query=mysql_query("SELECT * FROM ms_guest ");
		
		if (empty($name))
						{
							$error['name'] = 'name must be filled';
						}
		else if(preg_match('/[0-9]+/i',$name))
						{
						$error['name'] = 'Name must contain only alphabet letters';
						}		
		if(empty($gender))
		{
			  $error['gender'] = 'Gender must be choosen'; 
		}		
						
		if(empty($address)){
					  $error['address'] = 'Address must be filled'; 
					} 
		if(empty($phone))
					{
					  $error['phone'] = 'Phone must be filled';  
					}	
		else if(!preg_match('/[0-9]/',$phone)){
					  $error['phone'] = 'Phone must contain only numbers';  
					}					
						
		if(empty($email)){
					  $error['email'] = 'Email must be filled';  
					} else
					if (!preg_match('/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/',$email))
						{
						$error['email'] = 'Email must be a valid email address (ex: abc@abc.com)';
						}
						while($row=mysql_fetch_array($query))
						{	
							if($email==$row['email'])
							
							{
								$error['email'] = 'Cannot register with the same (existing)  email ';
							}
							
						}	
						
						
				if (empty($noktp))
						{
							$error['noktp'] = 'No.ktp must be filled';
						}
		else if(!preg_match('/[0-9]+/i',$noktp))
						{
						$error['noktp'] = 'No.ktp must contain only alphabet letters';
						}					
						
						
						else
						{
								$sel=mysql_query("SELECT id FROM ms_user ORDER BY ID DESC LIMIT 1");
								$data=mysql_fetch_array($sel);
									$sel2=mysql_query("SELECT id FROM ms_guest ORDER BY ID DESC LIMIT 1");
								$data2=mysql_fetch_array($sel2);
								
								if($data['id']<$data2['id'])
								{
								$index=$data2['id'];
								}
								else
								{
								$index=$data['id'];
								}
								$index+=1;
								
								$isi=mysql_query("Insert into ms_guest(id,Name,Address,DateBirth,Gender,email,MobilePhone,Phone,IDcard) values('$index','$name','$add','$bdate','$email','$gender','$mobile','$phone','$noktp')");
								
								if($isi)
										{
											$insert=mysql_query("INSERT INTO ms_transale(iduser,tanggal,status,Image,Total,role) VALUES ('$index','$date','Wait Payment','Blank.png','$total','Guest')");
											$sel=mysql_query("SELECT id FROM ms_transale ORDER BY ID DESC LIMIT 1");
											$data=mysql_fetch_array($sel);
										$idx=0;
										$idx=($data['id']);
										$_SESSION['idt']=$idx;
										
										foreach ($_SESSION["products"] as $cart_itm)
												{
													$acl=$data['id'];
													$product_code = $cart_itm["code"];
													$code=$cart_itm["code"]; 
													$name=$cart_itm['name'];
													$qty=$cart_itm['qty'];
													$price=$cart_itm['price'];
												$isi=mysql_query("INSERT INTO detil_transale(id,idbarang,name,quantity,price) VALUES ('$data[id]','$code','$name','$qty','$price')");
														mysql_query("update ms_barang set quantity=quantity-$data[qty] WHERE id='$data[id]' ");
												}	
										header("location:payment.php?id=".$idx);
										} 
						}
}


?>
<html>


	<head>
		<title>View shopping cart</title>
		<link href="style/style.css" rel="stylesheet" type="text/css">
	</head>
	
			<div id="back"> 

				<div id="content">
				
								<div class="products">
				
										<div class="col" id="form">
										
										<table width="500px"; border="1" style="margin-left:200px;" >
										<form method="post" enctype="multipart/form-data">
												<tr>
													<td>Name</td>
													<td><input type="text" name="name"></td>
													<td><div style="color:red"><?php echo isset($error['name']) ? $error['name'] : '';?></div></td>
												</tr>
												
												<tr>
													<td>Address</td>
													<td><textarea name="address"></textarea></td>
													<td></td>
												</tr>
												
												<tr>
													<td>Birth Date</td>
													<td>
														 <input type="text" name="birtdate">
													</td>
													<td></td>
												</tr>
												
												<tr>
													<td><input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?>  value="female">Female</td>
													<td><input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?>  value="male">Male</td>
													<td><div style="color:red"><?php echo isset($error['gender']) ? $error['gender'] : '';?></td>
												</tr>
												
												<tr>
													<td>Email Adress</td>
													<td><input type="text" name="email"></td>
													<td><div style="color:red"><?php echo isset($error['email']) ? $error['email'] : '';?></div></td>
												</tr>
												
												<tr>
													<td>Mobile Phone</td>
													<td><input type="text" name="mphone"></td>
												</tr>
												
												<tr>
													<td>Phone</td>
													<td><input type="text" name="phone"></td>
													<td><div style="color:red"><?php echo isset($error['phone']) ? $error['phone'] : '';?></td>
												</tr>
												
												<tr>
													<td>No. KTP</td>
													<td><input type="text" name="noktp"></td>
													<td><div style="color:red"><?php echo isset($error['noktp']) ? $error['noktp'] : '';?></div></td>
												</tr>
												
												<?php
												$sels=mysql_query("SELECT id+1 as ids FROM ms_transale ORDER BY ID DESC LIMIT 1");
												$datas=mysql_fetch_array($sels);
													$daz=0;
														if($datas['ids']!=null)
															{
															$daz=$datas['ids'];
															}
														else
														{
															$daz=1;
														}
													
											echo"
										
												<tr style='color:red;font-size:20px';font-weight:bold>
													<td >Your Transaction ID is :</td>
														
													<td>
												
													$daz
													
													</td>

												</tr>
										
											";
													?>
													
												<?php
												$sel=mysql_query("SELECT id FROM ms_user ORDER BY ID DESC LIMIT 1");
												$data=mysql_fetch_array($sel);
												$sel2=mysql_query("SELECT id FROM ms_guest ORDER BY ID DESC LIMIT 1");
												$data2=mysql_fetch_array($sel2);
												
												if($data['id']<$data2['id'])
												{
												$index=$data2['id'];
												}
												else
												{
												$index=$data['id'];
												}
												$index+=1;
												

											echo"
												<tr style='color:red;font-size:20px';font-weight:bold>
													<td >Your Guest ID is :</td>
													<td>
												$index
													</td>
												</tr>
												";
													?>
													<td colspan="3" style="font-size:30px;color:red;font-weight:bolder">
														PLEASE NOTE OR REMEMBER YOUR 'TRANSACTION ID'<br>'GUEST ID'<br>'NO KTP'
													</td>
												<tr>
													<td colspan="2" align="center">
													<input id="button" type="submit" name="submit" value="Submit Data">
															<input type="reset">
													</td>
												</tr>
												
												
											</form>
										</table>
										</div>
								</div>
				</div>
			</div>
	<?php include("footer.php");?>

</html>