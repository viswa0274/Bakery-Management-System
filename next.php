<html>
<style>
body{
  background-color: black;
}

table{
color:white;
font-size:25px;
font-family:century gothic;
padding:10px 10px;

}
input[type=submit]{
background-color:Mediumseagreen;
padding:10px 15px;
margin-left:3px;
width:10%;
}
.active{
background-color:grey;
}
h3{
font-size:30px;
font-family:century gothic;
color:white;
}
h2,h3{
color:#CA8E46;

}

.fb{
height:15%;
width:400px;
}
fieldset{
background-color:white;
}
table{
color:white;
border-style:solid;
font-size:25px;
font-family:century gothic;
padding:20px 10px;
width:40%;
margin-top:10%;
}
</style>
<body>
<?php
SESSION_START();
foreach($_POST as $k=>$v){
	$_SESSION[$k]=$v;
echo $k.$v;
}

?>
<form action="" method="POST">
<center>
<table cellpadding=10>
<tr>
<?php
$n=$_SESSION['id'];
$q=$_SESSION['qua'];
$conn= mysqli_connect("localhost","root","","bakery");
if(!$conn){
	die("Connection Failed:".mysqli_connect_error());
}
$s="SELECT * from `product` WHERE product_id='$n';";
$r=mysqli_query($conn,$s);
if(mysqli_num_rows($r)> 0){
  while($row = mysqli_fetch_array($r)){
	  $p=$q*$row['price'];
		echo "<th>TOTAL AMOUNT</th>
		<td><input type=text name=amount value=".$p." readonly></td></tr>";
  }
}
?>
<tr>
<th>PAYMENT</th>
<td><input type="checkbox" name="check" required value="COD">COD</td>
</tr>
</table>
<input type="submit" name="subb" value="CANCEL ORDER">
<input type="submit" name="subm" value="PLACE ORDER">
</form>
</html>
<?php

if(isset($_POST['subm'])){
	$n=$_SESSION['id'];
$pn=$_SESSION['cake'];
$pi=$_SESSION['image'];
$pp=$_SESSION['price'];
	$na=$_SESSION['fir'];
	$ph=$_SESSION['las'];
	$q=$_SESSION['qua'];
	$ad=$_SESSION['add'];
$u=$_SESSION['uid'];
$ct=$_SESSION['city']; 
$pi=$_SESSION['pin'];
$ms=$_SESSION['msg'];
$dt=$_SESSION['date'];
$ti=$_SESSION['time'];
$am=$_POST['amount'];
$pa=$_POST['check'];
	
$conn= mysqli_connect("localhost","root","","bakery");
if(!$conn){
	die("Connection Failed:".mysqli_connect_error());
}
$s="INSERT INTO `order` (`product_id`, `productname`, `productprice`, `userid`, `quantity`, `message`, `deliverydate` ,`deliverytime`,`totalamount`,`payment`) VALUES ('$n','$pn', '$pp','$u', '$q', '$ms', '$dt', '$ti', '$am', '$pa')";
if(mysqli_query($conn,$s)){
	header("location:success.html");
}
}

if(isset($_POST['subb'])){
	header("location:navbar.php");
}
	?>