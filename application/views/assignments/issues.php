
  <h3><?= $title?></h3>

<?php foreach($issues as $issue): ?>
  <h6> <?php echo $issue['indexNumber']; ?>  : <?php echo $issue['content']; ?> </h6>

<?php endforeach; ?>

  
