<?php

$owner_id = $_POST['owner_id'];
$holder_name = $_POST['holder_name'];
$routing_number = $_POST['routing_number'];
$bank_name = $_POST['bank_name'];
$bank_code = $_POST['bank_code'];
$account_number = $_POST['account_number'];


$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://alliedtechnologies.cloud/clients/whips/api/v1/boosted.php',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array(
    'request' => 'updateBankDetails',
    'owner_id' => $owner_id,
    'holder_name' => $holder_name,
    'routing_number' => $routing_number,
    'bank_name' => $bank_name,
    'bank_code' => $bank_code,
    'account_number' => $account_number
 ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
