<?php
  $submit = false;

  // Creating the Connection variables
  if(isset($_POST['name'])){
  $server = "localhost";
  $username = "root";
  $password = "";

  // Trying to Connect the database
  $con = mysqli_connect($server, $username, $password);

  // Executes if failed to connect the db
  if(!$con){
     die("Connection to the database id failed due to " . mysqli_connect_error());
  }

  // echo "Success.";    
  // If Connect SuccessFully Executes Further

  // Getting the data from 'form'(POST) inside the variables
  $name = $_POST['name']; 
  $age = $_POST['age'];
  $gender = $_POST['gender'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $other = $_POST['desc'];

  // Executes the db query
  $sql = "INSERT INTO `trip_1`.`trip_1` (`name`, `age`, `gender`, `email`, `phone`, `other`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$other');";

  // echo $sql;

  //Executes After Successfully data inserted in the db
  if($con->query($sql) == true){
    //  echo "Successfully Inserted.";
    $submit = true;
  }
  else{
    echo "ERROR: $sql <br> $con->error";
  }

  // Closing the connection to the database
  $con->close(); 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My 1st full stack project</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img src="pxfuel.jpg" alt="UN College Front" class="bg">
    <div class="container">
      <h2>Welcome to the Travel Website</h2>
      <p>Enter Your details correctly in the form below,  only if you are participating.</p>

      <?php
       if($submit == true){
         echo "<p class='afs'>Your Response Submited.</p>";
       }
      ?>
      
      <form method="post" action="index.php">
        <input type="text" name="name" id="name" placeholder="Enter Your Full Name Here">
        <input type="text" name="age" id="age" placeholder="Enter Your Age">
        <input type="text" name="gender" id="gender" placeholder="Enter your Gender">
        <input type="email" name="email" id="email" placeholder="Enter Your E-mail id">
        <input type="phone" name="phone" id="phone" placeholder="Enter Your phone number">
        
        <textarea name="desc" id="desc" placeholder="Give Some Suggestion Here"></textarea>
        
        <button>Submit</button>
        <!-- <button>Reset</button> -->
    </form>
    </div>
    
</body>
</html>
