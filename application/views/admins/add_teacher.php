<div class="container">
	<div class="card mt-100">
        <div class="card-header">
            <h3>Add New Teacher</h3>
        </div>
        <div class="card-body">
        <?php echo validation_errors();
			echo form_open_multipart('admin/addTeacher'); ?>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="nic">NIC Number: </label>
                    <input type="text" class="form-control" name="nic" value="<?php echo $inputs['nic']; ?>" placeholder="Enter NIC Number Here..." required>
                </div>
                <div class="form-group col-md-4">
                    <label for="fname">First Name: </label>
                    <input type="text" class="form-control" name="fname" value="<?php echo $inputs['fname']; ?>" placeholder="Enter First Name Here..." required>
                </div>
                <div class="form-group col-md-4">
                    <label for="lname">Last Name: </label>
                    <input type="text" class="form-control" name="lname" value="<?php echo $inputs['lname']; ?>" placeholder="Enter Last Name Here..." required>
                </div>
            </div>
            <div class="form-group">
                <label for="email">Email Address: </label>
                <input type="email" class="form-control" name="email" value="<?php echo $inputs['email']; ?>" placeholder="Enter Email Address Here..." required>
            </div>
            <div class="form-row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="bday">Birthday:</label>
                        <input type="date" class="form-control" name="bday" value="<?php echo $inputs['birthday']; ?>" required>
                    </div>						
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="gender">Gender: </label>
                        <select name="gender" class="form-control">
							<?php if ($inputs['gender'] != "") { ?>
								<option selected value="<?php echo $inputs['gender'] ?>"><?php echo $inputs['gender'] ?></option>
							<?php } else { ?>
								<option selected disabled> ----- Select Gender ----- </option>
							<?php }
							foreach (array("Male", "Female", "Other") as $gender) {
								if ($gender != $inputs['gender']) {
									echo '<option value='.$gender.'>'.$gender.'</option>';
								}
							} ?>
                        </select>						
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="nationality">Nationality: </label>
                        <select name="nationality" class="form-control">
							<?php if ($inputs['nationality'] != "") { ?>
								<option selected value="<?php echo $inputs['nationality'] ?>"><?php echo $inputs['nationality'] ?></option>
							<?php } else { ?>
								<option selected disabled> ----- Select Nationality ----- </option>
							<?php }
							foreach (array("Sinhala", "Tamil", "Muslim", "Christian") as $nationality) {
								if ($nationality != $inputs['nationality']) {
									echo '<option value='.$nationality.'>'.$nationality.'</option>';
								}
							} ?>
                        </select>						
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4">
                <div class="form-group">
                        <label for="phone">Telephone: </label>
                        <input type="text" class="form-control" name="phone" value="<?php echo $inputs['telephone']; ?>" pattern="^[0-9]{10}$" placeholder="Enter Telephone Number Here..." requied>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="address">Home Address: </label>
                        <input type="text" class="form-control" name="address" value="<?php echo $inputs['address']; ?>" placeholder="Enter Home Address Here..." required>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Add Teacher</button>
            </form>
        </div>
	</div>
</div>
