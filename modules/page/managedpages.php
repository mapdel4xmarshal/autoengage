<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
 class ManagedPages {
    private $dbHost     = "localhost";
    private $dbUsername = "root";
    private $dbPassword = "";
    private $dbName     = "autoengage";
    private $tableName  = 'managedpages';
    
    function __construct(){
        if(!isset($this->db)){
            // Connect to the database
            $conn = new mysqli($this->dbHost, $this->dbUsername, $this->dbPassword, $this->dbName);
            if($conn->connect_error){
                die("Failed to connect with MySQL: " . $conn->connect_error);
            }else{
                $this->db = $conn;
            }
        }
    }   
  
    
    function checkManagedPages($managedPagesData){
        if(!empty($managedPagesData)){  
        
            foreach($_SESSION['managedPagesData'] as $pageData){
                // Check whether Pages data already exists in database
                $prevQuery = "SELECT * FROM ".$this->tableName." mp INNER JOIN pages p ON mp.facebookPageID = p.facebookPageID WHERE mp.facebookID = '".$_SESSION['userData']['facebookID']."' AND p.facebookPageID = '".$pageData['id']."'";
                $prevResult = $this->db->query($prevQuery);
                $this->doError($prevResult, "select ". $this->tableName);

                if($prevResult->num_rows > 0){
                    // Update Managed Pages data if already exists
                    $query = "UPDATE ".$this->tableName." SET permissions = '".json_encode($pageData['perms'])."', access_token = '".$pageData['access_token']."', modified = '".date("Y-m-d H:i:s")."' WHERE facebookID = '".$_SESSION['userData']['facebookID']."' AND facebookPageID = '".$pageData['id']."'";

                    $update = $this->db->query($query);
                    $this->doError($update, "update ".$this->tableName);

                     // Update Pages data if already exists
                    $query = "UPDATE pages SET pageName = '".addslashes($pageData['name'])."', category = '".$pageData['category']."' WHERE 	facebookPageID	 = '".$pageData['id']."'";

                    $update = $this->db->query($query);
                    $this->doError($update, "update pages");                

                }else{
                    
                    $query = "SELECT * FROM pages WHERE facebookPageID = '".$pageData['id']."'";
                    $result = $this->db->query($query);
                    $this->doError($prevResult, "select");
                    
                    if($result->num_rows <= 0){
                        // Insert Pages data                
                         $query = "INSERT INTO pages SET pageName = '".addslashes($pageData['name'])."', category = '".$pageData['category']."', facebookPageID	 = '".$pageData['id']."'";
                        $insert = $this->db->query($query);
                        $this->doError($insert, "insert pages");    
                    }
                    
                    
                    $query = "SELECT * FROM managedPages WHERE facebookPageID = '".$pageData['id']."' AND facebookID = '".$_SESSION['userData']['facebookID']."'";
                    $result = $this->db->query($query);
                    $this->doError($prevResult, "select managedPages");
                    
                    if($result->num_rows <= 0){          
                        // Insert ManagedPages data                
                        $query = "INSERT INTO ".$this->tableName." SET permissions = '".json_encode($pageData['perms'])."', access_token = '".$pageData['access_token']."', modified = '".date("Y-m-d H:i:s")."', facebookID = '".$_SESSION['userData']['facebookID']."', facebookPageID = '".$pageData['id']."', created = '".date("Y-m-d H:i:s")."'";

                        $insert = $this->db->query($query);
                        $this->doError($insert, "insert " . $this->tableName);  
                    }
                }
                
            }
                    
            // Get Pages data from the database
            $prevQuery = "SELECT mp.facebookID, mp.facebookPageID, mp.permissions, p.pageName, p.category FROM ".$this->tableName." mp INNER JOIN pages p ON mp.facebookPageID = p.facebookPageID WHERE mp.facebookID = '".$_SESSION['userData']['facebookID']."'";
            $result = $this->db->query($prevQuery);
            $this->doError($result, "select pages innerJoin managed pages");
            
            if($result){
                
                $managedPagesData = [];
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        array_push($managedPagesData, $row);
                    }
                }
            }
            // Return user data
            return $managedPagesData;
        }
        
    }
     
    function doError($resultInstance, $sqlAction)
    {
        if(!$resultInstance){
            return $this->db->error;
            die("Failed to ". $sqlAction ." to MySQL: " . $this->db->error);
        }
    }
}
?>