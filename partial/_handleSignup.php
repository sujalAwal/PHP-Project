<?php
$showError = false;
if($_SERVER['REQUEST_METHOD']=="POST"){
    
    include "_dbconnect.php";

 $username= $_POST['signupEmail'];
  $pass=$_POST['password'];
  $cpass=$_POST['cpassword'];

  if($pass == $cpass){
    echo"Successfull ";

    $sql ="SELECT * FROM `users` where user_name = '$username'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_num_rows($result);

    if($row>0){
        $showError = true;
    }
    else{
        $hash = password_hash($pass,PASSWORD_DEFAULT);
        $sqlInsert = "INSERT INTO `users` (`user_name`,`user_pass`,`times`) VALUES ('$username','$hash',current_timestamp())";
         $resultInsert = mysqli_query($conn,$sqlInsert);
         if($resultInsert){
           
          header("Location:/forum/index.php?signupsuccess=true");
          exit();
         }



    }
  }
  else{
    $showError = "true";
    header("Location:/forum/index.php?signupsuccess=false&error= $showError");
  }

}

?>