<?php

use Illuminate\Support\Facades\Route;
use App\Models\Appconfig;

if (!function_exists('get_version')) {
    function get_version(){
        return 'v2.0.0';
    }
}

if (!function_exists('get_googleapikey')) {
    function get_googleapikey(){
        return 'AIzaSyC4n0qKTgofSQtwYANwBrNd5lO-_mFUwt4';
    }
}

if (!function_exists('get_hargapadi')) {
    function get_hargapadi(){
        //$harga=750000;
        $harga=Appconfig::find(1)->hargapadi;
        return $harga;
    }
}

if (!function_exists('get_nilailanja')) {
    function get_nilailanja(){
        //$lanja=5;
        $lanja=Appconfig::find(1)->nilailanja;
        return $lanja;
    }
}

if (!function_exists('get_copyright')) {
    function get_copyright(){
        return 'esawah.my.id';
    }
}

if (!function_exists('url_copyright')) {
    function url_copyright(){
        return '/';
    }
}

if (!function_exists('cek_currentroute')) {
    function cek_currentroute($routelist){
        $current_route = Route::currentRouteName();
        $cek = in_array($current_route,$routelist);
        return $cek;
    }
}

if (!function_exists('get_currentroute')) {
    function get_currentroute(){
        return Route::currentRouteName();
    }
}

if (!function_exists('get_convtobata')) {
    function get_convtobata($value){
        $v=floatval($value)/14.00;
        $a = new \NumberFormatter("id-ID", \NumberFormatter::DECIMAL);
        $s=$a->format(round($v,2));
        $bata=$s." bata";
        return $bata;
    }
}

if (!function_exists('get_Nconvtobata')) {
    function get_Nconvtobata($value){
        $v=floatval($value)/14.00;
        $s=round($v,2);
        $bata=$s;
        return $bata;
    }
}

if (!function_exists('get_NBatatoluas')) {
    function get_NBatatoluas($value){
        $v=floatval($value)*14.00;
        $s=round($v,2);
        $bata=$s;
        return $bata;
    }
}

if (!function_exists('get_formatindo')) {
    function get_formatindo($value){
        $a = new \NumberFormatter("id-ID", \NumberFormatter::DECIMAL);
        $indo=$a->format($value);
        return $indo;
    }
}

if (!function_exists('get_convtorp')) {
    function get_convtorp($value){
        $v=floatval($value);
        $s=round($v,0);
        $rp=get_floatttorp($s);
        return $rp;
    }
}

if (!function_exists('get_conluas')) {
    function get_conluas($value){
        $v=floatval($value);
        $a = new \NumberFormatter("id-ID", \NumberFormatter::DECIMAL);
        $s=$a->format(round($v,2));
        $cluas=$s." m2";
        return $cluas;
    }
}

if (!function_exists('get_Nconluas')) {
    function get_Nconluas($value){
        $v=floatval($value);
        $s=round($v,2);
        $cluas=$s;
        return $cluas;
    }
}

if (!function_exists('get_luaspersegi')) {
    function get_luaspersegi($p1,$l1,$p2,$l2){
        $p1=floatval($p1);
        $l1=floatval($l1);
        $p2=floatval($p2);
        $l2=floatval($l2);
        $v=(($p1+$p2)/2)*(($l1+$l2)/2);
        $luas=round($v,2);
        return $luas;
    }
}

if (!function_exists('get_luassegi3')) {
    function get_luassegi3($a,$b,$c){
        $a=floatval($a);
        $b=floatval($b);
        $c=floatval($c);
        $s=($a+$b+$c)/2;
        $v=sqrt($s*($s-$a)*($s-$b)*($s-$c));
        $luas=round($v,2);
        return $luas;
    }
}

if (!function_exists('get_sisiMsegi3')) {
    function get_sisiMsegi3($p1,$l2,$sdA){
        $p1=floatval($p1);
        $l2=floatval($l2);
        $sdA=floatval($sdA);
        $m=sqrt( ($p1*$p1) + ($l2*$l2) - (2*$p1*$l2*cos(deg2rad($sdA))) );
        $sisiM=round($m,2);
        return $sisiM;
    }
}

if (!function_exists('get_luassegi4')) {
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
}

if (!function_exists('get_lanja')) {
    function get_lanja($meter,$kw){
        $a = new \NumberFormatter("id-ID", \NumberFormatter::DECIMAL);
        $kw=intval($kw);
        $bata=floatval($meter)/14.00;
        $lanja=$bata/100;
        $val=round($lanja*$kw,2);
        $nlanjakw=$a->format($val);
        $lanjatext=$nlanjakw." kw";
        return $lanjatext;
    }
}

if (!function_exists('get_nlanja')) {
    function get_nlanja($meter,$kw,$harga){
        $kw=intval($kw);
        $harga=intval($harga);
        $bata=floatval($meter)/14.00;
        $lanja=$bata/100;
        $nlanjarp=round($lanja*$kw,2)*$harga;
        $nlanjatext=get_floatttorp($nlanjarp);
        return $nlanjatext;
    }
}

if (!function_exists('get_floatttorp')) {
    function get_floatttorp($val){
        $val = floatval($val);
        $a = new \NumberFormatter("id-ID", \NumberFormatter::CURRENCY);
        $result=$a->format($val);
        return $result;
    }
}

if (!function_exists('get_rptofloat')) {
    function get_rptofloat($val){
        $a = new \NumberFormatter("id-ID", \NumberFormatter::CURRENCY);
        $result=$a->parseCurrency($$val);
        return $result;
    }
}