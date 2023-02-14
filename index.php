<?php require('./process/db.php'); ?>

<!doctype html>
<html lang="en">

<head>
    <title>Login Page | Authentication</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container bg-secondary my-5 p-5">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 g-3">
                <img class="w-100" src="./assets/img/images.png" alt="">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 p-3 bg-success g-3">
                <h1 class="text-center">Login</h1>
                <?php
                if(isset($_POST['submit']))
                {
                    $email = $_POST['email'];
                    $password = md5($_POST['password']);

                    $check_email = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
                    $result = mysqli_query($conn,$check_email);
                    $data = $result->fetch_assoc();
                    $count = mysqli_num_rows($result);
                    if($count==1){
                       session_start();
                       $_SESSION['email'] = $data['email']; 
                       $_SESSION['name'] = $data['name']; 
                       $_SESSION['id'] = $data['id'];
                       ?>
                            <script>
                                location.replace("http://localhost/authentication/home.php?msg=loginsuccessful");
                            </script>
                        <?php
                    }
                    else{
                        ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                                Account not found.
                            </div>
                        <?php
                    }
                }
                ?>
                <form action="#" method="post">
                    <div class="form-group">
                      <label for="">Email</label>
                      <input type="email" class="form-control" name="email" id="" aria-describedby="emailHelpId" placeholder="">
                    </div>
                    <div class="form-group">
                      <label for="">Password</label>
                      <input type="password" class="form-control" name="password" id="" placeholder="">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary my-2">Login</button>
                    <div class="text-center">Register a new membership ? <a href="register.php" class="text-light">Register</a></div> 
                </form>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>