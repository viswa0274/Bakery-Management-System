<?php
session_start();
if(isset($_POST['sub'])){
$conn= mysqli_connect("localhost","root","","bakery");
if(!$conn){
	die("Connection Failed:".mysqli_connect_error());
}
$s="SELECT * from `cart` where userid='$_SESSION[uid]';";
$r=mysqli_query($conn,$s);
echo mysqli_error($conn);
if(mysqli_num_rows($r)> 0){

while($row = mysqli_fetch_array($r)){
$a=$row['productid'];
$b=$row['cakename'];
$c=$row['price'];
$d=$row['quantity'];
$e=$row['price']*$row['quantity'];
$na=$_POST['fir'];
$u=$_SESSION['uid'];

$ms=$_POST['msg'];
$dt=$_POST['date'];
$ti=$_POST['time'];
$pa=$_POST['check'];
if(!$conn){
	die("Connection Failed:".mysqli_connect_error());
}
$s="INSERT INTO `order` (`product_id`, `productname`, `productprice`,`userid`, `quantity`, `message`, `deliverydate` ,`deliverytime`,`totalamount`,`payment`) VALUES ('$a','$b', '$c', '$u', '$d', '$ms', '$dt', '$ti', '$e', '$pa')";
$re=mysqli_query($conn,$s);
}
$r="DELETE from cart where userid='$_SESSION[uid]';";
if(mysqli_query($conn,$r)){
	header("location:success.html");

}
}
}
?>