<?php
include('menu.php');



?>
<html>


	<head>
		<title>View shopping cart</title>
		<link href="style/style.css" rel="stylesheet" type="text/css">
	</head>
	
			<div id="back"> 

				<div id="content">

										<div>	There are several ways to complete the purchase
										<ul>
												<li>Debit card... <a href="debit_bank_list.php">click here </a></li>
												<li><a href="pay-paypal.php?id=<?=$_GET['id'];?>"> Paypal </a></li>
										</ul>
								
										</div>
								
				</div>
			</div>
	
<?php include("footer.php");?>
</html>