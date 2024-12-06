<?php

$name = $_POST['name'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$password = $_POST['password'];
$lat = $_POST['lat'];
$long = $_POST['lng'];

$request = $_POST['request'];

$api_url = 'https://alliedtechnologies.cloud/clients/whips/api/v1/auth.php';
$api_auth_bearer = 'Bearer e37834b4b0119181b399479527013ab1a206ca8326e23cea4427aacc3ce709a0';

$postFields = array(
    'name' => $name,
    'email' => $email,
    'contact' => $contact,
    'password' => $password,
    'lat' => $lat,
    'lng' => $long,
    'request' => $request

);


if ($request === 'register_renter@rental') {
    $postFields['house'] = $_POST['house'];
    $postFields['street'] = $_POST['street'];
    $postFields['city'] = $_POST['city'];
    $postFields['state'] = $_POST['state'];
    $postFields['zip_code'] = $_POST['zip_code'];

}

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => $api_url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => http_build_query($postFields),
    CURLOPT_HTTPHEADER => array(
        'Authorization: ' . $api_auth_bearer,
    )
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);


echo $response;



?>
