<?php

$curl = curl_init();

$car_id = $_POST['car_id'];

curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://alliedtechnologies.cloud/clients/whips/api/v1/renter.php',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => array('request' => 'single_car_details', 'car_id' => $car_id),
    CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer e37834b4b0119181b399479527013ab1a206ca8326e23cea4427aacc3ce709a0',
    ),
));

$response = curl_exec($curl);
curl_close($curl);

$response_data = json_decode($response, true);

$static_images = [
    "https://alliedtechnologies.cloud/clients/whips/api/v1/car_images/70/bmw-m5.jpg",
    "https://alliedtechnologies.cloud/clients/whips/api/v1/car_images/70/ferrari-enzo.jpg",
    "https://alliedtechnologies.cloud/clients/whips/api/v1/car_images/70/ford-raptor.jpg",
    "https://alliedtechnologies.cloud/clients/whips/api/v1/car_images/70/mini-cooper.jpg",
    "https://alliedtechnologies.cloud/clients/whips/api/v1/car_images/70/vw-polo.jpg",
    "https://alliedtechnologies.cloud/clients/whips/api/v1/car_images/70/sample1.jpg",
    "https://alliedtechnologies.cloud/clients/whips/api/v1/car_images/70/sample2.jpg"
];


// echo "<pre>"; print_r($response_data);exit;


$html = ''; 

if ($response_data['response'][0]['status'] === true && !empty($response_data['response'][0]['data']['car_details'])) {
    $car_data = $response_data['response'][0]['data']['car_details'];
    $car_owner_details = $car_data['owner'];
    
    $brand = $car_data['brand'];
    $model = $car_data['model'];
    $description = $car_data['desc'];
    $body = $car_data['cat_name']; 
    $seats = $car_data['seats'];
    $fuel_type = $car_data['feul']; 
    $engine = $car_data['engine'];
    $transmission = $car_data['gear']; 
    $speed =$car_data['speed'];
    $price =$car_data['price'];
    $color =$car_data['color'];
    $number_plate =$car_data['number_plate'];
    $location =$car_data['loc'];
    $owner_name =$car_owner_details['name'];
    $owner_contact =$car_owner_details['contact'];
    $car_id = $car_data['car_id'];
    $owner_id = $car_data['owner_id'];
      $location = !empty($car_data['loc']) ? $car_data['loc'] : 'Not Specified';
      
    $html .= '
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6">
                    <div id="slider-carousel" class="owl-carousel">';
    
                        foreach ($static_images as $img) {
                            if ($img != 'undefined'){
                                $html .= '<div class="item">
                                    <img src="' . $img . '" alt="">
                                </div>';
                            }
                        }

        $html .= '</div>
                </div>
                <div class="col-lg-6">
                    <h3>' . $car_data['brand'] . ' ' . $car_data['model'] . '</h3>
                    <p>' . $car_data['desc'] . '</p>
                    <div class="col-lg-4 text-center">
                        <a href="javascript:void(0)" onclick="showBookingPopup()" class="btn-main btn-lg" style="width: 100%;">Rent Now</a>
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
                                        <div class="details-img-icons"><img src="../assets/images/car-detail-icons/exterior-color.png"  class="new_icon_color_filter" alt="Car Color" /></div>
                                        <p class="card-text">Exterior Color <br><strong>'; 
                                        $html .= isset($color) && $color != '' ? $color : 'Not Specified';$html .= '</strong></p>
                                    </div>
                                </div>
                             
                               
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
  
     // Booking Popup Modal
    $html .= '
    <div class="modal fade" id="bookingPopup" tabindex="-1" aria-labelledby="bookingPopupLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content custom-modal-card">
                <div class="modal-header">
                    <h5 class="modal-title w-100 text-center" id="bookingPopupLabel">Book ' . $brand . ' ' . $model . '</h5>
                    <button type="button" class="btn-close" onclick="hideBookingPopup()" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form name="contactForm" id="booking_form" class="form-s2 row g-4 on-submit-hide" method="post" action="">
                        <div class="col-lg-12 d-light">
                            <div class="card car-card mb-3">
                                <div class="row g-0">
                                    <div class="col-md-6">
                                        <img src="' . (!empty($images[0]) ? $images[0] : '../assets/images/car-single/1.jpg') . '" id="car-image" class="img-fluid rounded-start" alt="' . $brand . ' ' . $model . '">
                                    </div>
                                   <div class="col-md-6">
                                        <div class="card-body">
                                            <h5 class="card-title" id="car-name">' . $brand . ' ' . $model . '</h5>
                                            <p class="card-text"><strong>Price:</strong> $' . $car_data['price'] . '</p>
                                            <p class="card-text"><strong>Location:</strong> ' . $location . '</p>
                                            <div>
                                                <label for="from-date">From Date:</label>
                                                <input type="date" id="from-date" name="from_date" class="form-control">
                                            </div>
                                            <div style="margin-top: 10px;">
                                                <label for="to-date">To Date:</label>
                                                <input type="date" id="to-date" name="to_date" class="form-control">
                                                <input type="hidden"  id="owner_id" value="'. $owner_id .'" class="form-control">
                                                <input type="hidden"  id="car_id" value="' . $car_id .'" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 mt-3" style="text-align:right;">
                            <a href="javascript:void(0)" onclick="hideBookingPopup()" class="btn btn-danger">Cancel</a>
                            <a href="javascript:void(0)" class="btn-main" onclick="makePayment()">Book Now</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>';

    $html .= '<script>
        $(".owl-thumb-item").each(function () {
            if ($(this).find("img").attr("src") === "undefined") {
                $(this).remove(); 
            }
        });
    </script>';

} else {
    $html .= '<p>No car details available.</p>';
}

echo $html;






?>
