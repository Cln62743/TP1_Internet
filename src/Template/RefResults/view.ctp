<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RefResult $refResult
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ref Result'), ['action' => 'edit', $refResult->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ref Result'), ['action' => 'delete', $refResult->id], ['confirm' => __('Are you sure you want to delete # {0}?', $refResult->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ref Results'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ref Result'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="refResults view large-9 medium-8 columns content">
    <h3><?= h($refResult->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Result Description') ?></th>
            <td><?= h($refResult->result_description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($refResult->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($refResult->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($refResult->modified) ?></td>
        </tr>
    </table>
</div>
