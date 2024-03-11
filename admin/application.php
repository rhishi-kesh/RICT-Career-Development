<?php
include 'config.php';
session_start();
ob_start();
if (!isset($_SESSION['user_name'])) {
   header('location: index.php');
}
$sql = "SELECT * FROM `jobposts`";
$query = mysqli_query($conn, $sql);
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
         <!-- career application -->
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
                           <button class="dropdown-item" type="submit" name="logout" <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Logout </button>
                        </form>
                     </div>
                  </li>
               </ul>
            </nav>
            <!-- End header -->
            <!-- Begin Page Content -->
            <div class="container-fluid">
               <!-- Page Heading -->
               <h5 class="mb-2 text-gray-800">Applications</h5>
               <!-- DataTales Example -->
               <div class="card shadow">
                  <div class="card-header py-3 d-flex justify-content-between">
                  </div>
                  <div class="card-body">
                     <div class="table-responsive">
                        <nav>
                           <div class="nav nav-tabs" id="nav-tab" role="tablist">
                              <?php foreach ($query as $index => $item) { ?>
                                 <button class="nav-link  <?php echo $index === 0 ? 'active' : ''; ?>" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#id<?= $item['id'] ?>" type="button" role="tab" aria-controls="nav-home" aria-selected="true"><?= $item['job_position'] ?></button>
                              <?php } ?>
                           </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                           <?php
                              foreach ($query as $index => $item) {
                              $id = $item['id'];
                              $sql2 = "SELECT * FROM `applications` WHERE `job_post_id` = '$id'";
                              $query2 = mysqli_query($conn, $sql2);
                           ?>

                              <div class="tab-pane fade <?php echo $index === 0 ? 'active show' : ''; ?>" id="id<?= $item['id'] ?>" role="tabpanel" aria-labelledby="nav-home-tab">
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
                                       <?php $count = 1 ?>
                                       <?php foreach ($query2 as $item)  {?>
                                          <tr>
                                             <td><?php echo $count++ ?></td>
                                             <td><?= $item['name'] ?></td>
                                             <td><?= $item['email'] ?></td>
                                             <td><?= $item['number'] ?></td>
                                             <td colspan="2">
                                                <a href="#id<?= $item['id'] ?>" data-bs-toggle="modal" style="text-decoration: none">
                                                   <i class="fa-regular fa-eye"></i>
                                                </a>
                                                <a href="mailto: <?= $item['email'] ?>" style="text-decoration: none" class="ms-1">
                                                   <i class="fa-regular fa-envelope"></i>
                                                </a>
                                                <form action="" method="POST" class="d-inline-block ms-1">
                                                   <input type="hidden" name="delete_id" value="<?= $item['id'] ?>">
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
                                                      <p class="lead"><b>Age:</b> <?= $item['age'] ?></p>
                                                      <p class="lead"><b>University/Institute Name:</b> <?= $item['uni_ins_name'] ?></p>
                                                      <p class="lead"><b>Subject/Department Name:</b> <?= $item['sub_dep_name'] ?></p>
                                                      <p class="lead"><b>Year/Semister Name:</b> <?= $item['year_senmister_name'] ?></p>
                                                      <p class="lead"><b>CV:</b> <a href="../upload/<?= $item['cv'] ?>" target="_blank">Download Pdf</a></p>
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
            <!-- /.container-fluid -->
         </div>
         <!-- Footer -->
         <footer class="sticky-footer bg-white">
            <div class="container my-auto">
               <div class="copyright text-center my-auto"> <span>Copyright &copy; Blog 2022</span> </div>
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
   <script>
      CKEDITOR.replace('blog_body');
   </script>
</body>

</html>
<?php

if (isset($_POST['logout'])) {
   session_unset();
   session_destroy();
   header("location: index.php");
   exit();
}

if (isset($_POST['delete'])) {
   $id = $_POST['delete_id'];
   $sql2 = "SELECT * FROM `applications` WHERE `id` = '$id'";
   $query2 = mysqli_query($conn, $sql2);
   $result = mysqli_fetch_assoc($query2);
   $destination = "../upload/" . $result['cv'];


   $delete_sql = "DELETE FROM `applications` WHERE `id` = $id";
   $result = mysqli_query($conn, $delete_sql);
   if ($result) {
      unlink($destination);
      header("Location: application.php");
   }
}

?>