<?php echo validation_errors(); ?>

<?php 
	if ($this->session->flashdata('login_failed')){
		echo '<p>'.$this->session->flashdata('login_failed').'</p>';
		echo '<p>'.$this->session->flashdata('login_failed_enc_password').'</p>';
	}
?>
<?php echo form_open('login/loginUser'); ?>
	
	<div class='form-group'>
		<input type='text' name='username' class='form-control' placeholder='Enter Username' required autofocus>
	</div>
	<br>
	<div class='form-group'>
		<input type='password' name='password' class='form-control' placeholder='Enter Password' required autofocus>
	</div>
	<br>
	<button type='submit' class='btn btn-primary'>Login</button>

<?php echo form_close(); ?>