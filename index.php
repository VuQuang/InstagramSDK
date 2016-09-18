<?php
require_once (__DIR__.'/instagram-sdk/autoload.php');

$test = new Instagram\InstagramGet(array(
    'APP_ID' => '55f12b13f2fe43f6bb511417bc8baea9',
    'APP_SECRET' => '56f6c93ba4df4237978863ce8b2a3acf',
    'ACCESS_TOKEN' => '3246344397.1677ed0.16f3192b8fc04621a213d687179d1f8a',
    'API_BASE_URL' => 'https://api.instagram.com/v1/'
));
$test->setRawHttpHeader(array(
    'endpoint' => 'users/self/media/recent',
));
$media = new Instagram\Media\Analytics($test);
var_dump($media->countEngagement('likes'));