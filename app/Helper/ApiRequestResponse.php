<?php
namespace Teckindo\TrackerApps\Helper;

use GuzzleHttp\Client;
use function Teckindo\TrackerApps\Config\App;

class ApiRequestResponse
{
    public static function HttpHeaders(){

        $app = App();
        $bearerToken = $app['api_key_firman'];
        $headers    =   [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' .$bearerToken,
            ],
            'http_errors' => false,
        ];
        return $headers;
     }

    public static function GetDataApi($endPoint)
    {
        $app = App();
        $url = $app['api_url_firman'] . $endPoint;
        $client = new Client(self::HttpHeaders());
        $response = $client->get($url, ['verify' => false]);

        return $response->getBody()->getContents();
    }

    public static function PostDataApi($endPoint, $body)
    {
        $app = App();
        $url = $app['api_url_firman'] . $endPoint;
        $client = new Client(self::HttpHeaders());
        $request = $client->request('POST',$url, ['form_params' => $body]);
        $response = $request->getBody()->getContents();
        return $response;
    }

    public static function PutDataApi($endPoint, $body)
    {
        $app = App();
        $url = $app['api_url_firman'] . $endPoint;
        $client = new Client(self::HttpHeaders());
        $request = $client->request('PUT',$url, ['form_params' => $body]);
        $response = $request->getBody()->getContents();
        return $response;
    }

    public static function deleteDataApi($endPoint, $body)
    {
        $app = App();
        $url = $app['api_url_firman'] . $endPoint;
        $client = new Client(self::HttpHeaders());
        $request = $client->delete($url, ['body' => json_encode($body)]);
        $response = $request->getBody()->getContents();
        return $response;
    }

}