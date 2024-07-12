<?php
	session_start();
	if(!isset($_SESSION['job_position'])){
		header('location: index.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Campus ambassador</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="assets/css/style.css">
	<style>
		*{
			margin: 0;
			padding: 0;
		}
		body{
			background: #fff;
			color: #000;
			display: flex;
			justify-content: center;
			align-items: center;
			height: 100vh;
			width: 100%;
		}
		.center{
			width: 500px;
			height: auto;
			text-align: center;
		}
		.box{
			background: #002147;
			color: #fff;
			border-radius: 10px;
			width: 100%;
			margin: auto;
		}
		.success-btn{
			text-decoration: none;
			text-transform: uppercase;
			background: #FDFF00;
			color: #000;
			transition: 0.6s;
			margin-top: 10px;
			display: inline-block;
			margin-top: 12px;
		}
		@media screen and (max-width: 767px){
			.box{
				width: 100%;
			}	
		}
	</style>
</head>
<body>
	<div class="center">
		<img src="assets/images/logo.png" alt="img" class="img-fluid" width="200">
		<h3 class="mt-3 mb-0">Congratulations! Your Application Was Submitted Successfully!</h3>
		<p class="mb-0">Thank you for applying for the <?php echo $_SESSION['job_position'] ?> at Rayhan’s ICT Ltd. Your application has been successfully received.</p>
		<div class="p-3 box mt-3">
			<p class="mb-0 lead">Our team will now carefully review your qualifications and experience.We appreciate your interest in joining our team and wish you the best of luck in the hiring process.</p>
		</div>
		<a href="ourJobs.php" class="btn success-btn shadow-none">Go Back</a>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>