<?php
 include '../core/connection.php';
 
 error_reporting(0);
if(isset($_POST['submit'])){
    $title = $_POST['title'];
    $notes = $_POST['texteditor'];
    $author= $_POST['author'];
    $date  = $_POST['date'];
    $filename = $_FILES["uploadfile"]["name"];
 	$tempname = $_FILES["uploadfile"]["tmp_name"];
	$folder = "./images/" . $filename;
    $conn = mysqli_connect("localhost","root","","news");
    $query="INSERT into article (title,publish_date, content,author,image) VALUES ('$title','$date','$notes','$author','$filename')";
    $query_run=mysqli_query($conn,$query);
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

