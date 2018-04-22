(function(){
    var app = angular.module('page',['pageServices', 'pageFilter']);
    var debuggMode = true;
    
    
    app.controller('tileMetricController', function(metric, $scope, $routeParams){
    $scope.ref            = 0;
    $scope.className      = 'white';
    $scope.pageID         = metric.getPageID();
    $scope.day            = metric.getPeriod();
    $scope.metricResponse = metric.getMetricResponse();  
    $scope.normVal        = metric.normalizeFigures;
        
    $scope.getMetric = function(id){
        metric.setPageID(id);
        $scope.pageID   = id;
        metric.resetMetricResponse();  
        $scope.metricResponse = metric.getMetricResponse();  
        metric.getMetric(id);
    };
    
    $scope.getMetric($routeParams.pageID);  
});
                              

app.directive('metricTiles', function(){
    return{
        restrict : 'E',
        templateUrl : 'templates/toptiles.html',
        scope:{
            metric      : "=",
            data1       : "=",
            data2       : "=",
            mk          : "@"
        },
        link: function(scope, elem, attr){
        }
    }
});	
    
app.directive('percentTemplate', function () {
  return {
    template:'<i class="fa fa-sort-asc"></i>',
    restrict: 'E',
      scope: {
          theClass : "="
      },
    link: function(scope, elem) { console.log(scope.theClass);
      if(scope.theClass == 'red')
          {
              elem.removeClass('fa-sort-asc');
              elem.addClass('fa-sort-desc');
          }
    }
  };
})
    
    
    
})();