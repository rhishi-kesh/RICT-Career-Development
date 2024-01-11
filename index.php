<?php

	include 'admin/config.php';
	$sql = "SELECT * FROM `jobposts` WHERE `status` = 0";
	$query = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section class="hero">
    	<div class="container">
    		<div class="row">
    			<div class="col-12 col-md-8 col-lg-6">
		    		<h1><span class="text-orange">Rayhan's ICT</span> is a creative growth agency</h1>
		    		<p class="lead">We are your full-service growth team. We can manage everything from strategy to execution.</p>
		    		<a href="https://rayhansict.com/" class="btn btn-primary" target="_blank">Our Company</a>
		    		<a href="#jobs" class="btn btn-primary">Apply Now</a>
		    	</div>
    		</div>
    	</div>
    </section>
    <!-- hero-end -->
    <section class="py-5" id="jobs">
    	<div class="container">
    		<div class="row">
    			<div class="col-12 text-center">
    				<h2 class="fw-bold">Job Lists</h2>
    				<p class="lead">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nostrum, amet.</p>
    			</div>
    		</div>
    		<div class="row">
				<?php 
					if(!empty($query)){
						foreach($query as $item){ 
				?>
							<div class="col-12 mt-4">
								<div style="border: 1px solid #ddd" class="job-item p-3">
									<a href="single_jobpost.php?id=<?= $item['id'] ?>" class="d-block">
										<div class="d-block d-md-flex justify-content-start">
											<div class="d-block d-md-flex align-items-center justify-content-center me-4">
												<img src="admin/upload/<?= $item['company_logo'] ?>" alt="" style="width: 150px;">
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
					}else{
						echo "No Job Found";
					}
				?>
    		</div>
    	</div>
    </section>
    <footer class="py-4 bg-primary">
    	<div class="container">
    		<div class="row">
    			<div class="col-12">
    				<p class="text-center lead mb-0 text-white">Copyright © 2017 - 2024 DESIGN AND DEVELOPED BY CREATIVE SHEBA LIMITED </p>
    			</div>
    		</div>
    	</div>
    </footer>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>