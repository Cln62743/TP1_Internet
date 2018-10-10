<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Match[]|\Cake\Collection\CollectionInterface $matches
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Match'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tournaments'), ['controller' => 'Tournaments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tournament'), ['controller' => 'Tournaments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ref Results'), ['controller' => 'RefResults', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ref Result'), ['controller' => 'RefResults', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="matches index large-9 medium-8 columns content">
    <h3><?= __('Matches') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('tournament_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('player_id_1') ?></th>
                <th scope="col"><?= $this->Paginator->sort('player_id_2') ?></th>
                <th scope="col"><?= $this->Paginator->sort('start_time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('end_time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('result_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($matches as $match): ?>
            <tr>
                <td><?= $match->has('tournament') ? $this->Html->link($match->tournament->name, ['controller' => 'Tournaments', 'action' => 'view', $match->tournament->id]) : '' ?></td>
                <td><?= $this->Number->format($match->player_id_1) ?></td>
                <td><?= $this->Number->format($match->player_id_2) ?></td>
                <td><?= h($match->start_time) ?></td>
                <td><?= h($match->end_time) ?></td>
                <td><?= $match->has('ref_result') ? $this->Html->link($match->ref_result->id, ['controller' => 'RefResults', 'action' => 'view', $match->ref_result->id]) : '' ?></td>
                <td><?= h($match->created) ?></td>
                <td><?= h($match->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $match->tournament_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $match->tournament_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $match->tournament_id], ['confirm' => __('Are you sure you want to delete # {0}?', $match->tournament_id)]) ?>
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
