<?php
/*
Original Author: Abdullah Arif
Fork Author: Jeffery Schefke
License: GNU General Public License
phproxyimproved.com
*/

//Get authentication details
require_once 'include/settings.php';
require_once 'include/syssettings.php';
require_once 'include/update.php';
require 'include/current.php';

//Logout and set cookies 
if($_GET["logout"]=="yes" || $username=="") {
	session_start();
	session_destroy();
	header("Location: $_SERVER[PHP_SELF]");
}

//Start Session
session_start();

if (isset($_SESSION['cookie'])) {
	if ($_SESSION['cookie'] == $_SESSION['authentication'] && time() < $_SESSION['expire']) {
		$_SESSION['page'] = $_GET['page'];
?>
<!-- Header -->	
<head>
<title>Admin Module</title>
<!--[if !IE]> -->
<link rel="stylesheet" type="text/css" href="include/styleadmin.css">
<!-- <![endif]-->
<!--[if IE]>
<link rel="stylesheet" type="text/css" href="include/styleadminie.css">
<![endif]-->
</head>
<body>
<!-- Navigation -->	
<div id="navigation">
	<ul>
		<li><a href="?page=">System</a></li>
		<li><a href="?page=config">Config</a></li>
		<li><a href="?page=user">User</a></li>
		<li><a href="?page=theme">Theme</a></li>
		<li><a href="?page=google">Google</a></li>
		<li><a href="?page=updates">Updates</a></li>
		<li><a href="http://www.proxyhelp.org/mybb">Support</a></li>
		<li><?php include 'include/settings.php';	echo '<a href="?logout=yes">Logout [' . $username . ']</a>' ?></li>
	</ul>
</div>
<!-- Admin Module Content -->
<div id="container">
<h1>Admin Module</h1>
<hr>
<?php
echo <<<OUT
<form action="post.php" method="post">
OUT;
if (isset($_GET['error'])) {
	if ($_GET['error'] == "success") {
		echo '<div id="error">Settings Saved!</div>';
	} elseif ($_GET['error'] == "fail") {
		echo '<div id="error">Keys did not match and settings were not saved! Script protects it\'s post inputs with keys.</div>';
	}elseif ($_GET['error'] == "password") {
		echo '<div id="error">Password\'s didn\'t match or password has not changed.</div>';
	}
}
$page = $_REQUEST["page"];
if($page=='') {
$sysload = sys_getloadavg();
$sysload0 = $sysload[0];
$phpverson = phpversion();
$betalable = '';
if($isbeta=='true') {
	$betalable = 'Beta';
}

$SERVERHTTPHOST = $_SERVER['HTTP_HOST'];
if ($phpverson >= '5.0.0') {
	$req = '<span id="green">Meets the recomended PHP requirements</span>';
} else {
	$req = '<span id="red">Meets recomended PHP requirements</span>';
}

$settings = 'include/settings.php';
$chmod = substr(decoct(fileperms($settings)),2);
if (is_writable($settings) && is_readable($settings)) {
    $write = '<b>'.$chmod.'</b> (<span id="green">Readable and/or writable settings file</span>)';
} else {
    $write = '<b>'.$chmod.'</b> (<span id="red">Un-readable and/or writeable settings file</span>)';
}

if ($username == 'username' || $password == '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8') {
	$security = '<b>Insecure</b> (<span id="red">Default username and/or password found</span>)';
} else {
	$security = '<b>Secure</b>';
}

//To Do: Implement multi-site manager
//NEVER give this API key to anyone
$devapi = base64_encode($randomkey.'----'.$username.'----'.$password.'----'.$SERVERHTTPHOST.'---'.$_version.'-----'.$rev);
echo <<<OUT
<br>
<h2>PHProxyImproved for http://$SERVERHTTPHOST</h2>
<table cellspacing="0" cellpadding="0" border="0">
	<tbody>
		<tr>
			<td align="right" width="120">
				PHP Version:
			</td>
			<td>
				<b>$phpverson</b> ($req)
			</td>
		</tr>
		<tr>
			<td align="right" width="120">
				Server Load:
			</td>
			<td>
				<b>$sysload0</b>
			</td>
		</tr>
		<tr>
			<td align="right" width="120">
				Proxy Version:
			</td>
			<td>
				 <b>$_version $betalable</b>
			</td>
		</tr>
		<tr>
			<td align="right" width="120">
				CHMOD:
			</td>
			<td>
				$write
			</td>
		</tr>
		<tr>
			<td align="right" width="120">
				Security:
			</td>
			<td>
				$security
			</td>
		</tr>

		<tr>
			<td align="right" width="120">
				Admin Notes:
			</td>
			<td>
				<textarea id="notes" name="notes" rows="8">$notes</textarea>
			</td>
		</tr>
		<tr>
			<td align="right" width="120">
				API Key:
			</td>
			<td>
				<textarea id="random" name="random" rows="8" readonly>$devapi</textarea>
			</td>
		</tr>
		<tr>
			<td align="right" colspan="2">
				<input type="hidden" name="page" value="{$_SESSION['page']}" /><input type="hidden" name="filesave" value="$randomkey" /><input id="submit" type="submit" />
			</td>
		</tr>
	</tbody>
</table>
OUT;
};
if($page=='config') {
echo <<<OUT
$urgentaleart
<br>
<h2>Config</h2>
<table cellspacing="0" cellpadding="0" border="0">
	<tbody>
		<tr>
			<td align="right" width="120">
				File Size:
			</td>
			<td>
				$max_file_sizecheck
			</td>
		</tr>
		<tr>
			<td align="right" width="120">
				Allow Hotlinking:
			</td>
			<td>
				<input type="hidden" name="allowhotlinking" value="0" /><input type="checkbox" name="allowhotlinking" value="1" $allow_hotlinkingcheck />
			</td>
		</tr>
		<tr>
			<td align="right" width="120">
				Upon Hotlinking:
			</td>
			<td>
				$upon_hotlinkcheck
			</td>
		</tr>
		<tr>
			<td align="right" width="120">
				Compress Output:
			</td>
			<td>
				<input type="hidden" name="compressoutput" value="0" /> <input type="checkbox" name="compressoutput" value="1" $compress_outputcheck />
			</td>
		</tr>
		<tr>
			<td align="right" width="120">
				Logging:
			</td>
			<td>
				<input type="hidden" name="loging" value="0" /> <input type="checkbox" name="loging" value="1" $log_modecheck />
			</td>
		</tr>
	</tbody>
</table>
<hr id="clear">
<h2>Proxified Form</h2>
<table cellspacing="0" cellpadding="0" border="0">
	<tbody>
		<tr>
			<td align="right" width="120">
			</td>
			<td>
				Default
			</td>
			<td>
				Off Limits
			</td>
		<tr>
		<tr>
			<td align="right" width="120">
				Include Fourm:
			</td>
			<td align="center">
				<input type="hidden" name="fourm" value="0" /> <input type="checkbox" name="fourm" value="1" $include_formcheck />
			</td>
			<td align="center"> 
				<input type="hidden" name="fourmaloud" value="0" /> <input type="checkbox" name="fourmaloud" value="1" $include_formcheckaloud />
			</td>
		<tr>
			<td align="right" width="120">
				Remove Scripts:
			</td>
			<td align="center">
				<input type="hidden" name="removescripts" value="0" /> <input type="checkbox" name="removescripts" value="1" $remove_scriptscheck />
			</td>
			<td align="center">
				<input type="hidden" name="removescriptsaloud" value="0" /> <input type="checkbox" name="removescriptsaloud" value="1" $remove_scriptscheckaloud />
			</td>
		<tr>
			<td align="right" width="120">
				Accept Cookies:
			</td>
			<td align="center">
				<input type="hidden" name="acceptcookies" value="0" /> <input type="checkbox" name="acceptcookies" value="1" $accept_cookiescheck />
			</td>
			<td align="center">
				<input type="hidden" name="acceptcookiesaloud" value="0" /> <input type="checkbox" name="acceptcookiesaloud" value="1" $accept_cookiescheckaloud />
			</td>
		<tr>
			<td align="right" width="120">
				Show Images:
			</td>
			<td align="center">
				<input type="hidden" name="showimages" value="0" /> <input type="checkbox" name="showimages" value="1" $show_imagescheck />
			</td>
			<td align="center">
				<input type="hidden" name="showimagesaloud" value="0" /> <input type="checkbox" name="showimagesaloud" value="1" $show_imagescheckaloud />
			</td>
		<tr>
			<td align="right" width="120">
				Show referer:
			</td>
			<td align="center">
				<input type="hidden" name="showreferer" value="0" /> <input type="checkbox" name="showreferer" value="1" $show_referercheck />
			</td>
			<td align="center">
				<input type="hidden" name="showrefereraloud" value="0" /> <input type="checkbox" name="showrefereraloud" value="1" $show_referercheckaloud />
			</td>
		<tr>
			<td align="right" width="120">
				Rotate 13:
			</td>
			<td align="center">
				<input type="hidden" name="rotate13" value="0" /> <input type="checkbox" name="rotate13" value="1" $show_imagescheck />
			</td>
			<td align="center">
				<input type="hidden" name="rotate13aloud" value="0" /> <input type="checkbox" name="rotate13aloud" value="1" $show_imagescheckaloud />
			</td>
		<tr>
			<td align="right" width="120">
				Base64 Encode:
			</td>
			<td align="center">
				<input type="hidden" name="base64encode" value="0" /> <input type="checkbox" name="base64encode" value="1" $base64_encodecheck />
			</td>
			<td align="center">
				<input type="hidden" name="base64encodealoud" value="0" /> <input type="checkbox" name="base64encodealoud" value="1" $base64_encodecheckaloud />
			</td>
		<tr>
			<td align="right" width="120">
				Strip Meta:
			</td>
			<td align="center">
				<input type="hidden" name="stripmeta" value="0" /> <input type="checkbox" name="stripmeta" value="1" $strip_metacheck />
			</td>
			<td align="center">
				<input type="hidden" name="stripmetaaloud" value="0" /> <input type="checkbox" name="stripmetaaloud" value="1" $strip_metacheckaloud />
			</td>
		<tr>
			<td align="right" width="120">
				Strip Title:
			</td>
			<td align="center">
				<input type="hidden" name="striptitle" value="0" /> <input type="checkbox" name="striptitle" value="1" $strip_titlecheck />
			</td>
			<td align="center">
				<input type="hidden" name="striptitlealoud" value="0" /> <input type="checkbox" name="striptitlealoud" value="1" $strip_titlecheckaloud />
			</td>
		<tr>
			<td align="right" width="120">
				Session Cookies:
			</td>
			<td align="center">
				<input type="hidden" name="sessioncookies" value="0" /> <input type="checkbox" name="sessioncookies" value="1" $session_cookiescheck />
			</td>
			<td align="center">
				<input type="hidden" name="sessioncookiesaloud" value="0" /> <input type="checkbox" name="sessioncookiesaloud" value="1" $session_cookiescheckaloud />
			</td>
		</tr>
		<tr>
			<td align="right" colspan="3">
				<input type="hidden" name="page" value="{$_SESSION['page']}" /><input type="hidden" name="filesave" value="$randomkey" /><input id="submit" type="submit" />
			</td>
		</tr>
	</tbody>
</table>
OUT;
}
elseif($page=='user') {
echo <<<OUT
<script>
//Credits to CodeAssembly
function passwordStrength(password) {
	var score = 0;

	//Check for common passwords
	if (password.match(/^123456|123245|123456789|1234567|12345678|98765432|654321|password|passw0rd|abc123|qwerty|qazwsx|lovely|iloveyou|princess|rockyou|letmein|trustno1|sunshine|nicole|daniel|babygirl|monkey|jessica|lovely|michael|ashley/i) ) score--;
	
	//Check for 6+ characters
	if (password.length > 6) score++;

	//Check for both lowercase and uppercase characters
	if ( ( password.match(/[a-z]/) ) && ( password.match(/[A-Z]/) ) ) score++;

	//Check for numbers
	if (password.match(/\d+/)) score++;

	//Check for special characters
	if (password.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/) )	score++;
	
	//Check for 6+ characters
	if (password.length > 12) score++;

	 document.getElementById("passwordstr").className = "strength" + score;
}
</script>
<br>
<h2>Change Login Details</h2>
<table cellspacing="0" cellpadding="0" border="0">
	<tbody>
		<tr>
			<td align="right" width="120">
				Username:
			</td>
			<td>
				<input type="text" name="username" value="$username" />
			</td>
		</tr>
		<tr>
			<td align="right" width="120">
				Password:
			</td>
			<td>
				<input type="password" name="password" id="pass" value="" onkeyup="passwordStrength(this.value)" />
				<br>
				<div id="passwordstrcontainer"><div id="passwordstr" class="strength0"></div></div>
			</td>
		<tr>
			<td align="right" width="120">
				Repeat Password:
			</td>
			<td>
				<input type="password" name="password2" id="pass" value=""/>
			</td>
		</tr>
		<tr>
			<td align="right" width="120">
			</td>
			<td>	
				A strong password is:
				<ul id="tips">
					<li>6-12 characters</li>
					<li>Uppercase and lowercase letters</li>
					<li>Symbols</li>
					<li>Numbers</li>
				</ul>
			</td>
		<tr>
		<tr>
			<td align="right" colspan="2">
				<input type="hidden" name="page" value="{$_SESSION['page']}" /><input type="hidden" name="filesave" value="$randomkey" /><input id="submit" type="submit" />
			</td>
		</tr>
	</tbody>
</table>
OUT;
}
elseif($page=='theme') {
echo <<<OUT
<br>
<h2>Theme</h2>
<table cellspacing="0" cellpadding="0" border="0">
	<tbody>
		<tr>
			<td align="right" width="120">
				Title:
			</td>
			<td>
				<input type="text" name="title" value="$sitetitle" />
			</td>
		</tr>
		<tr>
			<td align="right" width="120">
				Footer:
			</td>
			<td>
				<input type="text" name="footer" value="$sitefooter" />
			</td>
		</tr>
		<tr>
			<td align="right" width="120">
				Default URL:
			</td>
			<td>
				<input type="text" name="url" value="$_url" /> (Avoid spaces)
			</td>
		</tr>
		<tr>
			<td align="right" width="120">
				Linkback:
			</td>
			<td>
				<input type="hidden" name="linkback" value="0" /> <input type="checkbox" name="linkback" value="1" $linkbackcheck />
			</td>
		</tr>
		<tr>
			<td align="right" width="120">
				ADs (1):
			</td>
			<td>
				<textarea id="ads1" name="ads1" rows="5">$ads1</textarea>
			</td>
		</tr>
		<tr>
			<td align="right" width="120">
				ADs (2):
			</td>
			<td>
				<textarea id="ads2" name="ads2" rows="5" cols="30">$ads2</textarea>
			</td>
		</tr></tr>
		<tr>
			<td align="right" width="120">
				Homepage Text:
			</td>
			<td>
				<textarea id="homepage" name="homepage" rows="5" cols="30">$homepage</textarea>

			</td>
		</tr>
	<td align="right" width="120">
				Homepage Image:
			</td>
			<td>
				<input type="hidden" name="homepageimage" value="0" /> <input type="checkbox" name="homepageimage" value="1" $homepageimagecheck /> (Coverts text to an image, requires php5-gd)
			</td>
		</tr>
		<tr>
			<td align="right" colspan="2">
				<input type="hidden" name="page" value="{$_SESSION['page']}" /><input type="hidden" name="filesave" value="$randomkey" /><input id="submit" type="submit" />
			</td>
		</tr>
	</tbody>
</table>
OUT;
}
elseif($page=='google') {
echo <<<OUT
<br>
<h2>Google</h2>
<table cellspacing="0" cellpadding="0" border="0">
	<tbody>
		<tr>
			<td align="right" width="120">
				Google Translate:
			</td>
			<td>
				<input type="hidden" name="Translate" value="0" /> <input type="checkbox" name="Translate" value="0" $googletcheck />
			</td>
		</tr>
		<tr>
			<td align="right" width="120">
				Google Analytics:
			</td>
			<td>
				<input type="text" name="analytics" value="$googlea" /> (UA-XXXXXX-X)
			</td>
		</tr>
		<tr>
			<td align="right" width="120">
				Proxy ADs:
			</td>
			<td>
				<input type="hidden" name="analyticsp" value="0" /> <input type="checkbox" name="analyticsp" value="1" $googleapcheck />
			</td>
		</tr>
		<tr>
			<td align="right" colspan="2">
				<input type="hidden" name="page" value="{$_SESSION['page']}" /><input type="hidden" name="filesave" value="$randomkey" /><input id="submit" type="submit" />
			</td>
		</tr>
	</tbody>
</table>
OUT;
}
elseif($page=='updates') {
echo <<<OUT
<br>
<h2>Updates</h2>
<table cellspacing="0" cellpadding="0" border="0">
	<tbody>
		<tr>
			<td>
				$tellbeta
				$updateinfocore
				$updateinforev
				$downloadlink
			</td>
		</tr>
	</tbody>
</table>
OUT;
};
echo <<<OUT
</form>
<!-- Footer -->
<div id="footer">
<!-- Please leave these links intact for future support
   Contributions made to PHProxyImproved have made this project possible
   We hope you apreciate and acknolwedge our hard work -->
<a href="http://phproxyimproved.com">PHProxyImproved</a> . <a href="http://www.proxyhelp.org">Proxy Help</a> . <a href="http://www.jeffssite.us/">Jeffssite</a> <!-- Jeff Schefke -->
</body>
OUT;
?>
<?php
		exit;
	} else {
		echo'Clear your cookies';
		exit;
	}
}
$postpass = $_POST['pass'];
$postpass = sha1($postpass);
if (isset($_GET['p']) && $_GET['p'] == "login") {
	if ($_POST['name'] != $username || $postpass != $password) {
		header("Location: admin.php?error=invalid");
		exit;
	} else if ($_POST['name'] == $username && $postpass == $password) {
		$_SESSION['start'] = time();
		$_SESSION['expire'] = $_SESSION['start'] + (60 * 60);
		$_SESSION['authentication'] = md5($postpass.$randomword);
		$_SESSION['cookie'] = $_SESSION['authentication'];
		header("Location: $_SERVER[PHP_SELF]");
	} else {
		header("Location: admin.php?error=fail");
		exit;
	}
}
?>
<!-- Header -->	
<head>
<title>Admin Module</title>
<!--[if !IE]> -->
<link rel="stylesheet" type="text/css" href="include/styleadmin.css">
<!-- <![endif]-->
<!--[if IE]>
<link rel="stylesheet" type="text/css" href="include/styleadminie.css">
<![endif]-->
</head>
<body>
<!-- Navigation -->	
<div id="navigation">
	<ul>
		<li><a href="index.php">Home</a></li>
		<li><a href="http://www.proxyhelp.org/mybb">Support</a></li>
	</ul>
