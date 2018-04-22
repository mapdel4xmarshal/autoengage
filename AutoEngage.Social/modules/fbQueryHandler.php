<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
} 

require_once ('fb-config.php');

// Set default access token to be used in script
$fb->setDefaultAccessToken($_SESSION['fb_access_token']);


/*$handlers = array(
  'getUserData'     => json_encode($_SESSION['userData']),
  'getManagedPages' => json_encode(checkResult()),
  'getMetric'       => computeCTR(getMetrics($fb))
); */  


//Post actions handler
if($_POST){
    if(isset($_POST['action'])){
        $action = $_POST['action'];
        if($action == 'getUserData'){echo json_encode($_SESSION['userData']);
       }
        
        if($action == 'getManagedPages'){echo json_encode(checkResult());
        }
        
        if($action == 'getMetric'){echo getMetrics($fb);
        }
    }
}


function getMetrics($fb){
    
    if(isset($_POST['metrics']) && $_POST['node']){
    
        $metricList = json_decode($_POST['metrics']);
        $node = $_POST['node'];
        $pageID = $_POST['pageID'];
        $period = $_POST['period'];
        $since  = $_POST['since'];
        $until  = $_POST['until'];
        
        $params = [];

        foreach($metricList as $metric){
            $relativeURL = '/'.$pageID.'/'.$node.'/'.$metric.'/'.periodFilter($metric, $period)."since=$since&until=$until";
            
            $params[$metric] = $fb->request('GET',$relativeURL);
        }
        return fbBatch($fb,$params);
    }
    return [];
}

function fbBatch($fb, $params)
{//return json_encode($params);
    try {
        $responses = $fb->sendBatchRequest($params);
        return $responses->getBody();}
    catch(Facebook\Exceptions\FacebookResponseException $e) {
          // When Graph returns an error
            return array('error' => 'Facebook Graph returned an error: ' . $e->getMessage());
            exit;} 
    catch(Facebook\Exceptions\FacebookSDKException $e) {
          // When validation fails or other local issues
          return array('error' => 'Facebook SDK returned an error: ' . $e->getMessage());
          exit;}
}

function periodFilter($metric, $period)
{
    if($metric == 'page_fans')return '?';
    else return "$period/?";
}

function checkResult()
{   
    $tempManagedPages = $_SESSION['managedPagesData'];
    if(isset($tempManagedPages) && !empty($tempManagedPages)){
        return $tempManagedPages;
    }
    else{ return 'managedpages error';}
}


/*function computeCTR($data)
{
   $impressionObj =  json_decode($data['page_impressions']->getBody());
   $engagementObj =  json_decode($data['page_consumptions']->getBody());   
    var_dump($engagementObj["values"][0]);return;
   $impression   =  $impressionObj[''];
   $engagement   =  json_decode($data['page_consumptions']->getBody());  
    
   $number     = (($engagement/$impression) * 100);
   $CTR        =  number_format($number, 2, '.', ''). "%";
    echo $CTR;
}*/

?>