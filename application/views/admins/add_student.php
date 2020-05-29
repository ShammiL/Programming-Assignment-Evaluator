<div class="container">
	<div class="card mt-100">
        <div class="card-header">
            <h3>Add New Student</h3>
        </div>
        <div class="card-body">
        <?php echo validation_errors();
			echo form_open_multipart('admin/addStudent'); ?>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="index">Index Number: </label>
                    <input type="text" class="form-control" name="index" value="<?php echo $inputs['indexNumber']; ?>" placeholder="Enter Index Number Here..." required>
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
                <div class="form-group col-md-6">
                    <label for="email">Email Address: </label>
                    <input type="email" class="form-control" name="email" value="<?php echo $inputs['email']; ?>" placeholder="Enter Email Address Here..." required>
                </div>
                <div class="form-group col-md-6">
                    <label for="semester">Semester: </label>
                    <select name="semester" class="form-control">
						<?php if ($inputs['semester'] != "") { ?>
							<option selected value="<?php echo $inputs['semester'] ?>"><?php echo "Semester 0".$inputs['semester'] ?></option>
						<?php } else { ?>
							<option selected disabled> ----- Select Semester ----- </option>
						<?php }
						for ($i=1; $i < 9; $i++) {
							if ($i != $inputs['semester']) {
								echo '<option value='.$i.'>Semester 0'.$i.'</option>';
							}
						} ?>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4">
                <div class="form-group">
					<label for="phone">Telephone: </label>
					<input type="text" class="form-control" name="phone" value="<?php echo $inputs['phone']; ?>" pattern="^[0-9]{10}$" placeholder="Enter Telephone Number Here...">
					<small style="color: #357B8E">Telephone number must be a ten digit number.</small>
				</div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="address">Home Address: </label>
                        <input type="text" class="form-control" name="address" value="<?php echo $inputs['address']; ?>" placeholder="Enter Home Address Here...">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Add Student</button>
            </form>
        </div>
	</div>
</div>
