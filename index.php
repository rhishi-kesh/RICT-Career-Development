<?php
session_start();
include 'admin/config.php';
$sql = "SELECT * FROM `partners`";
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
  <nav class="navbar navbar-expand-md navbar-light bg-light">
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
    <img src="assets/images/careerpage.png" alt="">
  </section>
  <!-- first banner section end-->

  <!-- Brands -->
  <section class="career-process pt-5">
    <div class="container ourGoal">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card card_sty p-3 mb-5 bg-body rounded">
            <div>
              <img src="assets/images/1.png" alt="" id="img" />
            </div>
            <h4>Our Goal</h4>
            <p>
              We want to create a friendly environment for our employees where he/she will get the environment to work .
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- career-process-section-end -->

  <!-- career-placement-partner-section -->
  <section class="brands py-3 pt-lg-4 pb-lg-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-md-8 text-center">
          <h2 id="h2" class="fw-bold fs-1 mb-4">
            Our Career Placement Partner
          </h2>
        </div>
      </div>
      <div class="row justify-content-center">

        <div class="col-12 col-md-4">
          <div class="row justify-content-center">
            <?php
            foreach ($query as $item) {
            ?>
              <div class="col-4 align-self-center text-center mt-4 mt-md-0">
                <img src="admin/upload/partners/<?php echo $item['image'] ?>" alt="" class="img-fluid" />
              </div>
            <?php
            }
            ?>
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
          <h2 id="h2" class="fw-bold fs-1 mb-4 text-center">Send us your CV</h2>
        </div>
      </div>
      <div class="d-flex justify-content-start cv">
        <div class="image-holder"></div>
        <form action="" id="cv_form" class="form" method="post" enctype="multipart/form-data">
          <div class="form-floating mb-3">
            <input type="text" class="form-control shadow-none" name="name" id="name" required placeholder="Name">
            <label for="name">Name</label>
          </div>
          <div class="form-floating mb-3">
            <input type="email" class="form-control shadow-none" name="email" id="email" required placeholder="Email">
            <label for="email">Email</label>
          </div>
          <div class="form-floating mb-3">
            <input type="number" class="form-control shadow-none" name="number" id="number" required placeholder="Number">
            <label for="number">Number</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control shadow-none" name="address" id="address" required placeholder="Address">
            <label for="address">Address</label>
          </div>
          <div class="form-group mt-2">
            <label for="cv">CV</label>
            <input type="file" class="form-control form-control-lg shadow-none" name="pdf_cv" accept=".pdf" id="cv" required />
          </div>
          <div class="form-group mt-4">
              <div class="alert-danger" id="thank_you_msg"></div>
            <button class="form-control form-control-lg text-uppercase shadow-none submit" name="submit" id="submit" type="submit">Submit
              <span class="text-white" id="loader" style="width: 20px; height: 20px"></span>
            </button>
          </div>
        </form>
      </div>
    </div>
  </section>
  <!-- contact form end -->

  <!-- footer-start -->
  <footer class="py-2 bg-color">
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
  <script>
    $(document).ready(function() {
      $('#cv_form').on('submit', function(e) {
        e.preventDefault();
        $('#loader').addClass('spinner-border');
        $('#submit').attr("disabled", true);
        var data = new FormData(this);
        $.ajax({
          url: "rr.php",
          type: "POST",
          dataType: 'json',
          data: data,
          contentType: false,
          processData: false,
          success: function(respons) {
            jQuery('#thank_you_msg').addClass('alert').html(respons.message);
            if (respons.message == 'success') {
              window.location.href = "submit-success.php";
            }
          }
        }).done((respons) => {
          $('#loader').removeClass('spinner-border');
          $("#submit").removeAttr("disabled");
        })
      });
    });
  </script>

</body>

</html>