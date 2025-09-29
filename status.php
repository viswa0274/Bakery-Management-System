<?php
	$con= mysqli_connect("localhost","root","","bakery");
	if(!$con){
		die("Connection Failed:".mysqli_connect_error());
	}
	if(isset($_POST['sub'])){
	$a=$_GET['order_id'];
     $c=$_POST['id1'];         
               $sql="UPDATE `order` SET `orderstatus`='$c'  WHERE order_id='$a';";
   
               $r=mysqli_query($con,$sql);
               if($r)
			   {
                header("location:order.php");
               }
               else{
                echo "not update";
               }
	}
           ?>

<html>
<head>
<body>
  <?php include_once 'addadmin.html' ?>
</head>
<title> status</title>

<style>
th{
 color:brown;
}
id1{
	size=60px;
}
</style>
<body>
<h2 align=center>TRACK</h2>
<form action='<?php $php_self ?>' method=post enctype='multipart/form-data'>

<table align=center cellpadding=20>
<?php 
 
echo"<tr><th>ORDERID</th><td><input type=number  value=".$_GET['order_id']."  required readonly ></td>
 <tr><th>STATUS</th><td><input type=text name=id1  required></td>";
echo $_GET['order_id'];


?>


<tr><th colspan=2><button name=sub>update</button>
</table>
</form>
</body>
</html>
</body>
</html>