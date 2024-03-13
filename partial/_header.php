<?php
echo'
<div class="sticky-top">
<nav class="navbar navbar-expand navbar-dark bg-dark position-sticky">
<div class="container-fluid">
  <h3 class="text-danger ">Coding TAlk</h3>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item mx-3">
        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
       Categories
        </a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#">Action</a></li>
          <li><a class="dropdown-item" href="#">Another action</a></li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item" href="#">Something else here</a></li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php" >Contact</a>
      </li>
    </ul>
    <div class="d-flex">
    <form class="d-flex" role="search">
      <input class="form-control me-2 my-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-primary my-2" type="submit">Search</button>
    
      </form>
     
      <button class="btn btn-sm btn-outline-success me-2 my-2 mx-3" type="button" data-bs-toggle="modal" data-bs-target="#loginModal" >Login</button>
      <button class="btn btn-outline-success btn-sm me-2 my-2" data-bs-toggle="modal" data-bs-target="#signupModal" type="button">Sign Up</button>
    
  </div>
  </div>
</div>
</nav>
</div>';

include 'partial/_loginModal.php';
include 'partial/_signupModal.php';


if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true"){
  echo'<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  <strong>Successfully Signed up.</strong>  Please Login to explore more
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

elseif(isset($_GET['signupsuccess']) && $_GET['signupsuccess'] =="false"){
  $showError ="Password did not match";
  echo'<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
  <strong>'.$showError.'</strong>  Please try again !
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';

}

?>