<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<h1><?= __('Login') ?></h1>

<? $this->Form->create() ?>
	<?= $this->Form->control(__('email')) ?>
	<?= $this->Form->control(__('password')) ?>
	<p>
	    <?= $this->Form->button(__('Login')) ?>        
	    <?= $this->Html->link(__('Create a account'), ['controller' => 'users', 'action' => 'addPlayer',], array('class' => 'button')) ?>
	</p>
<?= $this->Form->end() ?>

