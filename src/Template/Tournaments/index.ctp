<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tournament[]|\Cake\Collection\CollectionInterface $tournaments
 */
?>

<!-- Navbar -- Fail safe need to be globalise and modify on user permission -->


<!-- -->
<div class="tournaments index large-9 medium-8 columns content">
    <h3><?= __('Tournament') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <!-- Show club name-->
                <th scope="col"><?= $this->Paginator->sort(__('Name of the tournament')) ?></th>
                <th scope="col"><?= $this->Paginator->sort(__('Start date')) ?></th>
                <th scope="col"><?= $this->Paginator->sort(__('End date')) ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tournaments as $tournament): ?>
                <tr>
                    <!-- Show club name-->
                    <!--<td><?= $tournament->has('user') ? $this->Html->link($tournament->user->email, ['controller' => 'Users', 'action' => 'view', $tournament->user->id]) : '' ?></td>-->
                    <td><?= h($tournament->name) ?></td>
                    <td><?= h($tournament->start_date) ?></td>
                    <td><?= h($tournament->end_date) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View details of the tournament'), ['action' => 'view', $tournament->id]) ?>
                        <?= $this->Html->link(__('Edit the tournament'), ['action' => 'edit', $tournament->id]) ?>
                        <?= $this->Form->postLink(__('Delete the tournament'), ['action' => 'delete', $tournament->id], ['confirm' => __('Are you sure you want to delete the tournament # {0}?', $tournament->id)]) ?>
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
