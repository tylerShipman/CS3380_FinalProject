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
          echo '<br/>';
          foreach($stats as $stat){
          print($stat['School']);
          echo '<br/>';
          print($stat['#']);
          echo '<br/>';
          print($stat['Last']);
          echo '<br/>';
          print($stat['First']);
          echo '<br/>';
          print($stat['Fouls']);
          echo '<br/>';
          print($stat['Freethrow Makes']);
          echo '<br/>';
          print($stat['Freethrow Misses']);
          echo '<br/>';
          print($stat['3 Point Makes']);
          echo '<br/>';
          print($stat['3 Point Misses']);
          echo '<br/>';
          print($stat['Freethrow %']);
          echo '<br/>';
          print($stat['3 Point %']);
          echo '<br/>';
          print($stat['stat_entry_id']);
          echo '<br/>';
          echo '<br/>';
        }
    list($games, $error) = $this->model->getGameList();
     if ($error) {
            $this->message = $error;
          }
          print count($games);
          echo '<br/>';
          foreach($games as $game){
            print($game['game_id']);
            print($game['Game']);
            print($game['Game Time']);
            echo '<br/>';
            echo '<br/>';
          }
    list($players, $error) = $this->model->getPlayerList(2);
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