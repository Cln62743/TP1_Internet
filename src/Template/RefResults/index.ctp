<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RefResult[]|\Cake\Collection\CollectionInterface $refResults
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Ref Result'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="refResults index large-9 medium-8 columns content">
    <h3><?= __('Ref Results') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('result_description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($refResults as $refResult): ?>
            <tr>
                <td><?= $this->Number->format($refResult->id) ?></td>
                <td><?= h($refResult->result_description) ?></td>
                <td><?= h($refResult->created) ?></td>
                <td><?= h($refResult->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $refResult->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $refResult->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $refResult->id], ['confirm' => __('Are you sure you want to delete # {0}?', $refResult->id)]) ?>
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
