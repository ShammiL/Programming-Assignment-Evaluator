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
							<input class="form-control" type="text" name="name" id="title" placeholder="Add Title Here..." required>
						</div>
					</div>
					
					<div class="col-md-4">
						<div class="form-group">
							<label for="deadline">Deadline:</label>
							<input type="date" class="form-control" name="deadline" id="deadline" value="dd-mm-yyyy" required>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="time">Time:</label>
							<input type="time" class="form-control" name="time" id="time" value="hh:mm" required>
						</div>
					</div>
					<div class="col-md-4">
						<label>Documents:</label>
						<div class="custom-file">
							<input type="file" class="custom-file-input" name="userfile" id="documents" size="100">
							<label class="custom-file-label" for="customFile">Choose files</label>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="description">Description:</label>
					<textarea class="form-control" name="description" id="description" placeholder="Add Description Here..." required></textarea>
				</div>
				<div class="row">
					<div class="col-md-4">
						<label for="language">Select Language:</label>
						<select id="language" class="form-control" name="language" required>
							<option selected value="none" disabled>------ Select Language ------</option>
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
							<select class="form-control" name="test-cases" id="test-cases">
								<option selected disabled>Select...</option>
								<?php for ($i=1; $i < 11; $i++) {
									echo '
                                         <option value="'.$i.'">'.$i.'</option>';
								} ?>
							</select>
						</div>
					</div>
				</div>
				<label for='language'>Test cases:</label>
				<div class="form-row" id="test-case-container">

				</div>
				<div class="form-group mt-4">
					<button class="btn btn-primary" type="submit" name="create">Create Assignment</button>
				</div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-1"></div>
</div>