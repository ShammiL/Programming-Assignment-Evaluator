<?php
	foreach($courses as $course):
		$course_id = $course['course_id'];
		$course_name = $course['name'];?>

		<a href="<?php echo site_url('student/courseDetails/'.$course_id);?>">
		<?php
			echo $course_id." - ".$course_name;
		?>
		</a><br>
<?php
	endforeach;