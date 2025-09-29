<?php
session_start();
if(isset($_GET['id'])){
	if(!isset($_SESSION['uid']))
		header("Location:user.php");
}
?>
<html>
<style>
body{
  background-color: black;
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
input[type=text],input[type=number],input[type=date],input[type=tel]{
width:400px;
padding:15px 10px;
margin:10px;
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


fieldset{
background-color:white;
}
</style>
<body>
<ul >
  <li><a  href="navbar.php">Home</a></li>
  <li><a class="active" href="addcategory.php">Categories</a></li>
  <li><a href="branches.html">Branches</a></li>
  <li><a href="#about">About</a></li>
  <li><a href="user.php">User Login</a></li>
  <li><a href="login.html">Admin</a></li>
  <li><a  href="feedback.html">FeedBack</a></li>
</ul>
<fieldset>
<?php
$conn= mysqli_connect("localhost","root","","bakery");

if(!$conn){
	die("Connection Failed:".mysqli_connect_error());
}
$s="SELECT * from `user` where userid='$_SESSION[uid]';";
$r=mysqli_query($conn,$s);
echo mysqli_error($conn);
if(mysqli_num_rows($r)> 0){
	while($row = mysqli_fetch_array($r)){
		?>
<marquee>
<h2>Free Home Delivery For All!...</h2>
</marquee>
</fieldset>
<form action="next.php" method="POST">
<center>
<table border="1" cellpadding=18>
<tr>
<th colspan=2><h3>ORDER DETAILS</h3></th>
</tr>
<tr>
<th>Enter The Name</th>
<th><input type="text" name="fir" value=<?php echo $row['name'];?> readonly</th>
</tr>
<tr>
<th>Enter The Phone Number</th>
<th><input type=tel name="las" pattern="[0-9]{10}" value=<?php echo $row['phone_no'];?> minlength=10 maxlength=10 readonly></th>
</tr>
<tr>
<th>Select Quantity in KG</th>
<th><select name=qua class=qua required style="width:250px">
<optgroup>
<option value=1>1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
</optgroup>
</select></th>
</tr>
<tr>
<th>Address</th>
<td><input type=text  name="add"  value="<?php echo $row['address']?>" readonly></td>
</tr>
<tr>
<th>Select City</th>
<th><select name="city" style="width:250px" required>
<optgroup>
<option ><?php echo $row['city'];?></option>

</optgroup>
</select></th>
</tr>
<tr>
<th>Pincode</th>
<th><input type="text" name="pin" value=<?php echo $row['pincode'];?> readonly></th>
</tr>
<tr>
<th>Message On The Cake</th>
<th><textarea  name="msg" rows="3" cols="30" maxlength="50" placeholder="Message" class="fb"></textarea></th>
</tr>
<tr>
<th>Delivery Date</th>
<th><input type="date" name="date" required min=<?php echo date('Y-m-d')?>  ></th>
</tr>
<tr>
<th>Delivery Time</th>
<th><select name="time"  required style="width:175px" >
<optgroup>
<option >10Am to 12pm</option>
<option >1Pm to 4Pm</option>
<option >5Pm to 6Pm</option>
<option >7Pm to 9Pm</option>
</optgroup>
</select></th>

</table>
<br>
<input type="submit" name="sub" value="NEXT">
</center>
</form>

</body>
</html>

<?php
	}
}
$_SESSION['id']=$_GET['id'];
?>