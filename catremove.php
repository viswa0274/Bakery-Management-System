<?php
include 'addadmin.html';
$con= mysqli_connect("localhost","root","","bakery");
    if(isset($_GET['categoryname'])){
         $s="delete  from category where categoryname='".$_GET['categoryname']."';";
         $re=mysqli_query($con,$s);
          if(isset($re)){
               header('location:viewcategory.php');
          }
    
     }
    
     ?>