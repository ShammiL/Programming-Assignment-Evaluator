<div class="container-fluid row">
	<div class="col-md-1"></div>
	<div class="col-md-10 body-card">
		<div class="card">
			<div class="card-header">
				<h2><?php echo $assignment_data['course_id'] ?></h2>
				<h3>Assignment <?php echo $num." - ".$assignment_data['assignment_name']; if ($deadline && !$submitted) { ?><label class="overdue-banner">!!! Overdue !!!</label><?php } ?></h3>
				<div class="row">
					<?php if($graded && $submitted){ ?>
						<a href="<?php echo base_url(); ?>student/viewGrade/<?php echo $assignment_id; ?>/<?php echo $num; ?>" class="btn btn-primary ml-3" type="submit" id="view-grade">View Grade</a>
					<?php }  ?>
					<a href="<?php echo base_url(); ?>student/reportIssue/<?php echo $assignment_id; ?>" class="btn btn-primary ml-3" type="submit">Report Issue</a>
					<a href="<?php echo base_url(); ?>student/viewIssue/<?php echo $assignment_id; ?>" class="btn btn-primary ml-3" type="submit" >View My Issues</a>
				</div>
			</div>
			<div class="card-body">
				<h5 class="card-title">Description :</h5>
				<p class="card-text"><?php echo nl2br($assignment_data['description']); ?></p>
				<h5 class="card-title">Resources :</h5>
				<p class="card-text"><a href="<?php echo base_url() . "students/download_file/" . $assignment_data['assignment_id'] . "/" . $assignment_data['reference_file']; ?>"><?php echo $assignment_data['reference_file']; ?></a></p>		

				<h5 class="card-title">Language :</h5>
				<p><?php echo $assignment_data['language'] ?></p>
				<h5 class="card-title mt-3">Submit Assignment :</h5>
				<div class="card">
					<div class="card-header">                            
						<div class="row">
							<label class="col-md-3" for="file-input">Submission Status :</label>
							<label class="col-md-9" for="file-input" id="submission-status">
								<?php 
									if($submitted){
										echo "Submitted for grading";
									} else {
										if ($deadline) {
											echo "Not submitted";
										} else {
											echo "---";
										}
									}
								?>
							</label>
						</div>
						<div class="row">
							<label class="col-md-3" for="file-input">Grading Status :</label>
							<label class="col-md-9" for="file-input" id="grading-status">
								<?php 
									if($submitted){
										if($graded){
											echo "Graded";
										} else {
											echo "Not graded";
										}
									} else {
										echo "---";
									}
								?>
							</label>
						</div>
						<div class="row">
							<label class="col-md-3" for="file-input">Due Date :</label>
							<label class="col-md-9" for="file-input"><?php echo $assignment_data['deadline'] ?>, <?php echo date("g:i a", strtotime($assignment_data['time'])) ?></label>
						</div>
						<div class="row">
							<label class="col-md-3" for="file-input">Last Modified :</label>
							<label class="col-md-9" for="file-input" id="modified"><?php echo $last_modified ?></label>
						</div>
						<?php if ($last!== "") { ?>
						<div class="row">
							<label class="col-md-3" for="file-input">Last Submission :</label>
							<label class="col-md-9" for="file-input" id="modified"><a href = "<?php echo base_url() . "students/download_submission/" . $assignment_data['assignment_id'] . "/" . $last; ?>">file</a></label>
						</div>
						<div id="submit-container" class="d-none">
							<hr>
							<?php echo form_open_multipart('students/updateSubmission/'.$assignment_id.'/'.$num); ?>
								<div class="col-md-4 pl-0">
									<label for="file-input">Select file to upload :</label>
									<div class="custom-file mb-3">
										<input type="file" class="custom-file-input" name="userfile"  oninput="checkDocument(this)">
										<label class="custom-file-label" for="customFile">Choose file</label>
									</div>
									<button class="btn btn-primary" type="submit" id="update-assignment">Update Assignment</button>
								</div>
							<?php echo form_close(); ?>
							<button class="btn btn-sm btn-outline-secondary mt-1" type="submit" id="cancel-update" onclick="cancelUpdate()">Cancel</button>
						</div>
						<?php if (!$deadline) {
							if($error != NULL){
								echo "<p class='submission-error'>".$error."<br></p>";
							} ?>
							<button class="btn btn-primary" type="submit" id="edit-submission" onclick="editSubmission()">Edit Submission</button>
						<?php  }
						} ?>

						<?php 
							if (!$submitted and !$deadline) {
								echo "<hr>";
								
								if($error != NULL){
									echo "<p class='submission-error'>".$error."<br></p>";
								}
								echo form_open_multipart('students/makeSubmission/'.$assignment_id.'/'.$num); ?>
									<div id="submit">								
										<div class="form-row mb-3">
											<div class="col-md-4">
												<label for="file-input">Select file to upload :</label>
												<div class="custom-file">
													<input type="file" class="custom-file-input" name="userfile"  oninput="checkDocument(this)">
													<label class="custom-file-label" for="customFile">Choose file</label>
												</div>
											</div>
										</div>
										<div class="form-group">
											<button class="btn btn-primary" type="submit" id="submit-assignment">Submit Assignment</button>
										</div>
									</div>
								<?php echo form_close();
							} ?>
					</div>
				</div>
			</div>
		</div>
	</div>	
	<div class="col-md-1"></div>
</div>
<script>
	function editSubmission() {
		$('#submit-container').removeClass('d-none');
		$('#edit-submission').addClass('d-none');
	}

	function cancelUpdate() {
		$('#submit-container').addClass('d-none');
		$('#edit-submission').removeClass('d-none');
	}

	function checkDocument(input) {
		let filepath = input.value.split(".");
		let fileType = filepath[filepath.length-1];
		let type = <?php echo $assignment_data['language']; ?>;

		if (type !== fileType) {
			input.setCustomValidity('Please .');
		} else {
			input.setCustomValidity('');
		}
	}
</script>

