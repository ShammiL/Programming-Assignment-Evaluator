
  <h3><?= $title?></h3>

<?php foreach($students as $student): ?>
  <h6> <?php echo $student['fname']; ?> <?php echo $student['lname']; ?> : <?php echo $student['indexNumber']; ?> </h6>

<?php endforeach; ?>

  
