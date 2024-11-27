<?php
session_start(); 

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://alliedtechnologies.cloud/clients/whips/api/v1/auth.php',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => array(
        'request' => $_POST['userType'],
        'email' => $_POST['email'], 
        'password' => $_POST['password'],
        
    ),
    CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer e37834b4b0119181b399479527013ab1a206ca8326e23cea4427aacc3ce709a0',
    ),
));

$response = curl_exec($curl);
curl_close($curl);

$responseData = json_decode($response, true);

if ($responseData['response'][0]['status'] === true) {
    $userData = $responseData['response'][0]['data'];

    $_SESSION['name'] = $userData['name'];
    $_SESSION['email'] = $userData['email'];
    $_SESSION['contact'] = $userData['contact'];
    $_SESSION['user_id'] = $userData['id'];
    $_SESSION['token'] = $userData['token'];

    $_SESSION['user_type'] = ($_POST['userType'] === 'login_renter@rental') ? 'customer' : 'owner';
    

    $redirectUrl = ($_SESSION['user_type'] === 'customer') ? 'customer/index.php' : 'owner/index.php';

    echo json_encode(array(
        'status' => true,
        'message' => 'Login successful',
        'redirect_url' => $redirectUrl,
    ));
    
} else {
    echo json_encode(array('status' => false, 'message' => 'Invalid credentials or login failed'));
}
?>
