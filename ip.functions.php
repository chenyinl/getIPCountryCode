<?php
/**
 * Functions to get IP address if JS were not able to
 * @link http://www.danielpinero.com/how-to-detect-country-ip-address
 * @author Chen Lin clin@one-k.com
 */

/**
 * Get IP address from Server
 */
function getIPAddress(){
    if ( !empty( $_SERVER['HTTP_CLIENT_IP' ])) {
       $ip = $_SERVER['HTTP_CLIENT_IP' ];
    } elseif ( !empty( $_SERVER['HTTP_X_FORWARDED_FOR' ])) {
       $ip = $_SERVER[ 'HTTP_X_FORWARDED_FOR'];
    } else {
       $ip = $_SERVER[ 'REMOTE_ADDR' ];
    }
    return $ip;
}

/**
 * Call wipmania to get country code
 */
function getCountryCode( $ip ){
    $url = "http://api.wipmania.com/".$ip;
    $country = file_get_contents( $url );
    return $country;
}
