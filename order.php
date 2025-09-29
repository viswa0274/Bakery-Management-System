<?php

$conn= mysqli_connect("localhost","root","","bakery");
if(!$conn){
	die("Connection Failed:".mysqli_connect_error());
}
 
    $s="SELECT * from  `order` inner join `user` where order.userid=user.userid;";
  
$result=mysqli_query($conn,$s);
?>
<html>
<head>
<?php include'addadmin.html'
?>
</head>
<style>
td{
	color:white;
	
}
h2{
	color:white;
}
th{
 color:brown;
 font-size:15px;
}
</style>
<body>
<center>
<h2 align=center> ORDER LIST </h2>
<table border="6">
<tr>
<th>CAKEID</th>
<th>CAKENAME</th>
<th>PRICE</th>

<th>ORDERID</th>
<th>NAME</th>
<th>MOBILENO</th>
<th>QUANTITY</th>
<th>ADDRESS</th>
<th>CITY</th>
<th>PINCODE</th>
<th>MESSAGE</th>
<th>DATE</h>
<th>TIME</th>
<th>AMOUNT</th>
<th>ORDER STATUS</th>
<th>PAYMENT</th>
<th>ORDER TRACK</th>
</tr>
<?php
if(mysqli_num_rows($result)>0){
	while($row=mysqli_fetch_assoc($result)){
	?>
		<tr>
		<td><?php echo $row['product_id'];?></td>
		<td><?php echo $row['productname'];?></td>
		<td><?php echo $row['productprice'];?></td>
		
		<td><?php echo $row['order_id'];?></td>
		<td><?php echo $row['name'];?></td>
		<td><?php echo $row['phone_no'];?></td>
		<td><?php echo $row['quantity'];?></td>
		<td><?php echo $row['address'];?></td>
		<td><?php echo $row['city'];?></td>
		<td><?php echo $row['pincode'];?></td>
		<td><?php echo $row['message'];?></td>
		<td><?php echo $row['deliverydate'];?></td>
		<td><?php echo $row['deliverytime'];?></td>
		<td><?php echo $row['totalamount'];?></td>
		<td><?php echo $row['orderstatus'];?></td>
		<td><?php echo $row['payment'];?></td>
		<td><a href='status.php?order_id=<?php echo $row['order_id'];?>'>STATUS</a></td>
		
	</tr>
<?php
}
}
  

else{
	header("location:1.html");
	}

  
	?>
</table>
</center>
</body>
<html>