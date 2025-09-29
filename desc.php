<?php
session_start();
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
color:black;
background-color:#CA8E46;;

}
.im{
width:275px;
height:250px;
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
  <li><a class="active" href="addcategory.php">Categories</a></li>
  <li><a href="branches.html">Branches</a></li>
  <li><a href="#about">About</a></li>
  <li><a href="user.php">User Login</a></li>
<li><a class="active" href="cart.php">Cart</a></li>
  <li><a href="login.html">Admin</a></li>
  <li><a href="feedback.html">FeedBack</a></li>
</ul>
</body>
<form action="" method="POST">
<?php

$conn= mysqli_connect("localhost","root","","bakery");
if(!$conn){
	die("Connection Failed:".mysqli_connect_error());
}
$s="SELECT * from product WHERE `product_id` = '$_GET[id]' ;";
$r=mysqli_query($conn,$s);

if (mysqli_num_rows($r)> 0){
  while($row = mysqli_fetch_array($r)){


  echo "<table cellpadding=10 border=1 class=tab align=center>
		
		<th colspan=2><img class=im src='data:image/jpg;charset=utf8;base64,".base64_encode($row['image'])."'></th>
        <tr><td align=center colspan=2><b>".$row['cakename']."</b></td></tr>
        <tr><td align=center><b>Price : Rs.".$row['price']."</b> Per Kg</td></tr>
	<tr><td align=center>Cake Shape : <b>".$row['shape']."</b> </td></tr>
	<tr><td align=center>Flavour : <b> ".$row['flavour']."</b></td></tr>
<tr><td  align=center colspan=2><a href='buy.php?id=".$row['product_id']."'>BUY NOW</a></td></tr>
<tr><td align=center>Quantity :<select class=h name=qua><optgroup><option value=1>1</option><option value=2>2</option><option value=3>3</option><option value=4>4</option><option value=5>5</option></optgroup></td></tr>
<tr><td align=center><input type=submit name=sub value=ADDTOCART></td></tr>";


?>
<html>
</table>
</form>
</html>
<?php
$_SESSION['cake']=$row['cakename'];
$_SESSION['pid']=$row['product_id'];
$_SESSION['qu']=$_POST['qua'];
$_SESSION['price']=$row['price'];
}
}


else{
	header("location:1.html");
}
if(isset($_POST['sub'])){

if(isset($_SESSION['uid'])){
$a=$_SESSION['cake'];
$q=$_SESSION['qu'];
$b=$_SESSION['price'];
$u=$_SESSION['uid'];
$pi=$_SESSION['pid'];
$conn= mysqli_connect("localhost","root","","bakery");
if(!$conn){
	die("Connection Failed:".mysqli_connect_error());
}
$sr="SELECT * from `cart` where userid='$_SESSION[uid]' && productid='$pi';";
$r=mysqli_query($conn,$sr);
if(mysqli_num_rows($r)> 0){
echo "<H2 align=center>PRODUCT ALREADY ADDED TO CART</h2>";
}else{
$s="INSERT INTO `cart` (`userid`, `productid`, `cakename`, `quantity`, `price`) VALUES ('$u', '$pi', '$a', '$q', '$b')";
if(mysqli_query($conn,$s)){
echo "<H2 align=center>PRODUCT ADDED TO CART</h2>";
}
}

}else{
echo "<H2 align=center>USER NOT LOGGED IN PLEASE LOGIN IN<a href=user.php>Go To Login</a></h2>";
}

}

?>