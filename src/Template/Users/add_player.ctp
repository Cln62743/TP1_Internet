<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<div class="users form content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add a user') ?></legend>
        <?php
            echo $this->Form->control(('first_name'));
            echo $this->Form->control(('second_name'));
            echo $this->Form->control(('last_name'));
            echo $this->Form->control(('email'));
            echo $this->Form->control(('password'));
            echo $this->Form->control(('club_id'), ['options' => $clubs]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit the user')) ?>
    <?= $this->Form->end() ?>
</div>
