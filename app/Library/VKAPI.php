<?php
namespace App\Library;
class VKAPI {
    private $v = '5.130';
    private $groupId;
    private $token;

    protected $subscribers = [];
    protected $subscribersId = [];

    public function __construct($groupId, $token){
        $this->groupId = $groupId;
        $this->token = $token;
    }

    public function getPhoto($id, $userId)
    {
        $data = [
//            'owner_id' => $this->groupId,
            'v' => $this->v,
            'access_token' => $this->token,
            'photos' => $userId . '_' .$id
//            'sort' => 'time_desc',
//            'fields' => 'photo_max'
        ];
        return $this->apiRequest('photos.getById', $data);
    }

    public function getPosts($count){
        $data = [
            'owner_id' => $this->groupId,
            'count' => $count,
            'v' => $this->v,
            'access_token' => $this->token
//            'sort' => 'time_desc',
//            'fields' => 'photo_max'
        ];
        return $this->apiRequest('wall.get', $data);

//        $members = $this->apiRequest('groups.getMembers');

//        foreach($members['response']['items'] as $member){
//            $this->subscribers[] = $member;
//            $this->subscribersId[] = $member['id'];
//        }

    }

    public function getSubscribersId(){
//        return $this->subscribersId;
    }

    private function apiRequest($method, $data = array()) {
        $string = http_build_query($data);
        $url = 'https://api.vk.com/method/'.$method.'?';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url.urldecode($string));
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, false );
        curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
        $response = curl_exec($ch);
        curl_close($ch);

        return json_decode($response, true);
    }
}
