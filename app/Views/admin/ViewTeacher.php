<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url('OnlineCodeEvaluator/assets/admin/CSS/style.css'); ?>">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>

    <title>Teacher Profile</title>
</head>
<body>

<div class="jumbotron jumbotron-fluid admin-jumbotron">
    <div class="layer"></div>
</div>
<div class="container-fluid row mt-5">
    <div class="col-md-5 icon-view-teacher row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <img src="<?php echo base_url('OnlineCodeEvaluator/assets/images/undraw_teaching_f1cm.svg')?>" alt="add course">
        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="col-md-7">
        <div class="card">
            <div class="card-title card-title-details m-1">
                <h4 class="text-center m-2">Teacher Profile</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <label class="col-md-3">Name : </label>
                    <label class="col-md-9">First Name + Last Name</label>
                </div>
                <div class="row">
                    <label class="col-md-3">Email Address : </label>
                    <label class="col-md-9">teacher01@email.com</label>
                </div>
                <div class="row">
                    <label class="col-md-3">Home Address : </label>
                    <label class="col-md-9">16:38:47.136: [OnlineCodeEvaluator] git -c credential.helper= -c core</label>
                </div>
                <div class="row">
                    <label class="col-md-3">Telephone : </label>
                    <label class="col-md-9">0714545458</label>
                </div>
                <div class="row">
                    <label class="col-md-3">Courses : </label>
                        <label class="col-md-9">CS1234, CS3425, CS3456</label>
                </div>
                <div class="row mt-4">
                    <div class="col-md-8"></div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-secondary add-btn">Disable</button>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-danger add-btn">Remove</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>