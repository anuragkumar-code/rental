<?php
session_start();

$brand = $_POST['brand'];
$model = $_POST['model'];
$car_name = $_POST['car_name'];
$car_type = $_POST['car_type'];
$engine_specs = $_POST['engine_specs'];
$car_color = $_POST['car_color'];
$seats = $_POST['seats'];
$speed = $_POST['speed'];
$gear_type = $_POST['gear_type'];
$fuel_type = $_POST['fuel_type'];
$description = $_POST['description'];
$car_lng = $_POST['car_lng'];
$car_lat = $_POST['car_lat'];
$car_loc = $_POST['car_loc'];

$user_id = $_SESSION['user_id'];
$car_id_rand = $_POST['car_id'];
$carDetails = array(
    'request' => 'edit_car_details',
    'user_id' => $user_id,
    'car_id' => $car_id_rand,
    'brand' => $brand,
    'engine' => $engine_specs,
    'seats' => $seats,
    'speed' => $speed,
    'price' => $price, 
    'is_available' => 'Y',
    'gear' => $gear_type,
    'feul' => $fuel_type,
    'desc' => $description,
    'model' => $model,
    'loc' => $car_loc, 
    'lat' => $car_lat, 
    'lng' => $car_lng, 
    'cat_name' => $car_type,
    'car_color' => $car_color
);

$response = apiRequest('https://alliedtechnologies.cloud/clients/whips/api/v1/owner.php', $carDetails);

$carData = json_decode($response, true);
if ($carData['response'][0]['status'] === true) {
    $car_id = $carData['response'][0]['data']['car_id'];
    $car_det_id = $carData['response'][0]['data']['car_det_id'];
} else {
    // echo "<pre>"; print_r($carData);
    echo json_encode(['error' => 'Failed to add car details.']);
    exit;
}

$carDocs = array(
    'request' => 'car_docs',
    'user_id' => $user_id,
    'car_det_id' => $car_det_id,
    'insurance' => new CURLFILE($_FILES['car_insurance']['tmp_name']),
    'ssn' => $_POST['ssn'],
    'number_plate' => new CURLFILE($_FILES['number_plate']['tmp_name'])
);

$response = apiRequest('https://alliedtechnologies.cloud/clients/whips/api/v1/owner.php', $carDocs);
$docData = json_decode($response, true);

if (!$docData['response'][0]['status']) {
    echo json_encode(['error' => 'Failed to upload car documents.']);
    exit;
}

$carImages = [
    'request' => 'add_car_images',
    'user_id' => $user_id,
    'car_id' => $car_id
];
foreach ($_FILES['car_images']['tmp_name'] as $index => $tmpName) {
    $carImages['car_images[' . $index . ']'] = new CURLFILE($tmpName);
}

$response = apiRequest('https://alliedtechnologies.cloud/clients/whips/api/v1/owner.php', $carImages);
$imageData = json_decode($response, true);

if (!$imageData['response'][0]['status']) {
    echo json_encode(['error' => 'Failed to upload car images.']);
    exit;
}

echo json_encode(['success' => 'Car details, documents, and images added successfully.']);

function apiRequest($url, $fields){
    
    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => $fields,
        CURLOPT_HTTPHEADER => [
            'Authorization: Bearer e37834b4b0119181b399479527013ab1a206ca8326e23cea4427aacc3ce709a0',
        ]
    ]);

    $response = curl_exec($curl);
    curl_close($curl);

    return $response;
}


?>
