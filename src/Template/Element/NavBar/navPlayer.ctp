<?php 
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Pages') ?></li>   
        <li><?= $this->Html->link(__('View my player account'),['controller' => 'users', 'action' => 'redirectAccordingToRole']) ?></li>      
        <li><?= $this->Html->link(__('List Tournaments'),['controller' => 'tournaments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Clubs'),['controller' => 'clubs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Files'),['controller' => 'files', 'action' => 'index']) ?></li>
    </ul>
</nav>



