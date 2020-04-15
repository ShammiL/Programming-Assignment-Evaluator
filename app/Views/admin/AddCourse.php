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
    <div class="col-md-5 icon-add-course row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <img src="<?php echo base_url('OnlineCodeEvaluator/assets/images/undraw_add_file2_gvbb.svg')?>" alt="add course">
        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="col-md-7">
        <h2 class="text-center mb-3">Add New Course</h2>
        <form>
            <div class="form-group">
                <label for="id">Course ID :</label>
                <input type="text" class="form-control" name="id" required>
            </div>
            <div class="form-group">
                <label for="title">Title :</label>
                <input type="text" class="form-control" name="title" required>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="title">Select Teacher :</label>
                    <select class="custom-select">
                        <option selected disabled>Select from here...</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary add-btn">Add</button>
                </div>
                <div class="col-md-6"></div>
                <div class="col-md-3">
                    <a href="<?php echo base_url('OnlineCodeEvaluator/public/admin/courses')?>" type="submit" class="btn btn-secondary add-btn">Cancel</a>
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