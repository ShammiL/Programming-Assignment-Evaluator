<?php

	echo $id."<br>";

	echo "<p>Sorry you have not enrolled for this course yet. You need to be enrolled to access further details regarding the course.</p>";


	echo "<a href=".base_url()."student/enrollCourse/".$id."><button type='button'>Enroll</button></a>";

