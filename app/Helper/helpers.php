<?php
use Illuminate\Support\Facades\Route;

function get_version(){
    return 'v2.0.0';
}

function get_hargapadi(){
    $harga=750000;
    return $harga;
}

function get_nilailanja(){
    $lanja=5;
    return $lanja;
}

function get_copyright(){
    return 'esawah.my.id';
}

function url_copyright(){
    return '/';
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
    $a = new \NumberFormatter("id-ID", \NumberFormatter::DECIMAL);
    $s=$a->format(round($v,2));
    $bata=$s." bata";
    return $bata;
}

function get_Nconvtobata($value){
    $v=floatval($value)/14.00;
    $s=round($v,2);
    $bata=$s;
    return $bata;
}

function get_NBatatoluas($value){
    $v=floatval($value)*14.00;
    $s=round($v,2);
    $bata=$s;
    return $bata;
}

function get_formatindo($value){
    $a = new \NumberFormatter("id-ID", \NumberFormatter::DECIMAL);
    $indo=$a->format($value);
    return $indo;
}

function get_convtorp($value){
    $v=floatval($value);
    $s=round($v,0);
    $rp=get_floatttorp($s);
    return $rp;
}

function get_conluas($value){
    $v=floatval($value);
    $a = new \NumberFormatter("id-ID", \NumberFormatter::DECIMAL);
    $s=$a->format(round($v,2));
    $cluas=$s." m2";
    return $cluas;
}

function get_Nconluas($value){
    $v=floatval($value);
    $s=round($v,2);
    $cluas=$s;
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

function get_nlanja($meter,$kw,$harga){
    $kw=intval($kw);
    $harga=intval($harga);
    $bata=floatval($meter)/14.00;
    $lanja=$bata/100;
    $nlanjarp=round($lanja*$kw,2)*$harga;
    $nlanjatext=get_floatttorp($nlanjarp);
    return $nlanjatext;
}

function get_floatttorp($val){
    $val = floatval($val);
    $a = new \NumberFormatter("id-ID", \NumberFormatter::CURRENCY);
    $result=$a->format($val);
    return $result;
}

function get_rptofloat($val){
    $a = new \NumberFormatter("id-ID", \NumberFormatter::CURRENCY);
    $result=$a->parseCurrency($$val);
    return $result;
}