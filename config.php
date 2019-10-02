<?php
//This is a configuration file that aims to provide one place to change API keys & base URLs

// The PURE API Key
DEFINE('API_KEY', 'XXXXXXXXXXXXXX');

//Base URL
// At the current version, the client in index.php construct the complete URL
// and send it to the server handler for API requests
//No need to change anything in Base_PURE_URL

//The URL of the API Research Outputs endpoint
DEFINE('Base_PURE_Research_Outputs_URL', 'https://UNIVERSITYURL/ws/api/513/research-outputs');

//The URL of the PURE API Activities endpoint
DEFINE('Base_PURE_Activities_URL', 'https://UNIVERSITYURL/ws/api/513/activities');

//The URL of the PURE API Datasets endpoint
DEFINE('Base_PURE_Datasets_URL', 'https://UNIVERSITYURL/ws/api/513/datasets');

//The URL of the PURE API Journals endpoint
DEFINE('Base_PURE_Journals_URL', 'https://UNIVERSITYURL/ws/api/513/journals');
