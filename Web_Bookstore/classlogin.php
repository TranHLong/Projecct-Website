<?php
class login
{   public function connect (){
		$con=mysql_connect("localhost","bookstore","123456");
		if(!$con) {
			echo 'Không kết nối được csdl';
			exit();
		}
		else {
			mysql_select_db("dbbookstore");
			mysql_query("SET NAMES UTF8");
			return $con;
		}
	}
 	public function mylogin($user,$pass){
		$pass=md5($pass);
		$link=$this->connect();
		$sql ="SELECT  id, username, password, phanquyen FROM user WHERE username='$user' AND password='$pass' LIMIT 1";
		$ketqua=mysql_query($sql,$link);
		$i=mysql_num_rows($ketqua);
		if($i==1){
			while($row=mysql_fetch_array($ketqua)){
				$id=$row['id'];
				$username=$row['username'];
				$password=$row['password'];
				$phanquyen=$row['phanquyen'];
				session_start();
				$_SESSION['id']=$id;
				$_SESSION['user']=$username;
				$_SESSION['pass']=$password;
				$_SESSION['phanquyen']=$phanquyen;
				return 1;
			}
		}
		else {
			return 0;
		}
	}
 	public function confirmlogin($id,$user,$pass,$phanquyen){
		$link=$this->connect();
		$sql="SELECT id FROM user WHERE id='$id' AND username='$user' AND password='$pass' AND phanquyen='$phanquyen' LIMIT 1";
		$ketqua=mysql_query($sql,$link);
		$i=mysql_num_rows($ketqua);
		if($i!=1){
			header('location:./Login.php');
		}
	}
}
?>