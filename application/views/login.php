<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url ('assets/login/fonts/icomoon/style.css'); ?>">

    <link rel="stylesheet" href="<?php echo base_url ('assets/login/css/owl.carousel.min.css'); ?>">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url ('assets/login/css/bootstrap.min.css'); ?>">

    <!-- Style -->
    <link rel="stylesheet" href="<?php echo base_url ('assets/login/css/style.css'); ?>">

    <title>SANDRA FT UNDIP</title>
</head>

<body>



    <div class="content">
        <div class="container">
            <br>
            <div class="row">
                <div class="col-md-6">
                    <img src="<?php echo base_url ('assets/back.svg'); ?>" alt="Image"
                        class="img-fluid">
                </div>
                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="mb-4">
                                <h2 style="color: #6395ae"><b>
                                        <center>SANDRA FT UNDIP</center>
                                    </b></h2>
                                <h3>Sign In</h3>
                            </div>
                            <form action="<?php base_url('Welcome') ?>" method="post">
                                <?php if (!empty($error)) {echo"$error"; } else {}?>

                                <div class="form-group first">
                                    <label for="username">Username</label>
                                    <input name="username" type="text" class="form-control" id="username" required>

                                </div>
                                <div class="form-group last mb-4">
                                    <label for="password">Password</label>
                                    <input name="password" type="password" class="form-control" id="password" required>

                                </div>

                                <input type="submit" value="Log In" class="btn btn-block btn-info">
                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>


    <script src="<?php echo base_url ('assets/login/js/jquery-3.3.1.min.js'); ?>"></script>
    <script src="<?php echo base_url ('assets/login/js/popper.min.js'); ?>"></script>
    <script src="<?php echo base_url ('assets/login/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url ('assets/login/js/main.js'); ?>"></script>
</body>

</html>