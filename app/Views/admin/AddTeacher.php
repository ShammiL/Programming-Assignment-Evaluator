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

    <title>Add Course</title>
</head>
<body>

<div class="container-fluid row mt-5">
    <div class="col-md-5 icon-add-teacher row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <img src="<?php echo base_url('OnlineCodeEvaluator/assets/images/undraw_teaching_f1cm.svg')?>" alt="add course">
        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="col-md-7">
        <h2 class="text-center mb-3">Add New Teacher</h2>
        <form>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="first-name">First Name :</label>
                    <input type="text" class="form-control" name="fname" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="last-name">Last Name :</label>
                    <input type="text" class="form-control" name="lname">
                </div>
            </div>
            <div class="form-group">
                <label for="title">Email Address :</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="form-group">
                <label for="address">Address :</label>
                <input type="text" class="form-control" name="address">
            </div>
            <label for="last-name">Contact :</label>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="home">Home :</label>
                    <input type="tel" class="form-control" name="home">
                </div>
                <div class="form-group col-md-6">
                    <label for="mobile">Mobile :</label>
                    <input type="tel" class="form-control" name="mobile" required>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary add-btn">Add</button>
                </div>
                <div class="col-md-6"></div>
                <div class="col-md-3">
                    <a href="<?php echo base_url('OnlineCodeEvaluator/public/admin/teachers')?>" type="submit" class="btn btn-secondary add-btn">Cancel</a>
                </div>
            </div>
        </form>
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