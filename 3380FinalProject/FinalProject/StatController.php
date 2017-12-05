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

//Begin contruct funciton
  public function __construct(){
    //Create a new StatModel
    //$this->model = new StatModel();
    //Create a new View
    //$this->views = new StatViews();

    //Set the current view and the action from the $_GET and $_POST arrays.

    //If there is a view in the URL, use it. Else go to the schedule page.
    //$this->view = $_GET['view'] ? $_GET['view'] : 'schedule';

    //Set the action to the current action in post array.
    //$this->action = $_POST['action'];
  }
//End construct function

//Start destruct function
  public function __destruct(){
    //Set the model and the view to null. This will cause them to call their
    //destruct functions.

    //$this->model = NULL;
    //$this->views = NULL;

  }
//End destruct function

//Start run function
  public function run(){
    $html = <<<EOT
    <!DOCTYPE html>
    <html>

<head>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/custom-styles.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="jquery-ui-1.12.1/jquery-ui.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
      <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script>
        $(function () {
            $("#accordion").accordion();
        });
    </script>
</head>

<body>
    <div class="home-bg">
    <div class="navigation">
        <div class="row">
            <div class="col-sm-3"><a href="home.php">Schedule</a></div>
            <div class="col-sm-3"><a href="portfolio.php">Players</a></div>
            <div class="col-sm-3"><a href="contact.php">Stats</a></div>
            <div class="col-sm-3"><a href="logout.php">Logout</a></div>
        </div>
    </div>
        <div class="accordgrid">
    <div id="accordion">
        <h3>Basketball Players</h3>
        <div>
            <p> Please click on the Players tab to see all players, their number, teams, and positions. </p>
        </div>
        <h3>The Schedule</h3>
        <div>
            <p> Please select the Schedule tab to see a list all games. Please select a game to see a roster of the players in this game, and be able to edit their stats. </p>
        </div>
        <h3>Player Stats</h3>
        <div>
            <p>Please select the Stats tab to see a list of all the players and their stats. You can then feel free to edit the stats from this page </p>
        </div>
    </div>
        </div>
        </div>
</body>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src="jquery-ui-1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="form.js"></script>
</html>
EOT;
    print $html;

  }



 ?>
