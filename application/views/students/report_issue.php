<div class="container-fluid row">
	<div class="col-md-1"></div>
	<div class="col-md-10 body-card" data-aos="fade-right">
		<div class="card">
			<div class="card-header">
				<h3><?php echo $title; ?></h3>
			</div>
			<div class="card-body">
                <?php echo validation_errors(); 
				echo form_open_multipart('student/reportIssue/' . $assignment_id); ?>
					<div class="form-group">
						<label for="description">Enter Issue:</label>
						<textarea class="form-control" name="content" id="content" placeholder="Enter issue Here..." required></textarea>
					</div>
					<div class="form-group mt-4">
						<button class="btn btn-primary" type="submit" name="create">Report</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-1"></div>
</div>
