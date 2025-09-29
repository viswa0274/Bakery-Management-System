<?php

$conn= mysqli_connect("localhost","root","","bakery");
if(!$conn){
	die("Connection Failed:".mysqli_connect_error());
}
$s="SELECT * FROM `category`";
$result=mysqli_query($conn,$s);
?>
<html>
<style>
.cake{
	width:300px;
	height:125px;}
th{
 color:brown;
 }
td{
 color:white;
}
h2{
	color:white;
</style>
<head>
<?php
include 'addadmin.html';
?>
</head>
<body>
<center>
<table border=15">
<tr>

<th>CATEGORY</th>
<th>IMAGE</th>
<th>MODITY
</th>
</tr>
<?php
if(mysqli_num_rows($result)>0){
	while($row=mysqli_fetch_assoc($result)){
	?>
	   
		<tr>
                
		<td><?php echo $row['categoryname'];?></td>
                
	<td><?php echo "<img class=cake src='data:image/jpg;charset=utf8;base64,".base64_encode($row['image'])."'>";?></td>
	<td><a href='catedit.php?categoryname=<?php echo $row['categoryname'];?>'>EDIT</a> |
         <a href='catremove.php?categoryname=<?php echo $row['categoryname'];?>'>DELETE</a></td>
         
	</tr>
	
<?php
}
}
else{
	echo"<h2 align=center> CATEGORY NOT FOUND</h2>";
	}


	?>
</table>
</center>
</body>
<html>