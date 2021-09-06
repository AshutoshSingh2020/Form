<?php
@session_start();
$con = mysqli_connect('localhost','root','' ,'crud');
 //Check connection
if (!$con){
 echo "Failed to connect to MySQL: ";
}

if(isset($_POST['matric']))
{
  $matric = $_POST['matric'];
}


if(count($_POST)>0) {
  $education_value = serialize($_POST['chick_list']);
  $sql = "UPDATE `user` SET `name`='".$_POST['name']."',`fatherName`='".$_POST['fname']."',`Village`='".$_POST['vname']."',`email`='".$_POST['email']."',`gender`='".$_POST['gender']."',  `education`='$education_value',`password`='".$_POST['password']."'";
  //echo $sql;die;
  if (mysqli_query($con,$sql)) {
    echo '<script>alert("Successfully updated")</script>';
    # code...
  }
}
$id = $_SESSION['id'];
$query ="SELECT * FROM `user` WHERE `id` = $id";
//echo "<pre>";print_r($query);die;
if(mysqli_query($con,$query))
{
  $result = mysqli_query($con,$query);
  echo '<script>alert("Are you sure update the information")</script>';
$row= mysqli_fetch_assoc($result);

}
//echo "<pre>";print_r($row);die;
?>
<!DOCTYPE html>
<html>
<head>
  <title>Update</title>
  <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="crud.css"> 
  </head>
<body>
<div class="cForm">
  <h1>Updation</h1>
  <form name="Curd" id="Curd" class="Curd" method="post" action="">
      
    <div class="form-group">
    <label for="Name">Name:</label>
    <input type="text" class="form-control" id="name" name="name" aria-describedby="" placeholder="Enter Name" value="<?php echo $row['name']; ?>">
    </div>
    <div class="form-group">
    <label for="fName">Father Name:</label>
    <input type="text" class="form-control" id="fname" name="fname" aria-describedby="" placeholder="Enter Father Name" value="<?php echo $row['fatherName']; ?>">
    </div>
    <div class="form-group">
    <label for="Name">Village:</label>
    <input type="text" class="form-control" id="vname" name="vname" aria-describedby="" placeholder="Enter Village Name" value="<?php echo $row['Village']; ?>">
    </div>

  <div class="form-group">
    <label for="email1">Email address:</label>
    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email" value="<?php echo $row['email']; ?>">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-check">
     <label class="form-check-label" for="gender">
    Gender
  </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

  <input class="form-check-input" type="radio" name="gender" id="gender" value="male"  <?php echo $row['gender']=='male'?'checked':''; ?> >
  <label class="form-check-label" for="gender">
    Male
  </label> &nbsp;&nbsp;&nbsp;
  <input class="form-check-input" type="radio" name="gender" id="gender" value="female" <?php echo $row['gender']=='female'?'checked':''; ?>>
  <label class="form-check-label" for="gender">
    Female
  </label> &nbsp;&nbsp;&nbsp;
  <input class="form-check-input" type="radio" name="gender" id="gender" value="others" <?php echo $row['gender']=='others'?'checked':''; ?>>
  <label class="form-check-label" for="gender">
    other
  </label>
</div>
<?php
$education = unserialize($row['education']);
 ?>
 <div class="form-check">
  <label>Education</label>n &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="checkbox" <?php echo in_array('matric',$education)?'checked':''; ?> class="form-check-input" id="matric" name="chick_list[]" value="matric">
    <label class="form-check-label" for="exampleCheck1">Matric</label>
    &nbsp;&nbsp;&nbsp;
    <input <?php echo in_array('Intermidiate',$education)?'checked':''; ?> type="checkbox" class="form-check-input" id="Intermidiate" name="chick_list[]" value="Intermidiate">
    <label class="form-check-label" for="exampleCheck1">Intermidiate</label> &nbsp;&nbsp;&nbsp;

    <input <?php echo in_array('graduate',$education)?'checked':''; ?> type="checkbox" class="form-check-input" id="graduate" name="chick_list[]" value="graduate">
    <label class="form-check-label" for="exampleCheck1">Post Graduate</label>
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Password:</label>
    <input type="text" class="form-control" id="password" placeholder="Password" name="password" value="<?php echo $row['password']; ?>">
  </div>

  <button type="submit" class="btn btn-primary" name="Submit" id="submit" >Update</button>
  
</form>
</div>
</body>
</html>
<?php 
?>