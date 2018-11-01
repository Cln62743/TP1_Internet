<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Club $club
 */
?>

<div class="clubs form large-9 medium-8 columns content">
    <?php echo $this->Form->create($club, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Add a club') ?></legend>
        <?php
            echo $this->Form->input('icon', ['type' => 'file']);
            echo $this->Form->input('icon_dir');
            echo $this->Form->input('clubName');
            //echo $this->Form->control('files._ids', ['options' => $files]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit the club')) ?>
    <?= $this->Form->end() ?>
</div>
