<?php
	include('conn.php');
	$product_name=$_POST['product_name'];
	$price = $_POST['price'];
  $image = $_FILES['image']['name'];

$username = $_SESSION['name'];

	$user_id = mysqli_query($conn, "SELECT 'id' FROM 'accounts' WHERE username = $username");

if(file_exists("upload/" . $FILES["image"]["name"])){
	$store = $_FILES["image"]["name"];
	$_SESSION['status']= "Image already exists. '.$store.'";
		header('location:index.php');
} else {
	$query = "INSERT INTO product (product_name, price, image, user_id) VALUES ('$product_name','$price', '$image', '$user_id')";
	$query_run = mysqli_query($conn, $query);
	if($query_run) {
		move_uploaded_file($_FILES["image"]["tmp_name"], "databaseimages/".$_FILES["image"]["name"]);
		$_SESSION['success'] = "Item added";
		header('location:index.php');
	} else {
		header('location:index.php');
	}
}
?>
