<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PlayerTournamentParticipation $playerTournamentParticipation
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Player Tournament Participation'), ['action' => 'edit', $playerTournamentParticipation->player_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Player Tournament Participation'), ['action' => 'delete', $playerTournamentParticipation->player_id], ['confirm' => __('Are you sure you want to delete # {0}?', $playerTournamentParticipation->player_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Player Tournament Participations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Player Tournament Participation'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tournaments'), ['controller' => 'Tournaments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tournament'), ['controller' => 'Tournaments', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="playerTournamentParticipations view large-9 medium-8 columns content">
    <h3><?= h($playerTournamentParticipation->player_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $playerTournamentParticipation->has('user') ? $this->Html->link($playerTournamentParticipation->user->id, ['controller' => 'Users', 'action' => 'view', $playerTournamentParticipation->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tournament') ?></th>
            <td><?= $playerTournamentParticipation->has('tournament') ? $this->Html->link($playerTournamentParticipation->tournament->name, ['controller' => 'Tournaments', 'action' => 'view', $playerTournamentParticipation->tournament->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Final Result') ?></th>
            <td><?= h($playerTournamentParticipation->final_result) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($playerTournamentParticipation->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($playerTournamentParticipation->modified) ?></td>
        </tr>
    </table>
</div>
