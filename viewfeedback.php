<?php
if(isset($_POST['viewfeedback'])){
$conn= mysqli_connect("localhost","root","","bakery");
if(!$conn){
	die("Connection Failed:".mysqli_connect_error());
}
$s="SELECT * FROM `feedback`";
$result=mysqli_query($conn,$s);
?>
<html>
<head>
<?php
include 'addadmin.html';
?>
</head>
<style>
th{
 color:brown;
}
td{
 color:white;
}
h2{
color:white;
margin-top:10%;
}
</style>
<body>
<table align=center border="10">

	  <tr>
<th>FIRST NAME</th>
<th>LAST NAME</th>
<th>MAIL ID</th>
<th>PHONE NUMBER</th>
<th>FEEDBACK</th>
</tr>

<?php
if(mysqli_num_rows($result)>0){
	while($row=mysqli_fetch_assoc($result)){
	?>
	
		<tr>
		<td><?php echo $row['firstname'];?></td>
		<td><?php echo $row['lastname'];?></td>
		<td><?php echo $row['mailid'];?></td>
                <td><?php echo $row['phoneno'];?></td>
                <td><?php echo $row['feedback'];?></td>
                
	</tr>
<?php
}
}
else{
	echo"<h2 align=center>NO FEEDBACK</h2>";
	}
}

	?>
</table>
</center>
</body>
<html>