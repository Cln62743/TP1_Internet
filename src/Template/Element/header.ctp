<?php

?>

<!-- NavBar Api -->
<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Chess tournaments</a>
            <!--</div>
            <!--<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">-->
            <ul class="nav navbar-nav">
                <li>
                    <?= $this->Html->link(__('Tournaments'), ['controller' => 'Tournaments', 'action' => 'index']) ?>
                </li> 
                <li><?=
                    $this->Html->link('Listes dynamiques avec AngularJS (action Edit)', [
                        'controller' => 'Tournaments',
                        'action' => 'add'
                    ]);
                    ?>
                </li>
                <li><?=
                    $this->Html->link('API CRUD avec AngularJS et login JWT', [
                        'controller' => 'Cities',
                        'action' => 'index'
                    ]);
                    ?>
                </li>
                <li><?=
                    $this->Html->link('Page À propos', [
                        'controller' => 'Redirections',
                        'action' => 'aPropos'
                    ]);
                    ?>
                </li>
            </ul>
        </div>
    </div>
</nav>