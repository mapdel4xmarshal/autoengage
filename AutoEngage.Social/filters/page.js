(function(){
    var app = angular.module('pageFilter',[]);
    
    app.filter('normalizeValues',function(){
        return function(num)
        {
             if(typeof num != 'number') return num;
             var value =    num.toString(),
                 numlength = value.length;
           
             if(numlength < 7)return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
             if(numlength < 10)return (num / 1000000).toFixed(2).toString() + "M";
             else return (num / 1000000000).toFixed(2).toString() + "B";
        }
    });
    
    
    app.filter('classSelector', function(){
        return function(prevData, currData)
        {
            if(typeof currData != 'number'){
                prevData = (prevData.replace('%', ''));
                prevData = prevData.parseFloat;
                currData = currData.replace('%', '');
                currData = currData.parseFloat;               
            }
            
            if(prevData > currData)return "green";
            if(prevData < currData)return "red"; 
        }
    });  
    
})();