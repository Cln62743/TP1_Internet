<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Player $player
 */
?>

<div class="players view large-9 medium-8 columns content">
    <h3><?= h($user->first_name) ?></h3>
    <table class="vertical-table">
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
            <th scope="row"><?= __('Club') ?></th>
            <?php if($club){ ?>
                <td><?= $this->Html->link(__(h($club->clubName)), ['controller' => 'clubs', 'action' => 'view', $club->id]) ?></td>
            <?php } ?>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr>
    </table>
    <div class="related">
    </div>
</div>
