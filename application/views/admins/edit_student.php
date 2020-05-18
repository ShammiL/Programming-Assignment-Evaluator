<div class="container">
	<div class="card body-card">
        <div class="card-header">
            <h4>Index Number: <?php echo $student['indexNumber']; ?></h4>
        </div>
        <div class="card-body">
            <?php echo validation_errors(); 
            if ($message == 1) {
                echo "<p id='change-password-success' class='change-password-success'>New data updated successfully.</p>";
            } else if ($message != "") {
                echo "<p id='change-password-wrong' class='change-password-wrong'>An error occured.</p>";
            }
			echo form_open_multipart('admin/editStudent/'.$student['indexNumber']); ?>
                <input type="text" class="form-control" name="index" value="<?php echo $student['indexNumber']; ?>" hidden>
                <div class="form-group row">
                    <label for="fname" class="col-sm-2 col-form-label">First Name: </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="fname" value="<?php echo $student['fname']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lname" class="col-sm-2 col-form-label">Last Name: </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="lname" value="<?php echo $student['lname']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email Address: </label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="email" value="<?php echo $student['email']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="address" class="col-sm-2 col-form-label">Home Address: </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="address" value="<?php echo $student['address']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="phone" class="col-sm-2 col-form-label">Telephone: </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="phone" value="<?php echo $student['phone']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="bday" class="col-sm-2 col-form-label">Birthday: </label>
                    <div class="col-sm-6">
                        <input type="date" class="form-control" name="bday" value="<?php echo $student['birthday']; ?>">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update Student</button>
            </form>
        </div>
    </div>
</div>