<?php
session_start();
if(empty($_SESSION['user'])){
   header("LOCATION: login.php");
}
 include '../core/connection.php';
?>


<!DOCTYPE html>
<html lang="en">
    <title>add article</title>
<?php
 include '../core/head.php';
?>
<body>
<div class="row">

<?php
 include '../core/sidebar.php';
?>
    <form action="" method="POST" enctype="multipart/form-data" style="width:920px; margin: left 16%;">
        <div class="form-group">
          <label for="formGroupExampleInput" class="inputlabel" style="margin-left:-2%;">Title</label>
          <input required type="text" class="form-control inputfield" id="formGroupExampleInput" placeholder="Title" name="title" style="margin-left:-1%;">
        </div>
        <div id="get-data-form" >
        <label for="formGroupExampleInput" class="inputlabel" style="margin-left:-2%;">Content</label>

        <textarea class="tinymce" id="texteditor" name="texteditor" ></textarea>


        </div>
    <div class="card mt-5 category" style="margin-left:-1%;">
                <div class="card-header">
                    <h4>Categories</h4>
                </div>
                <div class="card-body ">
                        <div class="from-group mb-3">
                            <input type="checkbox" name="categories[]" value="Sport"> Sport<br>
                            <input type="checkbox" name="categories[]" value="Policy"> Policy<br>
                            <input type="checkbox" name="categories[]" value="Economy"> Economy<br>
                            <input type="checkbox" name="categories[]" value="Health"> Health<br>
                            <input type="checkbox" name="categories[]" value="culture"> culture<br>
                            <input type="checkbox" name="categories[]" value="Technology"> Technology<br>
                        </div>
                </div>
    </div>

        <div class="form-group" style="margin-top:2%;">
        <label for="formGroupExampleInput" class="inputlabel" style="margin-left:-2%;">Image</label>
			<input class="form-control" type="file" name="uploadfile" value="" />
		</div> 
       
        <label for="formGroupExampleInput2" class="inputlabel" style="margin-left:-2%;">Author</label>
        <input required type="text" class="form-control inputfield" id="formGroupExampleInput2" placeholder="Author" name="author" style="margin-left:-1%;">
    </div>
    <!-- <div class="form-group">
                <label class="inputlabel">Enter the Date:</label>
                <input required type="date" name="date" placeholder="dd-mm-yyyy" value=""min="2022-01-01" max="9999-12-31" class="inputfield">
            </div> -->
                <div class="form-group" id="tag">
                    <label for="formGroupExampleInput2" class="" >Tags</label>
                    <select  class="js-example-basic-multiple" name="tags[]" multiple="multiple">
                        <option value="Sport"> Sport</option>
                        <option value="Policy"> Policy</option> 
                        <option value="Economy"> Economy</option>
                        <option value="Health"> Health</option>
                        <option value="Culture"> culture</option>
                        <option alue="Technology"> Technology</option>
                    </select>
                </div>

                    <button style="margin-left: 500px; width: 100px;" type="submit" name="upload" class="btn btn-primary">Save</button>
    </form>
    

<script src="../core/js/script.js"> </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>
<?php
 include '../core/connection.php';
 $conn = mysqli_connect("localhost","root","","news");

error_reporting(0);
if(isset($_POST['upload'])){
    $title = $_POST['title'];
    $notes = $_POST['texteditor'];
    $author= $_POST['author'];
    //$date  = $_POST['date'];

    $filename = $_FILES["uploadfile"]["name"];
 	$tempname = $_FILES["uploadfile"]["tmp_name"];
	$folder = "./../images/" . $filename;

    $query="INSERT into article (title,publish_date, content,author,`image`) VALUES ('$title', NOW(),'$notes','$author','$filename')";
    mysqli_query($conn,$query);
    if (move_uploaded_file($tempname, $folder)) {
		//echo "<h3> Image uploaded successfully!</h3>";
	} else {
		//echo "<h3> Failed to upload image!</h3>";
	}
    foreach ($_POST['categories'] as $key => $value) {
		$category=$_POST['categories'][$key];

		$insertqry="INSERT INTO category (`name`) VALUES ('$category')";
		$insertres=mysqli_query($conn,$insertqry);
	}
    foreach ($_POST['tags'] as $key => $value) {
		$category=$_POST['tags'][$key];

		$insertqry="INSERT INTO tags (`tag_name`) VALUES ('$category')";
		$insertres=mysqli_query($conn,$insertqry);
	}
}
?>
