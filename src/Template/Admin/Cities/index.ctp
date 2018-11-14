<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Player[]|\Cake\Collection\CollectionInterface $cities
 */
?>
<?php
$this->extend('/Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('New City'), ['action' => 'add']) ?></li>
<?php
$this->end();

<div class="cities index content">
    <h3><?= __('Cities') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>     
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cities as $city): ?>
            <tr>
                <td><?= $this->Number->format($city->id) ?></td>
                td><?= h($city->name) ?></td>
                <td><?= h($city->created) ?></td>
                <td><?= h($city->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link('', ['action' => 'view', $city->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                    <?= $this->Html->link('', ['action' => 'edit', $city->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                    <?= $this->Form->postLink('', ['action' => 'delete', $city->id], ['confirm' => __('Are you sure you want to delete # {0}?', $city->id)], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-thrash']) ?>
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
