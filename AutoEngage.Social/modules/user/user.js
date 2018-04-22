(function(){
    var app = angular.module('user',['ngSanitize']);
    
    var debuggMode = true;
    //var userData   = {};
    app.directive('fbLogin', ['$http','$log', function($http, $log){
        return{
            restrict    : 'A',
            templateUrl : 'templates/login.html',
            controller  : function(){
                $('#myModal').modal('show');
                var login = this;
                login.URL = "";
                
                $http.get('modules/user/login/login.php').then(function(response){
                    login.URL = response.data;
                    if(debuggMode)$log.log(login.URL);
                });                
            },
            controllerAs: 'loginCtrl'
        }
    }]);
    
    app.controller('logoutController', ['$http','$log', function($http, $log){
        
        var logout = this;
        logout.URL = "";
        var parameter = $.param({getLogoutURL : "getLogoutURL"});
        
        $http({
            method: 'POST',
            url: 'logout.php',
            data: parameter,
            headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
        }).then(function(response){
            logout.URL = response.data;
            if(debuggMode)$log.log(response.data);
        });
    }]);
    
       
    app.factory('sharedDataFctry', function($http, $log) {
        
        var httpHandler = function(url, action){
                 return $http({method: 'POST',
                        url: url,
                        data: $.param({action : action}),
                        headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
                        }).then(function(response){
                            var rawData = response.data;
                            if(debuggMode)$log.log(rawData);
                            return(response.data);
                        });
                 };
        
        return {
            
            userData : httpHandler('modules/fbQueryHandler.php', 'getUserData'),
            managedPages : httpHandler('modules/fbQueryHandler.php', 'getManagedPages')
        };
    });
    
    
})();


/*
$http({
                    method: 'POST',
                    url: 'modules/fbQueryHandler.php',
                    data: $.param({action : "getUserData"}),
                    headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
                    }).then(function(response){
                        var rawData = response.data;//JSON.parse(response.data);
                       // user.theUserData = rawData;
                        if(debuggMode)$log.log(rawData);
                            return(response.data);
                    })
                    */