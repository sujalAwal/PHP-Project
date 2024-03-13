<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    
    include "_dbconnect.php";

 $username= $_POST['username'];
  $pass=$_POST['password'];
 
$sql="SELECT * FROM users where user_name = '$username'";
$result = mysqli_query($conn,$sql);
$numrows = mysqli_num_rows($result);

if($numrows==1){
    $row = mysqli_fetch_assoc($result);
    $hash = password_hash($pass,PASSWORD_DEFAULT);

    if(password_verify($pass,$row['user_pass'])){
        session_start();
        $_SESSION['logined'] = true;
        $_SESSION['useremail'] = $username;
        echo"Logined";
        exit();
        // header("Location:/forum/index.php");
    }
    else{
        echo"Incorrect PAssWord";
    }

}
else{
    echo "UNable TO LOGIN ";
}
  
}
?>