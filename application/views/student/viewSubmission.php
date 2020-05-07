<?php
	//echo $graded."<br>";
	//echo $grade."<br>";
	//echo $deadline."<br>";
	//echo $submitted."<br>";
	
	if($deadline){
		if($submitted){
			echo $grade;
		} else {
			echo "The deadline for the assignment is over and you have not submitted anything.";
		}
	} else {
		if($submitted){
			echo "You have made a submission already. Your grade will be displayed after the deadline.";
		} else {

			if($error != NULL){
				echo $error."<br>";
			}
			echo form_open_multipart('student/makeSubmission/'.$assignment_id.'/'.$num);?>

			<input type="file" name="userfile" />
			<br><br>
			<input type="submit" value="upload" />

<?php
			echo form_close();
		}
	}