<?php
$urlRedirectToIndex = $this->Url->build([
    "controller" => "Files",
    "action" => "index"
]);

echo $this->Html->scriptBlock('var urlRedirectToIndex = "' . $urlRedirectToIndex . '";', ['block' => true]);
echo $this->Html->css('../js/dropzone/dropzone.min');
echo $this->Html->script('dropzone/dropzone', ['block' => 'scriptLibraries']);
echo $this->Html->script('dropzone/RedirectToIndex', ['block' => 'scriptBottom']);
?>

<div class="files index large-8 medium-8 columns content">
    <h3><?= __('Files') ?></h3>
    <?php
    echo $this->Form->create('image', [
        'url' => ['controller' => 'Files',
            'action' => 'add'
        ],
        'method' => 'post',
        'id' => 'my-awesome-dropzone',
        'class' => 'dropzone',
        'type' => 'file',
        'autocomplete' => 'off'
    ]);
    ?>
</div>

<div class="image_upload_div">
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>      
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>                
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>                
                <th scope="col" class="actions"><?= __('Actions') ?></th>                
                <th scope="col"><?= __('Preview') ?></th>

                <col width="250">
                <col width="250">
                <col width="250">
                <col width="250">
                <col width="280">
            </tr>
        </thead>
    <tbody>
        <?php foreach ($files as $file): ?>
        <tr>
            <td><?= h($file->name) ?></td>
            <td><?= h($file->created) ?></td>
            <td><?= h($file->modified) ?></td>
            <td class="actions">
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $file->id], ['confirm' => __('Are you sure you want to delete # {0}?', $file->id)]) ?>
            </td>
            <td>
                <?php
                echo $this->Html->image($file->path . $file->name, [
                    "alt" => $file->name,
                    "width" => "220px",
                    "height" => "150px"
                ]);
                ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->first('<< ' . __('first')) ?>
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
        <?= $this->Paginator->last(__('last') . ' >>') ?>
    </ul>
    <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
</div>
