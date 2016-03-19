<?php
require_once('../../common/response.php');
require_once('EasterServer.php');

$ct = isset($_GET['ct'])?$_GET['ct']:'';
$ac = isset($_GET['ac'])?$_GET['ac']:'';
$callback = isset($_GET['jsoncallback'])?$_GET['jsoncallback']:'';

if($ct != 'christmas'){
     Response::json(404,false,'Parameter error','');
}

switch($ac){
    case 'myGift':
        Response::jsonp($callback,200,true,'OK',EasterServer::myGift());
        break;
    case 'getMobileGameGift':
        Response::jsonp($callback,200,true,'OK',EasterServer::getMobileGameGift('1'));
        break;
    case 'shakeTree':
        Response::jsonp($callback,200,true,'OK',EasterServer::shakeTree());
        break;
    default:
        Response::jsonp($callback,200,true,'OK',EasterServer::index());
}
    

