<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$url = 'http://rentcafe.com/rentcafeapi.aspx?requestType=apartmentavailability&APIToken=NDY5OTI%3d-XDY6KCjhwhg%3d&propertyCode=p0155985';
$cacheFile = 'cache' . DIRECTORY_SEPARATOR . md5($url);

function runCache($url, $cacheFile){
  if(file_exists($cacheFile)){
    $cacheTime = filemtime($cacheFile);
    $now = time();
    $tempCache = "";

      if(($now - $cacheTime) < 20){
        echo(file_get_contents($cacheFile));
        return;
      }

    $tempCache = file_get_contents($cacheFile);
    unlink($cacheFile);
    runCache($url, $cacheFile);
  }
  else{
    $json = file_get_contents($url);
    if($json === false){
      echo $tempCache;
    }
    file_put_contents($cacheFile, $json);
    echo(file_get_contents($cacheFile));
    return;
  }
}

runCache($url, $cacheFile)

?>
