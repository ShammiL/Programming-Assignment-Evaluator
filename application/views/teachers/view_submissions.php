<div class="container-fluid row">
	<div class="col-md-1"></div>
	<div class="col-md-10 body-card">
		<div class="card">
			<div class="card-header">
				<div class="row">
					<div class="col-md-9">
						<h3><?php echo $assignment['course_id']; ?></h3>
						<h4>Assignment <?php echo $num.' - '.$assignment['assignment_name']; ?></h4>
					</div>
					<div class="col-md-3">
						<a href="<?php echo base_url();?>teacher/viewIssues/<?php echo $assignment['assignment_id']; ?>" class="btn btn-primary btn-edit" type="submit" id="view-grade">View Issues</a>
						<a href="<?php echo base_url();?>teacher/editAssignment/<?php echo $assignment['course_id']; ?>/<?php echo $assignment['assignment_id']; ?>/<?php echo $num; ?>" class="btn btn-primary btn-edit mt-1" type="submit" id="view-grade">Edit Assignment</a>
					</div>
				</div>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-9">
								<label for="">Number of Enrolled Students :</label>
							</div>
							<div class="col-md-3">
								<label for=""><?php echo $students['student_count']; ?></label>
							</div>
						</div>
						<div class="row">
							<div class="col-md-9">
								<label for="">Number of Submitted Assignments :</label>
							</div>
							<div class="col-md-3">
								<label for=""><?php echo sizeof($submissions); ?></label>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<?php echo form_open('teachers/searchSubmission/'.$assignment["assignment_id"].'/'.$num) ?>
						    <div class="row">
                                <div class="col-md-1"></div>
                                <div class="form-group col-md-8">
                                    <input type="text" class="form-control" name="search-student" placeholder="Enter Student ID...">
                                </div>
                                <div class="form-group col-md-3">
                                    <button type="submit" name="submit-search-student" class="btn btn-primary btn-edit">Search</button>
                                </div>
                            </div>
						</form>
					</div>
				</div>
				<h5 class="card-title mt-3">Description :</h5>
				<p> <?php echo nl2br($assignment['description']); ?> </p>
				<h5 class="card-title">Resources :</h5>
				<p class="card-text"><a href="<?php echo base_url() . "teachers/download_file/" . $assignment['assignment_id'] . "/" . $assignment['reference_file']; ?>"><?php echo $assignment['reference_file']; ?></a></p>		
				<h5 class="card-title mt-3">Deadline :</h5>
				<p> <?php echo $assignment['deadline']?>, <?php echo date("g:i a", strtotime($assignment['time'])) ?> </p>
                <?php if($submissions) { ?>
				<div class="card mt-4">
					<table class="table table-hover">
						<thead class="card-header">
						<tr>
							<th scope="col">Student ID</th>
							<th scope="col">Submitted at</th>
							<th scope="col">Marks</th>
							<th scope="col">Plagiarised</th>
							<th scope="col">Action</th>
						</tr>
						</thead>
						<tbody>
                        <?php foreach($submissions as $submission) { ?>
                            <tr>
                                <td><?php echo $submission['student_id']; ?></td>
                                <td><?php echo explode(' ', $submission['submitted_at'])[0] . ', ' . strval(date("g:i a", strtotime(explode(' ', $submission['submitted_at'])[1]))); ?></td>
                                <td><?php echo $submission['grade']; ?><a class="ml-3" href="">Edit</a></td>
                                <td>Yes</td>
                                <td><a href="<?php echo base_url() . "teachers/download_submission/" . $submission['assignment_id'] . "/" . $submission['file_path']; ?>">Download</a><a class="ml-3" href="">Feedback</a></td>
                            </tr>
                        <?php  } ?>
						</tbody>
					</table>
				</div>
                <?php } else {
                    echo "<p class='text-center'>There are no submissions.</p>";
                } ?>
			</div>
		</div>
	</div>
	<div class="col-md-1"></div>
</div>


