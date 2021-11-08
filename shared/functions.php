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

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function generateFileLink($fileName){
    $protocol = stripos($_SERVER['SERVER_PROTOCOL'],'https') === 0 ? 'https://' : 'http://';
    return $protocol.$_SERVER['SERVER_NAME']."/banSach/img/upload/".$fileName;
}


function uploadFile($listFileName,$listTmpFile,$listFileError){

     $listImageUrl=array();

for($i=0;$i<count($listFileName);$i++){
    if(!$listFileError[$i]){
        $imageFileExtension = pathinfo($listFileName[$i],PATHINFO_EXTENSION);

        $newImageName=generateRandomString(60).".{$imageFileExtension}";
        array_push($listImageUrl,generateFileLink($newImageName));
        move_uploaded_file($listTmpFile[$i],dirname(__FILE__)."/../img/upload/".$newImageName);

    }
    

}
return $listImageUrl;

}

function placeholders($text, $count=0, $separator=","){
    $result = array();
    if($count > 0){
        for($x=0; $x<$count; $x++){
            $result[] = $text;
        }
    }

    return implode($separator, $result);
}
