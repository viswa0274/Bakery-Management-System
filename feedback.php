<?php
if(isset($_POST['sub'])){
$f=$_POST['fir'];
$l=$_POST['las'];
$m=$_POST['mail'];
$ph=$_POST['pho'];
$fe=$_POST['fdb'];
$conn= mysqli_connect("localhost","root","","bakery");
if(!$conn){
	die("Connection Failed:".mysqli_connect_error());
}
$s="INSERT INTO `feedback` (`firstname`, `lastname`, `mailid`, `phoneno`, `feedback`) VALUES ('$f', '$l', '$m', '$ph', '$fe');";
$r=mysqli_query($conn,$s);
if($r){
	header("location:success.html");
}
else{
	header("location:1.html");
	}
}

	?>