<?php
if(isset($_POST['sub'])){
$s=$_POST['da'];
$conn= mysqli_connect("localhost","root","","bakery");
if(!$conn){
	die("Connection Failed:".mysqli_connect_error());
}
$s="SELECT * FROM `order` where deliverydate='$s'";
$result=mysqli_query($conn,$s);
?>
<html>
<head>
<?php include'addadmin.html'
?>
</head>
<style>
th{
  color:brown;
}
td{
 color:white;
}
h2{
	color:white;
}
</style>
<body>
<center>


<?php
if(mysqli_num_rows($result)>0){
	?>
	<table border=90>
<tr>
<th>CAKEID</th>
<th>CAKENAME</th>
<th>CAKEPRICE</th>
<th>ORDERID</th>

</tr>
<?php
  $r=0;
  $t=0;
	while($row=mysqli_fetch_assoc($result)){
	?>
		<tr>
		<td><?php echo $row['product_id'];?></td>
		<td><?php echo $row['productname'];?></td>
                <td><?php echo $row['productprice'];?></td>
                <td><?php echo $row['order_id'];?></td>
				
				<?php 
				$r=$r+1;
				$t=$t+$row['productprice'];?>
	</tr>
	
<?php
}
echo "<tr ><th colspan=3>TOTAL CAKES</th>";
	echo "<td>".$r."</td></tr>";
echo "<tr ><th colspan=3>TOTAL AMOUNT</th>";
	echo "<td>RS.".$t."</td></tr>";
}
else{
	echo"<h2 align=center>NO CAKES FOUND<h2>";
      
	}
}

	?>
</table>
</center>
</body>
<html>