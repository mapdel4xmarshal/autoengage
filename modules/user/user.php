<?php
 class User {
    private $dbHost     = "localhost";
    private $dbUsername = "root";
    private $dbPassword = "";
    private $dbName     = "autoengage";
    private $userTbl    = 'users';
    
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
    
    function checkUser($userData = array()){ 
        if(!empty($userData)){
            // Check whether user data already exists in database
            $prevQuery = "SELECT * FROM ".$this->userTbl." WHERE facebookID = '".$userData['facebookID']."' AND emailAddress = '".$userData['emailAddress']."'";
            $prevResult = $this->db->query($prevQuery);
            $this->doError($prevResult, "select");
            
            if($prevResult->num_rows > 0){
                // Update user data if already exists
                $query = "UPDATE ".$this->userTbl." SET firstName = '".$userData['firstName']."', lastName = '".$userData['lastName']."', emailAddress = '".$userData['emailAddress']."', gender = '".$userData['gender']."', locale = '".$userData['locale']."', picture = '".$userData['picture']."', location = '".$userData['location']."', link = '".$userData['link']."', token = '".$_SESSION['fb_access_token']."', modified = '".date("Y-m-d H:i:s")."' WHERE facebookID = '".$userData['facebookID']."'";
                $update = $this->db->query($query);
                $this->doError($update, "update");
            }else{
                // Insert user data
                $query = "INSERT INTO ".$this->userTbl." SET facebookID = '".$userData['facebookID']."', location = '".$userData['location']."', firstName = '".$userData['firstName']."', lastName = '".$userData['lastName']."', emailAddress = '".$userData['emailAddress']."', gender = '".$userData['gender']."', locale = '".$userData['locale']."', picture = '".$userData['picture']."', link = '".$userData['link']."', created = '".date("Y-m-d H:i:s")."', token = '".$_SESSION['fb_access_token']."', modified = '".date("Y-m-d H:i:s")."'";
               
                $insert = $this->db->query($query);
                $this->doError($insert, "insert");
            }
            
            // Get user data from the database
            $result = $this->db->query($prevQuery);
            $this->doError($result, "select");
            $userData = $result->fetch_assoc();
        }
        
        // Return user data
        return $userData;
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