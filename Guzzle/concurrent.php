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
'GET','https://jsonplaceholder.typicode.com/posts/1'
);

$promise2 = $client->requestAsync(
'GET','https://jsonplaceholder.typicode.com/posts/2'
);

$promiseArray = [$promise, $promise2];

$results = GuzzleHttp\Promise\settle($promiseArray)->wait();

foreach($results as $result){
  echo $result['value']->getBody();
  echo '<br /> <hr />';
}
