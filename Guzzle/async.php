<?php
// Using Guzzle PHP HTTP client
// https://guzzle.readthedocs.io/en/stable/
// Use https://jsonplaceholder.typicode.com/ as a fake RestAPI

require 'vendor/autoload.php';
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Exception\RequestException;

$client = new Client();

$promise = $client->requestAsync(
'GET','https://jsonplaceholder.typicode.com/posts'
);

$promise->then(
  function (Response $resp){
    echo $resp->getBody();
  },
  function (RequestException $e){
    echo $e->getMessage();
  }
);

$promise->wait();
