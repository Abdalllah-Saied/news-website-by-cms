<!DOCTYPE html>
<?php 
 include '../core/connection.php';


 $articleid=$_GET['articleid'];
 $test=mysqli_query($conn,"SELECT * from article where article_id='$articleid'");
 $row=mysqli_fetch_assoc($test);
  if(isset($_POST['submit_btn'])){
   
    $title=$_POST['title'];
    $image=$_POST['image'];
    $content=$_POST['content'];
    $author=$_POST['author'];
    $tags=$_POST['tags'];
    $article_category=$_POST['article_category'];
    $related_links=$_POST['related_links'];
    $video=$_POST['video'];

    $sql = "update `article` set article_id=$articleid, title='$title',
   image='$image',content='$content',
    author='$author',article_category='$article_category',related_links='$related_links',video='$video', tags='$tags' where article_id=$articleid";
    $product = mysqli_query($conn,$sql);

    if($product){
         header('location:home.php');  
        
    } else{
        die(mysqli_error($conn));
    } }
    
    $select = "SELECT * FROM `category`";
    $result3 = mysqli_query($conn,$select);
    ?>

<?php
 include '../core/head.php';
?>

<body>

    <div class="row">

        <?php
 include '../core/sidebar.php';
?>

        <div class="col-sm-10" style="padding-left:0px;">
        <div class="row">
            <div class="topnav">
                <a href="#login" style="text-decoration:none;">Login</a>

            </div>
            <div>

            <div class="row" style=" margin-top:80px;">
                <form action="" method="Post" class="was-validated" style="width:75%;  ">

                    <label> Title </label>
                    <input type="text" placeholder="Enter title" value="<?php  echo  $row['title']; ?>"
                        class="form-control" name="title" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>

                    <label> Author </label>
                    <input type="text" placeholder="Enter author name" value="<?php  echo  $row['author']; ?>"
                        class="form-control" name="author" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>

                    <label> Image </label>
                    <input type="text" placeholder="Enter image" value="<?php  echo  $row['image']; ?>"
                        class="form-control" name="image" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>

                    <label> Content </label>
                    <input type="text" placeholder="Enter image" value="<?php  echo  $row['content']; ?>"
                        class="form-control" name="content" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>

                    <label>  Category </label>
                    <input type="text" placeholder="Enter image" value="<?php  echo  $row['article_category']; ?>"
                        class="form-control" name="article_category" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>

                    <label> Tags </label>
                    <input type="text" placeholder="Enter Tags" value="<?php  echo  $row['tags']; ?>"
                        class="form-control" name="tags" >
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>

                    <label> Related Links </label>
                    <input type="text" placeholder="Enter Tags" value="<?php  echo  $row['related_links']; ?>"
                        class="form-control" name="related_links" >
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>

                    <label> Videos </label>
                    <input type="text" placeholder="Enter Tags" value="<?php  echo  $row['video']; ?>"
                        class="form-control" name="video" >
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>

                    <button name="submit_btn" class="btn btn-success" style="background-color: #fe4854;   border: none;  margin-right:20px; margin-left:15px; margin-top: 13px; height: 49px; 
                 width: 90px; font-weight:bold ; font-size:20px;"> Update </button>
                </form>
            </div>
        </div>
</body>

</html>