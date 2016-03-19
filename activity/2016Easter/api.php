<?php
require_once('../../lib/utils.php');
require_once('../../lib/response.php');
require_once('EasterServer.php');

$u = new Utils();
$ct = $u->V('ct');
$ac = $u->V('ac');

if($ct != 'christmas'){
    Response::json(404,false,'Parameter error','');
}

switch($ac){
    case 'myGift':
        Response::json(200,true,'OK',EasterServer::myGift());
        break;
    case 'getMobileGameGift':
        Response::json(200,true,'OK',EasterServer::getMobileGameGift('1'));
        break;
    case 'shakeTree':
        Response::json(200,true,'OK',EasterServer::shakeTree());
        break;
    case 'myGoods':
        Response::json(200,true,'OK',EasterServer::checkMyGoods());
        break;
    case 'submitInfo':
        $data['email']    = $u->V('email');
        $data['fullName'] = $u->V('fullName');
        $data['address']  = $u->V('address');
        $data['city']     = $u->V('city');
        $data['state']    = $u->V('state');
        $data['zip']      = $u->V('zip');
        $data['phone']    = $u->V('phone');
        $data['country']  = $u->V('country');
        Response::json(200,true,'OK',EasterServer::submitInfo($data));
        break;
    default:
        Response::json(200,true,'OK',EasterServer::index());
}
    

