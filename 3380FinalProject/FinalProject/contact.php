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
    <link rel="stylesheet" type="text/css" href="jquery-ui-1.12.1/jquery-ui.css"> </head>

<body>
    <div class="contact-bg">
    <div class="navigation">
        <div class="row">
            <div class="col-sm-3"><a href="home.php">Schedule</a></div>
            <div class="col-sm-3"><a href="portfolio.php">Players</a></div>
            <div class="col-sm-3"><a href="contact.php">Stats</a></div>
            <div class="col-sm-3"><a href="logout.php">Logout</a></div>
        </div>
    </div>
    <div class="row">
        <div class="contact">
            <div class="col-sm-6 col-sm-offset-3">
                <h1>Contact Me</h1></div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 col-sm-offset-4">
            <!-- <form id="form">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>
                            <div class="form-text">Name</div>
                            <input type="text" class="form-control" id="name"> </label>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>
                            <div class="form-text">Phone Number</div>
                            <input type="text" class="form-control" id="contact"> </label>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>
                            <div class="form-text">Email Address</div>
                            <input type="text" class="form-control" id="email"> </label>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>
                            <div class="form-text">Reason For Contact (Optional)</div>
                            <textarea class="form-control" placeholder="Enter Message Here..." id="message"></textarea>
                        </label>
                    </div>
                </div>
                <input type="button" class="button" id="submit" value="Get Help" />
                <p id="returnmessage"></p>
            </form> -->
            <form id="form">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>
                            <div class="form-text">Name</div>
                            <input type="text" id="name"> </label>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>
                            <div class="form-text">Phone Number</div>
                            <input type="text" id="contact"> </label>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>
                            <div class="form-text">Email Address</div>
                            <input type="text" id="email"> </label>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>
                            <div class="form-text">Reason For Contact (Optional)</div>
                            <textarea placeholder="Enter Message Here..." id="message"></textarea>
                        </label>
                    </div>
                </div>
                <input type="button" class="button" id="submit" value="Get Help" />
                <p id="returnmessage"></p>
            </form>
        </div>
    </div>
        </div>
</body>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="jquery-ui-1.12.1/jquery-ui.js"></script>
<script type="text/javascript" src="form.js"></script>

</html>