<?php

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>iGroups-Coding TAlk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

  <?php include "partial/_header.php"; ?>
  <?php include "partial/_dbconnect.php"; ?>

    
<?php
$showAlert =false;
$id=$_GET['threadid'];


$method =$_SERVER['REQUEST_METHOD'];
if($method == "POST"){
   $comment_desc = $_POST['comment'];

   $sql ="INSERT INTO `comment` (`comment_desc`,`thread_id`,`comment_by`,`comment_time`) VALUES ('$comment_desc','$id','0',current_timestamp())";
   $result = mysqli_query($conn,$sql);
   $showAlert = true;
   if($showAlert){
   echo '<div class="alert alert-success" role="alert">
  Thank you for your wonderful comment
</div>';
   }

}

?>
  
  <?php
   $id=$_GET['threadid'];
   $sql ="SELECT * FROM `threads` WHERE thread_id = $id ";
   $result = mysqli_query($conn,$sql);
   while($row = mysqli_fetch_assoc($result)){
    $catname=$row['thread_title'];
    $catdesc=$row['thread_desc'];

    echo'
  <button class="btn btn-primary m-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample">
   '.$catname.' Forums
  </button>

<div style="" >
  <div class="collapse collapse-horizontal" id="collapseWidthExample">
    <div class="card card-body bg-dark text-light text-xxl m-3" style="width: 57rem; ">'.$catdesc.'
      
    </div>
  </div>
</div>';

}
?>
      <div class="container">
<h2>Today's HoT Topics</h2>

</div>

    <div class="container">
  
   <div class="container my-5">

     <h2 class="fw-bold text-success">Post a comment</h2>

      <form action="<?php $_SERVER['REQUEST_URI'] ?>" method="post">
       
        <label for="comment" class="form-label">Type Your Comment</label>
        <div class="input-group">
          <textarea class="form-control" rows="3" id="comment" name="comment"></textarea>
        </div>
        
        <button type="submit" class="btn btn-success my-1">Comment Now</button>
      </form>
  
    </div>
    </div>
<div class="container">

  <?php
   $cat_id=$_GET['threadid'];
   $sql ="SELECT * FROM `comment` WHERE thread_id=$cat_id ";
   $result = mysqli_query($conn,$sql);
   while($row = mysqli_fetch_assoc($result)){
     $comment_id=$row['comment_id'];
     $comment=$row['comment_desc'];
     $comment_time=$row['comment_time'];
     
     echo'
     <div class="media text-primary-emphasis my-3 ">
     
     
     <img class="rounded-circle " src="https://source.unsplash.com/30x30/?person,humanbeing,celebrity,face" alt="@unkhnown">
     
     <div class="media-body">
     
     <h5 class="font-weight-bold my-0">Marth </h5>
     <p>'.$comment_time.'</p>
     
     <p>'.$comment.'</p>
     </div>
     
     </div>';
     
    }
    
    ?>

</div>



<div class="container mt-5">

  <h6 class="my-3">
    DISCLAIMER :<span class="text-warning"> CoDinG TAlk® is a community of individuals of all ages who are here to learn new information, to help each other, and to help their fellow peers. With that in mind, we ask that all members please follow these simple rules in order to create an atmosphere where everyone feels comfortable.</span>
    
  </h6>
  </div>
  <?php
include 'partial/_footer.php';
?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

   
  </body>

  
</html>