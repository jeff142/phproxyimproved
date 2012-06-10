<?php
/*
Original Author: Abdullah Arif
Fork Author: Jeffery Schefke
License : GNU General Public License
phproxyimproved.com
*/

//Edited to work for Admin Module
//Stock proxy settings
$_config            = array
                    (
                        'url_var_name'             => 'q',
                        'flags_var_name'           => 'hl',
                        'get_form_name'            => '____pgfa',
                        'basic_auth_var_name'      => '____pbavn',
                        'max_file_size'            => 104857600,
                        'allow_hotlinking'         => 1,
                        'upon_hotlink'             => 1,
                        'compress_output'          => 1,
                        'log_mode'                 => 0
                    );
$_flags             = array
                    (
                        'include_form'    => 1, 
                        'remove_scripts'  => 0,
                        'accept_cookies'  => 1,
                        'show_images'     => 1,
                        'show_referer'    => 1,
                        'rotate13'        => 1,
                        'base64_encode'   => 0,
                        'strip_meta'      => 0,
                        'strip_title'     => 0,
                        'session_cookies' => 0
                    );
$_frozen_flags      = array
                    (
                        'include_form'    => 1, 
                        'remove_scripts'  => 0,
                        'accept_cookies'  => 0,
                        'show_images'     => 0,
                        'show_referer'    => 0,
                        'rotate13'        => 0,
                        'base64_encode'   => 0,
                        'strip_meta'      => 0,
                        'strip_title'     => 0,
                        'session_cookies' => 0
                    );                    
$_labels            = array
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
                    
$_hosts             = array
                    (
                        '#^127\.|192\.168\.|10\.|172\.(1[6-9]|2[0-9]|3[01])\.|localhost#i'
                    );
$_blacklist         = array
                    (

                    );
//if url starts with _____ dont proxy it.
$noproxy            = array('magnet:');
$_hotlink_domains   = array();
$_insert            = array();
$sitetitle =  <<<HTML
PHProxyImproved Proxy Script 
HTML;
$sitefooter = <<<HTML
(C) 2012 
HTML;
$ads1 = <<<HTML
<script type="text/javascript">
/* Proxy Help ADs Script */
google_ad_client = "pub-3402075004633034";
google_ad_slot = "6505751312";
google_ad_width = 468;
google_ad_height = 15;
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
HTML;
$ads2 = <<<HTML
<!-- ADs for proxied pages -->
HTML;
$linkback = '1';
$_url = <<<HTML
startpage.com
HTML;
$googlea = <<<HTML
UA-XXXXXX-X
HTML;
$googleap = '1';
$googlet = '1';
$rev = '3';
$isbeta = 'false';
//Get beta upgoogleadates
$beta = 'false';
//Username and Password for Admin Module
$username = <<<HTML
username
HTML;
$password = <<<HTML
5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8
HTML;
//Random text
$randomword = "a784e8752e2c82e7e06323ced82a3cc593a09cbd";
//Name of cookie
$cookie = "217eab0015e00e41a7e45837294efcbc0f23a237";
//Random key
$randomkey = 'run';
$notes = <<<HTML
Thanks for installing PHProxyImproved

http://www.phproxyimproved.com
http://www.proxyhelp.org
--Proxy Help Staff
HTML;
//Homepage text
$homepage = <<<HTML
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Urgent tamen et nihil remittunt. Nihil sane.
An est aliquid per se ipsum flagitiosum, etiamsi nulla comitetur infamia? Tecum optime, deinde etiam cum mediocri amico. Equidem e Cn. Quis hoc dicit? Nam his libris eum malo quam reliquo ornatu villae delectari. Deinde disputat, quod cuiusque generis animantium statui deceat extremum. Theophrasti igitur, inquit, tibi liber ille placet de beata vita? Etenim nec iustitia nec amicitia esse omnino poterunt, nisi ipsae per se expetuntur. 
HTML;
//Homepage image
$homepageimage = '0';
//Last save time
$savetime = '';
?>