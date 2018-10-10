<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Match $match
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Match'), ['action' => 'edit', $match->tournament_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Match'), ['action' => 'delete', $match->tournament_id], ['confirm' => __('Are you sure you want to delete # {0}?', $match->tournament_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Matches'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Match'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tournaments'), ['controller' => 'Tournaments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tournament'), ['controller' => 'Tournaments', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ref Results'), ['controller' => 'RefResults', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ref Result'), ['controller' => 'RefResults', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="matches view large-9 medium-8 columns content">
    <h3><?= h($match->tournament_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Tournament') ?></th>
            <td><?= $match->has('tournament') ? $this->Html->link($match->tournament->name, ['controller' => 'Tournaments', 'action' => 'view', $match->tournament->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ref Result') ?></th>
            <td><?= $match->has('ref_result') ? $this->Html->link($match->ref_result->id, ['controller' => 'RefResults', 'action' => 'view', $match->ref_result->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Player Id 1') ?></th>
            <td><?= $this->Number->format($match->player_id_1) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Player Id 2') ?></th>
            <td><?= $this->Number->format($match->player_id_2) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Start Time') ?></th>
            <td><?= h($match->start_time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('End Time') ?></th>
            <td><?= h($match->end_time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($match->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($match->modified) ?></td>
        </tr>
    </table>
</div>
