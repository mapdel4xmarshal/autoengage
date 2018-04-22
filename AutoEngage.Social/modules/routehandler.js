(function(){
angular.module('routeHandler',['ngRoute'])
.config(function($routeProvider,$locationProvider){
    $locationProvider.hashPrefix('');
    $routeProvider
    .when('/page/:pageID', {
        templateUrl : "templates/page.html"})
    
    .when('/dashboard', {
        redirectTo : "/"})
    
    .otherwise({redirectTo : "/"})
});
})();