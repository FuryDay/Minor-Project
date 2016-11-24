<?php include("menu.php");

$error = array();
if($_SERVER['REQUEST_METHOD'] == "POST"){
	if (empty($_FILES['image']['tmp_name']))
				{
				 $error['image'] = 'Image must be chosen';  
				} 
				else
				{
					$folder="./img/Upload/";
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
	move_uploaded_file($_FILES['image']['tmp_name'], $folder.$_FILES['image']['name']);
	$update="UPDATE ms_transale SET image='$image',status='image uploaded' where id='$_SESSION[idt]'";
		if(mysql_query($update))
							{
							echo"<script>alert('aaaaa')</script>";
						header("location:index.php");
							} 
							else 
							{
								//header('location:insertitem.php');
							}
	
}
}
?>

<HTML>

<head>
	<link rel="stylesheet" href="style__.css" type="text/css">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Debit Payment</title>
</head>



<body>
	<div id="back">

		<div id="content">
		
			<div class="products">
			
			
			
				<form method="post" enctype="multipart/form-data">
						<td>UPLOAD YOUR TRANSFER IMAGE HERE : &nbsp;<input name="image" type="file" id="image" /></td>
						<td>	<input type="submit" value="Submit" class="submit-btn" /></td>
				</form>
			</div>
			
		</div>
		
	</div>
	<?php include("footer.php");?>
</body>

</html>