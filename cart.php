<?php
session_start();
 if(!isset($_SESSION['uid'])){
header("location:user.php");
}


	?>
<html>
<style>
body{
background-color:black;
}
ul {
  list-style-type: none;
  overflow: hidden;
 background-color:black;
  height:50px;
}


li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}
table{
color:white;
margin-top:5%;

}
.im{
width:275px;
height:300px;
}
.tab{
	
	cursor:pointer;
font-size:18px;
 border-style:solid;
	
}
.active{
	background-color:grey;
}
input[type=submit]
{
background-color:red;
height:40px;
width:100px;
}
h{
color:black;
}
h2{
color:white;
}
</style>
</head>
<body>

<ul >
  <li><a href="navbar.php">Home</a></li>
  <li><a  href="addcategory.php">Categories</a></li>
  <li><a href="branches.html">Branches</a></li>
  <li><a href="#about">About</a></li>
  <li><a href="user.php">User Login</a></li>
  <li><a href="login.html">Admin</a></li>
<li><a class="active" href="cart.php">Cart</a></li>
  <li><a href="feedback.html">FeedBack</a></li>
</ul>
</body>
<?php



$conn= mysqli_connect("localhost","root","","bakery");

if(!$conn){
	die("Connection Failed:".mysqli_connect_error());
}
$s="SELECT * from `cart` where userid='$_SESSION[uid]';";
$r=mysqli_query($conn,$s);
echo mysqli_error($conn);
if(mysqli_num_rows($r)> 0){
?>
<table align=center border=1 cellpadding=8>
<tr>
<th>PRODUCT ID</th>
<th>PRODUCT NAME</th>
<th>PRODUCT PRICE(PER KG)</th>
<th>QUANTITY</th>
<th>PRODUCT PRICE</th>
<th></th>
</tr>
<?php

$t=0;
while($row = mysqli_fetch_array($r)){

	echo "<tr align=center>";	
echo "<td>".$row['productid']."</td>";
echo "<td>".$row['cakename']."</td>";
echo "<td>Rs.".$row['price']."</td>";

	echo "<td>".$row['quantity']."KG</td>";
echo "<td>Rs.".$row['quantity']*$row['price']."</td>";
echo "<td><a href=remove.php?productid=".$row['productid'].">Remove</a></td>";	
$t=$t+$row['quantity']*$row['price'];


}
echo "<tr><th colspan=4>Total Amount</th>";
echo "<td align=center>Rs.<b>".$t."</b></td>";
echo "<tr><th colspan=5><a href=cartbuy.php>BUY NOW</a></th></tr>";
}else{
echo "<h2 align=center>No Product in Cart</h2>";
}


?>
</table>
</html>
