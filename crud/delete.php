<?php
session_start();
$con = mysqli_connect('localhost','root','' ,'crud');
 if (!$con){
 echo "Failed to connect to MySQL: ";
}
$id =$_SESSION['id'] ;
$result ="DELETE FROM `user` WHERE `id`=$id";
if(mysqli_query($con,$result)){
header('Location: read.php');
}
//$row= mysqli_fetch_array($result);
// echo "<pre>";print_r($result);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Delete</title>
	 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<link rel="stylesheet" type="text/css" href="crud.css"> 

</head>
<body>
	<div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> Infomation is successfully deleted.
  </div>

</body>
</html>