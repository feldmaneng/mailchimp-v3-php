<?php

require '../Kint/kint.class.php';
require 'MailchimpService.php';

$conf = [
          'apiurl' => 'https://us4.api.mailchimp.com/3.0/',
          'apikey' => 'c2880a6edd8f77e5b93b72da2f6d38f0-us4',
          'list' => 'c05fe2ad9e', //d43ce06e8d',  // list id from https://us11.api.mailchimp.com/playground/
          'logfile' => 'mailchimp.log' 
];
$user = (object)['id' => 53]; // for loging purposes only

$mailchimp = new Mailchimp($conf, $user);
$mail = 'web@iradave.com';
$results = $mailchimp->getStatus($mail);

if ($mailchimp) { echo "OK<br>";}
if (!$mailchimp) { echo "Failed<br>";}

d($results);

echo "Try for entire list<br>";


$results = $mailchimp->getList();
d($results);

$response = $results->response;
d($response);
$member_array = $results->response->members;
d($member_array);

foreach ($member_array as $person) {
	echo $person->email_address . ' ' . $person->merge_fields->GIVEN . '<br>';
}

?>
