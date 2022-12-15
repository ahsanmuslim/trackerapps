<?php
namespace Teckindo\TrackerApps\Config;

function Conn()
{
    return $db =  [
        "host" => $_ENV['DB_HOST'],
        "port" => $_ENV['DB_PORT'],
        "user" => $_ENV['DB_USERNAME'],
        "pass" => $_ENV['DB_PASSWORD'],
        "name" => $_ENV['DB_DATABASE']
    ];
}

function App()
{
    return $app = [
        "app_name" => $_ENV['APP_NAME'],
        "app_env" => $_ENV['APP_ENV'],
        "app_url" => $_ENV['APP_URL'],
        "lifetime" => $_ENV['SESSION_LIFETIME'],
        "api_mac" => $_ENV['API_KEY_MAC'],
        "api_tiny" => $_ENV['API_KEY_TINY']
    ];
}
