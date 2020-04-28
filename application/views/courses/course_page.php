<div class="container">
<h2><?= $course?></h2>

<div id="mySidenav" class="sidenav">
  <a href="<?php echo base_url();?>assignments/create/<?=$course?>" id="create">New Assignment</a>
  <a href="<?php echo base_url();?>assignments/view/<?=$course?>" id="view">View Assignments</a>
  <a href="<?php echo base_url();?>students/<?=$course?>" id="students_view">Student List</a>
</div>

<div style="margin-left:80px;">
  <h2>Course Page</h2>
  <p>this is course <?= $course?></p>
</div>

