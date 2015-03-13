All these Variables are available at the beginning of index.php
# $`_`config Array #
| **key** | **description** |
|:--------|:----------------|
| url\_var\_name | name of the variable the contains the url to be passed to the script. default: 'q' |
| flags\_var\_name | name of the variables the contains the flags to be passed to the script. default: 'hl' |
| get\_form\_name | name of the GET forms in case they were passed through the proxy. default: 'pgfa' |
| basic\_auth\_var\_name | name of the variable when prompted for Basic authentication. default:  'pbavn' |
| max\_file\_size | maximum file size in BYTES that can be downloaded through the proxy. Use -1 for unlimited. default: -1 |
| allow\_hotlinking | whether to allow hotlinking or not. default is not unless in $_hotlink\_domains. default:0_|
| upon\_hotlink | what to do if a website hotlinks through your proxy. Possible values: - 1: show the URL form (homepage) - 2: issue a HTTP 404 Not Found error - any web address which the user will be redirected to (e.g. goatse pic) default: 1 |
| compress\_output | whether to use gzip compression or not. This may or may not work depending on whether your PHP installation has Zlib loaded, and whether the user's browser supports gzip content encoding. Turn this on if you're worried about bandwidth. This might be a  bit taxing on your server if you have any kind of substantial traffic. It is also better to enable output compression through php.ini than here. default: 0     |
| log\_mode | for disable logging: 0 logging in one file: 1 logging in more files: 2 If you set log\_mode > 0 the directory logs/  must be writable for the webserver! default: 0 |

# $`_`flags #
This array contains the default values for the browsing options which are explained in section 7.

# $`_`frozen\_flags #
When a flag is frozen, it is no longer shown in the URL forms, and the user won't be able to change its value. A frozen flag will always assume its value given in $_flags. This is useful for forcing a specific URL encoding, or forcing the mini URL form to always be there for instance._

0 is for not frozen. 1 is for frozen. default: all are unfrozen.

# $`_`labels #
The labels on flags. Depraced since multi-language support.
# $`_`hosts #
Each entry in this array is a seperate piece of regular expression code that is matched against the host part of the currently browsed URL. If it evaluates to true, the user will not be allowed to access that URL.

The first default entry contains the regular expression for private networks which are not supposed to be shown on the Internet.

# $`_`blacklist #
This is an array with those IP adresses which are unable to use the proxy.

# $`_`hotlink`_`domains #
This array holds entries of domain names which are allowed to hotlink through your proxy when allow\_hotlinking is 0.

To allow "example.com" and "example2.com" to hotlink:

$`_`hotlink`_`domains = array('example.com', 'example2.com');

You don't need to include the "www" part as it is automatically accounted for. Your website's domain name is also automatically included in this array.