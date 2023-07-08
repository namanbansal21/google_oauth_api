<?php
require_once '/var/www/html/glogin/google-api-php-client--PHP5.6/vendor/autoload.php';

// Replace with your own client ID and secret
$clientId = '653403890744-b00qqu972tr9vj3cojfjqkpol3oem22s.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'http://localhost/glogin/callback.php';

$client = new Google_Client();
$client->setClientId($clientId);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope('email');
$client->addScope('profile');

$authUrl = $client->createAuthUrl();    

if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token['access_token']);

    $oauth2 = new Google_Service_Oauth2($client);
    $userInfo = $oauth2->userinfo->get();

    // Access user data
    $userId = $userInfo->id;
    $name = $userInfo->name;
    $email = $userInfo->email;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Google Login</title>
    <link rel="stylesheet" href="app.css">
</head>
<body>
    <a href="<?php
     echo $authUrl; ?>"><button type="button" class="login-with-google-btn" >
     Sign in with Google
   </button></a>
</body>
</html>
