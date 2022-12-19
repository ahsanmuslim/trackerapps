<?php
namespace Teckindo\TrackerApps\Helper;

use Teckindo\TrackerApps\App\Controller;

class ParsingURL extends Controller
{
    public static function parseURL () 
	{
		if ( isset($_SERVER['REQUEST_URI']) ){
			$url = rtrim($_SERVER['REQUEST_URI'],'/');
			$url = filter_var($url, FILTER_SANITIZE_URL);
			$url = explode('/', $url);
            array_shift($url);
			return $url;
		}
	}
}
