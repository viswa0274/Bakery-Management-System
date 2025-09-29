<html>
<head>
<style>
body{
background-color:black;
}

ul {
  list-style-type: none;
  overflow: hidden;
background-color:black;
    background-size: cover;
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
.home{
 width:100%;
  height: 80%;
}
.two{
width:70%;
height:50%;
border-radius: 20%;
cursor:pointer;
}
h1{
background-color:black;
text-align: center;
font-family: papyrus;
Color: white;
}
p{
text-align: center;
Color: white;
font-family: oblique;
}

.text{
margin-left:50%;
color:white;
}
table{
color:white;
margin-top:10%;
height:25%;
}
.p{
font-family:century gothic;
}
ul .search {
  float: right;
  padding: 6px 8px;
  margin-top: 8px;
  margin-right: 16px;
  background: black;
  font-size: 16px;
  border: none;

  cursor: pointer;
}
input[type=text] {
    border: 1px solid #ccc;  
  }
.active{
background-color:grey;
}
h1{
color:#CA8E46;
}
h2{
color:white;
margin-top:5%;
}
</style>
</head>
<body>

<ul >
  <li><a  href="navbar.php">Home</a></li>
  <li><a href="addcategory.php">Categories</a></li>
  <li><a href="branches.html">Branches</a></li>
  <li><a href="#about">About</a></li>
  <li><a href="user.php">User Login</a></li>
<li><a href="cart.php">Cart</a></li>
  <li><a class="active" href="orderst.php">Order</a></li>
  <li><a href="login.html">Admin</a></li>
<li><a href="feedback.html">FeedBack</a></li>
</body>
</html>
<?php
session_start();
if(isset($_SESSION['uid'])){
$u=$_SESSION['uid'];

$conn= mysqli_connect("localhost","root","","bakery");

if(!$conn){
	die("Connection Failed:".mysqli_connect_error());
}
$s="SELECT * from `user` inner join `order` where order.userid='$u' && user.userid='$u';";
$r=mysqli_query($conn,$s);
echo mysqli_error($conn);
if(mysqli_num_rows($r)> 0){
?>
<table align=center border=1 cellpadding=10>
<tr style=color:gold>
<th>Product Name</th>
<th>Price</th>
<th>Order Id</th>
<th>Name</th>
<th>Phone Number</th>
<th>Quantity</th>
<th>Address</th>
<th>City</th>
<th>Pincode</th>
<th>Message</th>
<th>Delivery Date</th>
<th>Delivery Time</th>
<th>TotalAmount</th>
<th>Payment</th>
<th>Order Status</th>
</tr>

<?php
 $tt=0;
while($row = mysqli_fetch_array($r)){

	echo "<tr>";	
echo "<td>".$row['productname']."</td>";	
echo "<td>Rs.".$row['productprice']."</td>";	
echo "<td>".$row['order_id']."</td>";
echo "<td>".$row['name']."</td>";
echo "<td>".$row['phone_no']."</td>";
echo "<td>".$row['quantity']."</td>";
echo "<td>".$row['address']."</td>";
echo "<td>".$row['city']."</td>";
echo "<td>".$row['pincode']."</td>";
echo "<td>".$row['message']."</td>";
echo "<td>".$row['deliverydate']."</td>";
echo "<td>".$row['deliverytime']."</td>";
echo "<td>Rs.".$row['totalamount']."</td>";
echo "<td>".$row['payment']."</td>";
echo "<td>".$row['orderstatus']."</td>";
$tt=$tt+$row['totalamount'];
}

echo "<tr><th colspan=12>TOTAL PAYABLE AMOUNT</th>";

echo "<td align=center colspan=3>Rs.".$tt."</td></tr>";
}
else{
echo "<h2 align=center> No Orders</h2>";
}


}


?>
</tr>
<table>
</html>