<div class="container">
	<div class="card mt-100">
        <div class="card-header">
            <h4>Course ID: <?php echo $course->course_id; ?></h4>
        </div>
        <div class="card-body">
            <?php echo validation_errors(); 
            if ($message == 1) {
                echo "<p id='change-password-success' class='change-password-success'>Course details updated successfully.</p>";
            } else if ($message != "") {
                echo "<p id='change-password-wrong' class='change-password-wrong'>An error occured.</p>";
            }
			echo form_open_multipart('admin/editCourse/'.$course->course_id); ?>
                <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">Course Title: </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="title" value="<?php echo $course->course_name; ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="desc" class="col-sm-2 col-form-label">Description: </label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="desc" required><?php echo $course->description; ?></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lecturer_id" class="col-sm-2 col-form-label">Lecturer: </label>
                    <div class="col-sm-10">
                        <select id="language" class="form-control" name="lecturer_id">
							<?php if ($course->lecturer_id != "") { ?>
                                <option selected value="<?php echo $course->lecturer_id; ?>"><?php echo $teacher['fname']." ".$teacher['lname'] ?></option>
                            <?php } else { ?>
                                <option selected disabled> ----- Select Teacher ----- </option>
                            <?php }
                            foreach ($teachers as $teacher) { 
                                if ($course->lecturer_id != $teacher['nic']) {?>
                                    <option value="<?php echo $teacher['nic'] ?>"><?php echo $teacher['fname']." ".$teacher['lname'] ?></option>
                                <?php }
                            } ?>
						</select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="semester" class="col-sm-2 col-form-label">Semester: </label>
                    <div class="col-sm-10">
                        <select id="language" class="form-control" name="semester">
							<?php if ($course->semester != "") { ?>
                                <option selected value="<?php echo $course->semester ?>"><?php echo "Semester 0".$course->semester ?></option>
                            <?php } else { ?>
                                <option selected disabled> ----- Select Semester ----- </option>
                            <?php }
                            for ($i=1; $i < 9; $i++) { 
                                if ($i != $course->semester) {
                                    echo '<option value='.$i.'>Semester 0'.$i.'</option>';
                                }
                            } ?>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update Course</button>
            </form>
        </div>
    </div>
</div>
