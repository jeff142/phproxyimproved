<?php
/*
Original Author: Abdullah Arif
Fork Author: Jeffery Schefke
License : GNU General Public License
phproxyimproved.com
*/

//Retrieve stock settings file
require_once 'include/settings.php';

//Function to check posted data 
function checkPost($inputpost,$stockpost) {
if($inputpost == '' || preg_match("/HTML/s", $inputpost)) {
$inputpost = $stockpost;
}
return $inputpost;
}

// Install stuff.
if($randomkey == 'run' && $_POST["installer"] == 'true') {
$randomword = $_POST["cript1"];
$randomkey = $_POST["cript2"];
$cookie = $_POST["cript3"];
$installer = true;
}

//Varible to check for API key
$filesave = $_post["filesave"];

//Post varibles
$filesize = $_POST["size"];
$filesave = $_POST["filesave"];
$allowhotlinking = $_POST["allowhotlinking"];
$uponhotlink = $_POST["uponhotlink"];
$compressoutput = $_POST["compressoutput"];
$username1 = $_POST["username"];
$password1 = $_POST["password"];
$password2 = $_POST["password2"];
$includeform = $_POST["fourm"];
$removescripts = $_POST["removescripts"];
$acceptcookies = $_POST["acceptcookies"];
$showimages = $_POST["showimages"];
$showreferer = $_POST["showreferer"];
$rotate13 = $_POST["rotate13"];
$base64encode = $_POST["base64encode"];
$stripmeta = $_POST["stripmeta"];
$striptitle = $_POST["striptitle"];
$sessioncookies = $_POST["sessioncookies"];
$includeformaloud = $_POST["fourmaloud"];
$removescriptsaloud = $_POST["removescriptsaloud"];
$acceptcookiesaloud = $_POST["acceptcookiesaloud"];
$showimagesaloud = $_POST["showimagesaloud"];
$showrefereraloud = $_POST["showrefereraloud"];
$rotate13aloud = $_POST["rotate13aloud"];
$base64encodealoud = $_POST["base64encodealoud"];
$stripmetaaloud = $_POST["stripmetaaloud"];
$striptitlealoud = $_POST["striptitlealoud"];
$sessioncookiesaloud = $_POST["sessioncookiesaloud"];
$loging = $_POST["loging"];
$title = $_POST["title"];
$homepagepost = $_POST["homepage"];
$homepageimagepost = $_POST["homepageimage"];
$footer = $_POST["footer"];
$ads22 = $_POST["ads2"];
$ads11 = $_POST["ads1"];
$notes = $_POST["notes"];
$defulturl = $_POST["url"];
$linkback2 = $_POST["linkback"];
$Translate = $_POST["Translate"];
$analytics = $_POST["analytics"];
$analyticsp = $_POST["analyticsp"];
$sessionpage = $_POST["page"];


if($password2 != $password1 || $password1 = ''){
header("Location: admin.php?page=".$sessionpage."&error=password");
$password1 = $password;
$username1 = $username;
exit(0);
}

//Check posted data
$filesize = checkPost($filesize, $_config['max_file_size']);
$allowhotlinking = checkPost($allowhotlinking, $_config['allow_hotlinking']);
$uponhotlink = checkPost($uponhotlink, $_config['upon_hotlink']);
$compressoutput = checkPost($compressoutput, $_config['compress_output']);
$username1 = checkPost($username1, $username);
$password1 = checkPost($password1, $password);
$includeform = checkPost($includefourm, $_flags['include_form']);
$removescripts = checkPost($removescripts, $_flags['remove_scripts']);
$acceptcookies = checkPost($acceptcookies, $_flags['accept_cookies']);
$showimages = checkPost($showimages, $_flags['show_images']);
$showreferer = checkPost($showreferer, $_flags['show_referer']);
$rotate13 = checkPost($rotate13, $_flags['rotate13']);
$base64encode = checkPost($base64encode, $_flags['base64_encode']);
$stripmeta = checkPost($stripmeta, $_flags['strip_meta']);
$striptitle = checkPost($striptitle, $_flags['strip_title']);
$sessioncookies = checkPost($sessioncookies, $_frozen_flags['session_cookies']);
$includeformaloud = checkPost($includeformaloud, $_flags['include_form']);
$removescriptsaloud = checkPost($removescriptsaloud, $_frozen_flags['remove_scripts']);
$acceptcookiesaloud = checkPost($acceptcookiesaloud, $_frozen_flags['accept_cookies']);
$showimagesaloud = checkPost($showimagesaloud, $_frozen_flags['show_images']);
$showrefereraloud = checkPost($showrefereraloud, $_frozen_flags['show_referer']);
$rotate13aloud = checkPost($rotate13aloud, $_frozen_flags['rotate13']);
$base64encodealoud = checkPost($base64encodealoud, $_frozen_flags['base64_encode']);
$stripmetaaloud = checkPost($stripmetaaloud, $_frozen_flags['strip_meta']);
$striptitlealoud = checkPost($striptitlealoud, $_frozen_flags['strip_title']);
$sessioncookiesaloud = checkPost($sessioncookiesaloud, $_frozen_flags['session_cookies']);
$loging = checkPost($loging, $_config['log_mode']);
$title = checkPost($title, $sitetitle);
$footer = checkPost($footer, $sitefooter);
$ads22 = checkPost($ads22, $ads2);
$ads11 = checkPost($ads11, $ads1);
$notes1 = checkPost($notes, $notes1);
$defulturl = checkPost($defulturl, $_url);
$linkback2 = checkPost($linkback2, $linkback);
$Translate = checkPost($Translate, $googlea);
$analytics = checkPost($analytics, $googleap);
$analyticsp = checkPost($analyticsp, $googlet);
$homepagepost = checkPost($homepagepost,$homepage);
$homepageimagepost = checkPost($homepageimagepost,$homepageimage);

