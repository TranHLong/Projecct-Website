<?php
session_start();
if(isset($_SESSION['id']) && isset($_SESSION['user']) && isset($_SESSION['pass']) && isset($_SESSION['phanquyen'])){
	include('classlogin.php');
	$q=new login();
	$q->confirmlogin($_SESSION['id'],$_SESSION['user'],$_SESSION['pass'],$_SESSION['phanquyen']);
}
else {
	header('location:http://localhost/Web_Bookstore/Login.php');
}
include("connect.php");
$p = new csdl();
$layid=0;
if(isset($_REQUEST['id'])){
	$layid= $_REQUEST['id'];
}
$iduser=$_SESSION['id'];
$ten=$p->laycot("SELECT ten FROM user WHERE id='$iduser' LIMIT 1")
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<form method="post" enctype="multipart/form-data" name="form1" id="form1">
<div align="center"><h1><strong><?php echo 'Xin chào admin '.$ten;?></strong></h1></div>
  <table width="800" border="1" align="center" cellpadding="5" cellspacing="0">
    <tbody>
      <tr>
        <td colspan="2" align="center">Quản lý sản phẩm</td>
      </tr>
      <tr>
        <td width="236">Loại sản phẩm</td>
        <td width="538">
			<?php
			$id_theloai = $p->laycot("SELECT Category69 from products where id='$layid' limit 1");
			$p->loadcombobox("SELECT id, title from category order by id ASC",$id_theloai);
			?>
			<input name="txtid" type="hidden" id="txtid" value="<?php echo $layid;?>"></td>
      </tr>
      <tr>
        <td>Tên sản phẩm</td>
        <td><input name="txtten" type="text" id="txtten" value="<?php echo $p->laycot("SELECT Product from products where ID='$layid' limit 1"); ?>"></td> 
      </tr>
      <tr>
        <td>Giá</td>
        <td><input name="txtgia" type="text" id="txtgia" value="<?php echo $p->laycot("SELECT Price from products where ID='$layid' limit 1");?>"></td>
      </tr>
      <tr>
        <td>Mô tả</td>
        <td><textarea name="txtmota" id="txtmota"><?php echo $p->laycot("SELECT Description from products where ID='$layid' limit 1");?></textarea></td>
      </tr>
      <tr>
        <td>Hình đại diện</td>
        <td><input type="file" name="myfile" id="myfile"></td>
      </tr>
      <tr>
        <td colspan="2"><input type="submit" name="nut" id="nut" value="Thêm sản phẩm">
        <input type="submit" name="nut" id="nut" value="Xóa sản phẩm">
        <input type="submit" name="nut" id="nut" value="Sửa sản phẩm"></td>
      </tr>
    </tbody>
  </table>
	<div align="center">
		<?php
		switch($_POST['nut']){
			case'Thêm sản phẩm':
			{
				$theloai=$_REQUEST['Category'];
				$tensp=$_REQUEST['txtten'];
				$gia=$_REQUEST['txtgia'];
				$mota=$_REQUEST['txtmota'];
				$name = $_FILES['myfile']['name'];
				$type = $_FILES['myfile']['type'];
				$tmp_name= $_FILES['myfile']['tmp_name'];
				$size = $_FILES['myfile']['size'];
				if($name!='' && $type='image/jpeg')
				{
					$name = time()."_".$name;
					if($p->uploadfile($name ,$tmp_name,"../reservation/img/products")==1)
					{
						if($p->themxoasua("INSERT INTO products(Product,Price,Description,imgUrl,Category) VALUES ('$tensp', '$gia', '$mota','$name','$theloai')")==1){
							header('location:quanlysanpham.php');
							echo '	<script>
										alert("Thêm thành công");
									</script>';
						}
						else
						{
							echo 'thêm sản phẩm không thành công';
						}
					}
					else
					{
						echo 'upload không thành công';
					}
				}
				else
				{
					echo 'Vui  lòng chọn ảnh';
				}
				break;
			}
			case 'Xóa sản phẩm':
			{
				$idxoa=$_REQUEST['id'];
				$hinh =$p->laycot("SELECT imgUrl from products where id='$idxoa' limit 1");
				$hinh = "../reservation/img/products/".$hinh;
				if($idxoa>0)
				{
					unlink($hinh);
					if($p->themxoasua("delete from products where id='$idxoa' limit 1")){
						header('location:quanlysanpham.php');
					}
					else
					{
						echo 'Xóa không thành công';
					}
				}
				else
				{
					echo 'Vui lòng chọn sản phẩm cần xóa';
				}
				break;
			}
			case 'Sửa sản phẩm':
			{
				$idsua=$_REQUEST['id'];
				$theloai=$_REQUEST['Category'];
				$tensp=$_REQUEST['txtten'];
				$gia=$_REQUEST['txtgia'];
				$mota=$_REQUEST['txtmota'];
				if($idsua>0)
				{
					if($p->themxoasua("UPDATE products SET Product='$tensp',Price = '$gia',Description = '$mota',Category = '$theloai' WHERE id ='$idsua' LIMIT 1 ")==1)
					{
						header('location:quanlysanpham.php');
					}
					else
					{
						echo 'Sửa không thành công';
					}
				}
				else
				{
					echo 'Vui lòng chọn sản phẩm cần sửa';
				}
			}
				
		}
		?>
	</div>
	<hr/>
	<?php
		$p->load_ds_sanpham("SELECT * from products order by id desc");
	?>
</form>
</body>
</html>