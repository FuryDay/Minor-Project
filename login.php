<?php
		include("menu.php"); 

if(isset($_SESSION['name']))
{
	header('location:index.php');
}
else
{
include "koneksi.php";
if(isset($_POST['submit']))
{
	$username= $_POST['username'];
	$password= $_POST['password'];
	$error = array();
			if(empty($username))
			{
						  $error['username'] = 'username must be filled';  
			}
			if(empty($password))
			{
						  $error['password'] = 'Password must be filled'; 
			} 

			if(!empty($_POST['username']))   //checking the 'user' name which is from Sign-In.html, is it empty or have some text
				{
				$password=md5($password);
					$query = mysql_query("select * from ms_user where username='$username' and password='$password'");
					if (mysql_num_rows($query) == 1) 
					{
						$data=mysql_fetch_array($query);
						
							 session_start();
								$_SESSION['id'] = $data['id'];
								$_SESSION['username'] = $username;
								$_SESSION['name'] = $data['name'];
								$_SESSION['alamat']=$data['address'];
								$_SESSION['email']=$data['email'];
								$_SESSION['telepon']=$data['phone'];
								$_SESSION['role']=$data['role'];
								header('location:index.php');
								echo '<pre>';
								var_dump($_SESSION);
								echo '</pre>';
					}
					else
					{
						 //$error['lain']= "SORRY... YOU ENTERD WRONG username or PASSWORD... PLEASE RETRY...";
						 $error['lain']= "Wrong Username or Password";
						 
					}
				}




}
}

?>



<html>

<head>
	
	<link href="style__.css" rel="stylesheet" type="text/css" />
	<title>Login</title>
	
</head>



<body>
<!--HEADER-->

		<div id="back">
		
		
	
			<form method="POST" action="">
			 <div id="content">
				<table align="center" style="background-image:url('img/bglogin.jpg')" border="0">
					<tr>
						<td style="font-size:25px">Username</td>
						<td><input type="text" name="username" size="40" style="height:35px;font-size:20px;"></td>
					</tr>
					<tr>
						<td style="font-size:25px" >Password </td>
						<td><input type="password" name="password" size="40" size="30" style="height:35px;font-size:20px;"><br></td>
					</tr>
					<tr>			
						<td><a href="register.php"><img src="img/css/register.png"></a></td>
						<td><input id="button" type="submit" name="submit" value="Login"></td> 
					</tr>
					<tr>
						<td>
						
						</td>
						
						<td>
							<div style="color:red ; ">
								<?php 
								echo isset($error['username']) ? $error['username'] : '';
								?>
							</div>
						
							<div style="color:red; "><?php echo isset($error['password']) ? $error['password'] : '';?></div>
							<div style="color:red;"><?php echo isset($error['lain']) ? $error['lain'] : '';?></div>
						</td>
					 </tr>
					



			</table>
				
			</div>
		  </form>
			
			
		 
		</div>
<?php include ("footer.php");
?>
<!--footer-->

</body>


</html>
