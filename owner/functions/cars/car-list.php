<?php

$curl = curl_init();
$api_url = 'https://alliedtechnologies.cloud/clients/whips/api/v1/auth.php';
$api_token = '1245'; 
$api_auth_bearer = 'Bearer e37834b4b0119181b399479527013ab1a206ca8326e23cea4427aacc3ce709a0';


$user_id = $_POST['userId'];
 
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://alliedtechnologies.cloud/clients/whips/api/v1/owner.php',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array('request' => 'car_list','user_id' => $user_id),
  CURLOPT_HTTPHEADER => array(
    'token: ' . $api_token,
        'Authorization: ' . $api_auth_bearer,
    'Cookie: PHPSESSID=22k6onnnmueuc1a9qldspscu5s'
  ),
));  
  
$response = curl_exec($curl);

curl_close($curl);

$response_data = json_decode($response, true);

if ($response_data['response'][0]['status'] === true && !empty($response_data['response'][0]['data']['car_list'])) {
    $car_data = $response_data['response'][0]['data']['car_list'];
    
    $html = '';

    foreach ($car_data as $car) {
        $image = !empty($car['image'][0]) ? $car['image'][0] : '../assets/images/cars/bmw-m5.jpg';
        $car_id = $car['car_id'];
    $html .= '<div class="col-lg-12">';
    $html .= '    <div class="de-item-list mb30">';
    $html .= '        <div class="main-toggle main-toggle-success '. ($car['is_available'] === 'Y' ? 'on' : '') .'" style="position: absolute; top: 10px; right: 10px;" data-id="' . $car_id . '">';
    $html .= '            <input type="hidden" id="statusId_' . $car_id . '" value="' . ($car['is_available'] ? 'Y' : 'N') . '">';
    $html .= '            <span></span>';
    $html .= '        </div>';
    $html .= '        <div class="d-img">';
    $html .= '            <img src="' . $image . '" class="img-fluid" alt="">';
    $html .= '        </div>';
    $html .= '        <div class="d-info">';
    $html .= '            <div class="d-text">';
    $html .= '                <h4>' . $car['brand'] . ' ' . $car['model'] . '</h4>';
    $html .= '                <div class="d-atr-group">';
    $html .= '                    <ul class="d-atr">';
    $html .= '                        <li><span>Seats:</span> ' . $car['seats'] . '</li>';
    $html .= '                        <li><span>Transmission:</span> ' . $car['gear'] . '</li>';
    $html .= '                        <li><span>Fuel:</span> ' . $car['feul'] . '</li>';
    $html .= '                        <li><span>Availabilty:</span> ' . $car['is_available'] . '</li>';
    $html .= '                        <li><span>Engine:</span> ' . $car['engine'] . '</li>';
    $html .= '                        <li><span>Color:</span> ' . $car['color'] . '</li>';
    $html .= '                        <li><span>Type:</span> ' . $car['cat_name'] . '</li>';
    $html .= '                    </ul>';
    $html .= '                </div>';
    $html .= '            </div>';
    $html .= '        </div>';
    $html .= '        <div class="d-price">';
    $html .= '            Daily rate from <span>$' . $car['price'] . '</span>';
    $html .= '            <a class="btn-main" href="../owner/car-details.php?car_id='. $car_id .'">Details</a>';
    $html .= '        </div>';
    $html .= '        <div class="clearfix"></div>';
    $html .= '    </div>';
    $html .= '</div>';
    }

    $html .= '<div class="col-lg-12">';
    $html .= '    <div class="alert alert-warning text-center">';
    $html .= '        <h4>Want to add more cars...?</h4>';
    $html .= '        <p>Click on below button and add a new car to rent now.</p>';
    $html .= '        <a class="btn btn-primary" href="../owner/add-car.php">List a New Car</a>';
    $html .= '    </div>';
    $html .= '</div>';

    echo $html;
} else {
    $html = '';
    
     $html .= '<div class="col-lg-12">';
    $html .= '    <div class="alert alert-warning text-center">';
    $html .= '        <h4>Can not find any listed car...?</h4>';
    $html .= '        <p>Looks like you haven\'t listed any cars for rent yet. Click below to add a new car.</p>';
    $html .= '        <a class="btn btn-primary" href="../owner/add-car.php">List a New Car</a>';
    $html .= '    </div>';
    $html .= '</div>';
    
     echo $html;
}
?>
