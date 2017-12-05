<?php

class StatModel{
  private $error = '';
  private $mysqli;
  private $orderBy;
  private $orderDirection;

  public function __construct(){
    session_start();
    $this->initDatabaseConnection();
    $this->restoreOrdering();
  }

  public function __destruct(){
    if($this->mysqli){
      $this->mysqli->close();
    }
  }

  public function getError(){
    return $this->error;
  }

  private function initDatabaseConnection(){
    require('db_credentials.php');
    $this->mysqli = new mysqli($servername, $username, $password, $dbname);
    if($this->mysqli->connect_error){
      $this->error = $mysqli->connect_error;
    }
  }

  private function restoreOrdering(){
    $this->orderBy = $_SESSION['orderby'] ? $_SESSION['orderby'] : $this->orderBy;
    $this->orderDirection = $_SESSION['orderdirection'] ? $_SESSION['orderdirection'] : $this->orderDirection;

    $_SESSION['orderby'] = $this->orderBy;
    $_SESSION['orderdirection'] = $this->orderDirection;
  }

  public function toggleOrder($orderBy) {
    if ($this->orderBy == $orderBy)	{
      if ($this->orderDirection == 'asc') {
        $this->orderDirection = 'desc';
      } else {
        $this->orderDirection = 'asc';
      }
    } else {
      $this->orderDirection = 'asc';
    }
    $this->orderBy = $orderBy;

    $_SESSION['orderby'] = $this->orderBy;
    $_SESSION['orderdirection'] = $this->orderDirection;
  }

  //Returns the stats for a given game id
  public function getStatsGame($id){
    $this->error = '';
    $stats = null;

    //Are we connected to the database?
    if(!$this->mysqli){
      $this->error = "No Connection to database.";
      return array($stats, $this->error);
    }

    //Were we given an ID?
    if(!$id){
      $this->error = "No game id specifed.";
      return array($stats, $this->error);

    }

    $gameIDEscaped = $this->mysqli->real_escape_string($id);

    $sql = "SELECT teams.teamSchool , players.playerNumber, players.playerLastName, players.playerFirstName, stats.fouls, stats.freethrow_makes, stats.freethrow_attempts, stats.freethrow_makes, stats.freethrow_attempts, stats.stat_entry_id FROM teams, games, stats, players WHERE games.game_id = '$gameIDEscaped' AND players.player_id = stats.player_id AND players.playerTeamID = teams.team_id";

    print($sql);
  }

}

 ?>
