<?php
use Illuminate\Support\Facades\Route;

function cek_currentroute($routelist){
    $current_route = Route::currentRouteName();
    $cek = in_array($current_route,$routelist);
    return $cek;
}

function get_currentroute(){
    return Route::currentRouteName();
}
