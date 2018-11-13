<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tournament[]|\Cake\Collection\CollectionInterface $tournaments
 */
?>
<?php
    $urlToLinkedListFilter = $this->Url->build([
        "controller" => "Schools",
        "action" => "getByCity",
        "_ext" => "json"
            ]);
    echo $this->Html->scriptBlock('var urlToLinkedListFilter = "' . $urlToLinkedListFilter . '";', ['block' => true]);
    echo $this->Html->script('Tournaments/autoComplete', ['block' => 'scriptBottom']);
?>

<!-- -->
<div class="tournaments index content">
    <h3><?= __('Tournament') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <?= $this->Form->create('TournamentsSearch') ?>
                <fieldset>
                    <legend><?= __('Search a tournament') ?></legend>
                    <?php
                        echo $this->Form->control('name', ['id' => 'autocomplete'])
                    ?>
                </fieldset>
            <?= $this->Form->end() ?>
            
            <tr>
                <!-- Show club name-->
                <th scope="col"><?= $this->Paginator->sort(__('Name of the tournament')) ?></th>
                <th scope="col"><?= $this->Paginator->sort(__('Start date')) ?></th>
                <th scope="col"><?= $this->Paginator->sort(__('End date')) ?></th>
                <th scope="col"><?= $this->Paginator->sort(__('City')) ?></th>
                <th scope="col"><?= $this->Paginator->sort(__('School')) ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tournaments as $tournament): ?>
                <tr>
                    <!-- Show club name-->
                    <!--<td><?= $tournament->has('user') ? $this->Html->link($tournament->user->email, ['controller' => 'Users', 'action' => 'view', $tournament->user->id]) : '' ?></td>-->
                    <td><?= h($tournament->name) ?></td>
                    <td><?= h($tournament->start_date) ?></td>
                    <td><?= h($tournament->end_date) ?></td>
                    <td><?= h($tournament->city_id) ?></td>
                    <td><?= h($tournament->school_id) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View details of the tournament'), ['action' => 'view', $tournament->id]) ?>
                        <?= $this->Html->link(__('Edit the tournament'), ['action' => 'edit', $tournament->id]) ?>
                        <?= $this->Form->postLink(__('Delete the tournament'), ['action' => 'delete', $tournament->id], ['confirm' => __('Are you sure you want to delete the tournament # {0}?', $tournament->id)]) ?>
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
</div>
