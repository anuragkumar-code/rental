<?php
session_start();

$status = $_POST['status'];
$booking_id = $_POST['booking_id'];
$user_id = $_SESSION['user_id'];

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://alliedtechnologies.cloud/clients/whips/api/v1/owner.php',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array(
    'request' => 'update_booking_status',
    'user_id' => $user_id,
    'booking_id' => $booking_id,
    'status' => $status
  ),
  CURLOPT_HTTPHEADER => array(
    'Authorization: Bearer e37834b4b0119181b399479527013ab1a206ca8326e23cea4427aacc3ce709a0',
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;