//What time did we save?
$savetime = date(DATE_RFC822);

//Make a new file to save
$settos = <<<OUT
<?php
/*
Original Author: Abdullah Arif
Fork Author: Jeffery Schefke
License : GNU General Public License
phproxyimproved.com
*/

//Edited to work for Admin Module
//Stock proxy settings
\$_config            = array
                    (
                        'url_var_name'             => 'q',
                        'flags_var_name'           => 'hl',
                        'get_form_name'            => '____pgfa',
                        'basic_auth_var_name'      => '____pbavn',
                        'max_file_size'            => $filesize,
                        'allow_hotlinking'         => $allowhotlinking,
                        'upon_hotlink'             => $uponhotlink,
                        'compress_output'          => $compressoutput,
                        'log_mode'                 => $loging
                    );
\$_flags             = array
                    (
                        'include_form'    => $includeform, 
                        'remove_scripts'  => $removescripts,
                        'accept_cookies'  => $acceptcookies,
                        'show_images'     => $showimages,
                        'show_referer'    => $showreferer,
                        'rotate13'        => $rotate13,
                        'base64_encode'   => $base64encode,
                        'strip_meta'      => $stripmeta,
                        'strip_title'     => $striptitle,
                        'session_cookies' => $sessioncookies
                    );
\$_frozen_flags      = array
                    (
                        'include_form'    => $includeformaloud, 
                        'remove_scripts'  => $removescriptsaloud,
                        'accept_cookies'  => $acceptcookiesaloud,
                        'show_images'     => $showimagesaloud,
                        'show_referer'    => $showrefereraloud,
                        'rotate13'        => $rotate13aloud,
                        'base64_encode'   => $base64encodealoud,
                        'strip_meta'      => $stripmetaaloud,
                        'strip_title'     => $striptitlealoud,
                        'session_cookies' => $sessioncookiesaloud
                    );                    
\$_labels            = array
                    (
                        'include_form'    => array('Include Form', 'Include mini URL-form on every page'), 
                        'remove_scripts'  => array('Remove Scripts', 'Remove client-side scripting (i.e JavaScript)'), 
                        'accept_cookies'  => array('Accept Cookies', 'Allow cookies to be stored'), 
                        'show_images'     => array('Show Images', 'Show images on browsed pages'), 
                        'show_referer'    => array('Show Referer', 'Show actual referring Website'), 
                        'rotate13'        => array('Rotate13', 'Use ROT13 encoding on the address'), 
                        'base64_encode'   => array('Base64', 'Use base64 encodng on the address'), 
                        'strip_meta'      => array('Strip Meta', 'Strip meta information tags from pages'), 
                        'strip_title'     => array('Strip Title', 'Strip page title'), 
                        'session_cookies' => array('Session Cookies', 'Store cookies for this session only') 
                    );
                    
\$_hosts             = array
                    (
                        '#^127\.|192\.168\.|10\.|172\.(1[6-9]|2[0-9]|3[01])\.|localhost#i'
                    );
\$_blacklist         = array
                    (

                    );
//if url starts with _____ dont proxy it.
\$noproxy            = array('magnet:');
\$_hotlink_domains   = array();
\$_insert            = array();
\$sitetitle =  <<<HTML
$title
HTML;
\$sitefooter = <<<HTML
$footer
HTML;
\$ads1 = <<<HTML
$ads11
HTML;
\$ads2 = <<<HTML
$ads22
HTML;
\$linkback = '$linkback2';
\$_url = <<<HTML
$defulturl
HTML;
\$googlea = <<<HTML
$analytics
HTML;
\$googleap = '$analyticsp';
\$googlet = '$Translate';
\$rev = '3';
\$isbeta = 'false';
//Get beta updates
\$beta = 'false';
//Username and Password for Admin Module
\$username = <<<HTML
$username1
HTML;
\$password = <<<HTML
$password1
HTML;
//Random text
\$randomword = "$randomword";
//Name of cookie
\$cookie = "$cookie";
//Random key
\$randomkey = '$randomkey';
\$notes = <<<HTML
$notes1
HTML;
//Homepage text
\$homepage = <<<HTML
$homepagepost
HTML;
//Homepage image
\$homepageimage = '$homepageimagepost';
//Last save time
\$savetime = '$savetime';
?>
OUT;

//Start Session
session_start();

//If correct API key, save
if ($randomkey == $filesave || $installer) {
	$fp = fopen('include/settings.php', 'w');
	if (fwrite($fp, $settos) === FALSE) {
		fclose($fp);
		$attemps = $_SERVER['REMOTE_ADDR'].' : '. date(DATE_RFC822) . " : Valid key, failed to save settings\n"; 
		$fp = fopen('include/attemps.txt', 'a+');
		fwrite($fp, $attemps);
		fclose($fp);
		header("Location: admin.php?page=".$sessionpage."&error=chmod");
		exit;
	} else {
		fclose($fp);
		header("Location: admin.php?page=".$sessionpage."&error=success");
	}
}else{
	header("Location: admin.php?page=".$sessionpage."&error=fail");
	echo 'Keys did not match, settings failed to save';
	$attemps = $_SERVER['REMOTE_ADDR'].' : '. date(DATE_RFC822). " : Failed Post Key\n"; 
	$fp = fopen('include/attemps.txt', 'a+');
	fwrite($fp, $attemps);
	fclose($fp);
}
?>
