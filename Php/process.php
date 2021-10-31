<php 
	// get values from form in login.php
	$username = $ POST['user'];
	$password = $ POST['pass'];

	// prevent SQL injection
	$username = stripclashes($username);
	$password = stripclashes($password);
	$username = mysql_real_escape_string($username);
	$password = mysql_real_escape_string($password);

	// connect to the server and select database
	$result = mysql_query("SELECT * FROM users WHERE username = '$username' AND password = '$password'")
			or die("Failed to query database = mysql_error());
	$row = mysql_fetch_array($result);
	if ($row['username'] == $username && $row['password'] == $password ){
		echo "Login success!!  Welcome " $row['username'];
	} else {
		echo "Failed to login!";
?>