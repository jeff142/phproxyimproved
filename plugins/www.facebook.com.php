<?php
/*
Author: Jeffery Schefke
License : GNU General Public License
phproxyimproved.com
*/

//Retrieve stock plugins and associated settings file
include_once(PHPROXY_ROOT.'plugins/index.php');
include_once(PHPROXY_ROOT.'plugins/include/settings.php');
include('settings/facebook.settings.php');

//Redirect to Facebook mobile if forced
if($forcemoble) {
header( 'Location: '.$mfb );
} else {
$fbinject = <<<OUT
<div class="mal pam uiBoxYellow"><div class="fsl fwb fcb">$tmassage</div><div class="mts">$tbody</div></div>
<div class="gradient">
OUT;
if (preg_match("/reg_form_box/s", $_response_body)) {
$_response_body_edit = preg_replace('/<div class="gradient">/s',$fbinject, $_response_body, 1);
} else {
$_response_body_edit = $_response_body;
}}
?>
