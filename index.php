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
    
<!-- Slider image Start -->
    <div id="carouselExampleCaptions" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://source.unsplash.com/1800x700/?programming,coding,engineer,computer,software" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="https://source.unsplash.com/1800x700/?cybersecurity,microsoft,management,coding" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Some representative placeholder content for the second slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="https://source.unsplash.com/1800x700/?programming,education,technology" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Some representative placeholder content for the third slide.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<h1 class="text-center my-4 text-success">Co-Di<span class="text-danger">nG T</span>Alk</h1>


    <div class="container">
<h2>Today's HoT Topics</h2>
    <div class="row">
      <?php
      $sql ="SELECT * FROM `categories`";
      $result =mysqli_query($conn,$sql);

      while($row = mysqli_fetch_assoc($result)){
        $id = $row['id'];
        $desc = $row['description'];
        echo '<div class="col-md-4 my-4">
        <div class="card" style="width: 18rem;">
        <img src="https://source.unsplash.com/420x300/?'.$row['name'].',coding" class="card-img-top" alt="...">
        <div class="card-body">
         <a href="threads.php?catid='.$id.'"> <h5 class="card-title">'.$row['name'].'</h5></a>
          <p class="card-text">'.substr($desc,0,102).'.........</p>
          <a href="threadlist.php?catid='.$id.'"class="btn btn-primary">View Threads</a>
        </div>
      </div>

</div>';
      }
     
      ?>
      
    </div>

        


    </div>


<?php
 include 'partial/_footer.php';
?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

   
  </body>

  
</html>