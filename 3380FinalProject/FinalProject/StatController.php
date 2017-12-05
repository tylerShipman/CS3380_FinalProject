<?php
//Require statements later

//require ('StatViews.php');

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
  }

  public function __destruct(){
  }

  public function run(){

  switch($this->view) {
    case 'players':
      print("Players Page");
      break;
    case 'stats':
      print("Stats page");
    default: //Homepage
      print("Homepage");

  }

}
?>
