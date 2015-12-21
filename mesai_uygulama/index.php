<?php

require __DIR__."/vendor/autoload.php";


$masterToken = "9d020c10d7e1d19f229a6b3f5c0921431baa85adf332edd06d6ca9514d896604";
$provider = new \Bulutfon\OAuth2\Client\Provider\Bulutfon(array(
    'verifySSL'=>false
));

$ac = new \League\OAuth2\Client\Token\AccessToken(array('access_token'=>$masterToken));

$m = array(
    'title'=>'PROJEKOD',
    'receivers'=>'905302756927',
    'content'=>'Galp'
);

$sonuc = $provider->sendMessage($ac,$m);

print_r($sonuc);

