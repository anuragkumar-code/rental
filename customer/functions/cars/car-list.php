<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://alliedtechnologies.cloud/clients/whips/api/v1/renter.php',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array('request' => 'all_car_list'),
  CURLOPT_HTTPHEADER => array(
    'token: 1245',
    'Authorization: Bearer e37834b4b0119181b399479527013ab1a206ca8326e23cea4427aacc3ce709a0',
    'Cookie: PHPSESSID=6km4h1lghsvq3m9ddoa75edc7j'
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

        $html .= '<div class="col-xl-4 col-lg-6">';
        $html .= '    <div class="de-item mb30">';
        $html .= '        <div class="d-img car-list-div">';
        $html .= '            <img src="' . $image . '" class="img-fluid" alt="">';
        $html .= '        </div>';
        $html .= '        <div class="d-info">';
        $html .= '            <div class="d-text">';
        $html .= '                <h4>' . $car['brand'] . ' ' . $car['model'] . '</h4>';
        $html .= '                <div class="d-item_like">';
        $html .= '                    <i class="fa fa-heart"></i><span>55</span>';
        $html .= '                </div>';
        $html .= '                <div class="d-atr-group">';
        $html .= '                    <span class="d-atr"><img src="../assets/images/icons/1-green.svg" alt="">' . $car['seats'] . '</span>';
        $html .= '                    <span class="d-atr"><img src="../assets/images/icons/2-green.svg" alt="">' . $car['gear'] . '</span>';
        $html .= '                    <span class="d-atr"><img src="../assets/images/icons/3-green.svg" alt="">' . $car['feul'] . '</span>';
        $html .= '                    <span class="d-atr"><img src="../assets/images/icons/4-green.svg" alt="">' . $car['cat_name'] . '</span>';
        $html .= '                </div>';
        $html .= '                <div class="d-price">';
        $html .= '                    Daily price <span>$' . $car['price'] . '</span>';
        $html .= '                    <a class="btn-main" href="../customer/car-details.php?car_id=' . $car['id'] . '">Rent Now</a>';
        $html .= '                </div>';
        $html .= '            </div>';
        $html .= '        </div>';
        $html .= '    </div>';
        $html .= '</div>';
    }

    echo $html;
} else {
    echo 'No cars found!';
}
?>
