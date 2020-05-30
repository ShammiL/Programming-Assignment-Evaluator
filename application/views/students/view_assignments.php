<div class="container-fluid row">
	<div class="col-md-1"></div>
	<div class="col-md-10 body-card">
		<div class="card">
			<div class="card-header">
				<h2><?php echo $courseDetails['course_id']; ?></h2>
				<h3><?php echo $courseDetails['course_name']; ?></h3>
			</div>
			<div class="card-body">
				<h5 class="card-title">Teacher: </h5>
				<p><?php echo $teacher['fname'].' '.$teacher['lname']; ?></p>
				<h5 class="card-title">Description: </h5>
				<p class="card-text"><?php echo nl2br($courseDetails['description']); ?></p>
				<?php
					$x = 1;
					foreach($assignments as $assignment):
						$assignment_id = $assignment['assignment_id'];
						$name = $assignment['assignment_name']; ?>
						<a href="<?php echo site_url(); ?>student/assignmentDetails/<?php echo $assignment_id; ?>/<?php echo $x; ?>" class="assignment-link">
							<div class="card mb-2">
								<div class="card-header">Assignment <?php echo $x.' - '.$name; ?></div>
							</div>
						</a>
						<?php
						$x += 1;						
					endforeach; ?>
			</div>
		</div>
	</div>
	<div class="col-md-1"></div>
</div>
