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
  switch($this->view) {
    case 'players':
      print("Players Page");
      break;
    case 'stats':
      print("Stats page");
      break;
    default: //Homepage
      print("Homepage");
    }
  }

}
?>
