<title>Neelansh Calls</title>
<?php
require __DIR__ . '/vendor/autoload.php';
use Twilio\Rest\Client;

// Your Account SID and Auth Token from twilio.com/console
$account_sid = '';
$auth_token = '';
// In production, these should be environment variables. E.g.:
// $auth_token = $_ENV["TWILIO_ACCOUNT_SID"]

// A Twilio number you own with Voice capabilities
$twilio_number = "";

// Where to make a voice call (your cell phone?)
$to_number = "";

$client = new Client($account_sid, $auth_token);
$client->account->calls->create(  
    $to_number,
    $twilio_number,
    array(
        // "url" => "http://demo.twilio.com/docs/voice.xml"
        "url" => "https://neelansh.co/twilio/makecallvoice.xml"
    )
);

echo "<h1>Making the call from number <b>$twilio_number</b></h1>";

