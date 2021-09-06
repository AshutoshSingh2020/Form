 <?php
session_start();
$con = mysqli_connect('localhost','root','' ,'crud');
 if (!$con){
 echo "Failed to connect to MySQL: ";
}
$result = mysqli_query($con,"SELECT * FROM user");
//echo "<pre>";print_r($result);die;
?>
<!DOCTYPE html>
<html>
<head>
	<title>View</title>
	 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="crud.css"> 

</head>
<body>
	<div class="right1">
	<?php
if (mysqli_num_rows($result) > 0) {
?>
	<table>
		<tr>
			<td>#Id</td>
			<td>Name</td>
			<td>Father Name</td>
			<td>Village</td>
			<td>Email</td>
			<td>Gender</td>
			<td>education</td>
			<th>Filename</th>
            <th>size (in mb)</th>
    		<th>Downloads</th>
    		<th>Action</th>
    		<td>Password</td>
			<td>Update</td>
			<td>Delete</td>
		</tr>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
	$_SESSION['id'] =  $row["id"];
?>
<tr>
    <td><?php echo $row["id"]; ?></td>
    <td><?php echo $row["name"]; ?></td>
    <td><?php echo $row["fatherName"]; ?></td>
    <td><?php echo $row["Village"]; ?></td>
    <td><?php echo $row["email"]; ?></td>
    <td><?php echo $row["gender"]; ?></td>
    <td><?php echo implode(", ",unserialize($row["education"])); ?></td>
	<td><?php echo $row['filename']; ?></td>
    <td><?php echo floor($row['size'] / 1000) . ' KB'; ?></td>
    <td><?php echo $row['download']; ?></td>
    <td><a href="read.php?file_id=<?php echo $row["id"]?>">Download</a></td>
    <td><?php echo $row["password"]; ?></td>
    <td><button><a href="update.php?userid=<?php echo $row["id"]; ?>">Update</a></button></td>
    <td><button><a href="delete.php?userid=<?php echo $row["id"];?>">Delete</a></button></td>
 </tr>
<?php
$i++;
}
?>
</table>
<?php
}
else{
    echo "No result found";
}
?>
</div>
</body>
</html>