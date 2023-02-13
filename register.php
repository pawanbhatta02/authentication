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
                <h1 class="text-center">Register</h1>
                <?php
                if(isset($_POST['submit']))
                {
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $cpassword = $_POST['cpassword'];

                    if($name!="" && $email!="" && $password!="" && $cpassword!="")
                    {
                        if($password==$cpassword)
                        {
                            $check_email = "SELECT * FROM users WHERE email = '$email'";
                            $check_email_result = mysqli_query($conn,$check_email);
                            $count = mysqli_num_rows($check_email_result);
                            if($count==0)
                            {
                                $password = md5($password);
                                $register_user = "INSERT INTO users(name,email,password) VALUES('$name','$email','$password')";
                                $register_user_result = mysqli_query($conn,$register_user);
                                if($register_user_result)
                                {
                                    echo Header('Location: index.php?msg=registered');
                                }
                            }
                            else{
                            ?>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        <span class="sr-only">Close</span>
                                    </button>
                                    Email Already Exists. Please try login.
                                </div>
                            <?php    
                            }
                        }
                        else{
                        ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                                Password and Confirm Password do not match.
                            </div>
                        <?php  
                        }
                    }
                    else{
                        ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                                All fields are required!
                            </div>
                        <?php
                    }
                }
                
                
                ?>
                <form action="#" method="post">
                    <div class="form-group">
                      <label for="">Name</label>
                      <input type="text" class="form-control" name="name" id="" placeholder="" required>
                    </div>
                    <div class="form-group">
                      <label for="">Email</label>
                      <input type="email" class="form-control" name="email" id="" aria-describedby="emailHelpId" placeholder="" required>
                    </div>
                    <div class="form-group">
                      <label for="">Password</label>
                      <input type="password" class="form-control" name="password" id="" placeholder="" required>
                    </div>
                    <div class="form-group">
                      <label for="">Confirm Password</label>
                      <input type="password" class="form-control" name="cpassword" id="" placeholder="" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary my-2">Login</button>
                     <div class="text-center">Already Registered ? <a href="index.php" class="text-light">Login</a></div> 
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