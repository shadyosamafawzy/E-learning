<?php


function is_active(string $routeName){
    return null !== request()->segment(2) && request()->segment(2) == $routeName ? 'active' : '';
}
function getYoutubeId($url){
    parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );
    return $my_array_of_vars['v'];
}