<?php
/**
 * Created by PhpStorm.
 * User: shrenik
 * Date: 22/7/18
 * Time: 1:22 PM
 */

function pr($data){
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}
function eId($id){
    return (($id*12345)+54321);
}
function dId($id){
    return ($id - 54321)/12345;
}

function objectToArray($d) {
    if (is_object($d)) {
        // Gets the properties of the given object
        // with get_object_vars function
        $d = get_object_vars($d);
    }

    if (is_array($d)) {
        /*
        * Return array converted to object
        * Using __FUNCTION__ (Magic constant)
        * for recursive call
        */
        return array_map(__FUNCTION__, $d);
    }
    else {
        // Return array
        return $d;
    }
}
function validateDate($date, $format = 'Y-m-d')
{
    $d = DateTime::createFromFormat($format, $date);
    // The Y ( 4 digits year ) returns TRUE for any integer with any number of digits so changing the comparison from == to === fixes the issue.
    return $d && $d->format($format) === $date;
}
function is_base64($str)
{
    if ( base64_encode(base64_decode($str, true)) === $str){
        return true;
    } else {
        return false;
    }
}

function getDistance( $latitude1, $longitude1, $latitude2, $longitude2 ) {


    $earth_radius = 6371;

    $dLat = deg2rad( $latitude2 - $latitude1 );
    $dLon = deg2rad( $longitude2 - $longitude1 );

    $a = sin($dLat/2) * sin($dLat/2) + cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * sin($dLon/2)

        * sin($dLon/2);
    $c = 2 * asin(sqrt($a));
    $d = $earth_radius * $c;

    return $d;
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
function roundUp($number, $nearest){
    return $number + ($nearest - fmod($number, $nearest));
}
function roundDown($number, $nearest){
    return $number - fmod($number, $nearest);
}
function getPoints($fare,$points){
    return roundUp($fare*$points,0.5);
}
function checkPoints($fare,$points){
    return roundUp($fare*$points,0.5);
}
function date_compare($a, $b)
{
    $t1 = strtotime($a['date_time']);
    $t2 = strtotime($b['date_time']);
    return $t2-$t1;
}
define('DS', DIRECTORY_SEPARATOR);
define('JS_VERSION','?ver='.time());
define('ADMIN','/');
define('APP_URL',config('app.url'));
define('GOOGLE_API_KEY','AIzaSyA1R7RgsvFUDD7vxqYH7HcNeRIuZc2gMsk');
define('PDF_PATH',env('APP_URL'));
define('TAX',0.01);