
  

<div class="container-fluid row">
	<div class="col-md-1"></div>
	<div class="col-md-10  body-card">
		<div class="card">
			<div class="card-header">
				<h3><?php echo $title; ?></h3>
			</div>
			<div class="card-body">
                <?php 
                foreach($issues as $issue): ?>
						<div class="card mb-2">

							<div class="card-body"><?php echo $issue['content']; ?></div>
						</div>
					</a>
                <?php 
                endforeach; ?>
			</div>
		</div>
	</div>
	<div class="col-md-1"></div>
</div>




  
