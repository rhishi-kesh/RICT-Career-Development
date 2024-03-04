<?php

	include 'admin/config.php';
	$sql = "SELECT * FROM `partners` WHERE `id` = 0";
	$query = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="assets/images/fav.jpg">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
 	<link rel="stylesheet" href="assets/css/style.css" />
</head>
<body>
	<!-- nav -->
<nav class="navbar navbar-expand-md navbar-light bg-light fixed-top">
    <div class="container">
      <div class="d-flex align-items-center justify-content-center">
        <a class="navbar-brand" href="index.php"><img src="assets/images/logo.png" alt="" style="width: 70%" />
        </a>
      </div>
      <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
    </button>
      <div class="collapse navbar-collapse " id="navbarNav">
        <hr>
        <ul class="navbar-nav ms-auto align-items-end ">
          <li class="nav-item ms-4">
            <a class="pb-2" id="navbtn" href="https://rayhansict.com/">Our Company</a>
          </li>
          <li class="nav-item ms-4">
            <a class="pb-2" id="navbtn" href="ourJobs.php">Our Jobs</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- nav-end -->

  <!-- first banner section -->
  <section class="career-header">
    <div class="banner col-lg-8 col-md-4">
      <div class="content">
        <h1 class="display-5 fw-bold">Career Development</h1>
        <p class="lead">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas dolor atque voluptate? Dignissimos rerum itaque veritatis quisquam autem dolorem ipsa magnam quia ipsam unde corporis, quaequi, voluptatibus reiciendis sed.
        </p>
        <a href="https://rayhansict.com/">Our Company</a>
      </div>
    </div>
  </section>
  <!-- first banner section end-->

  <!-- Brands -->
  <section class="career-process py-2">
    <div class="container">
      <div class="row" id="career-header">
        <div class="col-12 col-md-6 mt-4 order-1" id="card">
          <div class="card p-3">
            <div class="goal">
              <h4>Our Goal</h4>
              <div>
                <img src="assets/images/career.png" alt="" id="img" />
              </div>
            </div>
            <p>
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto iure quibusdam autem rem, porro maxime.
              Aut ab quia deserunt. Nemo!
            </p>
          </div>
        </div>
        <div class="col-12 col-md-6 mt-4 order-3">
          <div class="card p-3">
            <div class="goal">
              <h4> Benefits of Career Development</h4>
              <div>
                <img src="assets/images/career.png" alt="" id="img" />
              </div>
            </div>
            <p>
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto iure quibusdam autem rem, porro maxime.
              Aut ab quia deserunt. Nemo!
            </p>
          </div>
        </div>
        <div class="col-12 col-md-6 mt-4 order-4">
          <div class="card p-3">
            <div class="goal">
              <h4>Internship Opportunity</h4>
              <div>
                <img src="assets/images/career.png" alt="" id="img" />
              </div>
            </div>
            <p>
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto iure quibusdam autem rem, porro maxime.
              Aut ab quia deserunt. Nemo!
            </p>
          </div>
        </div>
        <div class="col-12 col-md-6 mt-4 order-2">
          <div class="card p-3">
            <div class="goal">
              <h4>Our Process</h4>
              <div>
                <img src="assets/images/career.png" alt="" id="img" />
              </div>
            </div>
            <p>
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto iure quibusdam autem rem, porro maxime.
              Aut ab quia deserunt. Nemo!
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- career-process-section-end -->

  <!-- career-placement-partner-section -->
  <section class="brands py-3 py-lg-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-md-8 text-center">
          <h2 class="text-uppercase fs-1 mb-4">
            Our Career Placement Partner
          </h2>
        </div>
      </div>
      <div class="row justify-content-center">
		
        <div class="col-12 col-md-4">
          <div class="row justify-content-center">
            <div class="col-4 align-self-center text-center mt-4 mt-md-0">
              <img src="assets/images/1.png" alt="" class="img-fluid" />
            </div>
            <div class="col-4 align-self-center text-center mt-4 mt-md-0">
              <img src="assets/images/2.png" alt="" class="img-fluid" />
            </div>
            <div class="col-4 align-self-center text-center mt-4 mt-md-0">
              <img src="assets/images/3.png" alt="" class="img-fluid" />
            </div>
          </div> 
        </div>
      </div>
    </div>
  </section>
  <!-- Brands-end -->

  <!-- contact form start -->
  <section class="contact-form pb-5 mt-3">
      <div class="container">
        <div class="row">
          <div class="col-12"> 
            <h2 class="text-uppercase fs-1 mb-4 text-center">Send us your CV</h2>
          </div>
        </div>
        <div class="d-flex justify-content-start">
          <div class="image-holder"></div>
          <form method="post">
            <div class="form-floating mb-3">
                <input type="text" class="form-control shadow-none" id="name"placeholder="Name">
                <label for="name">Name</label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control shadow-none" id="email"placeholder="Email">
                <label for="email">Email</label>
            </div>
            <div class="form-floating mb-3">
                <input type="number" class="form-control shadow-none" id="number"placeholder="Number">
                <label for="number">Number</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control shadow-none" id="address" placeholder="Address">
                <label for="address">Address</label>
            </div>
            <div class="form-group mt-2">
              <label for="cv">CV</label>
              <input type="file" class="form-control form-control-lg shadow-none" id="cv" />
            </div>
            <div class="form-group mt-5">
              <button class="form-control form-control-lg text-uppercase shadow-none" id="submit" type="submit">Submit</button>
            </div>
          </form>
        </div>
      </div>
  </section>
  <!-- contact form end -->

  <!-- footer-start -->
  <footer class="py-2 bg-primary">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <p class="text-center lead mb-0 text-white">
            Copyright © 2017 - 2024 DESIGN AND DEVELOPED BY CREATIVE SHEBA
            LIMITED
          </p>
        </div>
      </div>
    </div>
  </footer>
  <!-- footer-end -->
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/jquery-3.7.1.js"></script>

</body>
</html>