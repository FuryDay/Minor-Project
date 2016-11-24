 <?php 
 session_start();
include "Koneksi.php";
$currency="Rp.";
 $current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
?>

<link rel="stylesheet" href="style__.css">

<body>

<center>
<table width="1024" height="152" border="0"  cellspacing="5" id="header" style="margin-top:50px">
  <tr>
   <td style="background-image:url(img/Logo.png);background-repeat:no-repeat;size:cover" rowspan="3"width="180px"></td>
    <td width="98">&nbsp;</td>
    <td width="56">&nbsp;</td>
    <td width="77">&nbsp;</td>
    <td width="101">&nbsp;</td>
    <th width="61" colspan="5">
			
			<div id="headmenu2">
	
	<?php 
				
					if(isset($_SESSION['role']))
					{
					
					$isi=mysql_query("select * from ms_user where role='$_SESSION[role]' and username='$_SESSION[username]'");
					$data=mysql_fetch_array($isi);
					
						if($_SESSION['role']=="admin")
						{ ?>
			
			
							<div id="login-details">
								Welcome, <a href="profile.php" id="user"><?=$data['name'];?></a> |
								
								<a href="logout.php" class="sum">Log Out</a>
							</div>
		
							</div><!-- End Header -->
			
					<?php } //end if admin
//=====================================USER===============================================
							else if ($_SESSION['role']=="user")
							{	?>
							</center>
								<div id="login-details">
									Welcome, <a href="profile.php" id="user"><?=$data['name'];?></a> |
									<a href="logout.php" class="sum">Log Out</a>|
									
									<p><div class="shopping-cart">
									<!--CART START HERE-->
									
									<?php
									if(isset($_SESSION["products"]))
									{
									$item=0;
										$total = 0;
										
										foreach ($_SESSION["products"] as $cart_itm)
										{$var=count($_SESSION['products']);
										if($item==0)   
											{
											echo '<a href="" id="a">Shopping Cart('.$var.')</a>';
												echo '<ol id="b">';
											}
									
										$item+=1;
										
											 echo '<li class="cart-itm">';
											
											echo '<span class="remove-itm"><a href="cart_update.php?removep='.$cart_itm["code"].'&return_url='.$current_url.'">&times;</a></span>';
											echo '<a>'.$cart_itm["name"].'</a>';
											
											echo '<div class="p-code">P code : '.$cart_itm["code"].'</div>';
											echo '<div class="p-qty">Qty : '.$cart_itm["qty"].'</div>';
											echo '<div class="p-price">Price :'.$currency.$cart_itm["price"].'</div>';
											echo '</li>';
											echo '<input type="hidden" name="return_url" value="'.$current_url.'" />';

											$subtotal = ($cart_itm["price"]*$cart_itm["qty"]);
											$total = ($total + $subtotal);
											?><hr><?php
											
											
										}
										echo '</ol>';
										
										echo '<span class="check-out-txt"><strong><br>Total : '.$currency.$total.'</strong> <br><a href="view_cart.php">Check-out!</a></span>';
									//	echo '<span class="empty-cart"><a href="cart_update.php?emptycart=1&return_url='.$current_url.'">&nbsp; | &nbsp;Empty Cart</a></span>';
									}else{
										echo 'Shopping Cart';
										echo '<br>';
										echo 'Your Cart is empty';
									}
									?>
									</div>
								<!--end CART here-->
									</p>
									
								</div>
				<center>
								
			
								
<?php						} //end if user
							
	/*------------------------------------------------------------------------SUPPLIER-----------------------------------------------------------*/						
							else if ($_SESSION['role']=="supplier")
							
							{	?>
							
								<div id="login-details">
									Welcome, <a href="profile.php" id="user"><?=$data['name'];?></a> |<a href="logout.php" class="sum">Log Out</a>
								</div>
				
								
			
								</div><!-- End Header -->
								
<?php						} //end if user
		
					}//end if level
		/*======================================GUEST========================*/
				else if(!isset($_SESSION['role'])) 
					{
								?>
							</center>
								<div id="login-details">
									Welcome, <a href="profile.php" id="user">GUEST</a> 
									
									<p><div class="shopping-cart">
									<!--CART START HERE-->
									
									<?php
									if(isset($_SESSION["products"]))
									{
									$item=0;
										$total = 0;
										
										foreach ($_SESSION["products"] as $cart_itm)
										{$var=count($_SESSION['products']);
										if($item==0)
											{
											echo '<a href="" id="a">Shopping Cart('.$var.')</a>';
												echo '<ol id="b">';
											}
									
										$item+=1;
											 echo '<li class="cart-itm">';
											echo '<span class="remove-itm"><a href="cart_update.php?removep='.$cart_itm["code"].'&return_url='.$current_url.'">&times;</a></span>';
											echo '<a>'.$cart_itm["name"].'</a>';
											echo '<div class="p-code">P code : '.$cart_itm["code"].'</div>';
											echo '<div class="p-qty">Qty : '.$cart_itm["qty"].'</div>';
											echo '<div class="p-price">Price :'.$currency.$cart_itm["price"].'</div>';
											echo '</li>';
											$subtotal = ($cart_itm["price"]*$cart_itm["qty"]);
											$total = ($total + $subtotal);
											?><hr><?php
											
											
										}
										echo '</ol>';
										echo '<span class="check-out-txt"><strong><br>Total : '.$currency.$total.'</strong> <br><a href="view_cart.php">Check-out!</a></span>';
										//echo '<span class="empty-cart"><a href="cart_update.php?emptycart=1&return_url='.$current_url.'">&nbsp; | &nbsp;Empty Cart</a></span>';
									}else{
										echo 'Shopping Cart';
										echo '<br>';
										echo 'Your Cart is empty';
									}
									?>
									</div>
								<!--end CART here-->
									</p>
									
								</div>
				<center>
								
			
								
<?php						} //end if user
	?>
	
			
			
			
			
			
			
			
			

			<!--<span class="style2"> <a href="index.php">Login</a> |</span>-->
	
	
	</th>

  </tr>
  
  <tr>
    <th colspan="9">
	<div id="headmenu">
	
	<?php 
				$query=mysql_query("SELECT * FROM ms_user ");
				while($row=mysql_fetch_array($query))
						{	
							if($username==$row['username'])
							
							{
								$error['username'] = 'Cannot register with the same (existing)  username ';
							}
							
						}
				
				
					if(isset($_SESSION['role']))
					{
					
					$isi=mysql_query("select * from ms_user where role='$_SESSION[role]' and username='$_SESSION[username]'");
					$data=mysql_fetch_array($isi);
					
						if($_SESSION['role']=="admin")
						{ ?>
							<ul>
								<li><a href="index.php" class="active">Home</a></li>
								<li><a href="profile.php?id=<?=$data['id'];?>" >Profile </a></li>
								<li><a href="product.php">Products</a></li>
									
								<li><a href="members.php">Member</a></li>
							<li><a href="transaction.php">Transaction</a></li>
							</ul>
						
							 <!-- End Navigation -->
							<div class="cl">&nbsp;</div>
		
	</div><!-- End Header -->
			
					<?php } //end if admin
					
							else if ($_SESSION['role']=="user")
							
							{	?>
							
								<ul>
									<li><a href="index.php" class="active">Home</a></li>
									<li><a href="product.php">Products</a></li>
										<li><a href="profile.php">Profil</a></li>
									
								<li><a href="transaction.php">Transaction</a></li>
								<li><a href="about.php">About Us</a></li>
								<li><a href="contact.php">Contact</a></li>
								</ul>
							
								</div> <!-- End Navigation -->
								<div class="cl">&nbsp;</div>
				
								
			
								</div><!-- End Header -->
								
<?php						} //end if user


							else if ($_SESSION['role']=="supplier")
							
							{	?>
							
								<ul>
									<li><a href="index.php" class="active">Home</a></li>
									<li><a href="product.php">Products</a></li>
										<li><a href="profile.php">Profil</a></li>
								<li><a href="transaction.php">Transaction</a></li>
								<li><a href="about.php">About Us</a></li>
								<li><a href="contact.php">Contact</a></li>
								</ul>
							
								</div> <!-- End Navigation -->
								<div class="cl">&nbsp;</div>
				
								
			
								</div><!-- End Header -->
								
<?php						} //end if supplier
			


		
					}//end if level
					
				else if(!isset($_SESSION['role'])) 
			{
					
?>
	
	
								<ul>
									<li><a href="index.php" class="active">Home</a></li>
									<li><a href="product.php">Products</a></li>
									<li><a href="transaction.php" style="font-size:20px">transaction</a></li>
									<li><a href="register.php">Register</a></li>
								<li><a href="about.php">About Us</a></li>
								<li><a href="contact.php">Contact Us</a></li>
								
								</ul>
							
								</div> <!-- End Navigation -->
								<div class="cl">&nbsp;</div>
			
								</div><!-- End Header -->
		<?php
		} 
		
?>
	
	</th>
  </tr>
  
  
  <tr>
    
    <td width="56">&nbsp;</td>
    <td width="77">&nbsp;</td>
    <td width="101">&nbsp;</td>
    <td width="28">&nbsp;</td>
        <td width="106">&nbsp;</td>
    <td width="61">&nbsp;</td>
    <td width="76" colspan="2" align="right">
	<?php
	$isi=mysql_query("Select CURDATE() as date");
	$data=mysql_fetch_array($isi);
	$date= "$data[date]";
	echo $date;
	?>
	
	</td>
  </tr>
  
</table>
</center>
</body>