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


//URL POST for Guzzle Query GET Method code below - comment out if you decide not to use this method
// The following is the old method - kept for archival purposes
if (isset($_POST['URL']) && !empty($_POST['URL'])) {

//For calling API via PHP cURL (uncomment below if you want)
//$APIresult = callAPIWithAPIKeycURL("GET", $_POST['URL'] );

//For calling API via Guzzle HTTP Client library (uncomment below)
    $APIresult = callAPIWithAPIKeyGuzzleGET("GET", $_POST['URL']);

//echo json_decode($APIresult);
    echo json_encode($APIresult);
}

//New method
//Sending a JSON body of customised fields that is received from client code as a body for a POST call to the PURE API
if (isset($_POST['JSON']) && !empty($_POST['JSON'])) {
    //For calling API via Guzzle HTTP client - POST verb
    //Transforms the JSON that you intent to send to a PHP associative array
    //Code here that transform the JSON from client to a PHP array
    //********

    $receivedData = json_decode(json_encode($_POST['JSON']), true);

    //Example associative array that Guzzle requires for a JSON representation
    //The following is just a test data that was used for learning purposes - not used in final version of the code
    $POST_body = array(
        'size' => 2,
        "fields" => [
            "title"
        ],
        "publishedBeforeDate" => "2010-04-23T22:57:58.636Z",
        "publishedAfterDate" => "2000-04-23T22:57:58.636Z",
        'searchString' => 'education'
    );


    $APIresult = callAPIWithAPIKeyGuzzlePOST('POST', Base_PURE_Research_Outputs_URL, $receivedData);

    //echo json_decode($APIresult);
    echo json_encode($APIresult);

}


?>
