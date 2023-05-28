<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Phpfastcache\Helper\Psr16Adapter;

class InstagramController extends Controller
{
    public function getPosts()
    {
        $accessToken = 'IGQVJXT2phZAklYSDFEMER0eEJEQjBmVWlGWFNjbDdKUUlIZAWo1VkpPMUVsSklNYnRJSEY2WHQyaXhaSU9sdWMwMzhJelZAKTW14WVpnVjFManlmZAXdjb1ZA4YmNjLTdETkU4QnBkUndjUkgya0FaZAFVvOAZDZD';
        $response = Http::get("https://graph.instagram.com/me/media?access_token={$accessToken}");
        $mediaData = json_decode($response->body(), true)['data'];
        return $mediaData;
    }
}
