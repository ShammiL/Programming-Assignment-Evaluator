<div class="container">
	<div class="card body-card">
        <div class="card-header">
            <h3>Add New Teacher</h3>
        </div>
        <div class="card-body">
        <?php echo validation_errors(); 
			echo form_open_multipart('admin/addTeacher'); ?>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="nic">NIC Number: </label>
                    <input type="text" class="form-control" name="nic" placeholder="Enter NIC Number Here..." required>
                </div>
                <div class="form-group col-md-4">
                    <label for="fname">First Name: </label>
                    <input type="text" class="form-control" name="fname" placeholder="Enter First Name Here..." required>
                </div>
                <div class="form-group col-md-4">
                    <label for="lname">Last Name: </label>
                    <input type="text" class="form-control" name="lname" placeholder="Enter Last Name Here..." required>
                </div>
            </div>
            <div class="form-group">
                <label for="email">Email Address: </label>
                <input type="email" class="form-control" name="email" placeholder="Enter Email Address Here..." required>
            </div>
            <div class="form-row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="bday">Birthday:</label>
                        <input type="date" class="form-control" name="bday" value="dd-mm-yyyy" required>
                    </div>						
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="gender">Gender: </label>
                        <select name="gender" class="form-control">
                            <option selected disabled> ----- Select Gender ----- </option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>						
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="nationality">Nationality: </label>
                        <select name="nationality" class="form-control">
                            <option selected disabled> ----- Select Nationality ----- </option>
                            <option value="Sinhala">Sinhala</option>
                            <option value="Tamil">Tamil</option>
                            <option value="Muslim">Muslim</option>
                            <option value="Christian">Christian</option>
                        </select>						
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4">
                <div class="form-group">
                        <label for="phone">Telephone: </label>
                        <input type="text" class="form-control" name="phone" placeholder="Enter Telephone Number Here..." requied>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="address">Home Address: </label>
                        <input type="text" class="form-control" name="address" placeholder="Enter Home Address Here..." required>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Add Teacher</button>
            </form>
        </div>
	</div>
</div>
