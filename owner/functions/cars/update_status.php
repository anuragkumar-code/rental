<?php
session_start();

if (isset($_SESSION['user_id']) && isset($_POST['status']) && isset($_POST['id'])) {
    $user_id = $_SESSION['user_id'];
    $car_id = $_POST['id'];
    $new_status = $_POST['status'];

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
            'request' => 'car_status_update',
            'user_id' => $user_id,
            'car_id' => $car_id,
            'new_status' => $new_status
        ),
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer e37834b4b0119181b399479527013ab1a206ca8326e23cea4427aacc3ce709a0',
        ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);

    if ($response) {
        echo $response;
    } else {
        echo json_encode(['response' => [['status' => false, 'reason' => 'error', 'msg' => 'Update failed.', 'code' => '500']]]);
    }
} else {
    echo json_encode(['response' => [['status' => false, 'reason' => 'error', 'msg' => 'Missing required data.', 'code' => '400']]]);
}
?>
