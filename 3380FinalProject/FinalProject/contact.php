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
    }
?>

<html>

<head>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/custom-styles.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="jquery-ui-1.12.1/jquery-ui.css"> 
    
    <style>
        h1{
            text-align: center;
            color: black;
            margin: 10px;
            font-size: 30px;
            font-family: fantasy;
        }
    </style>
</head>

<body class="contact-bg">
    <div>
        <div class="navigation">
            <div class="row">
                <div class="col-sm-4"><a href="home.php">Schedule</a></div>
                <div class="col-sm-4"><a href="portfolio.php">Stats</a></div>
                <div class="col-sm-4"><a href="logout.php">Logout</a></div>
            </div>
        </div>

        <h1>Player Stats</h1>
    </div>
</body>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="jquery-ui-1.12.1/jquery-ui.js"></script>
<script type="text/javascript" src="form.js"></script>

</html>