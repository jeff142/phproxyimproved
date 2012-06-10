<?php
require "include/settings.php";
$rand1 = rand(1, 10000000);
$rand2 = rand(1, 10000000);
$rand3 = rand(1, 10000000);
$rand4 = rand(1, 10000000);
$rand5 = rand(1, 10000000);
$cript1 = sha1($rand1.$rand2.$rand3.$rand4.$rand5);
$rand6 = rand(1, 10000000);
$rand7 = rand(1, 10000000);
$rand8 = rand(1, 10000000);
$rand9 = rand(1, 10000000);
$rand10 = rand(1, 10000000);
$cript2 = sha1($rand6.$rand7.$rand8.$rand9.$rand10);
$cript3 = sha1($cript1.$cript2);
$strme = 'abcdefghijklmnopqurstuvwzyzabcdefghijklmnopqurstuvwzyzabcdefghijklmnopqurstuvwzyz'.$cript3;
$cript3 = sha1(str_shuffle($strme));
echo <<<OUT
<head>
<title>PHProxyImproved Installer</title>
<!--[if !IE]> -->
<link rel="stylesheet" type="text/css" href="include/styleadmin.css">
<!-- <![endif]-->
<!--[if IE]>
<link rel="stylesheet" type="text/css" href="include/styleadminie.css">
<![endif]-->
</head>
<body onload="document.getElementById('address_box').focus()">
<div id="navigation">
	<ul>
		<li><a href="index.php">Home</a></li>
		<li><a href="admin.php">Admin Module</a></li>
	</ul>
</div>
<div id="container">
	<h1>PHProxyImproved Installer</h1>
	<hr>
	<br>
OUT;
if($randomkey == 'run') {
$settings = 'include/settings.php';
$chmod = substr(decoct(fileperms($settings)),2);
if (is_writable($settings) && is_readable($settings)) {
    $write = '<b>'.$chmod.'</b> (<span id="green">Readable and/or writable settings file</span>)';
} else {
    $write = '<b>'.$chmod.'</b> (<span id="red">Un-readable and/or writeable settings file</span>)';
}

echo <<<OUT
	<h2>Setup Initiated</h2>
	<table cellspacing="0" cellpadding="0" border="0">
		<tbody>
			<tr>
				<td>
					PHProxyImproved is now being installed. Please ensure include/settings.php is both readable and writeable.
					<ul id="tips">
						<li>$write</li>
						<li>Click on ths submit button to continue with the installation.</li>
					</ul>
					<form action="post.php" method="post">
						<input type="hidden" name="cript1" value="$cript1" />
						<input type="hidden" name="cript2" value="$cript2" />
						<input type="hidden" name="cript3" value="$cript3" />
						<input type="hidden" name="filesave" value="$randomkey" />
						<input type="hidden" name="installer" value="true" />
						<input type="hidden" name="notes" value="$notes"></textarea>
						<input type="hidden" name="Translate" value="1" />
				</td>
			</tr>
			<tr>
				<td align="right" colspan="2">
					<input type="submit" />
					</form>
				</td>
			</tr>
		</tbody>
	</table>
OUT;
} else {
echo <<<OUT
	<h2>Setup Complete</h2>
	<table cellspacing="0" cellpadding="0" border="0">
		<tbody>
			<tr>
				<td>
					PHProxyImproved is now installed. Your authentication for the Admin Module are as follows.
					<ul id="tips">
						<li>Username: username</li>
						<li>Password: password</li>
					</ul>
					Remember to change the username and password for security reasons. It is now safe to delete install.php.
				</td>
			</tr>
		</tbody>
	</table>
OUT;
}

echo <<<OUT
	<div id="footer">
		<!-- Please leave these links intact for future support
			 Contributions made to PHProxyImproved have made this project possible
			 We hope you apreciate and acknolwedge our hard work -->
		<a href="http://phproxyimproved.com">PHProxyImproved</a> . <a href="http://www.proxyhelp.org">Proxy Help</a> . <a href="http://www.jeffssite.us/">Jeffssite</a> <!-- Jeff Schefke -->
	</div>
</div>
</body>
</html>
OUT;
?>