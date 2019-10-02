<?php
require_once('config.php');

/**
 * A function that calls the PURE API functions - using PHP cURL
 * @param string HTTP verb method such as 'GET', 'POST'
 * @param string The URL of the API endpoint
 * @param bool
 * @return string depicting the result
 */
function callAPIWithAPIKeycURL($method, $url, $data = false)
{
    $curl = curl_init();

    switch ($method) {
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);
            if ($data) {
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            }
            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
            if ($data) {
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            }
            break;
        default:
            if ($data) {
                $url = sprintf("%s?%s", $url, http_build_query($data));
            }
    }

    // OPTIONS:
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'api-key: API_KEY',
    ));
    //CURLOPT_RETURNTRANSFER	TRUE to return the transfer as a string of the return value of curl_exec()
    //instead of outputting it directly. Try 0 to return JSON not string.
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

    // EXECUTE:
    $result = curl_exec($curl);
    if (!$result) {
        error_log("curl-exec failed", 0);
        die("Connection Failure");
    }
    curl_close($curl);
    return $result;
}


/**
 * A function that calls the PURE API functions - using PHP cURL
 * Method: POST, PUT, GET etc
 * @param string HTTP verb method such as 'GET', 'POST'
 * @param string The URL of the API endpoint
 * @param bool
 * @return string returns the result
 */
function CallAPIv2UsernamePasswordcURL($method, $url, $data = false)
{
    $curl = curl_init();

    switch ($method) {
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);

            if ($data) {
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            }
            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_PUT, 1);
            break;
        default:
            if ($data) {
                $url = sprintf("%s?%s", $url, http_build_query($data));
            }
    }

    // Optional Authentication:
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($curl, CURLOPT_USERPWD, "username:password");

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec($curl);

    curl_close($curl);

    return $result;
}


/**
 * A function that calls the PURE API functions - using PHP cURL
 * Method: POST, PUT, GET etc
 * Data: array("param" => "value") ==> index.php?param=value
 * @param string HTTP verb method such as 'GET', 'POST'
 * @param string The URL of the API endpoint
 * @param bool
 * @return string returns the result
 */
function CallAPIv2WithAPIKeycURL($method, $url, $data = false)
{
    $curl = curl_init();

    switch ($method) {
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);

            if ($data) {
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            }
            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_PUT, 1);
            break;
        default:
            if ($data) {
                $url = sprintf("%s?%s", $url, http_build_query($data));
            }
    }

    // Optional Authentication:
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($curl, CURLOPT_USERPWD, "username:password");

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec($curl);

    curl_close($curl);

    return $result;
}


//Using Guzzle PHP HTTP client
//https://guzzle.readthedocs.io/en/stable/
// Use https://jsonplaceholder.typicode.com/ as a fake RestAPI
require 'Guzzle/vendor/autoload.php';

use GuzzleHttp\Client;

/**
 * A function that calls the PURE API endpoints - using the Guzzle PHP HTTP client
 * Method: POST, PUT, GET etc.
 * API_KEY is defined in config.php
 * @param string HTTP verb method such as 'GET', 'POST'
 * @param string The URL of the API endpoint
 * @return string returns a JSON
 */
function callAPIWithAPIKeyGuzzleGET($method, $url)
{
    $client = new Client();

    $response = $client->request(
        $method,
        $url,
        [
            'headers' => [
                'Accept' => 'application/json',
                'api-key' => API_KEY,
            ]
        ]
    );

    return json_decode($response->getBody(), true);
}

/**
 * A function that calls the PURE API endpoints - using the Guzzle PHP HTTP client
 * Method: POST, PUT, GET etc. but this functions requires a body to be given as an associative
 * array which represent a JSON body for maybe a POST request
 * API_KEY is defined in config.php
 * @param string HTTP verb method such as 'POST'
 * @param string The URL of the API endpoint
 * @param array Associative array representing a JSON
 * @return string returns a JSON
 */
function callAPIWithAPIKeyGuzzlePOST($method, $url, $bodydata)
{
    $client = new Client();

    $response = $client->request(
        $method,
        $url,
        [
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'api-key' => API_KEY,
            ],
            'json' => $bodydata
        ]
    );


    return json_decode($response->getBody(), true);
}
