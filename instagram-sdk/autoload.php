<?php
/**
Author: Jackvn
This file is autoload for Instagram SDK, you just need this file to use all.
Happy Coding!!!

Note: if u want to use class belong to Instagram SDK.
U have to call Instagram\classs_name.
Example: Class Girl - Instagram\Girl();
*/

if(version_compare(PHP_VERSION, '5.4.0', '<')) {
  throw new Exception('The Instagram SDK require PHP 5.4.0 or higher');
}

spl_autoload_register(function($class) {
  $baseDir = __DIR__.'/';
  $prefix = 'Instagram\\';
  $len = strlen($prefix);

  //if no, move to next autoload register
  if(strncmp($prefix, $class, $len) !== 0)
    return;

  $relativeClass = substr($class, $len);

  $file = rtrim($baseDir, '/').'/'.str_replace('\\','/', $relativeClass).'.php';

  if(file_exists($file))
    require ($file);
  else
    return;

});
