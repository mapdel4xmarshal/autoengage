(function(){
    var app = angular.module('pageServices', ['appConfig']);
app.factory('metric', ['$http','$log', 'config', function($http, $log, config){
        
        var debuggMode = config.debuggMode;
        var pageID = 0,
            node   = 'insights',
            metricsRequest = ['page_fans','page_consumptions','page_impressions', 'page_fan_adds', 'page_negative_feedback'],
            since  = Math.round((new Date(new Date() - 86400000 * 3))/1000),
            until  = Math.round((new Date())/1000),
            period ='day',
                      
            computeCTR = function(impr, engag){                   
                return ((engag/Math.max(1,impr)) * 100).toFixed(2).toString() + "%";   
            },
            metricResponse,
            
            resetMetricResponse = function(){
                mResponse = {'page_fans' : {title : 'Total Fans', loading : true},
                               'page_consumptions' : {title : 'Daily Engagement', loading : true},
                               'page_impressions' : {title : 'Daily Impressions', loading : true},
                               'page_ctr' : {title : 'Daily CTR', loading : true},
                               'page_fan_adds' : {title : 'Daily Likes', loading : true},
                               'page_negative_feedback' : {title : 'Daily Unlikes', loading : true}
                             };
                metricResponse = mResponse;
                return mResponse;
            },
            
            metricResponse = resetMetricResponse(),
            
            getMetric = function(pID){      
                pageID = pID;
                var parameter = $.param({action  : "getMetric", 
                                         metrics : JSON.stringify(metricsRequest), 
                                         node    : node, 
                                         pageID  : pageID,
                                         period  : period,
                                         since   : since,
                                         until   : until});
          
                $http({
                    method: 'POST',
                    url: 'modules/fbQueryHandler.php',
                    data: parameter,
                    headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
                }).then(function(response){

                    if(debuggMode)$log.log(response.data);

                    var responseData = response.data;

                    if(typeof responseData['error'] == 'undefined'){
                            angular.forEach(responseData, function(value, key) {
                                
                            var data = JSON.parse(value.body).data[0];  
                                
                            metricResponse[data.name].data1 = data.values[0];
                            metricResponse[data.name].data2 = data.values[1];
                            metricResponse[data.name].loading = false;
                            
                            var currValue = data.values[1].value,
                                prevValue = data.values[0].value;
                            metricResponse[data.name].class = (currValue > prevValue)? "green" : "red";
                                
                            metricResponse[data.name].percentChange = (((currValue - prevValue) * 100)/Math.max(1,prevValue)).toFixed(2);    
                                   
                            if(debuggMode)$log.log(data.values[0].value);
                        });
                        
                        //Populate CTR -----------------------------------------------------------------------------------------+
                        var impreValue1 = metricResponse['page_impressions'].data1.value,
                            impreValue2 = metricResponse['page_impressions'].data2.value,
                            engmtValue1 = metricResponse['page_consumptions'].data1.value,
                            engmtValue2 = metricResponse['page_consumptions'].data2.value;
                        
                        metricResponse["page_ctr"].loading = false;
                        metricResponse["page_ctr"].data1 = {'value' : computeCTR(impreValue1, engmtValue1)};
                        metricResponse["page_ctr"].data2 = {'value' : computeCTR(impreValue2, engmtValue2)}; 
                        
                        var currValue = metricResponse["page_ctr"].data2.value,
                            prevValue = metricResponse["page_ctr"].data1.value;
                        
                        currValue = currValue.replace('%','');
                        prevValue = prevValue.replace('%','');
                        
                        metricResponse["page_ctr"].class = (currValue > prevValue)? "green" : "red";   
                        metricResponse["page_ctr"].percentChange = (((currValue - prevValue) * 100)/Math.max(1,prevValue)).toFixed(2); 
                    }
                    else if(debuggMode)$log.log(responseData['error']);
                });  
            };
    
         
    
        
        
        return{
            pgeID    : pageID,
            getPageID : function(){return pageID;},
            setPageID : function(pID){pageID = pID;},
            
            getMetricsRequest : function(){return metricsRequest;},
            setMetricsRequest : function(mtrcReq){metricsRequest = mtrcReq;},
            
            getSince : function(){return since;},
            setSince : function(nSince){since = nSince;},
            
            getUntil : function(){return until;},
            setUntil : function(utl){until = utl;},
            
            getPeriod : function(){return period;},
            setPeriod : function(prd){period = prd;},
            
            getMetricResponse : function(){return metricResponse;},
            setMetricResponse : function(mtrRes){metricResponse = mtrRes;},
            
            getMetric : getMetric,
            
            resetMetricResponse : resetMetricResponse,
            
            computeCTR : computeCTR
        }
    }]);
})();