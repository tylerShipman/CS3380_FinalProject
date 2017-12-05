<?php

class StatModel{
  private $error = '';
  private $mysqli;
  private $orderBy;
  private $orderDirection;

  public function __construct(){
    session_start();
    $this->mysqli = initDatabaseConnection();
  }

  public function __destruct(){
    if($this->mysqli){
      $this->mysqli->close();
    }
  }

  public function getError(){
    return->$this->error;
  }

  private function initDatabaseConnection(){
    require('db_credentials.php');
    $this->mysqli = new mysqli($servername, $username, $password, $dbname);
    if($this->mysqli->connect_error){
      $this->error = $mysqli->connect_error;
    }
  }

}

 ?>
