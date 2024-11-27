<?php
session_start();

$curl = curl_init();

$car_id = $_POST['car_id'];
$from_date = (new DateTime($_POST['from_date']))->format('d-m-Y');
$to_date = (new DateTime($_POST['to_date']))->format('d-m-Y');

$owner_id = $_POST['owner_id'];

$renter_id = $_SESSION['user_id'];

// echo "<pre>"; print_r($_POST);exit;
curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://alliedtechnologies.cloud/clients/whips/api/v1/renter.php',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => array(
        'request' => 'make_booking',
        'user_id' => $owner_id,
        'car_id' => '1732704335',
        'renter_id' => $renter_id,
        'from_date' => $from_date,
        'to_date' => $to_date
    ),
    CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer e37834b4b0119181b399479527013ab1a206ca8326e23cea4427aacc3ce709a0',
    ),
));

$response = curl_exec($curl);
curl_close($curl);
echo $response;
// $response_data = json_decode($response, true);



?>
