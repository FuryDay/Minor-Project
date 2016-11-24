<?php 

include("menu.php"); 
include "koneksi.php";

$isi=mysql_query("select * from ms_user");
?>


<html>
	<head>
		<title>Apotik Herbal</title>
		<link href="product.css" rel="stylesheet" type="text/css" />
	</head>
	
	
	<body>
		<div id="back">
			<div id="content">
				<table border="1" style="margin-left:80px;margin-bottom:50px;margin-top:20px;padding10px;">
					<tr align="center">
						<td class="label">Name</td>
						<td class="label">Email</td>
						<td class="label">Address</td>
						<td class="label">Phone</td>
						<td class="label">Role</td>
					</tr>
				<div class="col" id="form">
				<?php
				
				while($data=mysql_fetch_array($isi))
				{
				
				echo"
					
					
					<tr align='center'>
					
						<td class='label' width='80'>$data[name]</td>
						<td width='150'>$data[email]</td>
						<td width='150'> $data[address]</td>				
						<td width='80'> $data[phone]</td>
						<td width='50'> $data[role]</td>
						";
						if($data['role']=="admin"||$data['name']=="Guest")
						{
						
						echo "<td width='80'> </td>";
						}
							else 
						{
						
						echo"
						<td>
							<a href='members.php?id=$data[id]'><input type='button' value='DELETE'>
						</td>
					</tr>
					</div>";
					
					
						
					
					
				}
				
				}
				
				
				?>
		
				</table>
			</div>
		</div>
		<?php include("footer.php");?>
	</body>
	
</html>