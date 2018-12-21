<?php ?>
<div class="refResults form large-9 medium-8 columns content"> 
    <h3>À propos<h3>

    <!-- Présentation -->
    <table class="vertical-table">
        <tr>
            <th>Charles Langevin</th>  
            <td></td>    
        </tr>
            <th>420-5B7 MO Application internet</th>
            <td></td>         
        <tr>
        </tr>       
            <th>Automne 2018, Collège Montmorency</th>
            <td></td>
        <tr>
        <tr>    
            <th>Lien vers GitHub</th>
            <td><?= $this->Html->link('GitHub', 'https://github.com/Cln62743/TP1_Internet') ?></td>
        </tr>
    </table>

    <!-- Première étape -->
    <table class="vertical-table">
        <h3>Étape d'utilisation : Liste Liée avec angular</h3>
        <tr>    
            <th>Aller a la page ajouter un tournoi</th>
            <td>Résultat: L'utilisateur est envoyé sur la page ajout d'un tournoi</td>
        </tr>
        <tr>    
            <th>Choisir une ville</th>
            <td>Résultat: La liste des écoles va se modifier pour ne montrer que les écoles affilié a la ville choisi</td>
        </tr>
    </table>

    <!-- Deuxième étape -->
    <table class="vertical-table">
        <h3>Étape d'utilisation : Opérations "CRUD" avec AngularJS</h3>   
        <tr>    
            <th>Écrire dans le url "ChessTournament_V1/cities"</th>
            <td>Résultat: L'utilisateur est envoyé sur la monopage avec la liste des villes</td>
        </tr>
        <tr>    
            <th>Fonction qui marche:</th>
            <td>Add</br>Edit</br>Delete
        </tr>      
    </table>

    <!-- Troisième étape -->
    <h3>Étape d'utilisation : Jeton JWT avec AngularJS</h3>  
    <table class="vertical-table">
        
        <tr>    
            <th>Pas implementer</th>
            <td></td>
        </tr>
    </table>

    <!-- Quatrième étape -->
    <h3>Étape d'utilisation : Captcha et cliquer-glisser d'images</h3>
    <!-- Captcha -->
    <table class="vertical-table">    
        <h5>Captcha</h5>
        <tr>    
            <th>Suivre les étapes de la section Opérations "CRUD" avec AngularJS</th>
            <td>Résultat: L'utilisateur est envoyé sur la monopage Api</td>
        </tr>
        <tr>    
            <th>Captcha est dans la section Login</th>
            <td>Login non implémenté, mais le captcha réagi</td>
        </tr>
    </table>

    <!-- Cliquer-glisser d'images -->
    <table class="vertical-table">
        <h5>Cliquer-glisser d'images</h5>
        <tr>    
            <th>Clicker sur le lien "List Files" a partir du site de base</th>
            <td>Résultat: Affiche la page avec tous les fichier télécharger</td>
        </tr>
        <tr>    
            <th>Déposer un fichier dans la dropzone</th>
            <td>Le fichier est téléchargé et ajouté a la liste</td>
        </tr>
    </table>
    <table class="vertical-table">
        <h3>Diagramme de la BD</h3>  
        <tr>    
            <th><?php
                echo $this->Html->image("BDRelationView.PNG", [
                    "alt" => "bd_relation",
                    "width" => "800px",
                ]);
            ?></th>
            <td></td>
        </tr>
        <tr>    
            <th>Lien vers l'image de la base de données</th>
            <td><?= $this->Html->link('DB', '/img/BDRelationView.PNG') ?></td>
        </tr>
        <tr>    
            <th>Lien vers la page Coverage</th>
            <td><?= $this->Html->link('Page Coverage', '/img/BDRelationView.PNG') ?></td>
        </tr>
    </table>
</div>