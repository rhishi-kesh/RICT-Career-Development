<?php
include 'config.php';
session_start();
ob_start();
if (!isset($_SESSION['user_name'])) {
   header('location: index.php');
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
   <title>Career Applicatiion</title>
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
         <hr class="sidebar-divider">
         <!-- Nav Item - Utilities Collapse Menu -->
         <li class="nav-item">
            <a class="nav-link" href="main.php"> <span>Job Posts</span></a>
         </li>
         <!-- Divider -->
         <hr class="sidebar-divider">
         <!-- Nav Item - Utilities Collapse Menu -->
         <li class="nav-item">
            <a class="nav-link" href="application.php"> <span>Job Applications</span></a>
         </li>
         <!-- Divider -->
         <hr class="sidebar-divider">
         <!-- Nav Item - Utilities Collapse Menu -->
         <li class="nav-item">
            <a class="nav-link" href="partners.php"> <span>Partners</span></a>
         </li>
         <hr class="sidebar-divider">
         <!-- career application -->
         <li class="nav-item">
            <a class="nav-link" href="careerApplication.php"> <span>Career Application</span></a>
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
                           if (isset($_SESSION['user_name'])) {
                              echo $_SESSION['user_name'];
                           }
                           ?>
                        </span> <img class="img-profile rounded-circle" src="vendor/img/undraw_profile.svg"> </a>
                     <!-- Dropdown - User Information -->
                     <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <form action="" method="POST">
                           <button class="dropdown-item" type="submit" name="logout"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Logout </button>
                        </form>
                     </div>
                  </li>
               </ul>
            </nav>
            <!-- End header -->
            <!-- Begin Page Content -->
            <div class="container-fluid">
               <!-- Page Heading -->
               <h5 class="mb-2 text-gray-800">Career Applications</h5>
               <!-- DataTales Example -->
               <div class="card shadow">
                  <div class="card-header py-3 d-flex justify-content-between">
                  </div>
                  <div class="card-body">
                     <div class="table-responsive">
                        
                        <div class="tab-content" id="nav-tabContent">
                           <?php
                           $sql = "SELECT * FROM `cv_drop`";
                           $query = mysqli_query($conn, $sql);
                           ?>
                           <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                                 <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th colspan="2">Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                    if (isset($_SESSION['status']) && $_SESSION != '') {
                                    ?>
                                       <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                          <?php echo $_SESSION['status']; ?>
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                             <span aria-hidden="true">&times;</span>
                                          </button>
                                       </div>
                                    <?php
                                       unset($_SESSION['status']);
                                    }
                                 ?>
                                 <?php $count = 1 ?>
                                 <?php
                                 if (mysqli_num_rows($query) > 0) {
                                    foreach ($query as $item) {
                                 ?>
                                       <tr>
                                          <td><?php echo $count++ ?></td>
                                          <td><?= $item['name'] ?></td>
                                          <td><?= $item['email'] ?></td>
                                          <td><?= $item['number'] ?></td>
                                          <td colspan="2">
                                             <a href="#id<?= $item['id'] ?>" data-bs-toggle="modal" style="text-decoration: none">
                                                <i class="fa-regular fa-eye"></i>
                                             </a>
                                             <form action="" method="POST" class="d-inline-block ms-1">
                                                <input type="hidden" name="delete_id" value="<?= $item['id'] ?>">
                                                <input type="hidden" name="pdf_stu_cv" value="<?php echo $item['pdf_cv'] ?>">
                                                <button type="submit" name="delete" class="bg-white border-0">
                                                   <i class="fa-solid fa-trash text-danger"></i>
                                                </button>
                                             </form>
                                          </td>
                                       </tr>
                                       <div class="modal fade" id="id<?= $item['id'] ?>" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                             <div class="modal-dialog">
                                                <div class="modal-content">
                                                   <div class="modal-header">
                                                      <h5 class="modal-title" id="staticBackdropLabel"><?= $item['name'] ?></h5>
                                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                   </div>
                                                   <div class="modal-body">
                                                      <p class="lead"><b>Name:</b> <?= $item['name'] ?></p>
                                                      <p class="lead"><b>Email:</b> <?= $item['email'] ?></p>
                                                      <p class="lead"><b>Phone:</b> <?= $item['number'] ?></p>
                                                      <p class="lead"><b>Address:</b> <?= $item['address'] ?></p>
                                                      <p class="lead"><b>Pdf-CV:</b> <a href="../upload/CvDrop/<?= $item['pdf_cv'] ?>" target="_blank">Download Pdf</a></p>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                    <?php } ?>
                              </tbody>
                           </table>
                        </div>
                     <?php } ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- Footer -->
         <footer class="sticky-footer p-0 bg-white">
            <div class="container my-auto">
               <div class="copyright fixed-bottom text-center mb-3 my-auto"> <span>Copyright &copy; Blog 2022</span> </div>
            </div>
         </footer>
         <!-- End of Footer -->
         <!-- /.container-fluid -->
      </div>
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
   <script>
      CKEDITOR.replace('blog_body');
   </script>
</body>

</html>
<?php

   if (isset($_POST['delete'])) {
      $id = $_POST['delete_id'];
      $stu_cv = $_POST['pdf_stu_cv'];

      $query = "DELETE FROM cv_drop WHERE id='$id' ";
      $query_run = mysqli_query($conn, $query);
  
      if ($query_run) {
          unlink("../upload/CvDrop/".$stu_cv);
          $_SESSION['status'] = "Data Delete successfully!";
          header('location: careerApplication.php');
      } else {
          $_SESSION['status'] = "Data Not Delete successfully....!!";
          header('location: careerApplication.php');
      }
  }

?>