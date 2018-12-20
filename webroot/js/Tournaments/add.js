var app = angular.module('linkedlists', []);

// Linked List
app.controller('CitiesController', function ($scope, $http) {
    // l'url vient de add.ctp
    $http.get(urlToLinkedListFilter).then(function (response) {
        $scope.cities = response.data;
    });
});