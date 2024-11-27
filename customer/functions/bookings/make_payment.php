<?php
$curl = curl_init();

$car_id = $_POST['car_id'];

$from_date = $_POST['from_date'];
$renter_id = $_POST['renter_id'];
$to_date = $_POST['to_date'];
$user_id = $_POST['user_id'];

// echo $_POST; exit;

curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://alliedtechnologies.cloud/clients/whips/api/v1/renter.php',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => array('request' => 'make_booking','user_id' => '63','car_id' => '294514','renter_id' => $renter_id,'from_date' => '08-12-2024','to_date' => '10-12-2024'),
    CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer e37834b4b0119181b399479527013ab1a206ca8326e23cea4427aacc3ce709a0',
    ),
));

$response = curl_exec($curl);
curl_close($curl);
echo $response;
// $response_data = json_decode($response, true);



?>
