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
  //This only returns 1 player
  // public function getStatsGame($id){
  //   $this->error = '';
  //   $stats = null;
  //   //Are we connected to the database?
  //   if(!$this->mysqli){
  //     $this->error = "No Connection to database.";
  //     return array($stats, $this->error);
  //   }
  //   //Were we given an ID?
  //   if(!$id){
  //     $this->error = "No game id specifed.";
  //     return array($stats, $this->error);
  //   }
  //   $gameIDEscaped = $this->mysqli->real_escape_string($id);
  //   $sql = "SELECT teams.teamSchool , players.playerNumber, players.playerLastName, players.playerFirstName, stats.fouls, stats.freethrow_makes, stats.freethrow_attempts, stats.freethrow_makes, stats.freethrow_attempts, stats.stat_entry_id FROM teams, games, stats, players WHERE games.game_id = '$gameIDEscaped' AND players.player_id = stats.player_id AND players.playerTeamID = teams.team_id";
  //   //print($sql);
  //   if($result = $this->mysqli->query($sql)) {
  //     if ($result->num_rows > 0){
  //         $stats = $result->fetch_assoc();
  //     }
  //       $result->close();
  //   } else{ 
  //       $this->error = $this->mysqli->error;
  //   }
  //   return array($stats, $this->error);    
  // }
  //returns all stats for each game
  public function getStatsGameFull($id){
    $this->error = '';
    $stats = array();
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
    $sql = "SELECT teams.teamSchool AS 'School', players.playerNumber AS '#', players.playerLastName AS 'Last', players.playerFirstName AS 'First', stats.fouls AS 'Fouls', stats.freethrow_makes AS'Freethrow Makes', stats.freethrow_attempts AS 'Freethrow Misses', stats.threepoint_makes AS '3 Point Makes', stats.threepoint_attempts AS '3 Point Misses', IFNULL( (
      stats.freethrow_makes / ( stats.freethrow_makes + stats.freethrow_attempts ) *100 ) , 0
      ) AS 'Freethrow %', stats.threepoint_makes AS '3 Point Makes', stats.threepoint_attempts AS '3 Point Misses', IFNULL( (
      stats.threepoint_makes / ( stats.threepoint_makes + stats.threepoint_attempts ) *100 ) , 0
      ) AS '3 Point %', stats.stat_entry_id FROM teams, games, stats, players WHERE games.game_id = '$gameIDEscaped' AND players.player_id = stats.player_id AND players.playerTeamID = teams.team_id";
    //print($sql);
    if($result = $this->mysqli->query($sql)) {
      if ($result->num_rows > 0){
          while($row = $result->fetch_assoc()){
              array_push($stats, $row);
          }
      }
        $result->close();
    } else{ 
        $this->error = $this->mysqli->error;
    }
    return array($stats, $this->error);    
  }
  public function getGameList(){
    $this->error = '';
    $games = array();
    //Are we connected to the database?
    if(!$this->mysqli){
      $this->error = "No Connection to database.";
      return array($games, $this->error);
    }
    $sql = "SELECT games.game_id, GROUP_CONCAT( teams.teamSchool
SEPARATOR  ' vs. ' ) AS 'Game' , games.gameTime AS 'Game Time'
FROM teams, games
WHERE (
games.teamIDHome = teams.team_id
OR games.teamIDAway = teams.team_id
)
GROUP BY games.game_id
ORDER BY games.gameTime;";
    //print($sql);
    if($result = $this->mysqli->query($sql)) {
      if ($result->num_rows > 0){
          while($row = $result->fetch_assoc()){
              array_push($games, $row);
          }
      }
        $result->close();
    } else{ 
        $this->error = $this->mysqli->error;
    }
    return array($games, $this->error);    
  }
  public function getPlayerList($id){
    $this->error = '';
    $players = array();
    //Are we connected to the database?
    if(!$this->mysqli){
      $this->error = "No Connection to database.";
      return array($players, $this->error);
    }
    if(!$id){
      $this->error = "No game id specifed.";
      return array($players, $this->error);
    }
    $gameIDEscaped = $this->mysqli->real_escape_string($id);
    $sql = "SELECT * 
FROM players, teams
WHERE players.playerTeamID = teams.team_id
AND teams.team_id = '$gameIDEscaped'";
    //print($sql);
    if($result = $this->mysqli->query($sql)) {
      if ($result->num_rows > 0){
          while($row = $result->fetch_assoc()){
              array_push($players, $row);
          }
      }
        $result->close();
    } else{ 
        $this->error = $this->mysqli->error;
    }
    return array($players, $this->error);    
  }
//add player to a game
public function addPlayerToGame($data) {
      $this->error = '';
      
      
      $game_id=$data['game_id'];
      $player_id=$data['player_id'];
      
      if (! $game_id) {
        $this->error = "No game_id found for task to add. A game_id is required.";
        return $this->error;      
      }
      
      if (! $player_id) {
        $category = '';
      }
      
      $game_idEscaped = $this->mysqli->real_escape_string($game_id);    
      $player_idEscaped = $this->mysqli->real_escape_string($player_id);
      $sql = "INSERT INTO stats(game_id, player_id) VALUES ('$game_idEscaped', '$player_idEscaped')";
  
      if (! $result = $this->mysqli->query($sql)) {
        $this->error = $this->mysqli->error;
      }
      
      return $this->error;
    }
//This needs editing
    public function updatePlayerStats($data) {
      $this->error = '';
      
      
      if (! $this->mysqli) {
        $this->error = "No connection to database. Unable to update task.";
        return $this->error;
      }
      
      $id = $data['id'];
      if (! $id) {
        $this->error = "No id specified for task to update.";
        return $this->error;      
      }
      
      $title = $data['title'];
      if (! $title) {
        $this->error = "No title found for task to update. A title is required.";
        return $this->error;      
      }   
      
      $description = $data['description'];
      $category = $data['category'];
      
      $idEscaped = $this->mysqli->real_escape_string($id);
      $titleEscaped = $this->mysqli->real_escape_string($title);
      $descriptionEscaped = $this->mysqli->real_escape_string($description);
      $categoryEscaped = $this->mysqli->real_escape_string($category);
      $userIDEscaped = $this->mysqli->real_escape_string($this->user->userID);
      $sql = "UPDATE tasks SET title='$titleEscaped', description='$descriptionEscaped', category='$categoryEscaped' WHERE userID = $userIDEscaped AND id = $idEscaped";
      if (! $result = $this->mysqli->query($sql) ) {
        $this->error = $this->mysqli->error;
      } 
      
      return $this->error;
    }
}
?>