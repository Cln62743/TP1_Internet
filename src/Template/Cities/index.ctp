<?php
    $urlToRestApi = $this->Url->build('/api/cities', true);

    echo $this->Html->scriptBlock('var urlToRestApi = "' . $urlToRestApi . '";', ['block' => true]);
    echo $this->Html->script('Cities/index', ['block' => 'scriptBottom']);

    echo $this->Html->script('https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit');
?>



<div ng-app="app">
    <!--<div ng-controller="UsersController">
        <div id="login">
            <h3>Login</h3>
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
            <p style="color:red;">{{ captcha_status }}</p>
            <a ng-click="login()">Login</a>
        <br/>
        </div>
        <a id="logout" ng-click="logout()">Logout</a>
    </div>-->

    <div ng-controller="CitiesController">
        <div id="Add-Modif">
            <table>
                <tr>
                    <td width="100">City name</td>
                    <td><input type="text" name="name" ng-model="city.name"/></td>
                </tr>
            </table>
            <a ng-click="addCity(city.name)">Add the city</a>
            <br/>
            <a ng-click="editCity(city.name)">Save the modification</a>         
        </div>

        <p style="color: green">{{message}}</p>
        <p style="color: red">{{errorMessage}}</p>

        <table>
            <tr>
                <th>City name</th>
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