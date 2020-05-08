<?php echo validation_errors(); ?>

<div class="container-fluid row">
	<div class="col-md-2"></div>
	<div class="col-md-10 body-card">
		<div class="card">
			<div class="card-header">
				<h3>Edit Assignment</h3>
			</div>
			<div class="card-body">
				<?php echo form_open('teachers/editAssignment'); ?>
				<input type="hidden" name="id" value="<?php echo $assignment['assignment_id']; ?>"/>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="title">Edit Title:</label>
							<input class="form-control" type="text" name="name" id="title" placeholder="Edit Title Here..." value="<?php echo $assignment['assignment_name']?>">
						</div>
					</div>
					<div class="col-md-4">
						<label>Change Documents:</label>
						<div class="custom-file">
							<input type="file" class="custom-file-input" name="documents[]" id="documents" multiple="multiple">
							<label class="custom-file-label" for="customFile">Choose files</label>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="deadline">Change Deadline:</label>
							<input type="date" class="form-control" name="deadline" id="deadline" value="<?php echo $assignment['deadline']?>" min="19-04-2020">
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="description">Change Description:</label>
					<textarea class="form-control" name="description" id="description" placeholder="Enter New Description Here..."><?php echo $assignment['description']?></textarea>
				</div>
				<div class="row">
					<div class="col-md-3">
						<label for="languages[]">Change Languages:</label>
						<select id="language" class="form-control" name="language">
							<option selected value="<?php echo $assignment['language']?>" disabled><?php echo $assignment['language']?></option>
							<option value="Java">Java</option>
							<option value="Python">Python 2.7</option>
							<option value="Python3">Python 3.7</option>
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
</div>
