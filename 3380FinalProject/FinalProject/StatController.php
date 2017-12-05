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
    print("Constructed");

  }

  public function __destruct(){
    print("Destructed");
  }

  public function run(){
    print("Hello");
  }


}
 ?>
