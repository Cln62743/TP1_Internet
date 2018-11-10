<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<div class="users view content">
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('First name') ?></th>
            <td><?= h($user->first_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Second name') ?></th>
            <td><?= h($user->second_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last name') ?></th>
            <td><?= h($user->last_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Role') ?></th>
            <td><?= h($user->role) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr>
        <p>
            <?= $this->Html->link(__('Edit the user'), ['action' => 'edit', $user->id], array('class' => 'button')) ?><br>
            <?= $this->Form->postLink(__('Delete the user'), ['action' => 'delete', $user->id], array('class' => 'button'), ['confirm' => __('Are you sure you want to delete the user # {0}?', $user->id)]) ?>
        </p>
    </table>
</div>
