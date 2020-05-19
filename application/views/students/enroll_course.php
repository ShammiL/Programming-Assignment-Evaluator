<?php

	echo $id."<br>";

	echo "<p>Sorry you have not enrolled for this course yet. Enroll to access the course.</p>";


	echo "<a href=".base_url()."student/enrollCourse/".$id."><button type='button'>Enroll</button></a>";

