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
session_start();
$a=$_GET['productid'];
$conn= mysqli_connect("localhost","root","","bakery");
if(!$conn){
	die("Connection Failed:".mysqli_connect_error());
}
$r="DELETE from cart where userid='$_SESSION[uid]' && productid='$a';";
if(mysqli_query($conn,$r)){
	header("location:cart.php");

}