<?php echo validation_errors(); ?>

<div class="container-fluid row">
	<div class="col-md-1"></div>
	<div class="col-md-10 body-card">
		<div class="card">
			<div class="card-header">
				<h3>Edit Assignment</h3>
			</div>
			<div class="card-body">
				<?php echo form_open_multipart('teacher/update/'.$course_id.'/'.$assignment['assignment_id'].'/'.$num); ?>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="title">Edit Title:</label>
							<input class="form-control" type="text" name="name" id="title" placeholder="Edit Title Here..." value="<?php echo $assignment['assignment_name']?>" required>
						</div>
					</div>
					
					<div class="col-md-4">
						<div class="form-group">
							<label for="deadline">Change Deadline:</label>
							<input type="date" class="form-control" name="deadline" id="deadline" value="<?php echo $assignment['deadline']?>" oninput="checkDeadline(this)" required>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="time">Change Time:</label>
							<input type="time" class="form-control" name="time" id="time" value="<?php echo $assignment['time']?>" required>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="description">Change Description:</label>
					<textarea class="form-control" name="description" id="description" placeholder="Enter New Description Here..." required><?php echo $assignment['description']?></textarea>
				</div>
				<div class="row">
					<div class="col-md-4">
						<label>Change Documents:</label>
						<div class="custom-file">
							<input type="file" class="custom-file-input" name="userfile" id="documents" size="8000" oninput="checkDocument(this)">
							<label class="custom-file-label" for="customFile">Choose files</label>
						</div>
						<small style="color: #357B8E">Only use PDF, DOC or Text files as references.</small>
					</div>
					<div class="col-md-4">
						<label for="languages[]">Change Languages:</label>
						<select id="language" class="form-control" name="language">
							<option selected value="<?php echo $assignment['language']?>"><?php echo $assignment['language']?></option>
							<option value="Java">Java</option>
							<option value="Python">Python</option>
							<option value="Javascript">Javascript</option>
							<option value="Cpp">C++</option>
						</select>
					</div>
				</div>
				<div class="form-group mt-4">
					<button class="btn btn-primary" type="submit" name="edit">Edit Assignment</button>
				</div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-1"></div>
</div>
<script>
	function checkDeadline(input) {
		let deadline = input.value;
		let today = new Date();
		let date = today.getFullYear()+'-'+(today.getMonth()+1 < 10 ? '0'+(today.getMonth()+1) : today.getMonth()+1)+'-'+(today.getDate() < 10 ? '0'+today.getDate() : today.getDate());

		if (deadline < date) {
			input.setCustomValidity('Please give a future date as the deadline.');
		} else {
			input.setCustomValidity('');
		}
	}

	function checkDocument(input) {
		let filepath = input.value.split(".");
		let fileType = filepath[filepath.length-1];
		let types = ['txt', 'doc', 'docx', 'pdf'];

		if (!types.includes(fileType)) {
			input.setCustomValidity('Please use a document as reference file.');
		} else {
			input.setCustomValidity('');
		}
	}
</script>
