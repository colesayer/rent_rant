<?php
$url = 'http://rentcafe.com/rentcafeapi.aspx?requestType=apartmentavailability&APIToken=NDY5OTI%3d-XDY6KCjhwhg%3d&propertyCode=p0155985';
$cacheFile = 'cache' . DIRECTORY_SEPARATOR . md5($url);

function runCache($url, $cacheFile, $tempCache = NULL){
  if(file_exists($cacheFile)){
    $cacheTime = filemtime($cacheFile);
    $now = time();

      if(($now - $cacheTime) < 600){
        echo(file_get_contents($cacheFile));
        return;
      }

    $tempCache = file_get_contents($cacheFile);
    unlink($cacheFile);
    runCache($url, $cacheFile, $tempCache);
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
