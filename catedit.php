<?php
	$con= mysqli_connect("localhost","root","","bakery");
	if(!$con){
		die("Connection Failed:".mysqli_connect_error());
	         }
               if(isset($_POST['sub']))
      {
                $c=$_POST['categoryname'];
	$a=$_GET['categoryname'];
                if(!empty($_FILES['image']['name']))
                   {
                  $image=basename($_FILES['image']['name']);
                  $image_type=pathinfo($image,PATHINFO_EXTENSION);
                  if($image_type=='jpg' or $image_type=='png' or $image_type=='jpeg' or $image_type=='gif')
                     {
                   $img=$_FILES['image']['tmp_name'];
                   $img=addslashes(file_get_contents($img));
                   $sq="UPDATE `category` SET `image`='$img' WHERE categoryname='$a';";
                   $re=mysqli_query($con,$sq);
                      }
                  else 
                    {
                    die ("<script type/javascript>
                  alert('only jpg,png,jpeg,gif photos are allowed ');
                  </script>");
                    }
                  }
               $sql="UPDATE `category` SET  `categoryname`='$c'  WHERE categoryname='$a';";
               $r=mysqli_query($con,$sql);
               if(isset($r))
                {
               header("location:viewcategory.php");
               }
               else
               {
                echo"not update";
               }
     }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Edit Details</title>
    </head>
<?php
include 'addadmin.html';
?>
<style>
td{
  color:brown;
  font-style:bold;
  font-size:100%;
}
</style>
<body>
    <header>   
    </header>
    
      <main>   
    <form action="" method="post" enctype="multipart/form-data">
        <table align=center padding=20>
            <?php
             if(isset($_GET['categoryname']))
               {
              $a=$_GET['categoryname'];
              $r="select * from category where categoryname='$a';";
               $re=mysqli_query($con,$r);
               while($row=mysqli_fetch_array($re))
                    {
                $im=$row['image'];
                echo 
                     "<tr><td>CATEGORY NAME:<td><input type=text value='".$row['categoryname']."' name=categoryname required ><br>
                     <td><img src=data:image/jpg;charset=utf8;base64,".base64_encode($im)." width=100% height='100px auto' alt='No
                        Image'><tr><td><td><td colspan=2 rowspan=2><br><input type=file accept=image/*  name=image>";
                     }         
	       }  
   
?> 
           <input type=submit name=sub value=update >
            </form>  
</table>
</main>
</body>
</html>