<?php
include('classlogin.php');
$p= new login(); 
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
	<link rel="stylesheet" type="text/css" href="CssLogin.css">
	</head>
<body>
	<div class="loginbox">
	<img src="images/PLogo.png" class="avatar">
		<form id="form1" name="form1" method="post">
			<h1>Đăng nhập</h1>
			<label>User Name</label>
			<input type="text" name="txtuser" placeholder="User Name"><br>
			<label>Password</label>
			<input type="password" name="txtpass" placeholder="Password"><br>
			<td colspan="2" align="center" valign="middle"><input type="submit" name="nut" id="nut" value="Login"></td>
			<?php
		switch($_POST['nut']){
			case 'Login': {
				$user=$_REQUEST['txtuser'];
				$pass=$_REQUEST['txtpass'];
				if($user!='' && $pass!=''){
					if($p->mylogin($user,$pass)==1){
						header('location:admin/quanlysanpham.php');
					}
					else {
						echo 'Đăng nhập không thành công';
					}
				}
				else {
					echo 'Vui lòng nhập đầy đủ username và password';
				}
				break;
			}
		}
	?>
			</div>
		</form>
	</body>
</html>
