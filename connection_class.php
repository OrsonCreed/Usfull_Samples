<?php

class myConnection{
    protected $servername;
    protected $username;
    protected $password;
    protected $dbName; // database name
    protected $errors;
    protected $connection_proof;
    protected $charset;

    public function myConnection(){
        $this->errors           = array();
        $this->connection_proof = false;
        $this->charset          = "utf8mbb4";
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
            $this->errors[0] = "connection error";
            // this is limitted due to not pointing the exact source of connection error
        }else{
            $this->connection_proof = true;
            return $newConnection;
        }
    }

    public  function usePDO(){
      try {
            $DataSourceName ="mysql:host=".$this->servername.";dbname=".$this->dbName.";charset:".$this->charset;
          $pdo = new PDO($DataSourceName,$this->username,$this->password);
          $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
          $this->connection_proof = true;
          return $pdo;
      } catch (PDOException $th) {
        $this->connection_proof = false;
          echo "connection failed!".$th->getMessage();
      }
    }

    public function checkCon(){
        if($this->connection_proof == true){
            return true;
        }else{
            return false;
        }
    }



}

$con = new myConnection();
$con->setCredentials("localhost","bbx","password","sample");
$con->usePDO();
if($con->checkCon()){
 echo "connected successfully";
}else{
    echo "failed to connect!";
}

?>