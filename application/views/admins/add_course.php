<div class="container">
	<div class="card mt-100">
        <div class="card-header">
            <h3>Add New Course</h3>
        </div>
        <div class="card-body">
        <?php echo validation_errors();
			echo form_open_multipart('admin/addCourse'); ?>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="id">Course ID: </label>
                    <input type="text" class="form-control" name="id" value="<?php echo $inputs['course_id']; ?>" placeholder="Enter Course ID Here..." required>
                </div>
                <div class="form-group col-md-6">
                    <label for="name">Course Title: </label>
                    <input type="text" class="form-control" name="title" value="<?php echo $inputs['course_name']; ?>" placeholder="Enter Course Title Here..." required>
                </div>
            </div>
            <div class="form-group">
                <label for="description">Description: </label>
                <textarea class="form-control" name="description" placeholder="Enter Course Description Here..." required><?php echo $inputs['description']; ?></textarea>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="teacher">Teacher: </label>
                    <select name="teacher" class="form-control">
						<?php if ($inputs['teacher'] != "") { ?>
						<option selected value="<?php echo $teacher['nic'] ?>"><?php echo $teacher['nic'].' - '.$teacher['fname'].' '.$teacher['lname']; ?></option>
						<?php } else { ?>
						<option selected disabled> ----- Select Teacher ----- </option>
						<?php }
                        foreach ($teachers as $teacher) {?>
                            <option value="<?php echo $teacher['nic']; ?>"><?php echo $teacher['nic'].' - '.$teacher['fname'].' '.$teacher['lname']; ?></option>
                        <?php }?>
                    </select>
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
            <button type="submit" class="btn btn-primary">Add Course</button>
            </form>
        </div>
	</div>
</div>
