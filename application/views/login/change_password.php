<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
		  integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&family=Merienda:wght@700&family=Roboto+Slab&family=Yanone+Kaffeesatz&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
	<title>Create Password</title>
</head>
<body>
	<div class="navbar-background">
	</div>
	<div class="container-fluid row">
		<div class="col-md-3"></div>
		<div class="col-md-6 body-card">
			<div class="card text-center mt-5">
				<div class="card-header">
					<h3>Create Password</h3>
				</div>
				<div class="card-body">
					<?php echo form_open_multipart('changeInitialPassword'); ?>
						<div class="form-group">
							<label for="new_pass">Enter Password:</label>
							<input class="form-control" type="password" name="new_pass" id="new_pass" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$" placeholder="Enter Password Here..." required>
							<small style="color: #357B8E">Password must have minimum eight characters, and contain at least one uppercase letter, one lowercase letter, one number and one special character.</small>
							<div><label class="col-form-label" id="mismatch-passwords"></label></div>
						</div>
						<div class="form-group">
							<label for="renew_pass">Re-Enter Password:</label>
							<input type="password" class="form-control" name="renew_pass" id="renew_pass" oninput="check(this)" placeholder="Re-Enter Password Here..." required>
							</div>
						<div class="form-group mt-4">
							<button class="btn btn-primary" type="submit" name="create">Create Password</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-md-3"></div>
	</div>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
		integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script>
	function check(input) {
		if (input.value != document.getElementById('new_pass').value) {
			input.setCustomValidity('Passwords are not matched.');
		} else {
			// input is valid -- reset the error message
			input.setCustomValidity('');
		}
	}
	$('#renew_pass').on('keyup', function () {
		if ($('#new_pass').val() != "" && $('#new_pass').val() == $('#renew_pass').val()) {
			$('#mismatch-passwords').text("Passwords are matched.").css('color', 'green');
		} else
			$('#mismatch-passwords').text("Passwords are not matched.").css('color', 'red');
	});
</script>
</html>
