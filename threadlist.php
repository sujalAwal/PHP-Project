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
   $id=$_GET['catid'];
   $sql ="SELECT * FROM `categories` WHERE id=$id ";
   $result = mysqli_query($conn,$sql);
   while($row = mysqli_fetch_assoc($result)){
    $catname=$row['name'];
    $catdesc=$row['description'];

   }
   ?>
   
<?php
$method =$_SERVER['REQUEST_METHOD'];
$showAlert =false;

if($method == "POST"){
   $th_title = $_POST['title'];
   $th_desc = $_POST['desc'];

   $sql ="INSERT INTO `threads` (`thread_title`,`thread_desc`,`thread_cat_id`,`thread_user_id`,`times`) VALUES ('$th_title',' $th_desc','$id','0',current_timestamp())";
   $result = mysqli_query($conn,$sql);
   $showAlert = true;
   if($showAlert){
   echo '<div class="alert alert-success" role="alert">
  A simple success alert—check it out!
</div>';
   }

}

?>
    
    <div class="container">
<h2>Today's HoT Topics</h2>

<?php
echo'
  <button class="btn btn-primary m-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample">Show
   '.$catname.' Forums
  </button>

<div style="" >
  <div class="collapse collapse-horizontal" id="collapseWidthExample">
    <div class="card card-body bg-dark text-light text-xxl m-3" style="width: 57rem; ">'.$catdesc.'
      
    </div>
  </div>
</div>';
?>

</div>

    <div class="container">

    <h1 class="py-4 text-warning">Browse Question</h1>
    <div class="container">

      <form action="<?php $_SERVER['REQUEST_URI'] ?>" method="post">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Problem Title</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="title">
          <div id="emailHelp" class="form-text">Share with Everyone else.</div>
        </div>
        <label for="desc" class="form-label">Elevorate your Doubt</label>
        <div class="input-group">
          <textarea class="form-control" aria-label="With textarea" id="desc" name="desc"></textarea>
        </div>
        
        
        
        <button type="submit" class="btn btn-success my-1">Submit</button>
      </form>
    </div>

    <?php include "partial/_dbconnect.php"; ?>
   <?php
   $cat_id=$_GET['catid'];
   $sql ="SELECT * FROM `threads` WHERE thread_cat_id=$cat_id ";
   $result = mysqli_query($conn,$sql);
   $noresult = true;
 
   while($row = mysqli_fetch_assoc($result)){
     $noresult = false;
     
    $thread_id=$row['thread_id'];
    $title=$row['thread_title'];
    $desc=$row['thread_desc'];

    echo'   <div class="d-flex align-items-center my-3">
    <div class="flex-shrink-0">
      <img class="rounded-circle" src="https://source.unsplash.com/70x70/?person,humanbeing,celebrity" alt="@unkhnown">
    </div>
    <div class="flex-grow-1 ms-3">
    <h3><a href="thread.php?threadid='. $thread_id.'">'.$title.'</a></h3>'.$desc.'
    </div>
  </div>
    ';

   }
   if($noresult){
    echo'<div class="alert alert-info my-5" role="alert" >
    <h2>No Questions YET! </h2>
    <h4> Be a first to asked the question..</h4>

  </div>';
   }

 
   ?>

 
      

        


    </div>
   


    <?php
 include 'partial/_footer.php';
?>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

   
  </body>

  
</html>