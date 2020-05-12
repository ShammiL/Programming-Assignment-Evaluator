<div class="container">
	<div class="card body-card">
        <div class="card-header">
            <h3>Add New Course</h3>
        </div>
        <div class="card-body">
        <?php echo validation_errors();
			echo form_open_multipart('admin/addCourse'); ?>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="id">Course ID: </label>
                    <input type="text" class="form-control" name="id" placeholder="Enter Course ID Here..." required>
                </div>
                <div class="form-group col-md-6">
                    <label for="name">Course Title: </label>
                    <input type="text" class="form-control" name="title" placeholder="Enter Course Title Here..." required>
                </div>
            </div>
            <div class="form-group">
                <label for="description">Description: </label>
                <textarea class="form-control" name="description" placeholder="Enter Course Description Here..." required></textarea>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputState">Teacher: </label>
                    <select name="teacher" class="form-control">
                        <option selected disabled> ----- Select Teacher ----- </option>
                        <?php foreach ($teachers as $teacher) {?>
                            <option value="<?php echo $teacher['email']; ?>"><?php echo $teacher['email']; ?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="form-group col-md-6">
                <label for="inputState">Semester: </label>
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
            <button type="submit" class="btn btn-primary">Add Course</button>
            </form>
        </div>
	</div>
</div>
