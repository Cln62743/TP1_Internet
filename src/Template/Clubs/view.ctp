<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Club $club
 */
?>

<div class="clubs view large-9 medium-8 columns content">
    <h3><?= h($club->name) ?></h3>
    <table class="vertical-table">
        <td><?php
            echo $this->Html->image($file->path . $file->name, [
                "alt" => $file->name,
                "width" => "220px",
                "height" => "150px",
                'url' => ['action' => 'view', $file->id]
            ]);  
        ?></td>
        <tr>
            <th scope="row"><?= __('Path') ?></th>
            <td><?= h($file->path) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name of the club') ?></th>
            <td><?= h($club->name) ?></td>
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
    <div class="related">
        <h4><?= __('Related Files') ?></h4>
        <?php if (!empty($club->files)): ?>
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <th scope="col"><?= __('Image') ?></th>
                </tr>
                <?php foreach ($club->files as $file): ?>
                    <tr>
                        <td>
                            <?php echo $this->Html->image($file->path . $file->name, ["alt" => $file->name]); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>    
</div>
