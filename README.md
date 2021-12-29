==============================================
NOTICE! READ ME
==============================================
This project was made up when i was in highschool learning php, It has a flaw in its security that could, assuming some one got the admin login allow code execution.
This project is not recommended for current usage, or live sites due to this exploit, I have no intentions of fixing the problem. This project is dead.

The flaw is in post.php it dose not try to sanitize any inputs, this can allow you to insert your own php and get it to execute on the server. 
A quick and dirty fix is to delete post.php after you set everything up. However this project is still not recommended.

============================================
PHProxyImproved
http://phproxyimproved.com
============================================

All source code is licensed under the GNU General Public License, Version 3. See license.txt for license terms and conditions.
Credit is comment in code, if not deviliped by PHProxyimproved.com

For support issues relating to the operation of this software, please use our support forum located at the following URL: 
<http://www.proxyhelp.org/mybb>

I. Setup

    1. Upload the contest of contents of PHProxyImproved to your server
    2. Run install.php to set up your web proxy
    3. Access admin.php using the default username and password. See section II. Administration module
	
II. Administation module
    o   Defult Login
    o   Username: username
    o   Password: password

III. Credits

    o   Abdullah Arif - provided PHProxy as a base for PHProxyImproved
    o   Codename_B - contributed significantly to the creation of PHProxyImproved
    o   Ugurcank - plugin idea from your mod
    o   Bennett @ peacfire.org - fixed YouTube plugin and other Ideas/Code.
    o   Other - any other coders who helped contribute to making PHProxyImproved to it's current funtional state
