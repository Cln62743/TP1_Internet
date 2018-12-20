<?php
	echo $this->Html->css('../js/dropzone/dropzone.min');

    echo $this->Html->script('dropzone/dropzone', ['block' => 'scriptLibraries']);
    echo $this->Html->script('dropzone/RedirectToIndex', ['block' => 'scriptBottom']);
?>

<div class="files index large-9 medium-8 columns content">
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