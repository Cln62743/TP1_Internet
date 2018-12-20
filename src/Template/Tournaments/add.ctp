<?php
    $urlToLinkedListFilter = $this->Url->build([
        "controller" => "Cities",
        "action" => "getCities",
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
<div class="tournaments form content" ng-app="linkedlists" ng-controller="CitiesController">
    <?= $this->Form->create($tournament) ?>
    <fieldset>
        <legend><?= __('Add a tournament') ?></legend>
        <?php
            echo $this->Form->control(__('name'));
            echo $this->Form->control(__('start_date'));
            echo $this->Form->control(__('end_date'));
            ?>
            <div>
                Cities: 
                <select name="city_id"
                        id="city-id" 
                        ng-model="city" 
                        ng-options="city.name for city in cities track by city.id"
                        >
                    <option value=''>Select</option>
                </select>
            </div>
            <div>
                Schools: 
                <select name="school_id"
                        id="school-id" 
                        ng-disabled="!city" 
                        ng-model="school"
                        ng-options="school.name for school in city.schools track by school.id"
                        >
                    <option value=''>Select</option>
                </select>
            </div>
    </fieldset>
    <?= $this->Form->button(__('Submit the tournament')) ?>
    <?= $this->Form->end() ?>
</div>
