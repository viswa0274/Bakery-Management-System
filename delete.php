<?php
include 'addadmin.html';
$con= mysqli_connect("localhost","root","","bakery");
    if(isset($_GET['product_id'])){
         $s="delete  from product where product_id='".$_GET['product_id']."';";
         $re=mysqli_query($con,$s);
          if(isset($re)){
               header('location:viewcake.php');
          }
    
     }
    
     ?>