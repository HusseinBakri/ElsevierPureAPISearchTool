<?php
// Using Guzzle PHP HTTP client
// https://guzzle.readthedocs.io/en/stable/
// Use https://jsonplaceholder.typicode.com/ as a fake RestAPI

require 'vendor/autoload.php';
use GuzzleHttp\Client;

$client = new Client();
$response = $client->request(
'GET','https://jsonplaceholder.typicode.com/posts',
[
  'query' => 'userId=1'
]
);

echo '<pre />';
echo $response->getBody();
echo '<br/> <hr/>';

$response2 = $client->request(
'GET','https://jsonplaceholder.typicode.com/posts',
[
  'query' => [
    'userId' => 1,
    'id' => 4
  ]
]
);

echo '<pre />';
echo $response2->getBody();
echo '<br/> <hr/>';
