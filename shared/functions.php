<?php

function writeUrlRegex($url,$exactly=true){
if($exactly){
return '/^'.$url.'$/';
}
return '/^'.$url.'/g';
}

function getUrl($path){
    $protocol = stripos($_SERVER['SERVER_PROTOCOL'],'https') === 0 ? 'https://' : 'http://';
    return $protocol.$_SERVER['SERVER_NAME']."/banSach"."".$path;
}

function getCurrentUrl($url){
$current_url = explode("?",$url);
return $current_url[0];
}


?>