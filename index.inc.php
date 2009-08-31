<?php 

if (basename(__FILE__) == basename($_SERVER['PHP_SELF']))
{
    exit(0);
}

echo '<?xml version="1.0" encoding="utf-8"?>';

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-US" xml:lang="en-US">
<head>
  <title>PHProxy</title>
  <link rel="stylesheet" type="text/css" href="style.css" title="Default Theme" media="all" />
</head>
<body onload="document.getElementById('address_box').focus()">
<div id="container">
  <h1 id="title">PHProxy</h1>
  <div id="languages">
<?php
$langs = array();
foreach(glob('language/*.lang.php') as $file){
    $lng = substr($file, 9, 2);
    $langs[] = '<a href="?lang='.$lng.'"><img src="language/'.$lng.'.png" alt="'.$lng.'" /></a>';
}
echo join(" ", $langs);
?>
  </div>
  <ul id="navigation">
    <li><a href="<?php echo $GLOBALS['_script_base'] ?>"><?php echo $lang['navi']['url']; ?></a></li>
    <li><a href="javascript:alert('cookie managment has not been implemented yet')"><?php echo $lang['navi']['cookies']; ?></a></li>
  </ul>
<?php

switch ($data['category'])
{
    case 'auth':
?>
  <div id="auth"><p>
  <b><?php printf($lang['auth'], htmlspecialchars($data['realm']), $GLOBALS['_url_parts']['host']); ?></b>
  <form method="post" action="">
    <input type="hidden" name="<?php echo $GLOBALS['_config']['basic_auth_var_name'] ?>" value="<?php echo base64_encode($data['realm']) ?>" />
    <label><?php echo $lang['auth_user']; ?> <input type="text" name="username" value="" /></label> <label><?php echo $lang['auth_pass']; ?> <input type="password" name="password" value="" /></label> <input type="submit" value="<?php echo $lang['auth_login']; ?>" />
  </form></p></div>
<?php
        break;
    case 'error':
        echo '<div id="error"><p>';
        
        switch ($data['group'])
        {
            case 'url':
                echo '<b>'.$lang['url_error'].' (' . $data['error'] . ')</b>: ';
                switch ($data['type'])
                {
                    case 'internal':
                        $message = $lang['error']['internal'];
                        break;
                    case 'external':
                        switch ($data['error'])
                        {
                            case 1:
                                $message = $lang['error']['external'][1];
                                break;
                            case 2:
                                $message = $lang['error']['external'][2];
                                break;
                        }
                        break;
                }
                break;
            case 'resource':
                echo '<b>'.$lang['resource_error'].':</b> ';
                switch ($data['type'])
                {
                    case 'file_size':
                        $message = sprintf($lang['error']['file_size'], number_format($GLOBALS['_config']['max_file_size']/1048576, 2), number_format($GLOBALS['_content_length']/1048576, 2));
                        break;
                    case 'hotlinking':
                        $message = $lang['error']['hotlinking'];
                        break;
                }
                break;
        }
        
        echo $lang['error_msg'].'<br />' . $message . '</p></div>';
        break;
}
?>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
    <ul id="form">
      <li id="address_bar"><label><?php echo $lang['address']; ?>: <input id="address_box" type="text" name="<?php echo $GLOBALS['_config']['url_var_name'] ?>" value="<?php echo isset($GLOBALS['_url']) ? htmlspecialchars($GLOBALS['_url']) : '' ?>" onfocus="this.select()" /></label> <input id="go" type="submit" value="<?php echo $lang['go']; ?>" /></li>
      <?php
      
      foreach ($GLOBALS['_flags'] as $flag_name => $flag_value)
      {
          if (!$GLOBALS['_frozen_flags'][$flag_name])
          {
              echo '<li class="option"><label><input type="checkbox" name="' . $GLOBALS['_config']['flags_var_name'] . '[' . $flag_name . ']"' . ($flag_value ? ' checked="checked"' : '') . ' />' . $GLOBALS['_labels'][$flag_name][1] . '</label></li>' . "\n";
          }
      }
      ?>
    </ul>
  </form>
  <!-- The least you could do is leave this link back as it is. This software is provided for free and I ask nothing in return except that you leave this link intact
       You're more likely to recieve support should you require some if I see a link back in your installation than if not -->
  <div id="footer"><?php echo $lang['footer'];  echo $GLOBALS['_version'] ?></div>
</div>
</body>
</html>