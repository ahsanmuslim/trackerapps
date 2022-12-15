<?php
namespace Teckindo\TrackerApps\Helper;

use GuzzleHttp\Client;
use function Teckindo\TrackerApps\Config\App;


class MacAddress {

    public static function getLocationDevice(){

        // $ip = '162.222.198.75'; 
        $ip = self::getClientIPAddress();
        // $apiURL = 'https://freegeoip.app/json/'.$ip; 
        $query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));

        return $query;

    }

    public static function getDeviceInfoCurl()
    {
        $mac = self::getMacAddress();
        $app = App();

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://mac-address-lookup1.p.rapidapi.com/static_rapid/mac_lookup/?query=" . $mac,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "X-RapidAPI-Host: mac-address-lookup1.p.rapidapi.com",
                "X-RapidAPI-Key: " . $app['api_mac']
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return $err;
        } else {
            return $response;
        }   

    }

    public static function getDeviceInfoHTTP()
    {
        $mac = self::getMacAddress();

        $client = new Client();
        $respon = $client->request('GET', 'https://mac-address-lookup1.p.rapidapi.com/static_rapid/mac_lookup/', [
            'query' => [
                'query' => $mac
            ],
            'headers' => [
                'X-RapidAPI-Key' => 'cbb470d323msh02eabadd8f792eep1278c6jsnc0b62cf4dccc',
                'X-RapidAPI-Host' => 'mac-address-lookup1.p.rapidapi.com'
            ]
        ]);

        return $respon->getBody();
    }

    public static function getHostIPAddress()
    {
        $localIP = getHostByName(getHostName());

        return $localIP;
    }

    public static function getClientIPAddress()
    {
        $ipAddress = '';
        if (! empty($_SERVER['HTTP_CLIENT_IP'])) {
            // to get shared ISP IP address
            $ipAddress = $_SERVER['HTTP_CLIENT_IP'];
        } else if (! empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            // check for IPs passing through proxy servers
            // check if multiple IP addresses are set and take the first one
            $ipAddressList = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            foreach ($ipAddressList as $ip) {
                if (! empty($ip)) {
                    // if you prefer, you can check for valid IP address here
                    $ipAddress = $ip;
                    break;
                }
            }
        } else if (! empty($_SERVER['HTTP_X_FORWARDED'])) {
            $ipAddress = $_SERVER['HTTP_X_FORWARDED'];
        } else if (! empty($_SERVER['HTTP_X_CLUSTER_CLIENT_IP'])) {
            $ipAddress = $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
        } else if (! empty($_SERVER['HTTP_FORWARDED_FOR'])) {
            $ipAddress = $_SERVER['HTTP_FORWARDED_FOR'];
        } else if (! empty($_SERVER['HTTP_FORWARDED'])) {
            $ipAddress = $_SERVER['HTTP_FORWARDED'];
        } else if (! empty($_SERVER['REMOTE_ADDR'])) {
            $ipAddress = $_SERVER['REMOTE_ADDR'];
        }
        return $ipAddress;
    }

    public static function getMacAddress(){
        ob_start(); // Turn on output buffering
        system('ipconfig /all'); //Execute external program to display output
        $mycom=ob_get_contents(); // Capture the output into a variable
        ob_clean(); // Clean the output buffer
    
        $find_word = "Physical";
        $pmac = strpos($mycom, $find_word); // Find the position of Physical text in array
        $mac=substr($mycom,($pmac+36),17); // Get Physical Address
    
        return $mac;
    }

}