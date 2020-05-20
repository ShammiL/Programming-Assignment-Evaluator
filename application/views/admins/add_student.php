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
                    <input type="text" class="form-control" name="index" placeholder="Enter Index Number Here..." required>
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
                <div class="form-group col-md-6">
                    <label for="email">Email Address: </label>
                    <input type="email" class="form-control" name="email" placeholder="Enter Email Address Here..." required>
                </div>
                <div class="form-group col-md-6">
                    <label for="semester">Semester: </label>
                    <select name="semester" class="form-control">
                        <option selected disabled> ----- Select Semester ----- </option>
                        <option value="1">Semester 01</option>
                        <option value="2">Semester 02</option>
                        <option value="3">Semester 03</option>
                        <option value="4">Semester 04</option>
                        <option value="5">Semester 05</option>
                        <option value="6">Semester 06</option>
                        <option value="7">Semester 07</option>
                        <option value="8">Semester 08</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4">
                <div class="form-group">
                        <label for="phone">Telephone: </label>
                        <input type="text" class="form-control" name="phone" placeholder="Enter Telephone Number Here...">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="address">Home Address: </label>
                        <input type="text" class="form-control" name="address" placeholder="Enter Home Address Here...">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Add Student</button>
            </form>
        </div>
	</div>
</div>
