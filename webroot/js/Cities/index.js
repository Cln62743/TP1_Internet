var onloadCallback = function() {
    widgetId1 = grecaptcha.render('capcha', {
        'sitekey': '6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI',
        'theme': 'light'
    });
};

var app = angular.module('app', []);

/*
app.controller('UsersCtrl', function($scope, $http){

    $scope.login = function(){

    }

    $scope.logout = function(){
        
    }
});
*/

app.controller('CitiesCtrl', ['$scope', 'CityService', function ($scope, CityService) {

    $scope.addCity = function(){
        $scope.message = "";
        $scope.errorMessage = "";

        if($scope.city != null){
            CityService.addCity($scope.city.name).then(
                function success(response){
                    $scope.getAllCities();
                    $scope.message = 'The city has been successfully added';
                },
                function error(response){
                    $scope.errorMessage = 'A error occured while adding the city';
                }
            );
        }else{
            $scope.errorMessage = 'Please enter valid information';
        }
    }

    $scope.editCity = function(){
        $scope.message = "";
        $scope.errorMessage = "";

        CityService.editCity($scope.city.id, $scope.city.name).then(
            function success(response){
                $scope.message = "The city has been successfully edited";
                $scope.getAllCities();
            },

            function error(response){
                $scope.errorMessage = "A error occured while editing the city";
            }
        );
    }

    $scope.deleteCity = function(id){
        $scope.message = "";
        $scope.errorMessage = "";

        CityService.deleteCity(id).then(
            function success(response){
                $scope.message = "The city has been successfully deleted ";
                $scope.city = null;
                $scope.getAllCities();
            },

            function error(response){
                $scope.errorMessage = "A error occured while deleting the city";
            }
        );
    }

    $scope.getCity = function(id){
        $scope.message = "";
        $scope.errorMessage = "";

        CityService.getCity(id).then(
            function success(response){
                $scope.city = response.data.data;
                $scope.city.id = id;
            },

            function error(response){
                if(response.status === 404){
                    $scope.errorMessage = "The city is not found";
                }else{
                    $scope.errorMessage = "A error occured while accessing the city";
                }
            }
        );
    }

    $scope.getAllCities = function(){
        $scope.message = "";
        $scope.errorMessage = "";

        CityService.getAllCities().then(
            function success(response){
                $scope.cities = response.data.data;
            },

            function error (response){
                $scope.errorMessage = "A error occured while accessing the cities list";
            }
        );
    }

    $scope.getAllCities();
}]);

app.service('CityService', ['$http', function($http){
    this.addCity = function addCity(newName){
        return $http({
            method: 'POST',
            url: 'api/cities',
            headers: {
                'X-Requested-With' : 'XMLHttpRequest',
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            data: {
                name: newName
            } 
        });
    }

    this.editCity = function editCity(id, newName){
        return $http({
            method: 'PUT',
            url: 'api/cities/' + id,
            headers: {
                'X-Requested-With' : 'XMLHttpRequest',
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            data: {
                name: newName 
            }
        });
    }

    this.deleteCity = function deleteCity(id){
        return $http({
            method: 'DELETE',
            url: 'api/cities/' + id,
            headers: {
                'X-Requested-With' : 'XMLHttpRequest',
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            }
        });
    }

    this.getCity = function getCity(id){
        return $http({
            method: 'GET',
            url: 'api/cities/' + id,
            headers: {
                'X-Requested-With' : 'XMLHttpRequest',
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            }
        });
    }

    this.getAllCities = function getAllCities(){
        return $http({
            method: 'GET',
            url: 'api/cities',
            headers: {
                'X-Requested-With' : 'XMLHttpRequest',
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            }
        });
    }
}]);

// jquery codes will be here

$(document).ready(function () {

    // initialize modal

    //localStorage.setItem('token', "no token");
    //localStorage.setItem('user_id', null);
    
    //$('#logout').hide();
    //$('#motpasse').hide();
    $('#modififcationAjout').hide();

});