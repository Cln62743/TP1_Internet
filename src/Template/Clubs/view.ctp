<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Club $club
 */
?>

<div class="clubs view large-9 medium-8 columns content">
    <h3><?= h($club->clubName) ?></h3>
    <table class="vertical-table">
        <tr>
       
            <th scope="row"><?= __('Icon of the club') ?></th>
            <td>
                <?php
                if(!empty($club->icon)){
                    echo $this->Html->image($club->icon, [
                        "width" => "220px",
                        "height" => "150px",
                    ]);
                }else{
                    echo __('The club as no icon');
                }
                ?>
            </td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name of the club') ?></th>
            <td><?= h($club->clubName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Number of members') ?></th>
            <td><?= h(count($users)) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($club->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($club->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Members list') ?></h4>
        <?php if($users): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('First name') ?></th>
                <th scope="col"><?= __('Last name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= h($user->first_name) ?></td>
                <td><?= h($user->last_name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View user details'), ['controller' => 'users', 'action' => 'view', $user->id]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
