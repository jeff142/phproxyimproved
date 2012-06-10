<?php
/*
Author: Jeffery Schefke
License : GNU General Public License
Phproxyimproved.com
*/

//Retrieve stock settings and system file
require_once 'settings.php';
require_once 'syssettings.php';

$mirror1 = '';
$mirror1 = str_replace("\n",'',$mirror1);

//Mirror varibles
$core = $mirror1[0];
$newrev = $mirror1[1];
$download = $mirror1[2];
$betaCore = $mirror1[3];
$betaRev = $mirror1[4];
$betadownload = $mirror1[5];
$urgentupdate = $mirror1[6];
$urgentdownload = $mirror1[7];
$onlinemirror1 = $mirror1[8];

//Beta information
if($onlinemirror1=="online"){
	if($isbeta == 'true' | $beta == 'true'){
	$core = $betaCore;
	$newrev = $betaRev;
	$download = $betadownload;
	$tellbeta = "<br>Your geting beta updates<br>";
	};

	if ($newrev != $rev){
	$updateinforev = "<br>Revision update available";
	$downloadlink = '<br> <a href="'.$download.'">Download Revision update</a><br>';
	};

	if ($core != $_version){
	$updateinfocore = "<br>Core update Recomened";
	$downloadlink = '<br><a href="'.$download.'">Download Core update</a><br>';
	};

	if ($urgentupdate =="1"){
	$updateinfocore = "URGENT UPDATE NOW";
	$updateinforev  = "URGENT UPDATE NOW";
	$downloadlink = '<br><a href="'.$download.'">Download URGENT UPDATE</a><br>';
	$urgentaleart = "URGENT UPDATE";
	}
} else {
$downloadlink = 'Mirror is down, check back later';
}
?>