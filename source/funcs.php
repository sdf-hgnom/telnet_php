<?php
require 'vendor/autoload.php';
const AUTH_URL = 'https://cloud.ucams.ru/api/v0/auth';

function get_token()
{


    $name = getenv("VIDEO_USER");
    $password = getenv("VIDEO_PASSWORD");
    $option = array('username' => $name, 'password' => $password,);
//    echo '<pre>';
//    print_r($option);
//    echo '</pre>';
    $headers = ['Accept' => 'application/json',];
    $client = new GuzzleHttp\Client(['headers' => $headers]);
    $response = $client->request('POST', AUTH_URL, ['json' => $option]);
    $body = $response->getBody()->getContents();
    $result = json_decode($body, true);
    return $result['token'];
}

function get_api($url, $token, $body)
{
    $headers = [
        'Content-Type' => 'application/json',
        'AccessToken' => $token,
        'Authorization' => 'Bearer ' . $token,
    ];
    $client = new GuzzleHttp\Client(['headers' => $headers]);
    $res = $client->request('POST', $url, ['json' => $body]);
    $r_body = $res->getBody()->getContents();
    return json_decode($r_body, true);
}

function get_this($number, $token)
{
    $headers = [
        'Content-Type' => 'application/json',
        'AccessToken' => $token,
        'Authorization' => 'Bearer ' . $token,
    ];
    $body = array('fields' => array(
        'number', 'token_l', 'address', 'server', 'title'),
        'numbers' => [$number],
    );
    $client = new GuzzleHttp\Client(['headers' => $headers]);
    $res = $client->request('POST', 'https://cloud.ucams.ru/api/v0/cameras/this/', ['json' => $body]);
    $r_body = $res->getBody()->getContents();
    return json_decode($r_body, true);

}

function save_camera_foto($number, $server, $token)
{
    $img_name = "images/" . $number . "~400.jpg";
    $image_path = "https://" . $server . "/api/v0/screenshots/" . $number . "~400.jpg?token=" . $token;
    file_put_contents($img_name, file_get_contents($image_path));

}

function check_datetime($x): bool
{

    return (date('d-m-Y H:i', strtotime($x)) == $x);
}
/*
 *   return num random symbols
 */
function random_string($num){
    $result ='';
    $i = 0;
    while ($i<$num){
        $ch = chr(rand(48,57));
        if (strpos($result,$ch) == 0){
            $result = $result . $ch;
            $i++;
        }
    }
    return $result;

}

