        <!-- Partners part -->
<?php
session_start();

        // inserted

$conn = mysqli_connect('localhost','root','','rictjob_potal');
if(isset($_POST['save_image'])){
    $file_name= $_FILES['image']['name'];
    $random = rand(000,999);
    $random = str_pad($random, 3, '0', STR_PAD_LEFT);
    $file_name = $random.$file_name;
    $tmp_name= $_FILES['image']['tmp_name'];

    $sql = "INSERT INTO `partners`(`image`) VALUES ('$file_name')";
    $query = mysqli_query($conn, $sql);
    if($query){
        move_uploaded_file($tmp_name,"upload/partners/".$file_name);
        $_SESSION['status'] = "Image inserted !";
        header('location: partners.php');
    }else{
        $failed_data = "data instert faild";
        $_SESSION['status'] = "Image Not inserted !";
        header('location: placementpartner.php');
    }
}


?>