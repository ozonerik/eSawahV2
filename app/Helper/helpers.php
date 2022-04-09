<?php
use Illuminate\Support\Facades\Route;

function get_currentroute(){
    return Route::currentRouteName();
}
