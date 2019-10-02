<?php
// Using Guzzle PHP HTTP client
// https://guzzle.readthedocs.io/en/stable/
// Use https://jsonplaceholder.typicode.com/ as a fake RestAPI

require 'vendor/autoload.php';
use GuzzleHttp\Client;

$client = new Client(['base_uri'=>'https://jsonplaceholder.typicode.com/']);
$response = $client->get('posts/1');

echo '<pre />';
print_r($response);

echo '<br/> <hr/>';
echo $response->getStatusCode();

echo '<br/> <hr/>';
echo $response->getBody();

echo '<br/> <hr/>';
$response = $client->get('posts/2');
echo '<br/> <hr/>';
echo $response->getBody();

echo '<br/> <hr/>';
$response = $client->get('comments/2');
echo '<br/> <hr/>';
echo $response->getBody();


$response = $client->get(
  'https://httpbin.org/ip'
);
echo '<br/> <hr/>';
echo $response->getBody();
