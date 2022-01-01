<?php

class myConnection{
    protected $servername;
    protected $username;
    protected $password;
    protected $dbName; // database name
    protected $errors;

    public function myConnection(){
        $this->errors = array(NULL,false);
    }
    public function setCredentials($serverNamePar,$userNamePar,$passwordPar,$dbNamePar){
        // Par means parameter
        $this->servername = $serverNamePar;
        $this->username   = $userNamePar;
        $this->password   = $passwordPar;
        $this->dbName     = $dbNamePar;

    }

    public function usemysqli(){
        $newConnection = new mysqli($this->servername,$this->username,$this->password,$this->dbName);
        if ($newConnection->connect_error){
            $this->errors[0] = "connection error";// this is limitted due to not pointing the exact source of connection error
        }else{
            $this->errors[1] = true;
            return $newConnection;
        }
    }

    public function checkCon(){
        if($this->errors[1] == true){
            return true;
        }else{
            return false;
        }
    }

}

// $con = new myConnection();
// $con->setCredentials("localhost","bbx","password","sample");
// if($con->checkCon()){
//  echo "connected successfully";
// }else{
//     echo "failed to connect!";
// }


$conn = new mysqli('localhost','bbx','password','sample');
if ($conn->connect_error) die($conn->connect_error);


?>