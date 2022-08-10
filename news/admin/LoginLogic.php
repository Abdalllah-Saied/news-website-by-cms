<?php 
session_start();

include "../core/connection.php";
if(isset($_POST['uname'])&&isset($_POST['upassword']))
{
    
    function validate($conn,$data){
            $data=trim($data);
            $data=stripslashes($data);
            $data=htmlspecialchars($data);
            $data=mysqli_real_escape_string($conn,$data);
            return $data;

    }
    $uname=validate($conn,$_POST['uname']);
    $upassword=validate($conn,$_POST['upassword']);


    if(empty($uname))
    {
        header("Location:login.php?error= User Name is required");
        exit();
    }
    else if (empty($upassword))
    {
        header("Location:login.php?error= password is required");
        exit();
    }
    else
    {
        $sql="SELECT * from `user` where `mail`='$uname' AND `password`='$upassword' ";

        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)===1)
        {
            $row=mysqli_fetch_assoc($result);
            echo $uname;
            echo $upassword;
            echo $row['mail'];
            echo $row['password'];
            // if($row['mail']===$uname&&$row['password']===$upassword)
            // {
                // echo "Loged in Successfully";

                $_SESSION['id']=$row['id'];
                $_SESSION['mail']=$row['mail'];
                $_SESSION['password']=$row['password'];
                $_SESSION['position']=$row['position'];
               
                if($row['position']==="1") //1 for user
                {
                    $_SESSION['user']=$uname;
                    // echo "55555";
                    header("location:home.php");
                     exit();
                }
                else                      //else
                {
                    header("location:Dashboard.php");
                     exit();
                }
                
            //}
           
        }
        else
        {
            header("Location:login.php?error= Incorrect password or Email ");
             exit();
        }
    }
}
else
{
    header("Location:login.php");
    exit();
}