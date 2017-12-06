<?php
//Require statements later

require ('StatModel.php');

//Controller class

class StatController{
  private $model;
  private $views;

  private $orderby = '';
  private $view = '';
  private $action = '';
  private $message = '';
  private $data = array();

  public function __construct(){
    $this->model = new StatModel();
  }

  public function __destruct(){
  }

  public function run(){
    if ($error = $this->model->getError()) {
      print $error;
      exit;
    }

    list($stats, $error) = $this->model->getStatsGameFull(1);
          if ($error) {
            $this->message = $error;
          }
          print count($stats);
          foreach($stats as $stat){
          print($stat['teamSchool']);
          print($stat['playerNumber']);
          print($stat['playerLastName']);
          print($stat['playerFirstName']);
          print($stat['fouls']);
          print($stat['freethrow_makes']);
          print($stat['freethrow_attempts']);
          print($stat['stat_entry_id']);
        }


  }

}
?>
