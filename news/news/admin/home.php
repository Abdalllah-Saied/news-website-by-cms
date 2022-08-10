<!DOCTYPE html>
<?php
 include '../core/connection.php';
?>
<html>

<?php
 include '../core/head.php';
?>

<body>

    <div class="row">

    <?php
 include '../core/sidebar.php';
?>

      
      

        <div class="col-sm-10" style="padding-left:0px;">
            <!-- <div class="row">
                <div class="topnav">
                    <a href="login.html" style="text-decoration:none;">Login</a>
                </div>
               
            </div> -->
            <div class="row" style=" margin-top:25px;">

                <?php
                    $allArticles=mysqli_query($conn,"SELECT * FROM article");
                    if(mysqli_num_rows($allArticles) > 0){ 
                        $counter =0;
                        while($articles = mysqli_fetch_assoc( $allArticles)){
                            if($counter%3==0){
                        // conditions to control row closer
                                if($counter!=0 || $counter==3): ?>
                                    </div>
                                <?php 
                                endif;
                            }
                ?>
                <div class="col-sm-4">
                    <div class="card">
                        <a style="text-decoration:none ; color:black" href="page.php?articleid=<?php  echo $articles['article_id']; ?>" >
                            <img class="card-img-top"
                                src="..\images\<?php  echo $articles['image']; ?>"
                                alt="<?= $articles['image']; ?>" style="height: 228px;"> 
                            <div class="card-body">
                                <h4 class="card-title"> <?php  echo $articles['title']; ?> </h4>
                                <h5 class="card-text">
                                    Author: <?php  echo $articles['author']; ?>
                                </h5>
                                <p class="card-text" style="margin-left:70% ; margin-top: -30px;">
                                <?php  echo $articles['publish_date']; ?>
                                </p>
                                <p class="card-text">
                                <?php  echo $articles['article_category']; ?>
                                </p>
                            </div>
                        </a>
                    </div>
                </div>
                    <?php
                        $counter++;
                        }
                    ?>
                </div>
                <?php 
                    }
                    else{ 
                    echo "No results";
                    }
                ?>


            </div>
        </div>

    </div>






</body>

</html>