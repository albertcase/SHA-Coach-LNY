<?php

$routers = array();
$routers['/wechat/oauth2'] = array('WechatBundle\Wechat', 'oauth');
$routers['/wechat/callback'] = array('WechatBundle\Wechat', 'callback');
$routers['/callback'] = array('WechatBundle\Curio', 'callback');
$routers['/getdata'] = array('WechatBundle\Curio', 'receiveUserInfo');
$routers['/wechat/ws/jssdk/config/webservice'] = array('WechatBundle\WebService', 'jssdkConfigWebService');
$routers['/wechat/ws/jssdk/config/js'] = array('WechatBundle\WebService', 'jssdkConfigJs');
$routers['/ajax/post'] = array('CampaignBundle\Api', 'form');
$routers['/api/submit'] = array('CampaignBundle\Api', 'submit');
$routers['/api/card'] = array('CampaignBundle\Page', 'card');
$routers['/second'] = array('CampaignBundle\Page', 'second');
$routers['/third'] = array('CampaignBundle\Page', 'third');
$routers['/clear'] = array('CampaignBundle\Page', 'clearCookie');