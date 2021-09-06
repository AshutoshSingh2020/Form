<?php
  $con = mysqli_connect('localhost','root','' ,'crud');
  if (!$con){
   echo "Failed to connect to MySQL: ";
  }
  if(isset($_POST['Submit']))
  {
    //echo "<pre>";print_r($_POST);die;
    $name = $_POST['name'];
    $fname = $_POST['fname'];
    $vname = $_POST['vname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $education = serialize($_POST['chick_list']);
    $filename = $_FILES['image']['name'];
    //echo "<pre>"; print_r($_FILES);die();
    // destination of the file on the server
    $destination = 'uploads/' . $filename;
 
    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['image']['tmp_name'];
    $size = $_FILES['image']['size'];

   /* if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
       echo "You file extension must be .zip, .pdf or .docx";
    } elseif ($_FILES['myfile']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {*/
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
   
   $query = "INSERT INTO user set `name`= '$name', `fatherName`='$fname', `Village`='$vname', `email`='$email', `gender`='$gender', `education`='$education',`filename`= '$filename', `size` = '$size',`download` = 0, `password`='$password'";
            
    }

    
   //echo $query;die;

if(mysqli_query($con,$query))
{
  echo '<script>alert("Successfully Registration")</script>';
header('Location: read.php');
}
else{
  echo "Not add in database";
}
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Crud Opration</title>
  <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="crud.css"> 
  </head>
<body>
<div class="cForm">
  <h1>Crud Opration</h1>
  <form name="Curd" id="Curd"  class="Curd" method="post" enctype="multipart/form-data">
      
    <div class="form-group">
    <label for="Name">Name:</label>
    <input type="text" class="form-control" id="name" name="name" aria-describedby="" placeholder="Enter Name">
    </div>
    <div class="form-group">
    <label for="fName">Father Name:</label>
    <input type="text" class="form-control" id="fname" name="fname" aria-describedby="" placeholder="Enter Father Name">
    </div>
    <div class="form-group">
    <label for="Name">Village:</label>
    <input type="text" class="form-control" id="vname" name="vname" aria-describedby="" placeholder="Enter Village Name">
    </div>

  <div class="form-group">
    <label for="emai1">Email address:</label>
    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
   
  <div class="form-check">
     <label class="form-check-label" for="gender">
    Gender
  </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

  <input class="form-check-input" type="radio" name="gender" id="gender" value="male">
  <label class="form-check-label" for="gender">
    Male
  </label> &nbsp;&nbsp;&nbsp;
  <input class="form-check-input" type="radio" name="gender" id="gender" value="female">
  <label class="form-check-label" for="gender">
    Female
  </label> &nbsp;&nbsp;&nbsp;
  <input class="form-check-input" type="radio" name="gender" id="gender" value="other">
  <label class="form-check-label" for="gender">
    other
  </label>
</div>

<div class="form-check">
  <label>Education</label>n &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="checkbox" class="form-check-input" id="matric" name="chick_list[]" value="matric">
    <label class="form-check-label" for="exampleCheck1">Matric</label>
    &nbsp;&nbsp;&nbsp;
    <input type="checkbox" class="form-check-input" id="Intermidiate" name="chick_list[]" value="Intermidiate">
    <label class="form-check-label" for="exampleCheck1">Intermidiate</label> &nbsp;&nbsp;&nbsp;

    <input type="checkbox" class="form-check-input" id="graduate" name="chick_list[]" value="graduate">
    <label class="form-check-label" for="exampleCheck1">Post Graduate</label>
  </div>
  <div class="form-check">
  <label>File Upload</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="file" class="form-check-input" id="myfile" name="image" value="">
</div>
<!--<select id="test">
  accept=".pdf/.doc/.zip"/
  <option value="1">American Black Bear</option>
  <option value="2">Asiatic Black Bear</option>
  <option value="3">Brown Bear</option>
  <option value="4">Giant Panda</option>
  <option value="5">Sloth Bear</option>
  <option value="6">Sun Bear</option>
  <option value="7">Polar Bear</option>
  <option value="8">Spectacled Bear</option>
</select>-->
<!--<div class="row">
  <div class="col-md-12">

    <select class="mdb-select colorful-select dropdown-primary md-form" multiple searchable="Search here..">
      <option value="" disabled selected>Choose your education</option>
      <option value="1">Matric</option>
      <option value="2">Intermidiate</option>
      <option value="3">Post Graduate</option>
      <option value="4">Master Degree</option>
      <option value="5">P.G</option>
    </select>
    
  </div>
</div>-->
<!--<div class="custom-control custom-checkbox">
    <input type="checkbox" class="custom-control-input" id="check" name="check">
    <label class="custom-control-label" for="check">Matric</label>
</div>
<div class="custom-control custom-checkbox">
    <input type="checkbox" class="custom-control-input" id="check" name="check">
    <label class="custom-control-label" for="check">Intermidiate</label>
</div>
<div class="custom-control custom-checkbox">
    <input type="checkbox" class="custom-control-input" id="check" name="check">
    <label class="custom-control-label" for="check">Post Graduate</label>
</div>-->
  <div class="form-group">
    <label for="exampleInputPassword1">Password:</label>
    <input type="password" class="form-control" id="password" placeholder="Password" name="password">
  </div>
  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary" name="Submit" id="submit">Submit</button>
<button type="reset" class="btn btn-primary" name="reset" id="reset">Reset</button>

</form>
</div>

</body>

</html>
