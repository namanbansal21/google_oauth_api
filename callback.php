<?php
session_start();
require_once '/var/www/html/glogin/google-api-php-client--PHP5.6/vendor/autoload.php';
$clientId = '653403890744-b00qqu972tr9vj3cojfjqkpol3oem22s.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'http://localhost/glogin/callback.php';

$client = new Google_Client();
$client->setClientId($clientId);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token['access_token']);
    $oauth2 = new Google_Service_Oauth2($client);
    $userInfo = $oauth2->userinfo->get();
    //print_r($userInfo);die;
    // Access user data
    $userId = $userInfo->id;
    $name = $userInfo->name;
    $email = $userInfo->email;

    $servername = "localhost";
    $username = "root";
    $password = "123456";
    $db = "my_oauth_db";
 
    $conn = new mysqli($servername, $username, $password,$db);
    
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "INSERT INTO users (google_id, name, email)VALUES ('".$userId."','".$name."','".$email.
    "')";
    
    if ($conn->query($sql)) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
    $_SESSION['userinfo'] = $userInfo;
    header("Location: profile.php");
    exit;
} elseif (isset($_GET['error'])) {
    echo 'Error: ' . $_GET['error'];
}
?>