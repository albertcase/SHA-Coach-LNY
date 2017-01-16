<?php
namespace Lib;

use Core\Response;

class CurioWechatAPI {
	
	public function wechatAuthorize() {
    	$response = new Response();
    	$response->redirect(CURIO_AUTH_URL);  
  	}

  	public function getUserInfo($openid) {
	  	$api_url = "http://coach.samesamechina.com/v2/wx/users/no_cache/" . $openid . "?access_token=" . TOKEN;
	    $ch = curl_init ();
	    // print_r($ch);
	    curl_setopt ( $ch, CURLOPT_URL, $api_url );
	    //curl_setopt ( $ch, CURLOPT_POST, 1 );
	    curl_setopt ( $ch, CURLOPT_HEADER, 0 );
	    curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
	    //curl_setopt ( $ch, CURLOPT_POSTFIELDS, json_encode($data) );
	    $info = curl_exec ( $ch );
	    curl_close ( $ch );
	    $rs = json_decode($info, true);
	    return $rs;
	}

	public function isSubscribed($openid) {
	    $info = $this->getUserInfo($openid);
	    if(isset($info['subscribe']) && $info['subscribe'] == 1)
	      return TRUE;
	    else
	      return FALSE;
	}

	public function cardList($cardid){
	    $api_url = 'http://coach.samesamechina.com/v2/wx/card/js/add/json?access_token='. TOKEN;
        $data[] = array(
            'card_id' => $cardid,
            'code' => '',
            'openid' => ''
        );   
	    $ch = curl_init ();
	    curl_setopt ( $ch, CURLOPT_URL, $api_url );
	    curl_setopt ( $ch, CURLOPT_POST, 1 );
	    curl_setopt ( $ch, CURLOPT_HEADER, 0 );
	    curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
	    curl_setopt ( $ch, CURLOPT_POSTFIELDS, json_encode($data) );
	    $return = curl_exec ( $ch );
	    curl_close ( $ch );
	    $return = json_decode($return,true);

	    return $cardList = $return['data']['cardList'];
	  }
}