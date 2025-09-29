<?php
if(isset($_POST['but'])){
$u=$_POST['user'];
$n=$_POST['pwd'];
$p=$_POST['pwdd'];
$ph=$_POST['pwddd'];
$conn= mysqli_connect("localhost","root","","bakery");
if($n==$p){
if(!$conn){
	die("Connection Failed:".mysqli_connect_error());
}
$s="INSERT INTO `admin` (`name`, `password`, `confirmpassword`, `mobile`) VALUES ('$u', '$n', '$p', '$ph');";
if(mysqli_query($conn,$s)){
	header("location:login.html");
}
}else{
	header("location:1.html");
	}
}

	?>