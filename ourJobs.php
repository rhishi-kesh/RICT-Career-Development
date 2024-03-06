<?php

	include 'admin/config.php';
	$sql = "SELECT * FROM `jobposts` WHERE `status` = 0";
	$query = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" href="assets/images/fav.jpg" />
  <title>Our Jobs</title>
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="assets/css/style.css" />
</head>

<body>
  <nav class="navbar navbar-expand-md navbar-light bg-light fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">
        <img src="assets/images/logo.png" alt="" width="130" />
      </a>
      <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <hr />
        <ul class="navbar-nav ms-auto align-items-end">
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

  <!-- jobs list part -->
  <section class="my-5" id="jobs">
    <div class="container">
      <div class="row">
        <div class="col-12 text-center py-4">
          <img id="jobicon" src="assets/images/JoinOurTeam.png" alt="" />
          <h2 id="join" class="fw-bold">Join Our Team</h2>
          <p>
            Careers in creative fields usually involve imagination and
            original thinking, particularly through the creation of original
            work.
          </p>
        </div>
      </div>
      <div class="row">
        <?php
        if (!empty($query)) {
          foreach ($query as $item) {
        ?>
            <div class="col-12 py-2">
              <div style="border: 1px solid #ddd" class="job-item p-3">
                <a href="single_jobpost.php?id=<?= $item['id'] ?>" class="d-block">
                  <div class="d-block d-md-flex justify-content-start">
                    <div class="d-block d-md-flex align-items-center justify-content-center me-4">
                      <img src="assets/images/<?= $item['company_logo'] ?>" alt="" style="width: 150px" />
                    </div>
                    <div>
                      <h4><?= $item['post_title'] ?></h4>
                      <p class="lead"><?= $item['company_title'] ?></p>
                    </div>
                  </div>
                </a>
              </div>
            </div>
        <?php
          }
        } else {
          echo "No Job Found";
        }
        ?>
      </div>
    </div>
  </section>
  <!-- jobs list part end -->

  <!-- footer-start -->

  <footer id="footer" class="footer py-2 bg-primary fixed-bottom">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <p class="text-center lead text-white">
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