<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?php
        echo $this->Html->css([
            'base.css',
            //'basic.css',
            'style.css',
            'https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css',
            //'http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'
        ]);
    ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?php
        echo $this->Html->script([
            'https://code.jquery.com/jquery-1.12.4.js',
            'https://code.jquery.com/ui/1.12.1/jquery-ui.js',
            'https://ajax.googleapis.com/ajax/libs/angularjs/1.2.15/angular.min.js'
            //'http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'
                ], ['block' => 'scriptLibraries']
        );
    ?>
</head>
<body>
    <?php
        $connectedUser = $this->request->session()->read('Auth.User');
    ?>
    <nav class="top-bar expanded" data-topbar role="navigation">
        
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <h1><a href=""><?= $this->fetch('title') ?></a></h1>
            </li>
        </ul>
        <div class="top-bar-section">
            <ul class="right">
                <?php if($connectedUser){ ?>
                    <li><?= $this->Html->link(($connectedUser['email']), ['controller' => 'Users', 'action' => 'view', $connectedUser['id']])?></li>
                    <li><?= $this->Html->link(__('Logout'), ['controller' => 'Users', 'action' => 'logout'])?></li>
                <?php } ?>
                <li><?= $this->Html->link('Monopage', ['controller' => 'Cities', 'action' => 'index'], ['escape' => false])?></li>
                <li><?= $this->Html->link('Français', ['action' => 'changeLang', 'fr_CA'], ['escape' => false])?></li>
                <li><?= $this->Html->link('English', ['action' => 'changeLang', 'en_US'], ['escape' => false])?></li>
                <li><?= $this->Html->link('Español', ['action' => 'changeLang', 'es'], ['escape' => false])?></li>
                <li><?= $this->Html->link(_('Page À propos'), ['controller' => 'Redirections', 'action' => 'aPropos'])?></li>
                <li><?= $this->Html->link(_('Pdf'), ['controller' => 'Tournaments', 'action' => 'view', 1])?></li>
                <!--<li><a target="_blank" href="https://book.cakephp.org/3.0/">Documentation</a></li>-->
                <!--<li><a target="_blank" href="https://api.cakephp.org/3.0/">API</a></li>-->
            </ul>
        </div>
    </nav>
    <?php if($connectedUser['role'] === 'player'){
        echo $this->element('NavBar/navPlayer');
    }else if($connectedUser['role'] === 'admin'){
        echo $this->element('NavBar/navAdmin');
    }else{}?>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
    <?= $this->fetch('scriptLibraries') ?>
    <?= $this->fetch('script'); ?>
    <?= $this->fetch('scriptBottom') ?>   
</body>
</html>
