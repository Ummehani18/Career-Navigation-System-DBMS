
var app = angular.module("myMod", ['ngRoute']);

app.config(["$routeProvider",function($routeProvider){
    $routeProvider.
    when("/Course",{
        templateUrl:'adminCourse.html'
    }).
    when("/ContactReached",{
        templateUrl:'ContactReached.html'
    }).
    otherwise({
        redirect:'dashboard.html'
    });
}]);

app.controller("ctr",function($scope){

});