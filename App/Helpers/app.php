<?php
function asset($assetName){
    return URL.'public/'.$assetName;
}
function redirect($url){
    header('Location:'.URL.$url);
}