<div class="container-fluid row">
	<div class="col-md-1"></div>
	<div class="col-md-10 body-card" data-aos="fade-right">
		<div class="card">
			<div class="card-header">
				<h3><?php echo $course; ?></h3>
				<h4>Create Assignment</h4>
			</div>
			<div class="card-body">
                <?php echo validation_errors(); 
				echo form_open_multipart('teachers/createAssignment/' . $course); ?>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="title">Title:</label>
							<input class="form-control" type="text" name="name" value="<?php echo $inputs['assignment_name'] ?>" id="title" placeholder="Add Title Here..." required>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="deadline">Deadline:</label>
							<input type="date" class="form-control" name="deadline" value="<?php echo $inputs['deadline'] ?>" id="deadline" oninput="checkDeadline(this)" required>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="time">Time:</label>
							<input type="time" class="form-control" name="time" value="<?php echo $inputs['time'] ?>" id="time" value="hh:mm" required>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="description">Description:</label>
					<textarea class="form-control" name="description" id="description" placeholder="Add Description Here..." required><?php echo $inputs['description'] ?></textarea>
				</div>
				<div class="row">
					<div class="col-md-4">
						<label>Documents:</label>
						<div class="custom-file">
							<input type="file" class="custom-file-input" name="userfile" id="documents" size="8000" oninput="checkDocument(this)">
							<label class="custom-file-label" for="customFile">Choose files</label>
						</div>
						<small style="color: #357B8E">Only use PDF, DOC or Text files as references.</small>
					</div>
					<div class="col-md-4">
						<label for="language">Select Language:</label>
						<select id="language" class="form-control" name="language" required>
							<option selected value="" disabled>------ Select Language ------</option>
							<option value="Java">Java</option>
							<option value="Python">Python 2.7</option>
							<option value="Python3">Python 3.7</option>
							<option value="Javascript">Javascript</option>
							<option value="Cpp">C++</option>
						</select>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="test-cases">Number of Test Cases : </label>
							<select class="form-control" name="test-cases" id="test-cases" onfocus="this.old = this.value;" oninput="addTestCases(this); this.old = this.value">
								<option selected disabled>Select...</option>
								<?php for ($i=1; $i < 6; $i++) {
									echo '
                                         <option value="'.$i.'">'.$i.'</option>';
								} ?>
							</select>
						</div>
					</div>
				</div>
				<label class="mt-3 mb-0" for='language'>Test cases:</label>
				<div><small style="color: #357B8E">Only use Text files as inputs and outputs.</small></div>
				<div class="form-row" id="test-case-container"></div>
				<div class="form-group mt-4">
					<button class="btn btn-primary" type="submit" name="create">Create Assignment</button>
				</div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-1"></div>
</div>
<script>
	function addTestCases(input) {
		let i;
		let cases = parseInt(input.value);
		let prev = input.old === undefined ? 0 : parseInt(input.old);
		let cards = ""

		if (prev > cases) {
			for (i = cases+1; i <= prev; i++) {
				$('#case'+i).remove();
			}
		} else {
			for (let i = prev+1 || 1; i <= cases; i++) {
				if ( i%2 === 1 ) {
					cards += '<div class="row test-case-input-left" id="case'+i+'"><div class="col-md-6"><label>Input '+i+':</label><div class="custom-file mb-4"><input type="file" class="custom-file-input" name="input'+i+'" id="input'+i+'" size="8000" oninput="checkTestCaseFile(this)"><label class="custom-file-label" for="input'+i+'">Choose Input '+i+':</label></div></div><div class="col-md-6"><label>Output '+i+':</label><div class="custom-file mb-4"><input type="file" class="custom-file-input" name="output'+i+'" id="output'+i+'" size="8000" oninput="checkTestCaseFile(this)"><label class="custom-file-label" for="output'+i+'">Choose Output '+i+':</label></div></div></div>';
				} else {
					cards += '<div class="row test-case-input-right" id="case'+i+'"><div class="col-md-6"><label>Input '+i+':</label><div class="custom-file mb-4"><input type="file" class="custom-file-input" name="input'+i+'" id="input'+i+'" size="8000" oninput="checkTestCaseFile(this)"><label class="custom-file-label" for="input'+i+'">Choose Input '+i+':</label></div></div><div class="col-md-6"><label>Output '+i+':</label><div class="custom-file mb-4"><input type="file" class="custom-file-input" name="output'+i+'" id="output'+i+'" size="8000" oninput="checkTestCaseFile(this)"><label class="custom-file-label" for="output'+i+'">Choose Output '+i+':</label></div></div></div>';
				}
			}
		}
		$('#test-case-container').append(cards);
	}

	function checkTestCaseFile(input) {
		console.log(input);
		let filepath = input.value.split(".");
		let fileType = filepath[filepath.length-1];

		if (fileType !== 'txt') {
			input.setCustomValidity('Please use a text file.');
		} else {
			input.setCustomValidity('');
		}
	}

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
