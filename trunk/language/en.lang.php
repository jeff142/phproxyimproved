<?php
$lang = array();

$lang['options']['include_form']['short'] = 'Include Form';
$lang['options']['include_form']['long'] = 'Include mini URL-form on every page';
$lang['options']['remove_scripts']['short'] = 'Remove Scripts';
$lang['options']['remove_scripts']['long'] = 'Remove client-side scripting (i.e JavaScript)';
$lang['options']['accept_cookies']['short'] = 'Accept Cookies';
$lang['options']['accept_cookies']['long'] = 'Allow cookies to be stored';
$lang['options']['show_images']['short'] = 'Show Images';
$lang['options']['show_images']['long'] = 'Show images on browsed pages';
$lang['options']['show_referer']['short'] = 'Show Referer';
$lang['options']['show_referer']['long'] = 'Show actual referring Website';
$lang['options']['rotate13']['short'] = 'Rotate13';
$lang['options']['rotate13']['long'] = 'Use ROT13 encoding on the address';
$lang['options']['base64_encode']['short'] = 'Base64';
$lang['options']['base64_encode']['long'] = 'Use base64 encodng on the address';
$lang['options']['strip_meta']['short'] = 'Strip Meta';
$lang['options']['strip_meta']['long'] = 'Strip meta information tags from pages';
$lang['options']['strip_title']['short'] = 'Strip Title';
$lang['options']['strip_title']['long'] = 'Strip page title';
$lang['options']['session_cookies']['short'] = 'Session Cookies';
$lang['options']['session_cookies']['long'] = 'Store cookies for this session only';

$lang['address'] = 'Address';
$lang['uponedir'] = 'up one dir';
$lang['mainpage'] = 'main page';
$lang['go'] = 'go';

$lang['navi']['url'] = 'URL Form';
$lang['navi']['cookies'] = 'Manage Cookies';

$lang['auth'] = 'Enter your username and password for %s on %s';
$lang['auth_user'] = 'Username';
$lang['auth_pass'] = 'Password';
$lang['auth_login'] = 'Login';

$lang['error_msg'] = 'An error has occured while trying to browse through the proxy.';
$lang['url_error'] = 'URL Error';
$lang['error']['internal'] = 'Failed to connect to the specified host. '
                             .'Possible problems are that the server was not found, the connection timed out, or the connection refused by the host. '
                             .'Try connecting again and check if the address is correct.';
$lang['error']['external'][1] = 'The URL you\'re attempting to access is blacklisted by this server. Please select another URL.';
$lang['error']['external'][2] = 'The URL you entered is malformed. Please check whether you entered the correct URL or not.';
$lang['error']['external'][3] = 'Sorry, you are blacklisted by the admin.';
$lang['resource_error'] = 'Resource Error'; 
$lang['error']['file_size'] = 'The file your are attempting to download is too large.<br />'
                              .'Maxiumum permissible file size is <b>%s MB</b><br />'
                              .'Requested file size is <b>%s MB</b>';
$lang['error']['hotlinking'] = 'It appears that you are trying to access a resource through this proxy from a remote Website.<br />'
                               .'For security reasons, please use the form below to do so.';
                               
$lang['footer'] = '<a href="http://code.google.com/p/phproxyimproved/">PHProxy improved</a> ';