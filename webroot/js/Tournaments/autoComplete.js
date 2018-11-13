/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

(function ($) {
    // Get the path to action from CakePHP
    var autoCompleteSource = [
        "Tournoi A",
        "Tournoi B",
        "Tournoi C",
        "Tournoi D",
        "Tournoi E",
        "Tournoi F",
        "Tournoi G",
        "Tournoi H",
    ];
    $('#autocomplete').autocomplete({
        source: autoCompleteSource,        
        minLength: 1
    });
})(jQuery);