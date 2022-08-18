<?php
class csdl
{   private function connect (){
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
public function loadcombobox($sql,$id_theloai)
		{
		$link= $this->connect();
		$ketqua = mysql_query($sql,$link);
		mysql_close($link); 
		$i=mysql_num_rows($ketqua);
			if($i>0){
				echo '<select name="category" id="category">
						<option>Mời chọn loại sản phẩm</option>';
				while($row =mysql_fetch_array($ketqua)){
					$id=$row['id'];
					$tentheloai=$row['title'];
					if($id==$id_theloai)
					{
						echo '<option value="'.$id.'" selected="selected">'.$tentheloai.'</option>';
					}
					else
					{
						echo '<option value="'.$id.'">'.$tentheloai.'</option>';
					}
				}
				echo '</select>';
			}	
		}
 public function uploadfile($name, $tmp_name,$folder)
		{
			if($name !='' && $folder !='')
			{
				$newname = $folder."/".$name;
				if(move_uploaded_file($tmp_name,$newname))
				{
					return 1;
				}
				else
				{
					return 0;
				}
			}
			else
			{
				return 0;
			}
		}
 public function themxoasua($sql){
		$link= $this->connect();
		if(mysql_query($sql,$link)){
			return 1;
		}
		else
		{
			return 0;
		}
			
	}
 public function load_ds_sanpham($sql)
	{
		$link= $this->connect();
		$ketqua = mysql_query($sql,$link);
		mysql_close($link); 
		$i=mysql_num_rows($ketqua);
		if($i>0){
			echo'<table width="800" border="1" align="center" cellpadding="5" cellspacing="0">
					<tr>
					  <td width="64" align="center"><strong>ID</strong></td>
					  <td width="272" align="center"><strong>Product</strong></td>
					  <td width="103" align="center"><strong>Price</strong></td>
					  <td width="311" align="center"><strong>Description</strong></td>
					</tr>';
			$dem=1;
			while($row =mysql_fetch_array($ketqua)){
				$id=$row['ID'];
				$Product=$row['Product'];
				$Price=$row['Price'];
				$Description=$row['Description'];
				echo ' <tr>
						  <td align="center"><a href="?id='.$id.'">'.$dem.'</a></td>
						  <td align="left"><a href="?id='.$id.'">'.$Product.'</a></td>
						  <td align="center"><a href="?id='.$id.'">'.$Price.'</a></td>
						  <td align="left"><a href="?id='.$id.'">'.$Description.'</a></td>
						</tr>';
				$dem++;
			}
			echo '</table>';
		}
		else{
			echo 'Không có dữ liệu ';
		}
	}
  public function laycot($sql)
			{
				$link= $this->connect();
				$ketqua = mysql_query($sql,$link);
				mysql_close($link); 
				$i=mysql_num_rows($ketqua);
				$kq=0;
				if($i>0){
					while($row =mysql_fetch_array($ketqua)){
						$id=$row[0];
						$kq = $id;
					}
				}
				return $kq;
			}
}
?>