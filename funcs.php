<?php
require_once 'c:\work\telnet_cams\vendor\autoload.php';
//require_once __DIR__ . '/composer/autoload_real.php';
//namespace GuzzleHttp;
//use GuzzleHttp;
const AUTH_URL = 'https://cloud.ucams.ru/api/v0/auth';
function get_token()
{


    $name = getenv("VIDEO_USERNAME");
    $password = getenv("VIDEO_PASSWORD");
    $option = array('username' => $name, 'password' => $password,);
    $client = new GuzzleHttp\Client();
    $header = ['Accept' => 'application/json',];
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

function get_this($number,$token){
    $headers = [
        'Content-Type' => 'application/json',
        'AccessToken' => $token,
        'Authorization' => 'Bearer ' . $token,
    ];
    $body = array('fields' => array(
        'number', 'token_l', 'address', 'server','title'),
        'numbers' => [$number],
    );
    $client = new GuzzleHttp\Client(['headers' => $headers]);
    $res = $client->request('POST', 'https://cloud.ucams.ru/api/v0/cameras/this/', ['json' => $body]);
    $r_body = $res->getBody()->getContents();
    return json_decode($r_body, true);

}
function save_camera_foto($number,$server,$token){
    $img_name = "images/" .$number . "~400.jpg";
    $image_path = "https://" . $server ."/api/v0/screenshots/" .$number ."~400.jpg?token=" .$token;
    file_put_contents($img_name, file_get_contents($image_path));

}

function check_datetime($x): bool
{

    return (date('d-m-Y H:i', strtotime($x)) == $x);
}

/**
 * Copy remote file over HTTP one small chunk at a time.
 *
 * @param $infile The full URL to the remote file
 * @param $outfile The path where to save the file
 */
function copyfile_chunked($infile, $outfile)
{
    $chunksize = 10 * (1024 * 1024); // 10 Megs

    /**
     * parse_url breaks a part a URL into it's parts, i.e. host, path,
     * query string, etc.
     */
    $parts = parse_url($infile);
    $i_handle = fsockopen($parts['host'], 80, $errstr, $errcode, 5);
    $o_handle = fopen($outfile, 'wb');

    if ($i_handle == false || $o_handle == false) {
        return false;
    }

    if (!empty($parts['query'])) {
        $parts['path'] .= '?' . $parts['query'];
    }

    /**
     * Send the request to the server for the file
     */
    $request = "GET {$parts['path']} HTTP/1.1\r\n";
    $request .= "Host: {$parts['host']}\r\n";
    $request .= "User-Agent: Mozilla/5.0\r\n";
    $request .= "Keep-Alive: 115\r\n";
    $request .= "Connection: keep-alive\r\n\r\n";
    fwrite($i_handle, $request);

    /**
     * Now read the headers from the remote server. We'll need
     * to get the content length.
     */
    $headers = array();
    while (!feof($i_handle)) {
        $line = fgets($i_handle);
        if ($line == "\r\n") break;
        $headers[] = $line;
    }

    /**
     * Look for the Content-Length header, and get the size
     * of the remote file.
     */
    $length = 0;
    foreach ($headers as $header) {
        if (stripos($header, 'Content-Length:') === 0) {
            $length = (int)str_replace('Content-Length: ', '', $header);
            break;
        }
    }

    /**
     * Start reading in the remote file, and writing it to the
     * local file one chunk at a time.
     */
    $cnt = 0;
    while (!feof($i_handle)) {
        $buf = '';
        $buf = fread($i_handle, $chunksize);
        $bytes = fwrite($o_handle, $buf);
        if ($bytes == false) {
            return false;
        }
        $cnt += $bytes;

        /**
         * We're done reading when we've reached the conent length
         */
        if ($cnt >= $length) break;
    }

    fclose($i_handle);
    fclose($o_handle);
    return $cnt;
}

