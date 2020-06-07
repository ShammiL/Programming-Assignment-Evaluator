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
				<p class="card-text"><?php echo $courseDetails['description']; ?></p>
			</div>
			<div class="row mb-4 mt-2">
				<div class="col-md-3"></div>
				<div class="col-md-6">
					<div class="card text-center">
						<div class="card-header p-3">
							<p>Sorry, you have not enrolled for this course yet.<br/>Enroll to access the other course details.</p>
							<a href="<?php echo base_url(); ?>student/enrollCourse/<?php echo $courseDetails['course_id']; ?>" class="btn btn-primary">Enroll</a>						
						</div>
					</div>
				</div>
				<div class="col-md-3"></div>
			</div>
		</div>
	</div>
</div>
