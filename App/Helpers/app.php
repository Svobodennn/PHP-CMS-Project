<?php
function asset($assetName){
    return URL.'public/'.$assetName;
}
function redirect($url){
    header('Location:'.URL.$url);
}

function _link($url = null) {
    return URL.$url;
}

function _session($name){
    return \Core\Session::getSession($name);
}