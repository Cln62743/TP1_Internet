<?php ?>
<div class="refResults form large-9 medium-8 columns content"> 
    <h3>À propos<h3>
    <table class="vertical-table">
        <tr>
            <th>Charles Langevin</th>  
        </tr>
            <th>420-5B7 MO Application internet</th>           
        <tr>
        </tr>       
            <th>Automne 2018, Collège Montmorency</th>
        <tr>
        <tr>    
            <th>Lien vers GitHub</th>
            <td><?= $this->Html->link('GitHub', 'https://github.com/Cln62743/TP1_Internet') ?></td>
        </tr>
    </table>
    <table class="vertical-table">
        <tr>       
            <h3>Étape d'utilisation : Liste Liée</h3>   
        </tr>
        <tr>    
            <th>Se connecter en tant qu'Admin</th>
            <td>Résultat: L'utilisateur est envoyé sur la page des tournois</td>
        </tr>
        <tr>    
            <th>Aller a la page ajouter un tournoi</th>
            <td>Résultat: L'utilisateur est envoyé sur la page ajout d'un tournoi</td>
        </tr>
        <tr>    
            <th>Choisir une ville</th>
            <td>Résultat: La liste des écoles va se modifier pour ne montrer que les écoles affilié a la ville choisi</td>
        </tr>
    </table>
    <table class="vertical-table">
        <tr>       
            <h3>Étape d'utilisation : AutoCompletion</h3>   
        </tr>
        <tr>    
            <th>Se connecter en tant qu'Admin</th>
            <td>Résultat: L'utilisateur est envoyé sur la page des tournois</td>
        </tr>
        <tr>    
            <th>Utiliser la barre de recherche dans la vue index</th>
            <td>Résultat: Les résultats possibles s'affichent</td>
        </tr>
        <tr>    
            <th>Résultats possibles:</th>
            <td>Tournoi A</br>Tournoi B</br>Tournoi C</br>Tournoi D</br>Tournoi E</br>Tournoi F</br>Tournoi G</br>Tournoi H</td>
        </tr>       
    </table>    
    <table class="vertical-table">
        <tr>       
            <h3>Étape d'utilisation : Api</h3>   
        </tr>
        <tr>    
            <th>Écrire dans le url "ChessTournament_V1/cities"</th>
            <td>Résultat: L'utilisateur est envoyé sur la monopage de l'Api</td>
        </tr>
    </table>
    <table class="vertical-table">
        <tr>       
            <h3>Étape d'utilisation : Interface admin</h3>   
        </tr>
        <tr>    
            <th>Se connecter a l'Api (Voir étape d'utilisation Api)</th>
            <td>Résultat: L'utilisateur est envoyé sur la monopage Api</td>
        </tr>
        <tr>    
            <th>Clicker sur le bouton "Section Admin en php" en haut a droite de l'écran</th>
            <td>Résultat: Affiche la page cities avec le prefix admin</td>
        </tr>
    </table>
    <table class="vertical-table">
        <tr>       
            <h3>Diagramme de la BD</h3>   
        </tr>
        <tr>    
            <th><?php
                echo $this->Html->image("BDRelationView.PNG", [
                    "alt" => "bd_relation",
                    "width" => "800px",
                ]);
            ?></th>
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