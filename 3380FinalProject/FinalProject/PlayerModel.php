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
            AND teams.teamSchool = '$gameIDEscaped'";

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

    public function addPlayer($data) {
      $this->error = '';
      
      
      $firstName = $data['playerFirstName'];
      $lastName = $data['playerLastName'];
      $number = $data['playerNumber'];
      $position = $data['playerPosition'];
      $playerTeamID = $data['playerTeamID'];
      
      if (! $firstName) {
        $this->error = "No title found for task to add. A title is required.";
        return $this->error;      
      }
      
      if (! $) {
        $category = 'uncategorized';
      }
      
      $titleEscaped = $this->mysqli->real_escape_string($title);    
      $categoryEscaped = $this->mysqli->real_escape_string($category);
      $descriptionEscaped = $this->mysqli->real_escape_string($description);
      $userIDEscaped = $this->mysqli->real_escape_string($this->user->userID);

      $sql = "INSERT INTO tasks (title, description, category, addDate, userID) VALUES ('$titleEscaped', '$descriptionEscaped', '$categoryEscaped', NOW(), $userIDEscaped)";
  
      if (! $result = $this->mysqli->query($sql)) {
        $this->error = $this->mysqli->error;
      }
      
      return $this->error;
    }


}
?>
