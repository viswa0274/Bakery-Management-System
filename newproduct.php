<html>
<style>

h3{
	color:white;
}
</style>
<?php
if(isset($_POST['sub'])){
	if(!empty($_FILES['img']['name'])){
	$image_name=basename($_FILES['img']['name']);
	$image_type=pathinfo($image_name,PATHINFO_EXTENSION);
	if($image_type=='jpg' or $image_type=='png' or $image_type=='jpeg' or $image_type=='gif'){
	$image=$_FILES['img']['tmp_name'];
	$pimage=addslashes(file_get_contents($image));
	$conn=mysqli_connect('localhost','root','');
	mysqli_select_db($conn ,'bakery');
	$a=$_POST['id'];
	$n=$_POST['name'];
	$p=$_POST['price'];
	$c=$_POST['cat'];
	$f=$_POST['sh'];
	$s=$_POST['fl'];
        
	$o="select * from product where product_id='$a';";
	$r=mysqli_query($conn,$o);
	$t=mysqli_num_rows($r);
	
	if($t>0)
		echo "<h3 style=color:white align=center>The id is already exist</h3>";

	else{
		$sql="insert into product(product_id,cakename,price,shape,flavour,category,image)values('$a','$n','$p','$f','$s','$c','$pimage');";
		$retval=mysqli_query($conn,$sql);
		echo $retval;
	echo mysqli_error($conn);
		if($retval)
      
	header('location:newproduct.php');
}
		}
	else
		$err1="Image file only accept";
	}
}


?>
<html>
<head>
<body>
  <?php include_once 'addadmin.html' ?>
</head>
<title>Add Product</title>

<style>
th{
 color:brown;
}
h{
	margin-top:30%;
}
</style>
<body>
<h2 align=center>Adding Product</h2>
<form action='<?php $php_self ?>' method=post enctype='multipart/form-data'>

<table align=center cellpadding=20>
<?php 
 $con=mysqli_connect('localhost','root','');
 mysqli_select_db($con,'bakery');
 $q="select Categoryname from category;";
 $r=mysqli_query($con,$q);
 ?>
<tr><th>Category<td><select  required name=cat>
<option align=center value="" disabled selected>Category</option>
<?php
while($row=mysqli_fetch_array($r)){

echo"<option align=center value=".$row['Categoryname'].">".$row['Categoryname'];


}
?>

<tr><th>CAKEID<td><input type=number name='id' pattern="[0-9]{4}" minlength=1 maxlength=4 required>
<tr><th>CAKENAME<td><input type=text pattern="[a-z]{2,25}" name='name' required>
<tr><th>PRICE<td><input type=number min=0 name='price' required>
<tr><th>SHAPE<td><input type=text name='sh' required>
<tr><th>FLAVOUR<td><input type=text name='fl' required>
<tr><th>IMAGE<td><input type=file name='img' accept='image/*' required>
<tr><th colspan=2><button name=sub>Add</button>
</table>
</form>
</body>
</html>
</body>
</html>