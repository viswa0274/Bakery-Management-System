<html>
<style>

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
.fb{
height:15%;
width:400px;
}
table{
color:white;
font-size:25px;
font-family:century gothic;
}
</style>
<body style="background-color:black";>

<Form action="" method="POST">
<center>
<h1 style="color:white;"><b>Creating New User Login</b></h1>
</center>
<table align="center">
<tr>
<th>Username</th>
<th><input type="text" name="user" pattern="[a-zA-z]{2,25}" placeholder="Enter The Username" required></th>
</tr>
<br>
<tr>
<th>Password</th>
<th><input type="password" name="pwd" placeholder="Enter The New Password" required></th>
</tr>

<tr>
<th>Phone</th>
<th><input type="text" name="pwddd" pattern="[0-9]{10}" placeholder="Enter The Phone Number" required maxlength=10></th>
</tr>
<tr>
<th>Address</th>
<td><textarea  name="add" rows="6" required cols="30" maxlength="150" placeholder="Address" class="fb"></textarea></td>
</tr>
<th>Select City</th>
<th><select name="city" style="width:250px" required>
<optgroup>
<option >Tirunelveli</option>
<option >Thoothukudi</option>
<option >Tiruchendur</option>
<option >Tenkasi</option>
</optgroup>
</select></th>
</tr>
<tr>
<th>Pincode</th>
<th><input type="text" pattern="[0-9]{6}" name="pin" min=0 maxlength="6" required placeholder="Pincode"></th>
</tr>
</table>
<br>
<center>
<input type="submit" name="but" value="Create"></form>
</center>
</body>
</html>
<?php
if(isset($_POST['but'])){
$u=$_POST['user'];
$p=$_POST['pwd'];
$ph=$_POST['pwddd'];
$a=$_POST['add'];
$c=$_POST['city'];
$pi=$_POST['pin'];
$conn= mysqli_connect("localhost","root","","bakery");
if(!$conn){
	die("Connection Failed:".mysqli_connect_error());
}
$s="INSERT INTO `user` (`userid`,`name`, `password`, `phone_no`,`address`,`city`,`pincode`) VALUES ('','$u', '$p', '$ph', '$a', '$c', '$pi')";
if(mysqli_query($conn,$s)){
	header("location:user.php");
}
else{
	echo "Failed";
}
}
	?>