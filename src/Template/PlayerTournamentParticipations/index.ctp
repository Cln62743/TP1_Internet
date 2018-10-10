<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PlayerTournamentParticipation[]|\Cake\Collection\CollectionInterface $playerTournamentParticipations
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Player Tournament Participation'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tournaments'), ['controller' => 'Tournaments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tournament'), ['controller' => 'Tournaments', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="playerTournamentParticipations index large-9 medium-8 columns content">
    <h3><?= __('Player Tournament Participations') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('player_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tournament_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('final_result') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($playerTournamentParticipations as $playerTournamentParticipation): ?>
            <tr>
                <td><?= $playerTournamentParticipation->has('user') ? $this->Html->link($playerTournamentParticipation->user->id, ['controller' => 'Users', 'action' => 'view', $playerTournamentParticipation->user->id]) : '' ?></td>
                <td><?= $playerTournamentParticipation->has('tournament') ? $this->Html->link($playerTournamentParticipation->tournament->name, ['controller' => 'Tournaments', 'action' => 'view', $playerTournamentParticipation->tournament->id]) : '' ?></td>
                <td><?= h($playerTournamentParticipation->final_result) ?></td>
                <td><?= h($playerTournamentParticipation->created) ?></td>
                <td><?= h($playerTournamentParticipation->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $playerTournamentParticipation->player_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $playerTournamentParticipation->player_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $playerTournamentParticipation->player_id], ['confirm' => __('Are you sure you want to delete # {0}?', $playerTournamentParticipation->player_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
