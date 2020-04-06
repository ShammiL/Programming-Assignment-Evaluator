<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <title>Create Assignment</title>
    </head>
    <body>
        <div class="container">
            <form action="create_assignment.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Add the title:</label>
                    <input class="form-control" type="text" name="title" id="title" placeholder="Add Title Here...">
                </div>
                <div class="form-group">
                    <label>Add the description:</label>
                    <textarea class="form-control" name="description" id="description" placeholder="Add Description Here..."></textarea>
                </div>
                <div class="form-group">
                    <label>Insert documents:</label>
                    <input class="form-control-file" type="file" name="documents[]" id="documents" multiple="multiple">
                </div>
                <div class="form-group">
                    <label>Choose the Languages:</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="languages[]" value="Cpp">
                        <label class="form-check-label" for="Cpp">
                            C++
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="languages[]" value="Java">
                        <label class="form-check-label" for="Java">
                            Java
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="languages[]" value="Php">
                        <label class="form-check-label" for="Php">
                            PHP
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="languages[]" value="Python">
                        <label class="form-check-label" for="Python">
                            Python
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Give access to compiler:</label>
                    <div class="form-check">
                        <input type="radio" name="compiler" value="Yes">
                        <label class="form-check-label" for="Yes">
                            Yes
                        </label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="compiler" value="No" checked>
                        <label class="form-check-label" for="No">
                            No
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Set deadline:</label>
                    <input type="date" name="deadline" id="deadline">
                </div>
                <button class="btn btn-primary" type="submit" name="create">Create Assignment</button>
            </form>
        </div>
    </body>
</html>

<?php
    if(isset($_POST["create"])) {

        $title = $_POST['title'];
        $description = $_POST['description'];
        $languages = $_POST['languages'];
        $compiler = $_POST['compiler'];
        $deadline = $_POST['deadline'];
        $documents = $_FILES['documents'];

        echo $title, "<br/>";
        echo $description, "<br/>";
        foreach ($languages as $language) {
            echo $language, "<br/>";
        }
        echo $compiler, "<br/>";
        echo $deadline, "<br/>";
        foreach ($documents as $document) {
            print_r($document);
        }
    }
