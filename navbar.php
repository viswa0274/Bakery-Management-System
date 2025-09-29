<?php
session_start();
if(isset($_SESSION['uid'])){
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
padding-right:30%;

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
</style>
</head>
<body>

<ul >
  <li><a class="active" href="navbar.php">Home</a></li>
  <li><a href="addcategory.php">Categories</a></li>
  <li><a href="branches.html">Branches</a></li>
 
  <li><a href="user.php">User Login</a></li>
   <li><a href="login.html">Admin</a></li>
 <li><a href="cart.php">Cart</a></li>
  <li><a href="orderst.php">Order</a></li>
<li><a href="feedback.html">FeedBack</a></li>
<li><a href="profile.php">Profile</a></li>
<li><a href="logoutuser.php">LogOut</a></li>
<form action="" method="POST">

</ul>
<img src="jonathan-borba-5G9uIkAXLSc-unsplash.jpg" class="home">
<h1>Welcome To Italian Bakery</h1>
<p><i>A celebration of living, Italian Bakery is the perfect place to dine in style, grab a bite, eat solo or unwind with friends in luxurious settings. Discover the perfect space to socialize in a creative setting imbued in luxury and exemplary service.<i></p>
<table>
<tr>
<th><img src="pexels-lisa-fotios-907142.jpg" class="two"></th>
<div class="p">
<td><p>We keep all the ingredients seasonal, well-sourced and of the highest quality.Everything is hand-iced and baked in small batches to really give the essence of simple old fashioned cooking.</p></td>
</tr></p></td>
</tr>
</div>
</table>
</body>
</html>
<?php
}
else{
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
padding-right:30%;

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
</style>
</head>
<body>

<ul >
  <li><a class="active" href="navbar.php">Home</a></li>
  <li><a href="addcategory.php">Categories</a></li>
  <li><a href="branches.html">Branches</a></li>
  <li><a href="#about">About</a></li>
  <li><a href="user.php">User Login</a></li>
  
  <li><a href="login.html">Admin</a></li>
<li><a href="feedback.html">FeedBack</a></li>
<div class="search">
<form action="" method="POST">

</ul>
<img src="jonathan-borba-5G9uIkAXLSc-unsplash.jpg" class="home">
<h1>Welcome To Italian Bakery</h1>
<p><i>A celebration of living, Italian Bakery is the perfect place to dine in style, grab a bite, eat solo or unwind with friends in luxurious settings. Discover the perfect space to socialize in a creative setting imbued in luxury and exemplary service.<i></p>
<table>
<tr>
<th><img src="pexels-lisa-fotios-907142.jpg" class="two"></th>
<div class="p">
<td><p>We keep all the ingredients seasonal, well-sourced and of the highest quality.Everything is hand-iced and baked in small batches to really give the essence of simple old fashioned cooking.</p></td>
</tr></p></td>
</tr>
</div>
</table>
</body>
</html>
<?php
}
?>