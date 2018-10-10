<?php ?>
<div class="refResults form large-9 medium-8 columns content"> 
    <h3>À propos<h3>
    <table class="vertical-table">
        <tr>
            <th>Charles Langevin</th>  
        </tr>
            <th>420-5b7 MO Application internet</th>           
        <tr>
        </tr>       
            <th>Automne 2018, Collège Montmorency</th>
        <tr>
    </table>
    <table class="vertical-table">
        <tr>       
            <h3>Étape d'utilisation : Visiteur</h3>   
        </tr>
        <tr>    
            <th>Cliquer sur créer un account</th>
            <td>Résultat: Amène a la page créer account</td>
        </tr>
    </table>
    <table class="vertical-table">
        <tr>       
            <h3>Étape d'utilisation : Player</h3>   
        </tr>
        <tr>    
            <th>Se connecter</th>
            <td>Résultat: L'utilisateur est envoyé sur la page des tournois</td>
        </tr>
        <tr>    
            <th>Voir mon compte joueur</th>
            <td>Résultat: Affiche les informations du compte joueur</td>
        </tr>
        <tr>    
            <th>Liste des tournois</th>
            <td>Résultat: L'utilisateur est envoyé sur la page des tournois</td>
        </tr>
        <tr>    
            <th>Liste des tournois</th>
            <td>Résultat: L'utilisateur est envoyé sur la page des clubs</td>
        </tr>
    </table>    
    <table class="vertical-table">
        <tr>       
            <h3>Étape d'utilisation : Admin</h3>   
        </tr>
        <tr>    
            <th>Se connecter</th>
            <td>Résultat: L'utilisateur est envoyé sur la page des tournois</td>
        </tr>
        <tr>    
            <th>Voir tous les comptes</th>
            <td>Résultat: Affiche la page des compte</td>
        </tr>
        <tr>    
            <th>Liste des tournois</th>
            <td>Résultat: L'utilisateur est envoyé sur la page des tournois</td>
        </tr>
        <tr>    
            <th>Liste des tournois</th>
            <td>Résultat: L'utilisateur est envoyé sur la page des clubs</td>
        </tr>
        <tr>    
            <th>List Files</th>
            <td>Résultat: L'utilisateur est envoyé sur la page des files</td>
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
            <th>Link to database image</th>
            <td><?= $this->Html->link('DB', '/img/BDRelationView.PNG') ?></td>
        </tr>
    </table>
</div>