<?php

$conn= mysqli_connect("localhost","root","","bakery");
if(!$conn){
	die("Connection Failed:".mysqli_connect_error());
}
$s="SELECT `product_id`, `cakename`, `price`, `shape`,`flavour`,`category`, `image` FROM `product`";
$result=mysqli_query($conn,$s);
?>
<html>
<head>
<?php
include 'addadmin.html';
?>
</head><style>
th{
 color:brown;
}
td{
 color:white;
}
h2{
	color:white;
</style>
<body>
<center>
<table border="10">
<tr>
<th>CAKEID</th>
<th>CAKENAME</th>
<th>PRICE</th>
<th>SHAPE</th>
<th>FLAVOUR</th>
<th>CATEGORY</th>
<th>IMAGE</th>
<th>MODIFY</th>

</tr>
<?php
if(mysqli_num_rows($result)>0){
	while($row=mysqli_fetch_assoc($result)){
	?>
		<tr>
		<td><?php echo $row['product_id'];?></td>
		<td><?php echo $row['cakename'];?></td>
		<td><?php echo $row['price'];?></td>
		<td><?php echo $row['shape'];?></td>
		<td><?php echo $row['flavour'];?></td>
		<td><?php echo $row['category'];?></td>
                
		<td><?php echo "<img style='width:100px; height:100px;' class=room src='data:image/jpg;charset=utf8;base64,".base64_encode($row['image'])."'>";?></td>
		<td><a href='edit.php?product_id=<?php echo $row['product_id'];?>'>Edit</a> | |
		<a href='delete.php?product_id=<?php echo $row['product_id'];?>'>Remove</a></td>
	</tr>
	
<?php
}
}
else{
	echo"<h2 align=center>CAKES NOT FOUND<h2>";
	}


	?>
</table>
</center>
</body>
<html>