<?php
/*
Original Author: Abdullah Arif
Fork Author: Jeffery Schefke
License : GNU General Public License
phproxyimproved.com
*/

//To Do: Switch to functions
include 'settings.php';

//Drop down for "File Size"
if ($_config['max_file_size']=="-1") {
$max_file_sizecheck = <<<OUT
<select name="size">
<option value="-1">Disable</option>
<option value="5242880">5 MB</option>
<option value="10485760">10 MB</option>
<option value="15728640">15 MB</option>
<option value="20971520">20 MB</option>
<option value="31457280">30 MB</option>
<option value="52428800">50 MB</option>
<option value="104857600">100 MB</option>
</select>
OUT;
}
elseif ($_config['max_file_size']=="5242880")
$max_file_sizecheck = <<<OUT
<select name="size">
<option value="-1">Disable</option>
<option value="5242880">5 MB</option>
<option value="10485760">10 MB</option>
<option value="15728640">15 MB</option>
<option value="20971520">20 MB</option>
<option value="31457280">30 MB</option>
<option value="52428800">50 MB</option>
<option value="104857600">100 MB</option>
</select>
OUT;
elseif ($_config['max_file_size']=="10485760") $max_file_sizecheck = <<<OUT
<select name="size">
<option value="10485760">10 MB</option>
<option value="-1">Disable</option>
<option value="5242880">5 MB</option>
<option value="15728640">15 MB</option>
<option value="20971520">20 MB</option>
<option value="31457280">30 MB</option>
<option value="52428800">50 MB</option>
<option value="104857600">100 MB</option>
</select>
OUT;
elseif ($_config['max_file_size']=="15728640") $max_file_sizecheck = <<<OUT
<select name="size">
<option value="15728640">15 MB</option>
<option value="-1">Disable</option>
<option value="5242880">5 MB</option>
<option value="10485760">10 MB</option>
<option value="20971520">20 MB</option>
<option value="31457280">30 MB</option>
<option value="52428800">50 MB</option>
<option value="104857600">100 MB</option>
</select>
OUT;
elseif ($_config['max_file_size']=="20971520") $max_file_sizecheck = <<<OUT
<select name="size">
<option value="20971520">20 MB</option>
<option value="-1">Disable</option>
<option value="5242880">5 MB</option>
<option value="10485760">10 MB</option>
<option value="15728640">15 MB</option>
<option value="31457280">30 MB</option>
<option value="52428800">50 MB</option>
<option value="104857600">100 MB</option>
</select>
OUT;
elseif ($_config['max_file_size']=="31457280") $max_file_sizecheck = <<<OUT
<select name="size">
<option value="31457280">30 MB</option>
<option value="-1">Disable</option>
<option value="5242880">5 MB</option>
<option value="10485760">10 MB</option>
<option value="15728640">15 MB</option>
<option value="20971520">20 MB</option>
<option value="52428800">50 MB</option>
<option value="104857600">100 MB</option>
</select>
OUT;
elseif ($_config['max_file_size']=="52428800") $max_file_sizecheck = <<<OUT
<select name="size">
<option value="52428800">50 MB</option>
<option value="-1">Disable</option>
<option value="5242880">5 MB</option>
<option value="10485760">10 MB</option>
<option value="15728640">15 MB</option>
<option value="20971520">20 MB</option>
<option value="31457280">30 MB</option>
<option value="104857600">100 MB</option>
</select>
OUT;
else $max_file_sizecheck = <<<OUT
<select name="size">
<option value="104857600">100 MB</option>
<option value="-1">Disable</option>
<option value="5242880">5 MB</option>
<option value="10485760">10 MB</option>
<option value="15728640">15 MB</option>
<option value="20971520">20 MB</option>
<option value="31457280">30 MB</option>
<option value="52428800">50 MB</option>
</select>
OUT;

//Drop down for "Upon Hotlink"
if ($_config['upon_hotlink']=="1") { 
$upon_hotlinkcheck = <<<OUT
<select name="uponhotlink">
<option value="1">Home Page</option>
<option value="2">404 Page</option>
</select>
OUT;
}
else
{
$upon_hotlinkcheck = <<<OUT
<select name="uponhotlink">
<option value="2">404 Page</option>
<option value="1">Home Page</option>
</select>
OUT;
}

//Link back
if ($linkback=='1') {
	$linkbackcheck = 'checked="checked"';
	$linkbackshow = 'Powerd by: <a href="http://phproxyimproved.com">phproxyimproved.com</a>';
} else {
	$linkbackcheck = '';
	$linkbackshow = 'Coded by: Jeff Schefke and contributors';
}

//Logs
if ($_config['log_mode']=="1"){
$log_modecheck = 'checked="checked"';
}else{
$log_modecheck = '';
}

//Check checks
function checkChecks($inputchecks) {
	if($inputchecks == '1') {
		$showchecks = 'checked="checked"';
	} else {
		$showchecks = '';
	}
return $showchecks;
}

//Checks for Admin Module
$allow_hotlinkingcheck = checkChecks($_config['allow_hotlinking']);
$compress_outputcheck = checkChecks($_config['compress_output']);
$googletcheck = checkChecks($googlet); 
$googleapcheck = checkChecks($googleap);
$include_formcheck = checkChecks($_flags['include_form']);
$remove_scriptscheck = checkChecks($_flags['remove_scripts']);
$accept_cookiescheck = checkChecks($_flags['accept_cookies']);
$show_imagescheck = checkChecks($_flags['show_images']);
$show_referercheck = checkChecks($_flags['show_referer']); 
$show_imagescheck = checkChecks($_flags['show_images']);
$base64_encodecheck = checkChecks($_flags['base64_encode']);
$strip_metacheck = checkChecks($_flags['strip_meta']);
$strip_titlecheck = checkChecks($_flags['strip_title']);
$session_cookiescheck = checkChecks($_flags['session_cookies']);
$include_formcheckaloud = checkChecks($_frozen_flags['include_form']);
$remove_scriptscheckaloud = checkChecks($_frozen_flags['remove_scripts']);
$accept_cookiescheckaloud = checkChecks($_frozen_flags['accept_cookies']);
$show_imagescheckaloud = checkChecks($_frozen_flags['show_images']);
$show_referercheckaloud = checkChecks($_frozen_flags['show_referer']);
$show_imagescheckaloud = checkChecks($_frozen_flags['show_images']);
$base64_encodecheckaloud = checkChecks($_frozen_flags['base64_encode']);
$strip_metacheckaloud = checkChecks($_frozen_flags['strip_meta']);
$strip_titlecheckaloud = checkChecks($_frozen_flags['strip_title']);
$session_cookiescheckaloud = checkChecks($_frozen_flags['session_cookies']);
$homepageimagecheck = checkChecks($homepageimage);
?>
