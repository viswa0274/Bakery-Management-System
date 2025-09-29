<?php
	$con= mysqli_connect("localhost","root","","bakery");
	if(!$con){
		die("Connection Failed:".mysqli_connect_error());
	}
               if(isset($_POST['sub'])){
                $price=$_POST['price'];
				  $c=$_POST['cake'];
				  $s=$_POST['sh'];
				   $f=$_POST['fl'];
$cn=$_POST['cat'];
	$a=$_GET['product_id'];
                if(!empty($_FILES['img']['name'])){
                  $image=basename($_FILES['img']['name']);
                  $image_type=pathinfo($image,PATHINFO_EXTENSION);
                  if($image_type=='jpg' or $image_type=='png' or $image_type=='jpeg' or $image_type=='gif'){
                   $img=$_FILES['img']['tmp_name'];
                   $img=addslashes(file_get_contents($img));
                   $sq="UPDATE `product` SET `image`='$img' WHERE product_id='$a';";
                   $re=mysqli_query($con,$sq);
                }
                  else{
                    die ("<script type/javascript>
                  alert('only jpg,png,jpeg,gif photos are allowed ');
                  </script>");
                }}
               $sql="UPDATE `product` SET `cakename`='$c', `category`='$cn' , `price`='$price' ,`shape`='$s' ,`flavour`='$f' WHERE product_id='$a';";
   
               $r=mysqli_query($con,$sql);
               if(isset($r))
			   {
                header("location:viewcake.php");
               }
               else{
                echo "not update";
               }

               }
           ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Details</title>
    
</head>
<?php
include 'addadmin.html';
?>
<style>
table{
 color:brown;
}
</style>
<body>
    <header>
          
    </header>
    
      <main>
        
    <form action="" method="post" enctype="multipart/form-data">
	

		 
        <table align=center cellpadding=20>
           
            <?php 
	
             if(isset($_GET['product_id'])){
                $a=$_GET['product_id'];
              
              $r="select * from product where product_id='$a';";
               $re=mysqli_query($con,$r);
               while($row=mysqli_fetch_array($re)){
                $im=$row['image'];
                echo "<tr><td >CAKEID<td><input type=number value=".$row['product_id']." readonly>
                        <td colspan=2><img src=data:image/jpg;charset=utf8;base64,".base64_encode($im)." width=100% height='100px auto' alt='No
                        Image'><tr><td><td><td colspan=2 rowspan=2><input type=file accept=image/*  name=img>
                <tr><tr> <td>CAKENAME<td><input type=text value='".$row['cakename']."' name=cake>
				
                <tr><td>CATEGORY<td><input type=text value='".$row['category']."' name=cat readonly >
				 <tr><tr> <td>SHAPE<td><input type=text value='".$row['shape']."' name=sh>
				 <tr><tr> <td>FLAVOUR<td><input type=text value='".$row['flavour']."' name=fl>
                <tr><td>PRICE<td><input type=number required value='".$row['price']."'  min=0 name=price required>";
                     }         
	}       
  ?>
           <tr><td colspan=3><input type=submit name=sub value=update>
            </form>
            

  </table>
  </main>
</body>
</html>