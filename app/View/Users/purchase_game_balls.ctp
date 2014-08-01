<?php echo $this->Session->flash(); ?>
<h1>Purchase gameballs</h1>

<?= $this->Html->link('Buy Balls',array('controller' => 'users', 'action' => 'purchaseGameBalls','?' => array('purchase' => '1'))); ?>
