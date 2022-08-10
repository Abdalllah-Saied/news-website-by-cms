<?php
 include '../core/connection.php';
?>
<html>

<body>
<?php
 include '../core/head.php';
?>
    
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

            <?php
                if(isset($_GET['articleid'])){
                    $articleid = $_GET['articleid']; 
                }
                $allArticles=mysqli_query($conn,"SELECT * FROM article WHERE article_id = '$articleid';");
                    if(mysqli_num_rows($allArticles) > 0){ 
                        while($article = mysqli_fetch_assoc( $allArticles)):
            ?>

            <div class="row" style=" margin-top:25px;">

                <div class="col-sm-12">
                    <div style="margin-left:1%;">
                        <br />
                        <h1> <strong> <?= $article['title'];?> </strong> </h1>
                        <h5> <?= $article['publish_date'];?></h5>
                        <br />
                        <img class="card-img-top"
                            src="..\images\<?php  echo $article['image']; ?>" alt="<?= $articles['image']; ?>"
                            style="width:65%; margin-left: 14%;">
                        <br /> <br /> <br />
                        <h3>Author: <?= $article['author'];?></h3>

                        <h4>Category:  <?= $article['article_category'];?></h4>
                        <br /><br />
                        <div>
                            <?= $article['content'];?>
                        </div>
                        <br />
                        <div>
                            <h5>
                                Tags 
                            </h5>
                            <p>
                                <?= $article['tags'];?>
                            </p>

                        </div>
                       
                        <br /> 


        <!-- <button class="btn btn-danger" style=" background-color:#fe4854;" ><a href="delete.php?
        deleteID='.$ID.'"
         calss="text-light" style="color:white;text-decoration:none;">Delete</a></button> -->
       

                        <button type="button" style="margin-left:35px;" class="btn btn-danger"><a href="delete.php? articleid=<?php  echo $article['article_id']; ?>">Delete</a></button>
                        <button type="button" style="margin-left:10px;" class="btn btn-secondary"><a href="edit.php? articleid=<?php  echo $article['article_id']; ?>">Edit</a></button>

                        <br /> <br /> <br /> <br /> 
                        <?php 
                            endwhile;
                        }
                        else {
                            echo "No article found";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>