<div class="container-fluid row">
	<div class="col-md-1"></div>
	<div class="col-md-10 body-card">
		<div class="card">
			<div class="card-header">
				<div class="row">
					<div class="col-md-10">
						<h2><?php echo $assignment_data['course_id'] ?></h2>
						<h3>Assignment <?php echo $num." - ".$assignment_data['assignment_name'] ?></h3>
					</div>
					<div class="col-md-2" id="banner">
						<?php if($deadline){ 
							if ($submitted) {?>
								<a href="<?php echo base_url(); ?>student/viewGrade/<?php echo $assignment_id; ?>/<?php echo $num; ?>" class="btn btn-primary btn-grade align-middle" type="submit" id="view-grade">View Grade</a>
						<?php } else { ?>
							<label class="overdue-banner">Overdue !!!</label>
						<?php } } ?>
					</div>
				</div>
			</div>
			<div class="card-body">
				<h5 class="card-title">Description :</h5>
				<p class="card-text"><?php echo $assignment_data['description'] ?></p>
				<h5 class="card-title">Resources :</h5>
				<p class="card-text"><a href="<?= base_url('assets/uploads/reference docs/'); ?>">Reference Document</a></p>				
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
											echo "Not submitted anything";
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
										if($deadline){
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
							<label class="col-md-9" for="file-input"><?php echo $assignment_data['deadline'] ?></label>
						</div>
						<div class="row">
							<label class="col-md-3" for="file-input">Last Modified :</label>
							<label class="col-md-9" for="file-input" id="modified">---</label>
						</div>
						<?php 
							if (!$submitted and !$deadline) {
								echo "<hr>";
								
								if($error != NULL){
									echo "<p class='submission-error'>".$error."<br></p>";
								}
								echo form_open_multipart('students/makeSubmission/'.$assignment_id.'/'.$num); ?>
									<div id="submit">								
										<div class="row">
											<div class="col-md-4">
												<label for="file-input">Select file to upload :</label>
												<div class="custom-file">
													<input type="file" class="custom-file-input" name="userfile">
													<label class="custom-file-label" for="customFile">Choose file</label>
												</div>
											</div>
										</div>
										<div class="form-group"></div>
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