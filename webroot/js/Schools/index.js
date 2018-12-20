var onloadCallback = function() {
    widgetId1 = grecaptcha.render('example1', {
        'sitekey': '6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI',
        'theme': 'light'
    });
};

// angular js codes will be here
var app = angular.module('CakeJwtAngularjs', []);

app.controller('usersCtrl', function($scope, $http) {
    // more angular JS codes will be here

    // Login Process
    $scope.login = function() {
        //alert(grecaptcha.getResponse(widgetId1));
        if (grecaptcha.getResponse(widgetId1) == '') {
            $scope.captcha_status = 'Please verify captha.';
            return;
        }
        var req = {
            method: 'POST',
            url: 'api/users/token',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            data: {username: $scope.username, password: $scope.password}
        }
        // fields in key-value pairs
        $http(req)
                .success(function(jsonData, status, headers, config) {
                    // console.log(jsonData.data.token);
                    // tell the user was logged
                    Materialize.toast('User sucessfully logged in', 4000);
                    localStorage.setItem('token', jsonData.data.token);
                    localStorage.setItem('user_id', jsonData.data.id);
                    // Switch button for Logout
                    $('#login-btn').hide();
                    $('#logout-btn').show();
                })
                .error(function(data, status, headers, config) {
                    //console.log(data.response.result);
                    // tell the user was not logged
                    Materialize.toast(data.message, 4000);
                });
        // close modal
        $('#modal-login-form').modal('close');
    }
    // Login Process
    $scope.logout = function() {
        localStorage.setItem('token', "no token");
        $('#logout-btn').hide();
        $('#login-btn').show();
        $scope.captcha_status = '';
        // show modal
        $('#modal-logout-form').modal('close');
    }
    $scope.changePassword = function() {
        var req = {
            method: 'PUT',
            url: 'api/users/' + localStorage.getItem("user_id"),
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + localStorage.getItem("token")
            },
            data: {'password': $scope.newPassword}
        }
        $http(req)
                .success(function(response) {
                    // tell the user school record was updated
                    Materialize.toast('Password successfully changed', 4000);
                    // close modal
                    $('#modal-logout-form').modal('close');
                })
                .error(function(response) {
                    // tell the user school record was not updated
                    //console.log(response);
                    Materialize.toast('Could not update Password', 4000);

                });
    }
});

app.controller('SchoolsCtrl', function($scope, $http) {

    // create new school 
    $scope.createSchool = function() {
        var req = {
            method: 'POST',
            url: 'api/subcategories',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            data: {'name': $scope.newName, 'city_id': $scope.createCity.id}
        }
        $http(req)
                .success(function(response) {
                    //console.log(data.response.result);
                    // tell the user new school was created
                    Materialize.toast('School successfully created', 4000);

                    // close modal
                    $('#modal-createSchool-form').modal('close');

                    // refresh the list
                    $scope.getAll();
                })
                .error(function(response) {
                    //console.log(data.response.result);
                    // tell the user new school was created
                    Materialize.toast('Could not create school', 4000);
                });
    }
    // read subcategories
    $scope.getAll = function() {
        var req = {
            method: 'GET',
            url: 'api/subcategories',
            headers: {
                'Accept': 'application/json'
            }
        }
        $http(req)
                .success(function(response) {
                    $scope.names = response.data;
                })
                .error(function(response) {
                    // tell the user subcategories are not accessible
                    Materialize.toast('Could not retreive Subcategories', 4000);
                })
                ;
        // Retrieve Categories to fill the list on create or edit
        var req = {
            method: 'GET',
            url: 'api/categories/',
            headers: {
                'Accept': 'application/json'
            }
        }
        $http(req)
                .success(function(jsonData, status, headers, config) {
                    //console.log(jsonData.data);
                    // put the values in form
                    $scope.createCategories = jsonData.data;
                })
                .error(function(response) {
                    Materialize.toast('Unable to retrieve Categories.', 4000);
                });

    }
    // retrieve record to fill out the form
    $scope.readOne = function(id) {
        if (localStorage.getItem("token") === "no token") {
            Materialize.toast('Please login', 4000);
        } else {
            // Retrieve School to edit
            var req = {
                method: 'GET',
                url: 'api/subcategories/' + id,
                headers: {
                    'Accept': 'application/json'
                }
            }
            $http(req)
                    .success(function(jsonData, status, headers, config) {
                        //console.log(jsonData.data);
                        // put the values in form
                        $scope.id = jsonData.data.id;
                        $scope.actualName = jsonData.data.name;
                        $scope.selectedCityId = jsonData.data.city_id;
                    })
                    .error(function(response) {
                        Materialize.toast('Unable to retrieve record.', 4000);
                    });
            // Set the Actual City
            var req = {
                method: 'GET',
                url: 'api/categories/',
                headers: {
                    'Accept': 'application/json'
                }
            }
            $http(req)
                    .success(function(jsonData, status, headers, config) {
                        //console.log(jsonData);
                        // put the values in form
                        $scope.editCategories = jsonData.data;
                        angular.forEach($scope.editCategories, function(city) {
                            if (city.id == $scope.selectedCityId) {
                                $scope.editCity = city;
                            }
                        })
                        // show modal
                        $('#modal-editSchool-form').modal('open');
                    })
                    .error(function(response) {
                        Materialize.toast('Unable to retrieve Cities.', 4000);
                    })
        }
    }

    // update school record / save changes
    $scope.updateSchool = function() {
        var req = {
            method: 'PUT',
            url: 'api/schools/' + $scope.id,
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            data: {'name': $scope.actualName, 'city_id': $scope.editCity.id}
        }
        $http(req)
                .success(function(response) {
                    // tell the user school record was updated
                    Materialize.toast('School successfully updated', 4000);
                    // close modal
                    $('#modal-editSchool-form').modal('close');
                    // refresh the school list
                    $scope.getAll();
                })
                .error(function(response) {
                    // tell the user school record was not updated
                    //console.log(response);
                    Materialize.toast('Could not update School', 4000);

                });
    }
    // delete school
    $scope.deleteSchool = function(id) {
        //console.log(localStorage.getItem("token"));
        if (localStorage.getItem("token") === "no token") {
            Materialize.toast('Please login', 4000);
        } else {
            // ask the user if he is sure to delete the record
            if (confirm("Are you sure?")) {
                // post the id of school to be deleted
                var req = {
                    method: 'DELETE',
                    url: 'api/schools/' + id,
                    headers: {
                        'Accept': 'application/json',
                    }
                }
                $http(req)
                        .success(function(response) {

                            // tell the user school was deleted
                            Materialize.toast('Schools successfully deleted', 4000);

                            // refresh the list
                            $scope.getAll();
                        })
                        .error(function(response) {
                            // tell the user school was not deleted
                            Materialize.toast('Could not Schools', 4000);
                        })
                        ;
            }
        }
    }
});

// jquery codes will be here
$(document).ready(function() {
    // initialize modal
    $('.modal').modal();
    localStorage.setItem('token', "no token");
    $('#logout-btn').hide();
});