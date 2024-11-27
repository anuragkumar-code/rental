<?php
$curl = curl_init();

$card_id = $_POST['car_id'];


curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://alliedtechnologies.cloud/clients/whips/api/v1/renter.php',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => array('request' => 'single_car_details', 'car_id' => $card_id),
    CURLOPT_HTTPHEADER => array(
        'token: 1245',
        'Authorization: Bearer e37834b4b0119181b399479527013ab1a206ca8326e23cea4427aacc3ce709a0',
        'Cookie: PHPSESSID=ooa60ppb0fg5mc8s7cuvkcm7cg'
    ),
));

$response = curl_exec($curl);
curl_close($curl);

$response_data = json_decode($response, true);

$html = ''; 

if ($response_data['response'][0]['status'] === true && !empty($response_data['response'][0]['data']['car_details'])) {
    $car_data = $response_data['response'][0]['data']['car_details'];
    $car_owner_details = $car_data['owner'];
    
      $brand = $car_data['brand'];
    $model = $car_data['model'];
    $description = $car_data['desc'];
    $features = $car_data['features']; 
    $body = $car_data['cat_name']; 
    $seats = $car_data['seats'];
    $doors = $car_data['doors']; 
    $luggage = $car_data['luggage']; 
    $fuel_type = $car_data['feul']; 
    $engine = $car_data['engine'];
    $mileage = $car_data['mileage']; 
    $transmission = $car_data['gear']; 
    $speed =$car_data['speed'];
    $price =$car_data['price'];
    $color =$car_data['color'];
    $number_plate =$car_data['number_plate'];
    $location =$car_data['loc'];
    $owner_name =$car_owner_details['name'];
      $location = !empty($car_data['loc']) ? $car_data['loc'] : 'Not Specified';
      
    $html .= '
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6">
                    <div id="slider-carousel" class="owl-carousel">';
    
                        foreach ($car_data['image'] as $img) {
                            $html .= '<div class="item">
                                        <img src="' . $img . '" alt="">
                                      </div>';
                        }

        $html .= '</div>
                </div>
                <div class="col-lg-6">
                    <h3>' . $car_data['brand'] . ' ' . $car_data['model'] . '</h3>
                    <p>' . $car_data['desc'] . '</p>
                    <div class="spacer-30"></div>
                    <div class="de-box mb25">
                
                        <h4>Owned By</h4>
           
                        <div class="details-img-icons"><img src="../assets/images/car-detail-icons/profile-men-icon.png" alt="Car Type" />&nbsp;'  . $owner_name. '</div>
                        
                    </div>
                   
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-lg-12">
                    <div class="card" style="border-radius: 10px; background-color: #f8f9fa;">
                        <div class="card-header">
                            <h5 class="text-center">Car Specifications</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-3 col-md-6 mb-4">
                                    <div class="text-center">
                                        <div class="details-img-icons"><img src="../assets/images/car-detail-icons/cartype-icon.png"  class="new_icon_color_filter" alt="Car Type" /></div>
                                        <p class="card-text">Vehicle Type <br><strong>'; 
                                        $html .= isset($body) && $body != '' ? $body : 'Not Specified';$html .= '</strong></p>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 mb-4">
                                    <div class="text-center">
                                    <div class="details-img-icons"><img src="../assets/images/car-detail-icons/seating-capacity.png"  class="new_icon_color_filter" alt="Seating Capacity" /></div>
                                        <p class="card-text">Seating Capacity <br><strong>'; 
                                        $html .= isset($seats) && $seats != '' ? $seats : 'Not Specified';$html .= '</strong></p>
                                      
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 mb-4">
                                    <div class="text-center">
                                        <div class="details-img-icons"><img src="../assets/images/car-detail-icons/fueltype-icon.png"  class="new_icon_color_filter" alt="Fuel Type" /></div>
                                        <p class="card-text">Fuel Type <br><strong>' . $fuel_type . '</strong></p>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 mb-4">
                                    <div class="text-center">
                                        <div class="details-img-icons"><img src="../assets/images/car-detail-icons/engine-icon.png"  class="new_icon_color_filter" alt="Car Engine" /></div>
                                        <p class="card-text">Engine <br><strong>' . $engine . '</strong></p>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 mb-4">
                                    <div class="text-center">
                                       <div class="details-img-icons"><img src="../assets/images/car-detail-icons/new_icon.png"  class="" alt="Car Insurance" /></div>
                                        <p class="card-text">Insurance <br><strong>'; 
                                        $html .= isset($insurance) && $insurance != '' ? $insurance : 'Not Specified';$html .= '</strong></p>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 mb-4">
                                    <div class="text-center">
                                       <div class="details-img-icons"><img src="../assets/images/car-detail-icons/kms-done.png"   class="new_icon_color_filter"alt="Top Speed" /></div>
                                        <p class="card-text">Top Speed <br><strong>'; 
                                        $html .= isset($speed) && $speed != '' ? $speed : 'Not Specified';$html .= '</strong></p>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 mb-4">
                                    <div class="text-center">
                                       <div class="details-img-icons"><img src="../assets/images/car-detail-icons/setting-icon.png"  class="new_icon_color_filter" alt="Transmission " /></div>
                                        <p class="card-text">Transimission (Gear) <br><strong>'; 
                                        $html .= isset($transmission) && $transmission != '' ? $transmission : 'Not Specified';$html .= '</strong></p>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 mb-4">
                                    <div class="text-center">
                                        <div class="details-img-icons"><img src="../assets/images/car-detail-icons/number-plate.png"  class="" alt="Number Plate" /></div>
                                        <p class="card-text">Number Plate <br><strong>'; 
                                        $html .= isset($number_plate) && $number_plate != '' ? $number_plate : 'Not Specified';$html .= '</strong></p>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 mb-4">
                                    <div class="text-center">
                                        <div class="details-img-icons"><img src="../assets/images/car-detail-icons/rupees-symbol.png"  class="new_icon_color_filter" alt="Car Price" /></div>
                                        <p class="card-text">Price <br><strong>'; 
                                        $html .= isset($price) && $price != '' ? $price : 'Not Specified';$html .= '</strong></p>
                                    </div>
                                </div>
                                 <div class="col-lg-3 col-md-6 mb-4">
                                    <div class="text-center">
                                        <div class="details-img-icons"><img src="../assets/images/car-detail-icons/exterior-color.png"  class="new_icon_color_filter" alt="Car Color" /></div>
                                        <p class="card-text">Exterior Color <br><strong>'; 
                                        $html .= isset($color) && $color != '' ? $color : 'Not Specified';$html .= '</strong></p>
                                    </div>
                                </div>
                                
                                 <div class="col-lg-3 col-md-6 mb-4">
                                    <div class="text-center">
                                        <div class="details-img-icons"><img src="../assets/images/car-detail-icons/location-icon.png"  class="" alt="Car Location" /></div>
                                        <p class="card-text">Location <br><strong>'; 
                                        $html .= isset($location) && $location != '' ? $location : 'Not Specified';$html .= '</strong></p>
                                    </div>
                                </div>
                               
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
  
   

} else {
    $html .= '<p>No car details available.</p>';
}

echo $html;
?>
