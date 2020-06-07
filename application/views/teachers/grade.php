<div class="container-fluid row">
	<div class="col-md-1"></div>
	<div class="col-md-10 body-card">
		<div class="card">
			<div class="card-header">
				<h3>Grade Assignment</h3>
			</div>
			<div class="card-body">

				<?php echo form_open_multipart('compiler/grade/1'); print_r($passed); ?>
				<div class="row">
					<div class="col-md-4">
						<label for="file-input">Select file to upload :</label>
						<div class="custom-file">
							<input type="file" class="custom-file-input" name="userfile">
							<label class="custom-file-label" for="customFile">Choose file</label>
						</div>
					</div>
				</div>
				<div class="form-group">
					<button class="btn btn-primary" type="submit" name="create">Grade Assignment</button>
				</div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-1"></div>
</div>
