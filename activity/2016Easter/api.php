<?php
require_once('../../lib/utils.php');
require_once('../../lib/response.php');
require_once('EasterServer.php');

$ct = Utils::V('ct');
$ac = Utils::V('ac');

if($ct != 'christmas'){
    Response::json(404,false,'Parameter error','');
}

switch($ac){
    case 'myGift':
        Response::json(200,true,'OK',EasterServer::myGift());
        break;
    case 'getLuckPack':
        Response::json(200,true,'OK',EasterServer::getLuckPack(Utils::V('awardsID'), Utils::V('gameID'),Utils::V('flag')));
        break;
    case 'shakeTree':
        Response::json(200,true,'OK',EasterServer::shakeTree());
        break;
    case 'myGoods':
        Response::json(200,true,'OK',EasterServer::checkMyGoods());
        break;
    case 'submitInfo':
        $data['email']    = Utils::V('email');
        $data['fullName'] = Utils::V('fullName');
        $data['address']  = Utils::V('address');
        $data['city']     = Utils::V('city');
        $data['state']    = Utils::V('state');
        $data['zip']      = Utils::V('zip');
        $data['phone']    = Utils::V('phone');
        $data['country']  = Utils::V('country');
        Response::json(200,true,'OK',EasterServer::submitInfo($data));
        break;
    case 'getCode':
        Response::json(200,true,'OK',EasterServer::getCode());
        break;
    default:
        Response::json(200,true,'OK',EasterServer::index());
}
    

