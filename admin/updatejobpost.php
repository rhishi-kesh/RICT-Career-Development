<?php
   include 'config.php';
   session_start();
   ob_start();
   if(!isset($_SESSION['user_name'])){
      header('location: index.php');
   }

   $id = $_GET['id'];
   $sql = "SELECT * FROM `jobposts` WHERE `id` = '$id'";
   $query = mysqli_query($conn, $sql);
   $result = mysqli_fetch_assoc($query);

   if(isset($_POST['submit'])){
      $id = $_GET['id'];
      $jobtitle = mysqli_real_escape_string($conn, $_POST['jobpost_title']);
      $company_name = mysqli_real_escape_string($conn, $_POST['company_name']);
      $job_description = mysqli_real_escape_string($conn, $_POST['job_description']);
      $job_position = mysqli_real_escape_string($conn, $_POST['job_position']);

      $file_name= $_FILES['company_logo']['name'];
      $random = rand(000,999);
      $random = str_pad($random, 3, '0', STR_PAD_LEFT);
      $file_name = $random.$file_name;
      $tmp_name= $_FILES['company_logo']['tmp_name'];

      $desination = "upload/".$result['company_logo'];

      if(!empty($file_name)){
        $sql = "UPDATE `jobposts` SET `post_title`='$jobtitle',`company_title`='$company_name',`company_logo`='$file_name',`company_details`='$job_description',`job_position`='$job_position' WHERE `id` = '$id'";
        $query = mysqli_query($conn, $sql);
        if($query){
            unlink($desination);
            move_uploaded_file($tmp_name,"upload/".$file_name);
            header('location: main.php');
        }else{
            $failed_data = "data update faild";
        }
      }else{
        $sql = "UPDATE `jobposts` SET `post_title`='$jobtitle',`company_title`='$company_name',`company_details`='$job_description',`job_position`='$job_position' WHERE `id` = '$id'";
        $query = mysqli_query($conn, $sql);
        if($query){
            header('location: main.php');
        }else{
            $failed_data = "data update faild";
        }
      }

      
  }
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>Admin - Dashboard</title>
      <!-- Custom fonts for this template-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
      <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
      <!-- Custom styles for this template-->
      <link href="vendor/css/sb-admin-2.css" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   </head>
   <body id="page-top">
      <!-- Page Wrapper -->
      <div id="wrapper">
         <!-- Sidebar -->
         <ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="main.php">
               <div class="sidebar-brand-icon rotate-n-15"> <i class="fas fa-laugh-wink"></i> </div>
               <div class="sidebar-brand-text mx-3">Dashbord</div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
               <a class="nav-link" href="main.php"> <span>Job Posts</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
               <a class="nav-link" href="application.php"> <span>Applications</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
               <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
         </ul>
         <!-- End of Sidebar -->
         <!-- Content Wrapper -->
         <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
               <!-- Topbar -->
               <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                  <!-- Sidebar Toggle (Topbar) -->
                  <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3"> <i class="fa fa-bars"></i> </button>
                  <!-- Topbar Navbar -->
                  <ul class="navbar-nav ml-auto">
                     <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                     <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-search fa-fw"></i> </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow +animated--grow-in" aria-labelledby="searchDropdown">
                           <form class="form-inline mr-auto w-100 navbar-search">
                              <div class="input-group">
                                 <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                 <div class="input-group-append">
                                    <button class="btn btn-primary" type="button"> <i class="fas fa-search fa-sm"></i> </button>
                                 </div>
                              </div>
                           </form>
                        </div>
                     </li>
                     <!-- Nav Item - User Information -->
                     <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                        <?php
                           if(isset($_SESSION['user_name'])){
                              echo $_SESSION['user_name'];
                           }
                        ?>
                        </span> <img class="img-profile rounded-circle" src="vendor/img/undraw_profile.svg"> </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                           <form action="" method="POST">
                              <button class="dropdown-item" type="submit" name="logout" <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Logout </button>
                           </form>
                        </div>
                     </li>
                  </ul>
               </nav>
               <!-- End header -->
               <!-- Begin Page Content -->
               <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-8">
                            <h2>Update Job Post</h2>
                            <?php
                              if(!empty($failed_data)){
                                 ?>
                                       <p><?php echo $failed_data ?></p>
                                 <?php
                              }
                           ?>
                            <hr>
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="jobpost_title">Job Post Title</label>
                                    <input type="text" id="jobpost_title" class="form-control" required name="jobpost_title" value="<?= $result['post_title'] ?>"/>
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="company_name">Company Name</label>
                                    <input type="text" id="company_name" class="form-control" required name="company_name" value="<?= $result['company_title'] ?>" />
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="job_position">Job Position</label>
                                    <input type="text" id="job_position" value="<?= $result['job_position'] ?>" class="form-control" name="job_position" required/>
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="company_logo">Company Logo</label>
                                    <input type="file" id="company_logo" class="form-control" name="company_logo"/>
                                    <img src="upload/<?= $result['company_logo'] ?>" alt="" width="100" class="mt-2">
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="job_description">Job Description</label>
                                    <textarea id="job_description" class="form-control" required name="job_description"><?= $result['company_details'] ?></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary mb-4" name="submit">Edit Post</button>
                                <a href="main.php" class="btn btn-secondary mb-4">Back</a>
                            </form>
                        </div>
                    </div>
               </div>
               <!-- /.container-fluid -->
            </div>
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
               <div class="container my-auto">
                  <div class="copyright text-center my-auto"> <span class="text-center">Copyright &copy; CREATIVE SHEBA LIMITED</span> </div>
               </div>
            </footer>
            <!-- End of Footer -->
         </div>
         <!-- End of Content Wrapper -->
      </div>
      <!-- End of Page Wrapper -->
      <!-- Scroll to Top Button-->
      <a class="scroll-to-top rounded" href="#page-top"> <i class="fas fa-angle-up"></i> </a>
      <!-- Bootstrap core JavaScript-->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- Core plugin JavaScript-->
      <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
      <!-- Custom scripts for all pages-->
      <script src="vendor/js/sb-admin-2.min.js"></script>
      <!-- Page level plugins -->
      <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
      <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
      <script>
         CKEDITOR.replace( 'job_description' );
      </script>
   </body>
</html>
<?php 

   if(isset($_POST['logout'])){
      session_unset();
      session_destroy();
      header ("location: index.php");
      exit();
   }

?>