</div>
<div id="container">
	<h1>Admin Module</h1>
	<hr>
	<?php
	if (isset($_GET['error'])) {
		if ($_GET['error'] == "invalid") {
			echo '<div id="error">Username and/or password was incorrect.</div>';
		} elseif ($_GET['error'] == "cookie") {
			echo '<div id="error">Bad cookie. Clear your cookies and try logging in again.</div>';
		} elseif ($_GET['error'] == "fail") {
			echo '<div id="error">Sorry, you could not be logged in at this time. Please try again later.</div>';
		}
	}
	?>
	<br>
	<h2>Login</h2>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>?p=login" method="post">
		<table cellspacing="0" cellpadding="0" border="0">
			<tbody>
				<tr>
					<td align="right" width="120">
						Username:
					</td>
					<td>
						<input type="text" name="name" id="name" />
					</td>
				</tr>
				<tr>
					<td align="right" width="120">
						Password:
					</td>
					<td>
						<input type="password" name="pass" id="pass" />
					</td>
				</tr>
				<tr>
					<td align="right" colspan="2">
						<input type="submit" id="submit" value="Login" />
					</td>
				</tr>
			</tbody>
		</table>
	</form>
	<div id="footer">
		<!-- Please leave these links intact for future support
			 Contributions made to PHProxyImproved have made this project possible
			 We hope you apreciate and acknolwedge our hard work -->
		<a href="http://phproxyimproved.com">PHProxyImproved</a> . <a href="http://www.proxyhelp.org">Proxy Help</a> . <a href="http://www.jeffssite.us/">Jeffssite</a> <!-- Jeff Schefke -->
	</div>
</div>
</body>
</html>
