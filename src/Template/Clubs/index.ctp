<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Club[]|\Cake\Collection\CollectionInterface $clubs
 */
?>

<!-- For each show all the clubs -->
<div class="clubs index large-9 medium-8 columns content">
    <h3><?= __('Clubs') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= __('Preview') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Name of the club') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clubs as $club): ?>
            <tr>
                <td><?php
                if(!empty($club->icon)){
                    echo $this->Html->image($club->icon, [
                        "width" => "66px",
                        "height" => "45px",
                        'url' => ['action' => 'view', $club->id]
                    ]);
                }
                ?></td>
                <td><?= h($club->clubName) ?></td>
                <td><?= h($club->created) ?></td>
                <td><?= h($club->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View details of the club'), ['action' => 'view', $club->id]) ?>
                    <?= $this->Html->link(__('Edit the club'), ['action' => 'edit', $club->id]) ?>
                    <?= $this->Form->postLink(__('Delete the club'), ['action' => 'delete', $club->id], ['confirm' => __('Are you sure you want to delete the club # {0}?', $club->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Change page -->
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
