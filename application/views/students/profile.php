<div class="container-fluid row">
	<div class="col-md-1"></div>
	<div class="col-md-10 body-card">
        <div class="card">
            <div class="card-header">                
                <h2>Profile Details</h2>
                <h3><?php echo $student['indexNumber']; ?></h3>
            </div>
            <div class="card-body">
            <?php if ($message != "") {
                if ($message == "Password changed successfully.") { 
                    echo "<p id='change-password-success' class='change-password-success'>".$message."</p>";
                } else {
                    echo "<p id='change-password-wrong' class='change-password-wrong'>".$message."</p>";
                }
            } ?>
                <div class="row">
                    <label class="col-sm-2 col-form-label">Name: </label>
                    <p class="col-sm-10 col-form-label"><?php echo $student['fname']." ".$student['lname']; ?></p>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">Email Address: </label>
                    <p class="col-sm-10 col-form-label"><?php echo $student['email']; ?></p>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">Home Address: </label>
                    <p class="col-sm-10 col-form-label"><?php echo $student['address']; ?></p>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">Birthday: </label>
                    <p class="col-sm-10 col-form-label"><?php echo $student['birthday']; ?></p>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">Gender: </label>
                    <p class="col-sm-10 col-form-label"><?php echo $student['gender']; ?></p>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">Nationality: </label>
                    <p class="col-sm-10 col-form-label"><?php echo $student['nationality']; ?></p>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">Telephone: </label>
                    <p class="col-sm-10 col-form-label"><?php echo $student['phone']; ?></p>
                </div>  
                <div id="change-password">   
                    <?php echo validation_errors(); 
                    echo form_open_multipart('students/profile/'); ?>
                        <hr>
                        <h4>Change Password</h4>
                        <p id="error-msg-change-password" class="submission-error"></p>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label class="col-form-label">Current Password: </label>
                                <input type="password" name="curr_pass" id="curr_pass" class="form-control" required>
                            </div>
                            <div id="new-passwords" class="row col-md-8">
                                <div class="form-group col-md-6 d-none">
                                    <label class="col-form-label">New Password: </label>
                                    <input type="password" name="new_pass" id="new_pass" class="form-control" required>
                                </div>
                                <div class="form-group col-md-6 d-none">
                                    <label class="col-form-label">Re Enter Password: </label>
                                    <input type="password" name="renew_pass" id="renew_pass" class="form-control" required>
                                    <label class="col-form-label" id="mismatch-passwords"></label>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary">Change Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-1"></div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/core.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/md5.js"></script>             
<script>
    const curr = "<?php echo $password->password; ?>";            
    $('#curr_pass').on('change', function() {      
        if (CryptoJS.MD5($('#curr_pass').val()) == curr) {
            $('#new-passwords > div').removeClass('d-none'); 
            $('#error-msg-change-password').text('');        
        } else {
            if (!$('#new-passwords > div').hasClass('d-none')) {
                $('#new-passwords > div').addClass('d-none');
            }
            $('#error-msg-change-password').text('Entered password is wrong.');            
        }
    });
    $('#renew_pass').on('keyup', function () {
        if ($('#new_pass').val() != "" && $('#new_pass').val() == $('#renew_pass').val()) {
            $('#mismatch-passwords').text("Passwords are matched.").css('color', 'green');
        } else 
            $('#mismatch-passwords').text("Passwords are not matched.").css('color', 'red');
    });
    setTimeout(function() {
        $('#change-password-wrong').remove();
    }, 5000);
</script>