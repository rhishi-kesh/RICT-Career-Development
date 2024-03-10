        <!-- Partners part -->
<?php
session_start();

// inserted

$conn = mysqli_connect('localhost', 'root', '', 'rictjob_potal');
if (isset($_POST['save_image'])) {
    $file_name = $_FILES['image']['name'];

    $random = rand(000, 999);
    $random = str_pad($random, 3, '0', STR_PAD_LEFT);
    $file_name = $random . $file_name;
    $tmp_name = $_FILES['image']['tmp_name'];

    $sql = "INSERT INTO `partners`(`image`) VALUES ('$file_name')";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        move_uploaded_file($tmp_name, "upload/partners/" . $file_name);
        $_SESSION['status'] = "Image inserted !";
        header('location: partners.php');
    } else {
        $failed_data = "data instert faild";
        $_SESSION['status'] = "Image Not inserted !";
        header('location: placementpartner.php');
    }
}

        // Image Update part


if (isset($_POST['update_img'])) {
    $stu_id = $_POST['img_id'];
    $new_image = $_FILES['image']['name'];
    $random = rand(000, 999);
    $random = str_pad($random, 3, '0', STR_PAD_LEFT);
    $new_image = $random . $new_image;
    $tmp_name = $_FILES['image']['tmp_name'];

    $old_image = $_POST['old_image'];

    if ($new_image != '') {
        $update_filename =  $new_image;
    } else {
        $update_filename = $old_image;
    }
    $query = "UPDATE partners SET image='$update_filename' WHERE id='$stu_id' ";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        if (!empty($new_image)) {
            move_uploaded_file($tmp_name, "upload/partners/" . $update_filename);
            unlink("upload/partners/".$old_image);
        }
        $_SESSION['status'] = "Data Updated successfully.";
        header('location: partners.php');
    } else {
        $_SESSION['status'] = "Data Not Updated successfully....!!";
        header('location: partners.php');
    }
}

// Delete part

if (isset($_POST['delete_data'])) {
    $id = $_POST['delete_id'];
    $stu_image = $_POST['del_stu_image'];

    $query = "DELETE FROM partners WHERE id='$id' ";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {

        unlink("upload/partners/".$stu_image);
        $_SESSION['status'] = "Data Delete successfully!";
        header('location: partners.php');
    } else {
        $_SESSION['status'] = "Data Not Delete successfully....!!";
        header('location: partners.php');
    }
}

?>