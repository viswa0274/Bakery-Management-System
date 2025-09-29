<?php
session_start();
if(isset($_POST['but'])){
$n=$_POST['user'];
$p=$_POST['pwd'];
$conn= mysqli_connect("localhost","root","","bakery"); 
if(!$conn){
	die("Connection Failed:".mysqli_connect_error());
}
$s="SELECT * from admin where mobile='$n' and password='$p';";
$r=mysqli_query($conn,$s);
if (mysqli_num_rows($r)> 0){
  while($row = mysqli_fetch_array($r)){
	if($row['mobile']==$n && $row['password']==$p)
	{
		$_SESSION['aid']=$row['adminid'];
		header("Location:addadmin.html");
	}
  }
}
	else
	{
		header("Location:1.html");
}
}
?>








