<?php
namespace CampaignBundle;

use Core\Controller;

class PageController extends Controller {

	public function indexAction() {
		$this->render('index');
	}

	public function secondAction() {
		global $user;
		$wechatAPI = new \Lib\CurioWechatAPI();
		$issubscribe = $wechatAPI->isSubscribed($user->openid);
		$this->render('second', array( 'subscribe' => $issubscribe ));
	}

	public function thirdAction() {
		$this->render('third');
	}

	public function cardAction() {
		$card = 'pKCDxjpR7kxh7S9bvlILg2lDTBUY';
		$wechatapi = new \Lib\CurioWechatAPI();
		$list = $wechatapi->cardList($card);
		return $this->statusPrint(1, $list);
	}

	public function clearCookieAction() {
		setcookie('_user', json_encode($user), time(), '/');
		$this->statusPrint('success');
	}
}