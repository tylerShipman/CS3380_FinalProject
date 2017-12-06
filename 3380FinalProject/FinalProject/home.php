<?php
    
    if(!session_start()){
        header("Location: home.php");
        exit;
    }
    
    if(!isset($_SESSION['loggedin'])){
        header("Location: index2.php");
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
        h3{
            color: white;
        }
    </style>
    
</head>

<body>
    <div class="home-bg">
        <div class="navigation">
            <div class="row">
              <div class="col-sm-4"><a href="home.php">Schedule</a></div>
                <div class="col-sm-4"><a href="portfolio.php">Stats</a></div>
                <div class="col-sm-4"><a href="logout.php">Logout</a></div>
            </div>
        </div>

            <h1>Team Editor</h1>
        <table align="left" bgcolor=#FFFFF>
            <h3>Utah Utes</h3>
                <div class="tables">
                <?php
                
                 require ('StatModel.php');
                // private $model;
                 $model = new StatModel();
                 
                list($stats, $error) = $model->getPlayerList('Utah Utes');
                 
                 echo "<table border ='1' style='border-collapse: collapse'>";  
                    echo "<th> Player</th>";
                    echo "<th> Number</th>";
                    echo "<th> Position</th>";
                    
                    
                 foreach ($stats as $stat)
                 {
                     $playerF = $stat['playerFirstName'];
                     $playerL = $stat['playerLastName'];
                     $number = $stat['playerNumber'];
                     $position = $stat['playerPosition'];
                     
                     echo "<tr>";
                     echo "<td>$playerF $playerL</td>";
                     echo "<td> $number</td>";
                     echo "<td> $position</td>";
                     echo "</tr>";
                    }
                 ?>
                </div>
            </table>
        <table align="center" bgcolor=#FFFFF>
                <div class="tables2">
                    <h1>Missouri Tigers</h1>
                <?php
                
                 require ('StatModel.php');
                // private $model;
                 $model = new StatModel();
                 
                list($stats, $error) = $model->getPlayerList('Missouri Tigers');
                 
                 echo "<table border ='1' style='border-collapse: collapse'>";  
                    echo "<th> Player</th>";
                    echo "<th> Number</th>";
                    echo "<th> Position</th>";
                    
                 foreach ($stats as $stat)
                 {
                     $playerF = $stat['playerFirstName'];
                     $playerL = $stat['playerLastName'];
                     $number = $stat['playerNumber'];
                     $position = $stat['playerPosition'];
                     
                     echo "<tr>";
                     echo "<td>$playerF $playerL</td>";
                     echo "<td> $number</td>";
                     echo "<td> $position</td>";
                    echo "</tr>";
                 }
                 ?>
                </div>
            </table>
        <table align="right" bgcolor=#FFFFF>
                 <div class="tables3">
                    <h1>Texas A&amp;M Aggies</h1>
                <?php
                
                 require ('StatModel.php');
                // private $model;
                 $model = new StatModel();
                 
                list($stats, $error) = $model->getPlayerList('Texas A&M');
                 
                 echo "<table border ='1' style='border-collapse: collapse'>";  
                    echo "<th> Player</th>";
                    echo "<th> Number</th>";
                    echo "<th> Position</th>";
                    
                    
                 foreach ($stats as $stat)
                 {
                     $playerF = $stat['playerFirstName'];
                     $playerL = $stat['playerLastName'];
                     $number = $stat['playerNumber'];
                     $position = $stat['playerPosition'];
                     
                     echo "<tr>";
                     echo "<td>$playerF $playerL</td>";
                     echo "<td> $number</td>";
                     echo "<td> $position</td>";
                    echo "</tr>";
                 }
                 ?>
                </div>
    </table>
            </div>
</body>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src="jquery-ui-1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="form.js"></script>
</html>