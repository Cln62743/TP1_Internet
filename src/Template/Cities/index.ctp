<?php
    $urlToRestApi = $this->Url->build('/api/cities', true);

    echo $this->Html->scriptBlock('var urlToRestApi = "' . $urlToRestApi . '";', ['block' => true]);
    echo $this->Html->script('Cities/index', ['block' => 'scriptBottom']);

    echo $this->Html->script('https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit');
?>



<div ng-app="app">
    <div ng-controller="UsersCtrl">
        <div id="login">
            <h3>Login</h3>
            <p style="color: red;">Not implemented</p>
            <table>
                <tr>
                    <td width="100">Email</td>
                    <td><input type="text" name="email", ng-model="email"/></td>
                </tr>
                <tr>
                    <td width="100">Password</td>
                    <td><input type="password" name="password", ng-model="password"/></td>
                </tr>
            </table>

            <div id="capcha"></div>
            <p style="color: red;">{{ captcha_status }}</p>
            <br/>
            <a ng-click="" class="btn">Login</a>
        <br/>
        </div>
        <a id="logout" ng-click="" class="btn">Logout</a>
    </div>

    <div ng-controller="CitiesCtrl">
        <div id="Add">
            <h4>Add a new city</h4>
            <table class="table">
                <tr>
                    <td width="100">City name</td>
                    <td><input type="text" name="addName" ng-model="city.addName"/></td>
                </tr>
            </table>          
            <br/>
            <a ng-click="addCity(city.addName)" class="btn">Add the city</a>
        </div>
        <div id="Edit">
            <h4>Edit a city</h4>
            <table class="table">
                <tr>
                    <td width="100">City name</td>
                    <td><input type="text" name="name" ng-model="city.name"/></td>
                </tr>
            </table>
            <br/>
            <a ng-click="editCity(city.name)" class="btn">Save the modification</a>         
        </div>

        <p style="color: green">{{message}}</p>
        <p style="color: red">{{errorMessage}}</p>

        <table class="table">
            <tr>
                <th>City name</th>
                <th>Actions</th>
            </tr>
            <tr ng-repeat="city in cities">
                <td>{{city.name}}</td>
                <div>
                    <td>
                        <a id="edit" ng-click="getCity(city.id)">Edit</a>
                        <br/>
                        <a id="delete" ng-click="deleteCity(city.id)">Delete</a>
                    </td> 
                </div>
            </tr>
        </table>
    </div>
</div>