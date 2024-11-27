<?php
session_start();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // echo "BYE"; exit;
    $curl = curl_init();

    // Prepare cURL options for API call
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
            'profile_image' =>  new CURLFILE($_FILES['profile_image']['tmp_name']),
          
            'request' => 'renter_edit_profile_image',
            'renter_id' => $_POST['renter_id'],
                       
         
           ),
        CURLOPT_HTTPHEADER => array(
         
            'Authorization: Bearer e37834b4b0119181b399479527013ab1a206ca8326e23cea4427aacc3ce709a0',
            
        ),
    ));

    // Execute the cURL request
    $response = curl_exec($curl);

    if (curl_errno($curl)) {
        // Handle error
        echo 'Error:' . curl_error($curl);
    } else {
        echo $response;
    }

    curl_close($curl);
} else {
    echo 'Invalid request method.';
}
