<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tournament $tournament
 */
?>

<div class="tournaments form large-9 medium-8 columns content">
    <?= $this->Form->create($tournament) ?>
    
    <fieldset>
        <legend><?= __('Edit the tournament') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('start_date');
            echo $this->Form->control('end_date');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit the tournament')) ?>
    <?= $this->Form->end() ?>
</div>