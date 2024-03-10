<?php

include 'admin/config.php';
$id = $_GET['id'];
if (!isset($_GET['id'])) {
	header('location: index.php');
};
$sql = "SELECT * FROM `jobposts` WHERE `status` = 0 AND `id` = $id ";
$query = mysqli_query($conn, $sql);
$item = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="assets/css/style.css">
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
	<section class="py-5" id="jobs">
		<div class="container">
			<div class="row">
				<div class="col-12 mt-4">
					<div style="border: 1px solid #ddd" class="job-item p-3">
						<span class="d-block">
							<div class="d-flex justify-content-start">
								<div class="d-flex align-items-center justify-content-center me-4">
									<img src="admin/upload/<?= $item['company_logo'] ?>" alt="" style="width: 150px;">
								</div>
								<div>
									<h4><?= $item['post_title'] ?></h4>
									<p class="lead"><?= $item['company_title'] ?></p>
								</div>
							</div>
						</span>
						<div id="demo">
							<hr class="my-4">
							<p class="lead"><?= $item['company_details'] ?></p>
							<div class="text-center">
								<a href="#demoForm<?= $item['id'] ?>" data-bs-toggle="modal" class="btn btn-primary d-inline-block">Apply Now</a>
							</div>
						</div>
					</div>
					<div class="modal fade" id="demoForm<?= $item['id'] ?>">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title text-uppercase" id="exampleModalLabel">Apply for the job</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body">
									<form action="" method="POST" id="application_form" enctype="multipart/form-data">
										<input type="hidden" value="<?= $item['id'] ?>" name="post_id">
										<input type="hidden" value="<?= $item['job_position'] ?>" name="job_position">
										<div class="form-floating mb-3">
											<input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
											<label for="name">Name</label>
										</div>
										<div class="form-floating mb-3">
											<input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
											<label for="email">Email</label>
										</div>
										<div class="form-floating mb-3">
											<input type="number" class="form-control" id="number" name="number" placeholder="Number" required>
											<label for="number">Number</label>
										</div>
										<div class="form-floating mb-3">
											<input type="number" class="form-control" id="age" name="age" placeholder="Age" required>
											<label for="age">Age</label>
										</div>
										<div class="form-floating mb-3">
											<input type="text" class="form-control" id="uni_ins_name" name="uni_ins_name" placeholder="University/Institution name" required>
											<label for="uni_ins_name">University/Institution name</label>
										</div>
										<div class="form-floating mb-3">
											<input type="text" class="form-control" id="sub_dep_name" name="sub_dep_name" placeholder="Subject/Department" required>
											<label for="sub_dep_name">Subject/Department</label>
										</div>
										<div class="form-floating mb-3">
											<input type="text" class="form-control" id="year_senmister_name" name="year_senmister_name" placeholder="Current Year /Semester" required>
											<label for="year_senmister_name">Current Year /Semester</label>
										</div>
										<div class=" mb-3">
											<label for="cv" class="mb-2">CV (PDF ONLY)</label>
											<input type="file" class="form-control" id="cv" name="cv" accept=".pdf" placeholder="cv" required>
										</div>
										<div class="text-end">
											<p id="thank_you_msg" class=""></p>
											<button type="submit" class="btn btn-primary text-white" name="submit">
												Submit
												<span class="text-white" id="loader" style="width: 20px; height: 20px"></span>
											</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- footer-start -->
	<footer class="py-2 bg-secondary">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<p class="text-center justify-content-center lead mb-0 text-white">
						Copyright © 2017 - 2024 DESIGN AND DEVELOPED BY CREATIVE SHEBA
						LIMITED
					</p>
				</div>
			</div>
		</div>
	</footer>
	<!-- footer-end -->

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script>
		$(document).ready(function() {
			$('#application_form').on('submit', function(e) {
				e.preventDefault();
				$('#loader').addClass('spinner-border');
				var data = new FormData(this);
				$.ajax({
					url: "server.php",
					type: "POST",
					dataType: 'json',
					data: data,
					contentType: false,
					processData: false,
					success: function(respons) {
						jQuery('#thank_you_msg').addClass('failed').html(respons.message);
						if (respons.message == 'success') {
							window.location.href = "success.php";
						}
					}
				}).done((respons) => {
					$('#loader').removeClass('spinner-border');
				})
			});
		});
	</script>
</body>
</html>