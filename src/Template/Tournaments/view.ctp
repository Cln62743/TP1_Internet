<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tournament $tournament
 * Fichier : src/Template/Tournaments/view.ctp
 */
?>

<h1><?= h($tournament->title) ?></h1>
<p><?= h($tournament->body) ?></p>

<!-- Affichage des objets TODO modifier pour que les valeurs concorde avec le projet -->
<div class="Tournaments view large-12 medium-8 columns content">
    <h3><?= h($tournament->name) ?></h3>
    <?php if($user['role'] === 'player'){ ?>
    <li>
        <?= $this->Html->link(__('Subscribe to the tournament'),['controller' => 'playerTournamentParticipations', 'action' => 'subscribe', $tournament->id]) ?>
    </li>
    <?php } ?>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Start date') ?></th>
            <td><?= h($tournament->start_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('End date') ?></th>
            <td><?= h($tournament->end_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($tournament->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($tournament->modified) ?></td>
        </tr>
    </table>
</div>

<div class="Players view large-12 medium-8 content">
    <h3><?= __('Participating players') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <head>
            <tr>
                <th scope="col"><?= $this->Paginator->sort(__('First Name')) ?></th>
                <th scope="col"><?= $this->Paginator->sort(__('Last Name')) ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </head>
        <tbody>
            <?php foreach ($tournament->players as $player): ?>
                <tr>
                    <td><?= h($player->user->first_name) ?></td>
                    <td><?= h($player->user->last_name) ?></td>
                    <td><?= $this->Html->link(__('View user details'), ['controller' => 'users', 'action' => 'view', $player->user->id]) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>