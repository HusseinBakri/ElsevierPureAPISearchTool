<?php
// Using Guzzle PHP HTTP client
// https://guzzle.readthedocs.io/en/stable/
// Use https://jsonplaceholder.typicode.com/ as a fake RestAPI

require 'vendor/autoload.php';
use GuzzleHttp\Client;

$client = new Client();
$response = $client->request(
'POST',
'https://jsonplaceholder.typicode.com/posts',
[
  'json' => [
    'title' => 'Working with Guzzle',
    'body' => 'Working with Guzzle is easy',
    'userId' => 2
  ],
]
);

echo '<pre />';
print_r($response);

echo '<br/> <hr/>';
echo $response->getStatusCode();

echo '<br/> <hr/>';
echo $response->getBody();
