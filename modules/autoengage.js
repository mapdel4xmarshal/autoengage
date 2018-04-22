(function(){
    var app = angular.module('autoengage',['user','page','routeHandler', 'appConfig']);
    
 
    
   app.controller('AppController', function(sharedDataFctry, config){
       var debuggMode = config.debuggMode;
       var vm = this;
       vm.userData = {};
       vm.managedPages = {};  
       
       
       sharedDataFctry.userData.then(function(data){
           vm.userData = data; 
       });
       
       sharedDataFctry.managedPages.then(function(data){
           vm.managedPages = data;
       });
       
       //   vm.getMetric = metricFactory.getMetric;
       //vm.pageID = metricFactory.getPageID();
   });
 
    
})();