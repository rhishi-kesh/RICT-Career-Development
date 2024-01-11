<?php
    include 'config.php';
    session_start();
    if(isset($_SESSION['user_name'])){
        header('location: main.php');
     }
    if(isset($_POST['submit'])){
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        $password_encripted = sha1($password);

        if(!empty($email) && !empty($password)){
            $sql = "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password_encripted'";
            $query = mysqli_query($conn, $sql);
            $result = mysqli_fetch_assoc($query);
            $rows = mysqli_num_rows($query);
            if($rows){
                $_SESSION['user_name'] = $result['name'];
                header('location: main.php');
            }else{
                $unothorize = "Invalied email and password";
            }
        }else{
            $empty = "Email or Password feild empty";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admi login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <section class="mt-5 pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card p-3">
                        <?php
                            if(!empty($empty)){
                                ?>
                                    <p class="lead p-2 bg-warning text-center text-white"><?php echo $empty ?></p>
                                <?php
                            }
                        ?>
                        <?php
                            if(!empty($unothorize)){
                                ?>
                                    <p class="lead p-2 bg-danger text-center text-white"><?php echo $unothorize ?></p>
                                <?php
                            }
                        ?>
                        <form action="" method="POST">
                            <div class="form-outline mb-4">
                                <label class="form-label" for="email">Email address</label>
                                <input type="email" id="email" class="form-control" name="email" required/>
                            </div>
                            <div class="form-outline mb-4">
                                <label class="form-label" for="password">Password</label>
                                <input type="password" id="password" class="form-control" name="password" required/>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block mb-4" name="submit">Sign in</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>