<div class="container-fluid row">
	<div class="col-md-1"></div>
	<div class="col-md-10  body-card">
		<div class="card">
			<div class="card-header">
				<h2><?php echo $courseDetails->course_id; ?></h2>
				<h3><?php echo $courseDetails->course_name; ?></h3>
			</div>
			<div class="card-body">
                <?php 
                $x = 1;
                foreach($assignments as $assignment): ?>
					<a href="<?php echo base_url()?>teachers/viewSubmissions/<?=$assignment['assignment_id'];?>/<?=$x;?>" class="assignment-link">
						<div class="card mb-2">
							<div class="card-header">Assignment <?php echo $x.' - '.$assignment['assignment_name']; ?></div>
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


