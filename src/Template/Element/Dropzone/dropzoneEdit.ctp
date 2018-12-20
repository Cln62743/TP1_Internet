<?php

?>

<div class="dz-message" data-dz-message><h5>(<?= __('Drop files here to upload') ?>)</h5></div>
<table cellpadding="0" cellspacing="0">
    <tbody>
        <?php foreach ($files as $file): ?>
        <tr>
    	    <td><?= h($file->name) ?></td>
            <td>
                <?php
                echo $this->Html->image($file->path . $file->name, [
                    "alt" => $file->name,
                    "width" => "220px",
                    "height" => "150px",
                    'url' => ['action' => 'view', $file->id]
                ]);
                ?>
            </td>
            <td><?= h($file->created) ?></td>
            <td><?= h($file->modified) ?></td>
            <td><?= h($file->status) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $file->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $file->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $file->id], ['confirm' => __('Are you sure you want to delete # {0}?', $file->id)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>