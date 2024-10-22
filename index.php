<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
        crossorigin="anonymous"></script>
<!--SOCIAL MEDIA ICONS-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<style>
    .card{
        margin-bottom: 10px;
        border: 1px solid black;
    }
        #nav .nav-link:hover {
            color: #0b2d97 ; /* Link color on hover */
        }
        
</style>
<body>

    <!-- NavBar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light"id="nav">
        <a class="navbar-brand" href="#">Chowdhury Medicial Store</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="front.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                        aria-expanded="false">
                        Categories
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Consult Doctor</a>
                        <a class="dropdown-item" href="#">Lab Test</a>
                        <a class="dropdown-item" href="#">Allopathy</a>
                        <a class="dropdown-item" href="#">Homeopathy</a>
                    </div>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <a href="admin_login.php" class="btn btn-sm btn-outline-info">Admin</a>|
                <a href="login.php" class="btn btn-sm btn-outline-info my-2 my-sm-0">Login</a>|
                <a href="SignUp.php" class="btn btn-sm btn-outline-secondary my-2 my-sm-0" >Sign Up</a>
            </form>
        </div>
    </nav>
    <?php 
    
    if(!empty($_SESSION['msg'])){
      if($_SESSION['msg']=='insert_done'){
          echo "<div class='alert alert-success'>Login Successfully Done</div>";
      }elseif($_SESSION['msg']=='insert_failed'){
        echo "<div class='alert alert-danger'>Sorry Something Went Wrong Plz Try Again</div>";
      }
    }unset($_SESSION['msg']);


?>
    <!----JUMBOTRON---->
    <div class="jumbotron mb-0">
        <h1 align="center">Welcome To Chowdhury Medical Store</h1>
    </div>

   
    <!----Crousel---->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./asset/slide1.jpg" class="d-block w-100" alt="slide1 pic"
                    style="width:100%;height:300px;border:2px solid black">
            </div>
            <div class="carousel-item">
                <img src="./asset/slide2.jpg" class="d-block w-100" alt="slide2 pic"
                    style="width:100%;height:300px;border:2px solid black">
            </div>
            <div class="carousel-item">
                <img src="./asset/slide14.jpg" class="d-block w-100" alt="slide3 pic"
                    style="width:100%;height:300px;border:2px solid black">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </button>
    </div>
    <br>
    <!---Card--->
    <div class="container">
        <div class="row">
            <!---DIABETIC CARD--->
            <div class="col">
                <a href="#" style="text-decoration: none;">
                <div class="card" style="width: 200px; height:200px">
                    <img src="./asset/dia.jfif" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Diabetes</h5>
                    </div>
                </div>
                </a>
            </div>
            <!-----Heart Care------>
            <div class="col">
                <a href="#" style="text-decoration: none;">
                <div class="card" style="width: 200px; height:200px">
                    <img src="./asset/heart.jfif" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Heart Care</h5>
                    </div>
                </div>
                </a>
            </div>
            <!---Stomach Care---->
            <div class="col">
                <a href="#" style="text-decoration: none;">
                <div class="card" style="width: 200px; height:200px">
                    <img src="./asset/stomah.jfif" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Stomach Care</h5>
                    </div>
                </div>
                </a>
            </div>
            <!----EYE CARE----->
            <div class="col">
                <a href="#" style="text-decoration: none;">
                <div class="card" style="width: 200px; height:200px">
                    <img src="./asset/eye.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Eye Care</h5>
                    </div>
                </div>
                </a>
            </div>
        </div>
    </div>
    <!-----FOOTER----->
<!-- Footer -->
<footer class="bg-dark text-white text-center">
  <!-- Grid container -->
  <div class="container p-4">
    <!-- Section: Social media -->
<section class="mb-4">
  <!-- Facebook -->
  <a data-mdb-ripple-init class="btn btn-outline-light btn-floating m-1" href="#" role="button">
    <i class="fab fa-facebook-f"></i>
  </a>

  <!-- Twitter -->
  <a data-mdb-ripple-init class="btn btn-outline-light btn-floating m-1" href="#" role="button">
    <i class="fab fa-twitter"></i>
  </a>

  <!-- Google -->
  <a data-mdb-ripple-init class="btn btn-outline-light btn-floating m-1" href="#" role="button">
    <i class="fab fa-google"></i>
  </a>

  <!-- Instagram -->
  <a data-mdb-ripple-init class="btn btn-outline-light btn-floating m-1" href="#" role="button">
    <i class="fab fa-instagram"></i>
  </a>

  <!-- LinkedIn -->
  <a data-mdb-ripple-init class="btn btn-outline-light btn-floating m-1" href="#" role="button">
    <i class="fab fa-linkedin-in"></i>
  </a>

  <!-- GitHub -->
  <a data-mdb-ripple-init class="btn btn-outline-light btn-floating m-1" href="#" role="button">
    <i class="fab fa-github"></i>
  </a>

  <!-- WhatsApp -->
  <a data-mdb-ripple-init class="btn btn-outline-light btn-floating m-1" href="#" role="button">
    <i class="fab fa-whatsapp"></i>
  </a>
</section>

    <!-- Section: Social media -->

    <!-- Section: Form -->
    <section class="">
      <form action="">
        <!--Grid row-->
        <div class="row d-flex justify-content-center">
          <!--Grid column-->
          <div class="col-auto">
            <p class="pt-2">
              <strong>Sign up for our newsletter</strong>
            </p>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-md-5 col-12">
            <!-- Email input -->
            <div data-mdb-input-init class="form-outline mb-4">
              <input type="email" id="form5Example24" class="form-control" placeholder="Please Enter Your Email Id"/>
            </div>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-auto">
            <!-- Submit button -->
            <button data-mdb-ripple-init type="submit" class="btn btn-outline-light mb-4">
              Subscribe
            </button>
          </div>
          <!--Grid column-->
        </div>
        <!--Grid row-->
      </form>
    </section>
    <!-- Section: Form -->

    <!-- Section: Text -->
    <section class="mb-4">
      <p>
        We All Are Always There To Help You 24*7 Bcz Your Health Is Our Priority
      </p>
    </section>
    <!-- Section: Text -->
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(255, 255, 255, 0.1);">
    © 2020 Copyright:
    <a class="text-reset fw-bold" href="#">MDBootstrap.com</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->

</body>

</html>