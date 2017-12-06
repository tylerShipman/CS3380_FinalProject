<?php


    if(!session_start()){
        header("Location: home.php");
        exit;
    }
    
    if(!isset($_SESSION['loggedin'])){
        header("Location: index2.php");
    }
?>

<html>

    <head>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/custom-styles.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" type="text/css" href="jquery-ui-1.12.1/jquery-ui.css">
        <link rel="stylesheet" type="text/css" href="source/jquery.fancybox.css">


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
        <div class="portfolio-bg">
        <div class="navigation">
            <div class="row">
                <div class="col-sm-4"><a href="home.php">Schedule</a></div>
                <div class="col-sm-4"><a href="portfolio.php">Stats</a></div>
                <div class="col-sm-4"><a href="logout.php">Logout</a></div>
            </div>
        </div>
            <h1>Stats by Game</h1>
             <div class="tables">
                <?php
                
                 require ('StatModel.php');
                // private $model;
                 $model = new StatModel();
                 
                list($stats, $error) = $model->getStatsGameFull(1);
                 
                 echo "<table border ='1' style='border-collapse: collapse'>";
                    echo "<class = game> Missouri VS Texas A&M";
                    echo "<th> School </th>";
                    echo "<th> Player </th>";
                    echo "<th> Number </th>";
                
                 foreach ($stats as $stat)
                 {
                     $school = $stat['School'];
                     $playerF = $stat['First'];
                     $playerL = $stat['Last'];
                     $number = $stat['#'];
                     
                     echo "<tr>";
                     echo "<td>$school</td>";
                     echo "<td>$playerF $playerL</td>";
                     echo "<td> $number </td>";
                    echo "</tr>";
                }
                 echo "</table><br>";
                
                 ?>
            </div>
           
        </div>
    </body>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src="jquery-ui-1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="form.js"></script>
    <script type="text/javascript" src="portfolio.js"></script>
    <script type="text/javascript" src="source/jquery.fancybox.js"></script>
    
</html>