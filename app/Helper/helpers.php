<?php
use Illuminate\Support\Facades\Route;

function get_version(){
    return 'v2.0.0';
}

function cek_currentroute($routelist){
    $current_route = Route::currentRouteName();
    $cek = in_array($current_route,$routelist);
    return $cek;
}

function get_currentroute(){
    return Route::currentRouteName();
}

function get_convtobata($value){
    $v=floatval($value)/14.00;
    $s=strval(round($v,2));
    $bata=$s." bata";
    return $bata;
}

function get_convtorp($value){
    $v=floatval($value);
    $s=strval(round($v,0));
    $rp="Rp. ".$s;
    return $rp;
}

function get_conluas($value){
    $v=floatval($value);
    $s=strval(round($v,2));
    $cluas=$s." m2";
    return $cluas;
}

function get_luaspersegi($p1,$l1,$p2,$l2){
    $p1=floatval($p1);
    $l1=floatval($l1);
    $p2=floatval($p2);
    $l2=floatval($l2);
    $v=(($p1+$p2)/2)*(($l1+$l2)/2);
    $luas=round($v,2);
    return $luas;
}

function get_luassegi3($a,$b,$c){
    $a=floatval($a);
    $b=floatval($b);
    $c=floatval($c);
    $s=($a+$b+$c)/2;
    $v=sqrt($s*($s-$a)*($s-$b)*($s-$c));
    $luas=round($v,2);
    return $luas;
}

function get_sisiMsegi3($p1,$l2,$sdA){
    $p1=floatval($p1);
    $l2=floatval($l2);
    $sdA=floatval($sdA);
    $m=sqrt( ($p1*$p1) + ($l2*$l2) - (2*$p1*$l2*cos(deg2rad($sdA))) );
    $sisiM=round($m,2);
    return $sisiM;
}

function get_luassegi4($p1,$l1,$p2,$l2,$m){
    $p1=floatval($p1);
    $l1=floatval($l1);
    $p2=floatval($p2);
    $l2=floatval($l2);
    $m=floatval($m);
    $ls1=floatval(get_luassegi3($p1,$l1,$m));
    $ls2=floatval(get_luassegi3($p2,$l2,$m));
    $v=($ls1+$ls2);
    $luas=round($v,2);
    return $luas;
}