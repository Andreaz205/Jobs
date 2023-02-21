<?php

namespace App\Http\Controllers;

use App\Library\VKAPI;
use App\Models\VkontaktePosts;
use App\Models\VkontakteToken;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Laravel\Socialite\Facades\Socialite;

class VkontakteController extends Controller
{
    public function posts()
    {
        $count = 2;
        $token = env('VK_SERVICE_KEY');
        $groupId = env('VK_GROUP_ID');
        $cover = new VKAPI($groupId, $token);
        $response = $cover->getPosts($count);
        $response2 = $cover->getPhoto(457265790, -213512846);
//        foreach ($response as $key=>$field) {
//            if ($key === 'error') {
//                $url = Socialite::driver('vkontakte')->stateless()->redirect()->getTargetUrl();
//                $client = new Client();
//                $response = $client->get($url);
//                dd($response->getBody()->getContents());
//                break;
//            }
//        }

        dd($response2);
        return $response->getBody();
    }
}
