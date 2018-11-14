<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Player $player
 */
?>
<?php
$this->extend('/Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('List Cities'), ['action' => 'index']) ?></li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?= $this->Html->link(__('List Cities'), ['action' => 'index']) ?></li>
</ul>
<?php
$this->end();
?>

<?= $this->Form->create($city) ?>
<fieldset>
<legend><?= __('Add {0}', ['City']) ?></legend>
    <?php
        echo $this->Form->control('name');
    ?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>

