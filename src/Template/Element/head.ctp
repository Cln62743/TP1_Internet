<?php
echo $this->Html->charset();
echo $this->Html->css([
    'Bootstrap/Journal/bootstrap.min.css',
    'https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css',
    'http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.css',
    'https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,400italic',
    'https://fonts.googleapis.com/icon?family=Material+Icons',
    'materialize/css/materialize.min.css',
    'cities/index/custom.css',
    'app'
]);
echo $this->Html->script([
    'https://code.jquery.com/jquery-1.12.4.js',
    'https://code.jquery.com/ui/1.12.1/jquery-ui.js',
    'https://ajax.googleapis.com/ajax/libs/angularjs/1.6.6/angular.js',
    'http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.js',
    'https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit',
    'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js',
    'materialize.min',
        ], ['block' => 'scriptLibraries']
);
?>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
