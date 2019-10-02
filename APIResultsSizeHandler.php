<?php
/**
 * a PHP file that handles the AJAX requests sent from index.php
 * In my first method I made the index.php client code send a very long query URL with fields and search query
 * That did not give the ability to customize and put constraints on fields themselves which
 * you can do only apparently via a POST i.e. sending a POST request with a JSON body with constraints on fields
 */

//config.php contains the API KEY and Base URL of endpoints
require_once('config.php');

// functions.php contains a set of useful functions to communicate with the PURE API
require_once('functions.php');


//URL Query GET Method code below - comment out if you decide not to use this method

if (isset($_POST['URL']) && !empty($_POST['URL'])) {

//For calling API via PHP cURL (uncomment below if you want)
//$APIresult = callAPIWithAPIKeycURL("GET", $_POST['URL'] );

//For calling API via Guzzle HTTP Client library (uncomment below)
    $APIresult = callAPIWithAPIKeyGuzzleGET("GET", $_POST['URL']);

//echo json_decode($APIresult);
    echo json_encode($APIresult);
}


//Sending a JSON body of customised fields that is received from client code as a body for a POST call to the PURE API
if (isset($_POST['JSON']) && !empty($_POST['JSON'])) {
    //For calling API via Guzzle HTTP client - POST verb
    //Tranform the JSON that you intent to send to a PHP associative array

    //Code here that transforms the JSON from client to a PHP array
    //********

    $receivedData = json_decode(json_encode($_POST['JSON']), true);


    $APIresult = callAPIWithAPIKeyGuzzlePOST('POST', Base_PURE_Research_Outputs_URL, $receivedData);

//Sending back the total number of results (count).
    //$APIresult is already a PHP associative array you can see that by print_r
    //print_r($APIresult) ;
    //echo $APIresult->count;
    echo json_encode($APIresult);
}


?>
