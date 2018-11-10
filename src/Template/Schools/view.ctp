<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\School $school
 */
?>
<div class="schools view large-9 medium-8 columns content">
    <h3><?= h($school->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($school->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('City') ?></th>
            <td><?= $school->has('city') ? $this->Html->link($school->city->name, ['controller' => 'Cities', 'action' => 'view', $school->city->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($school->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($school->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($school->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Tournaments') ?></h4>
        <?php if (!empty($school->tournaments)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Start Date') ?></th>
                <th scope="col"><?= __('End Date') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('City Id') ?></th>
                <th scope="col"><?= __('School Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($school->tournaments as $tournaments): ?>
            <tr>
                <td><?= h($tournaments->id) ?></td>
                <td><?= h($tournaments->name) ?></td>
                <td><?= h($tournaments->start_date) ?></td>
                <td><?= h($tournaments->end_date) ?></td>
                <td><?= h($tournaments->created) ?></td>
                <td><?= h($tournaments->modified) ?></td>
                <td><?= h($tournaments->city_id) ?></td>
                <td><?= h($tournaments->school_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Tournaments', 'action' => 'view', $tournaments->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Tournaments', 'action' => 'edit', $tournaments->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Tournaments', 'action' => 'delete', $tournaments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tournaments->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
