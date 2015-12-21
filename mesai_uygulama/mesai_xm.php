<?php
header('Content-Type: application/json');

if(isset($_POST) && $_POST){
    $arayan = $_POST["caller"];
    $aranan = $_POST["callee"];
    $zaman = date("d.m.Y H:i");
    $metin = $zaman." tarihinde $arayan numarası, sizin $aranan numaranızı aradı bilgiginiz olsun.";

    require __DIR__."/vendor/autoload.php";
    $masterToken = "9d020c10d7e1d19f229a6b3f5c0921431baa85adf332edd06d6ca9514d896604";
    $provider = new \Bulutfon\OAuth2\Client\Provider\Bulutfon(array(
        'verifySSL'=>false
    ));
    $ac = new \League\OAuth2\Client\Token\AccessToken(array('access_token'=>$masterToken));

    $m = array(
        'title'=>'PROJEKOD',
        'receivers'=>'905326202911,905322041584,905326467227',
        'content'=>$metin
    );

    $sonuc = $provider->sendMessage($ac,$m);
}

$content = [
    'bfxm' => [
        'version'=>'1'
    ],
    'seq' => [
        [
            'action'=>'play',
            'args' => [
                'url'=>'http://projekod.com/mesai/mesai.mp3'
            ]
        ]
    ]
];

echo json_encode($content);