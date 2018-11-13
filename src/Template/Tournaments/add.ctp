<?php
    $urlToLinkedListFilter = $this->Url->build([
        "controller" => "Schools",
        "action" => "getByCity",
        "_ext" => "json"
            ]);
    echo $this->Html->scriptBlock('var urlToLinkedListFilter = "' . $urlToLinkedListFilter . '";', ['block' => true]);
    echo $this->Html->script('Tournaments/add', ['block' => 'scriptBottom']);
?>
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tournament $tournament
 */
?>
<div class="tournaments form content">
    <?= $this->Form->create($tournament) ?>
    <fieldset>
        <legend><?= __('Add a tournament') ?></legend>
        <?php
            echo $this->Form->control(__('name'));
            echo $this->Form->control(__('start_date'));
            echo $this->Form->control(__('end_date'));
            echo $this->Form->control('city_id', ['options' => $cities]);
            echo $this->Form->control('school_id', ['options' => $schools]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit the tournament')) ?>
    <?= $this->Form->end() ?>
</div>
