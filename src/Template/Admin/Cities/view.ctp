</li><?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Player $player
 */
?>
<?php
$this->extend('/Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('New City'), ['action' => 'add', $city->id]) ?>
    <li><?= $this->Html->link(__('Edit City'), ['action' => 'edit', $city->id]) ?>
    <li><?= $this->Form->postLink(__('Delete City'), ['action' => 'delete', $city->id], ['confirm' => __('Are you sure you want to delete # {0}?', $city->id]) ?>
    <li><?= $this->Html->link(__('List Cities'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link('Section publique en JS', [
        'prefix' => false,
        'controller' => 'Cities',
        'action' => 'index'
    ]);?>

</li>
<?php
$this->end();


$this->start('tb_sidebar');
?>
<div class="dropdown hidden-xs">
    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
        <?= __("Actions") ?>
        <span class="caret"></span>
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
        <?= $this->fetch('tb_actions') ?>
    </ul>
</div>
<?php
$this->end();
?>


<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($city->name) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($city->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($city->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($city->modified) ?></td>
        </tr>
    </table>
</div>
