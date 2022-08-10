
<?php
session_start();
if(empty($_SESSION['user'])){
   header("LOCATION: login.php");
}
 include '../core/connection.php';
 if(isset($_GET['articleid'])){
    $Id=$_GET['articleid'];
    $sql="delete from article where article_id=$Id";
    
    $query=mysqli_query($conn,$sql);
    
 if($query){
   

    // echo "Deleted Successfull";
    header('location:home.php');  
    echo
    "
    <script> alert('Data deleted Successfully'); </script>
    ";
    
} else{
    die(mysqli_error($conn));
}
 }


 ?> 