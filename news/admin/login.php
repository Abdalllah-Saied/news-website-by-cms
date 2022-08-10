<!DOCTYPE html>
<?php
 include '../core/connection.php';
?>
<html lang="en">



<body>
<?php
 include '../core/head.php';
?>
    <div class="row">

    <?php

?> 
    <div class="form" style="width:400px;margin-top:100px;height:470px">
        <form action="loginLogic.php" class="was-validated" method="post" >
        
        <?php
             if(isset($_GET['error'])) {?>
                    <p class="error"><?php echo $_GET['error']?></p>
            <?php }?>

        <b><p style='text-align:center;font-size:26px;color:#4c5870'>Login</p></b>
            <div class="form-group">
                <label for="uname">Email:</label>
                <input type="text" class="form-control" id="uname" placeholder="Enter Email" name="uname" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="upassword" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group form-check">
                <label class="form-check-label">
                     <a class="forget_pas" href="#" style= 'color:#4c5870'>Forget Password?</a>
                     <p >if you haven't account <a href="#" style= 'color:#4c5870' >SIGN UP</a></p>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Check this checkbox to continue.</div>
                </label>
            </div>
            <button type="submit" class="btn btn" style='background-color:#4c5870;color: #ebedec'>Login</button>
            
            
        </form>
    
</div>
</body>

</html>