<?php
/*
Original Author: Abdullah Arif
Fork Author: Jeffery Schefke
License : GNU General Public License
phproxyimproved.com
*/

#System Settings. Do not edit unless you know what you're doing
$_iflags            = '';
$_system            = array
                    (
                        'ssl'          => extension_loaded('openssl') && version_compare(PHP_VERSION, '4.3.0', '>='),
                        'uploads'      => ini_get('file_uploads'),
                        'gzip'         => extension_loaded('zlib') && !ini_get('zlib.output_compression'),
                        'stripslashes' => get_magic_quotes_gpc()
                    );
$_proxify           = array('text/html' => 1, 'application/xml+xhtml' => 1, 'application/xhtml+xml' => 1, 'text/css' => 1);
$_version           = '0.3';
$_http_host         = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : (isset($_SERVER['SERVER_NAME']) ? $_SERVER['SERVER_NAME'] : 'localhost');
$_script_url        = 'http' . ((isset($_ENV['HTTPS']) && $_ENV['HTTPS'] == 'on') || $_SERVER['SERVER_PORT'] == 443 ? 's' : '') . '://' . $_http_host . ($_SERVER['SERVER_PORT'] != 80 && $_SERVER['SERVER_PORT'] != 443 ? ':' . $_SERVER['SERVER_PORT'] : '') . $_SERVER['PHP_SELF'];
$_script_base       = substr($_script_url, 0, strrpos($_script_url, '/')+1);
$_url_parts         = array();
$_base              = array();
$_socket            = null;
$_request_method    = $_SERVER['REQUEST_METHOD'];
$_request_headers   = '';
$_cookie            = '';
$_post_body         = '';
$_response_headers  = array();
$_response_keys     = array();  
$_http_version      = '';
$_response_code     = 0;
$_content_type      = 'text/html';
$_content_length    = false;
$_content_disp      = '';
$_set_cookie        = array();
$_retry             = false;
$_quit              = false;
$_basic_auth_header = '';
$_basic_auth_realm  = '';
$_auth_creds        = array();
$_response_body     = '';
?>