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
        
	$a=$_POST['catname'];
	$o="select * from category where categoryname='$a';";
	$r=mysqli_query($conn,$o);
	$t=mysqli_num_rows($r);
	if($t>0)
		die ("<script type/javascript>
                  alert('Categoryname already exist ');
                  </script>");
	else{
		$sql="insert into category(categoryname,image)values('$a','$pimage');";
		$ret=mysqli_query($conn,$sql);
		echo $ret;
	echo mysqli_error($conn);
		if($ret)
      
	header('location:category.php');
}
	}	
	else
		$err1="Image file only accept";
	
}

}
?>
<html>
<head>
<style>
h3{
 color:red;
}
</style>
<body>
  <?php include_once 'addadmin.html' ?>
</head>
<title>Add category</title>
<style>
h3{
color:brown;
}
</style>
<body>
<h2 align=center>Add Category</h2>
<form action='<?php $php_self ?>' method=post enctype='multipart/form-data'>
<table align=center cellpadding=20>

<tr><th><h3>CATEGORY NAME<td><input type=text pattern="[a-z]{2,25}" name='catname'   required></h3>
<tr><th><h3>IMAGE<td><input type=file name='img' accept='image/*' required><h3>
<tr><th colspan=2><button name=sub><h3>Add</button></h3s>
</table>
</form>
</body>
</html>
</body>
</html>