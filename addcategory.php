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
font-style:oblique;
padding:15px 20px;
}
.im{
width:275px;
height:300px;
}
.tab{
	border:20px;
	cursor:pointer;
}
.active{
	background-color:grey;
}
input[type=submit]
{
background-color:white;
border-radius:20px;
height:40px;
width:110px;
}
.imgs{
color:white;
}
</style>
</head>
<body>

<ul >
  <li><a href="navbar.php">Home</a></li>
  <li><a class="active" href="addcategory.php">Categories</a></li>
  <li><a href="branches.html">Branches</a></li>
  <li><a href="#about">About</a></li>
  <li><a href="user.php">User Login</a></li>
  <li><a href="login.html">Admin</a></li>
  <li><a href="feedback.html">FeedBack</a></li>
</ul>
</body>

<?php

$conn= mysqli_connect("localhost","root","","bakery");
if(!$conn){
	die("Connection Failed:".mysqli_connect_error());
}
$s="SELECT * from category ;";
$r=mysqli_query($conn,$s);



  
if (mysqli_num_rows($r)> 0){

  while($row = mysqli_fetch_array($r)){
$c=urlencode($row['categoryname']);
echo "<fieldset>";
         
  echo "<td><table align=center class=tab ></td>
		<td colspan=2><img class=im src='data:image/jpg;charset=utf8;base64,".base64_encode($row['image'])."'>
        <tr><td align=center class=imgs ><a href=wc.php?Cate=".$c.">".$row['categoryname']."</td></a>";
?>
     </table>
</html>
<?php
	 echo "</fieldset>";
	}

}
else{
	header("location:1.html");
}

?>
