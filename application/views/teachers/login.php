<!DOCTYPE html>
<html>
<head>
    <title>Animated Login Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/login.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body class="login-body">
<img class="wave" src="<?php echo base_url(); ?>assets/images/site/Login_Cover.png">
<div class="container-fluid">
    <div class="img">
        <img src="<?php echo base_url(); ?>assets/images/site/undraw_code_typing_7jnv.svg" alt="coding">
    </div>
    <div class="login-content">
        <div class="col-md-3"></div>
        <div class="col-md-9">
            <form action="">
                <img src="<?php echo base_url(); ?>assets/images/site/undraw_profile_pic_ic5t.svg" alt="profile">
                <h2 class="title">Welcome</h2>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>Email Address:</h5>
                        <input type="email" class="input" name="email">
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5>Password</h5>
                        <input type="password" class="input" name="password">
                    </div>
                </div>
                <a href="<?php echo base_url(); ?>teachers" type="submit" class="btn" id="login">Login</a>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/login.js"></script>
</body>
</html>
