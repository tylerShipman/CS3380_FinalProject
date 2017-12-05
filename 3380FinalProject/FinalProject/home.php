<<<<<<< HEAD
<!-- Luke Strege
	14206751
    12/6/16
	-->

<?php
    
    if(!session_start()){
        header("Location: home.php");
        exit;
    }
    
    if(!isset($_SESSION['loggedin'])){
        header("Location: index.php");
        exit;
    }
?>

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
=======
<!-- 
    run() needs to report the ScheduleView()
-->

<?php
    
    if(!session_start()){
        header("Location: home.php");
        exit;
    }
    
    if(!isset($_SESSION['loggedin'])){
        header("Location: index.php");
        exit;
    }
?>

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
    <style>
        h1{
            text-align: center;
            color: white;
            margin: 10px;
            font-size: 30px;
            font-family: fantasy;
        }
    </style>
    
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
        
        <h1>Basketball Schedule</h1>
        
        <div class="accordgrid">
    <div id="accordion">
        <h3>Missouri VS Texas AM</h3>
        <div>
            <p> TABLE </p>
        </div>
        <h3>Missouri VS Utah </h3>
        <div>
            <p> TABLE </p>
        </div>
        <h3>Missouri VS </h3>
        <div>
            <p> TABLE </p>
        </div>
        <h3>Missouri VS </h3>
        <div>
            <p> TABLE</p>
        </div>
    </div>
        </div>
        </div>
</body>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src="jquery-ui-1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="form.js"></script>
>>>>>>> origin/Harrison_L
</html>