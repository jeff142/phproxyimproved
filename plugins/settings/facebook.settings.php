<?php
/*
Author: Jeffery Schefke
License : GNU General Public License
phproxyimproved.com
*/

//To Do: Implment into Admin Module

//Completeting the URL
include_once('../index.php');

//Mobile link for Facebook
$mfb = complete_url('http://m.facebook.com/');

//Force users to use Facebook mobile
$forcemoble = false;

//Title message
$tmassage = "Sorry, PHProxyImproved does not support facebook.com";

//Body Message
$tbody = "Please try the <a href=".$mfb.">mobile version</a> of Facebook.";
?>
