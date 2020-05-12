<div class="container-fluid row">
	<div class="col-md-2"></div>
	<div class="col-md-10  body-card">
		<div class="card">
			<div class="card-header">
				<h2>Course ID</h2>
				<h3>Course Title</h3>
			</div>
			<div class="card-body">
				<?php foreach($assignments as $assignment): ?>
					<a href="<?php echo base_url()?>submissions/view/<?=$assignment['assignment_id'];?>" class="assignment-link">
						<div class="card mb-2">
							<div class="card-header"><?php echo $assignment['assignment_name']; ?></div>
						</div>
					</a>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>


