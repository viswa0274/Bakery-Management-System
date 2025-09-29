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
input[type=submit]{
background-color:Mediumseagreen;
padding:10px 15px;
margin:1px 0px;
width:15%;
}
input[type=text],input[type=password],input[type=number],input[type=date],input[type=tel]{
width:400px;
padding:15px 10px;
margin:10px;
}
table{
color:white;
font-size:25px;
font-family:century gothic;
}

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
h2{
color:#CA8E46;
font-size:40px;
}
</style>
</head>
<body>

<ul >
  <li><a  href="navbar.php">Home</a></li>
  <li><a href="addcategory.php">Categories</a></li>
  <li><a href="branches.html">Branches</a></li>
 
  <li><a href="user.php">User Login</a></li>
 <li><a href="cart.php">Cart</a></li>
  <li><a href="orderst.php">Order</a></li>
  <li><a href="login.html">Admin</a></li>
<li><a href="feedback.html">FeedBack</a></li>
<li><a class="active" href="profile.php">Profile</a></li>
</ul>
</body>
</html>
<?php
session_start();
$u=$_SESSION['uid'];
$conn= mysqli_connect("localhost","root","","bakery");

if(!$conn){
	die("Connection Failed:".mysqli_connect_error());
}
$s="SELECT * from `user` where `userid`='$u';";
$r=mysqli_query($conn,$s);
echo mysqli_error($conn);

if(mysqli_num_rows($r)> 0){

while($row = mysqli_fetch_array($r)){
?>
<h2 align=center><?php echo $row['name']?>'s Profile</h2>  
<form action="" align=center method="POST">
<table align=center cellpadding=10>
<tr>
<th>Username</th>
<?php echo "<td><input type=text pattern='[a-zA-z]{2,25}' name=fir value='$row[name]' required></td></tr>";?>
<th>Password</th>
<?php echo "<td><input type=password name=pas value='$row[password]' required></td></tr>";?>
<tr><th>Phone</th>
<?php echo "<th><input type=tel name=las pattern=[0-9]{10} value=$row[phone_no] minlength=10 maxlength=10 required ></th>";?>
<tr><th>Address</th>
<?php echo "<td><input type=text  name=add  value='".$row['address']."' required></td>";?>
<tr><th>Select City</th>
<?php echo "<th><select name=city style=width:250px  required>
<optgroup>
<option selected>$row[city]</option>
<option >Tirunelveli</option>
<option >Thoothukudi</option>
<option >Tiruchendur</option>
<option >Tenkasi</option>
</optgroup>
</select></th>";?>
<tr><th>Pincode</th>
<?php echo "<th><input type=text name=pin value=$row[pincode] required></th></tr>";







}
}


echo "</table><input type=submit name=sub value=Update>";
if(isset($_POST['sub'])){
session_start();
$u=$_SESSION['uid'];
$a=$_POST['fir'];
$p=$_POST['pas'];
$b=$_POST['las'];
$c=$_POST['add'];
$d=$_POST['city'];
$e=$_POST['pin'];
$conn= mysqli_connect("localhost","root","","bakery");

if(!$conn){
	die("Connection Failed:".mysqli_connect_error());
}
$s="UPDATE user SET `name`='$a',`password`='$p',`phone_no`='$b',`address`='$c',`city`='$d',`pincode`='$e' WHERE userid='$u';";
if(mysqli_query($conn,$s)){

}
}
?>
