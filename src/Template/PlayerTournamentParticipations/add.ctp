<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PlayerTournamentParticipation $playerTournamentParticipation
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Player Tournament Participations'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tournaments'), ['controller' => 'Tournaments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tournament'), ['controller' => 'Tournaments', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="playerTournamentParticipations form large-9 medium-8 columns content">
    <?= $this->Form->create($playerTournamentParticipation) ?>
    <fieldset>
        <legend><?= __('Add Player Tournament Participation') ?></legend>
        <?php
            echo $this->Form->control('final_result');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
