<?php
	echo $courseDetails->course_id." - ".$courseDetails->name."<br>".$courseDetails->description."<br>";

	$x = 1;

	foreach($assignments as $assignment):
		$assignment_id = $assignment['assignment_id'];
		$name = $assignment['assignment_name'];

		echo "<a href=".site_url('student/assignmentDetails/'.$assignment_id."/".$x).">Assignment {$x} - {$name}</a><br>";

		$x += 1;
		
	endforeach;