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


    list($players, $error) = $this->model->getPlayerList('Texas A&M');
     if ($error) {
            $this->message = $error;
          }
          print count($players);
          echo '<br/>';
          foreach($players as $player){
            print($player['player_id']);
            echo '<br/>';
            print($player['id']);
            echo '<br/>';
            print($player['playerFirstName']);
            echo '<br/>';
            print($player['playerLastName']);
            echo '<br/>';
            print($player['playerNumber']);
            echo '<br/>';
            print($player['playerPosition']);
            echo '<br/>';
            print($player['playerTeamID']);
            echo '<br/>';
            print($player['team_id']);
            echo '<br/>';
            print($player['teamSchool']);
            echo '<br/>';
            print($player['teamCity']);
            echo '<br/>';
            print($player['teamState']);


            echo '<br/>';
            echo '<br/>';
          }




  }


}
?>
