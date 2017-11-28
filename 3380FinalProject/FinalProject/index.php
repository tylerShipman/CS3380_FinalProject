<!-- Luke Strege
	14206751
    12/6/16
	-->

<?php
	// Here we are using sessions to propagate the login
	// http://php.net/manual/en/book.session.php
	
	// http://php.net/manual/en/function.session-start.php
	if(!session_start()) {
		// If the session couldn't start, present an error
		header("Location: error.php");
		exit;
	}
	
	
	// Check to see if the user has already logged in
	$loggedIn = empty($_SESSION['loggedin']) ? false : $_SESSION['loggedin'];
	
	if ($loggedIn) {
		header("Location: home.php");
		exit;
	}
	
	$action = empty($_POST['action']) ? '' : $_POST['action'];
	
	if ($action == 'do_login') {
		handle_login();
	} else {
		login_form();
	}
	
	function handle_login() {
		$username = empty($_POST['username']) ? '' : $_POST['username'];
		$password = empty($_POST['password']) ? '' : $_POST['password'];
	
		if ($username == "test" && $password == "pass") {
			// Instead of setting a cookie, we'll set a key/value pair in $_SESSION
			$_SESSION['loggedin'] = $username;
			header("Location: home.php");
			exit;
		} else {
			$error = 'Error: Incorrect username or password';
			require "login_form.php";
		}		
	}
	
	function login_form() {
		$username = "";
		$error = "";
		require "login_form.php";
	}
	
	
?>