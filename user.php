<?php
session_start();
?>
<html>
<head>
<style>
body{
background-color:black;
}

ul {
  list-style-type: none;
  overflow: hidden;
  background-color: black;
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
h1{
text-align: center;
Color: white;
font-family: cursive;
}
p{
text-align: center;
Color: white;
font-family: oblique;
}
.active{
background-color: grey;
}
.bt{

font-family:oblique;
padding:10px 20px;
background-color: MediumSeaGreen;
}


input[type=submit]{
background-color:MediumSeaGreen ;
padding:10px 15px;
margin:10px 0px;
width:8%;
cursor: pointer;
border-radius:2100px;
}
input[type=password],input[type=number]{
align:center;
width:120%;
padding:10px 5px;
margin:10px;
}
.h{
color:white;
}
</style>
<body>

<ul>
  <li><a  href="navbar.php">Home</a></li>
  <li><a href="addcategory.php">Categories</a></li>
  <li><a href="branches.html">Branches</a></li>
  <li><a href="#about">About</a></li>
  <li><a class="active" href="user.php">User Login</a></li>
  <li><a href="login.html">Admin</a></li>
   <li><a href="feedback.html">FeedBack</a></li>
</ul>
</head>
<center>
<div class="top">
<Form action="user.php" method="POST">
<h1><i>User Login</i></h1>
<table style="color:LightGray;" cellpadding=10 >
<tr>
<th>Mobile Number</th>
<th><input type="number" name="user" placeholder="Enter The Phone Number" length=10 required></th>
</tr>
<tr>
<th>PASSWORD</th>
<th><input type="password" placeholder=Password name="pwd" required></th>
</tr>
</table>

<br>
<input type="submit" name="but" value="Sign In" class=bt>
</form>

<form action="newuser.php">
<input type="submit" name="sub" value="Sign Up" class=bt>
</form>
</center>
</div>
</body>
</html>
<?php
if(isset($_POST['but'])){
$n=$_POST['user'];
$p=$_POST['pwd'];
$conn= mysqli_connect("localhost","root","","bakery");

if(!$conn){
	die("Connection Failed:".mysqli_connect_error());
}
$s="SELECT * from user WHERE phone_no='$n'and password='$p';";
$r=mysqli_query($conn,$s);
if (mysqli_num_rows($r)> 0){
  while($row = mysqli_fetch_array($r)){
	if($row['phone_no']==$n && $row['password']==$p)
	{
		$_SESSION['n']=$row['name'];
		
		$_SESSION['phone']=$row['phone_no'];
		$_SESSION['uid']=$row['userid'];
		header("Location:navbar.php");
	}
	}
}
else{
	?>
<html>
<div class="h">
<center>
<?php
	echo "Please Enter Correct Password Or Mobile Number";
?>
<html>
</center>
	</div>
<?php
}
}

?>