<div class="container">
	<div class="card mt-100">
        <div class="card-header">
            <div class="row">
                <div class="col-md-10">
                    <h4>NIC: <?php echo $teacher['nic']; ?></h4>
                </div>
                <div class="col-md-2">
                    <?php if ($status == "1") { ?>
                        <a href="<?php echo base_url(); ?>admin/changeStatus/<?php echo $teacher['nic']; ?>/0" class="btn btn-danger btn-edit align-middle" type="submit">Disable</a>
                    <?php } else { ?>
                        <a href="<?php echo base_url(); ?>admin/changeStatus/<?php echo $teacher['nic']; ?>/1" class="btn btn-primary btn-edit align-middle" type="submit">Enable</a>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="card-body">
            <?php echo validation_errors();
            if ($message == 1) {
                echo "<p id='change-password-success' class='change-password-success'>New data updated successfully.</p>";
            } else if ($message != "") {
                echo "<p id='change-password-wrong' class='change-password-wrong'>An error occured.</p>";
            }
			echo form_open_multipart('admin/editTeacher/'.$teacher['nic']); ?>
                <div class="form-group row">
                    <label for="fname" class="col-sm-2 col-form-label">First Name: </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="fname" value="<?php echo $teacher['fname']; ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lname" class="col-sm-2 col-form-label">Last Name: </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="lname" value="<?php echo $teacher['lname']; ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email Address: </label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="email" value="<?php echo $teacher['email']; ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="address" class="col-sm-2 col-form-label">Home Address: </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="address" value="<?php echo $teacher['address']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="phone" class="col-sm-2 col-form-label">Telephone: </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="phone" value="<?php echo $teacher['telephone']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="bday" class="col-sm-2 col-form-label">Birthday: </label>
                    <div class="col-sm-6">
                        <input type="date" class="form-control" name="bday" value="<?php echo $teacher['birthday']; ?>" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update Teacher</button>
            </form>
        </div>
    </div>
</div>