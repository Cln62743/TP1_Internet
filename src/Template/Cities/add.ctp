<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\City $city
 */
?>
<div class="cities form large-9 medium-8 columns content">
    <?= $this->Form->create($city) ?>
    <fieldset>
        <legend><?= __('Add City') ?></legend>
        <?php
            echo $this->Form->control('name');
        ?>
        <div class="schools view large-12 medium-8 content">
            <h3><?= __('Associated schools') ?></h3>
            <?= $this->Html->link(__('Add a school'), ['controller' => 'Schools', 'action' => 'add',], array('class' => 'button')) ?>
            <table cellpadding="0" cellspacing="0">
                <head>
                    <tr>
                        <th scope="col"><?= $this->Paginator->sort(__('Name')) ?></th>
                    </tr>
                </head>
                <tbody>
                    <?php foreach ($schools as $school): ?>
                        <tr>
                            <td><?= h($school->_name) ?></td>
                            <td><?= $this->Html->link(__('View user details'), ['controller' => 'users', 'action' => 'view', $player->user->id]) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
