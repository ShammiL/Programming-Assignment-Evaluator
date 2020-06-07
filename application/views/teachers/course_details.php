<div class="container-fluid row">
	<div class="col-md-1"></div>
	<div class="col-md-10 body-card">
		<div class="card">
			<div class="card-header">
				<h2><?= $course?></h2>
				<h3><?php echo $courseDetails['course_name']; ?></h3>
			</div>
			<div class="card-body">
				<h5 class="card-title">Teacher: </h5>
				<p><?php echo $teacher['fname'].' '.$teacher['lname']; ?></p>
				<h5 class="card-title">Description: </h5>
				<p class="card-text"><?php echo nl2br($courseDetails['description']); ?></p>
				<a href="<?php echo base_url();?>teacher/createAssignment/<?=$course?>" class="assignment-link">
					<div class="card mb-2">
						<div class="card-header"><i class="fas fa-plus mr-4"></i>Create New Assignment</div>
					</div>
				</a>
				<a href="<?php echo base_url();?>teacher/viewAssignments/<?=$course?>" class="assignment-link">
					<div class="card mb-2">
						<div class="card-header"><i class="fas fa-file-code mr-4"></i>View Assignments</div>
					</div>
				</a>
				<a href="<?php echo base_url();?>teacher/viewStudents/<?=$course?>" class="assignment-link">
					<div class="card mb-2">
						<div class="card-header"><i class="fas fa-users mr-3"></i>View Students</div>
					</div>
				</a>
			</div>
		</div>
	</div>
	<div class="col-md-1"></div>
</div>
