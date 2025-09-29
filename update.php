if(isset($_POST['sub'])){
$u=$_SESSION['uid'];
$a=$_POST['fir'];
$b=$_POST['las'];
$c=$_POST['add'];
$d=$_POST['city'];
$e=$_POST['pin'];
$conn= mysqli_connect("localhost","root","","bakery");

if(!$conn){
	die("Connection Failed:".mysqli_connect_error());
}
$s="UPDATE user SET name='$a',phone_no='$b',addres='$c',city='$d',pincode='$e' WHERE userid='$u';";
if(mysqli_query($conn,$s)){
 echo "<h2 align=center>Updated Successfully</h2>";
}
}