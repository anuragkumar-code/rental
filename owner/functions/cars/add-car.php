<?php
session_start();

$brand = $_POST['brand'];
$model = $_POST['model'];
$car_type = $_POST['car_type'];
$engine_specs = $_POST['engine_specs'];
$car_color = $_POST['car_color'];
$seats = $_POST['seats'];
$speed = $_POST['speed'];
$gear_type = $_POST['gear_type'];
$fuel_type = $_POST['fuel_type'];
$location = $_POST['location'];
$description = $_POST['description'];
$price = $_POST['price'];

$car_lat = $_POST['car_lat'];
$car_lng = $_POST['car_lng'];

$user_id = $_SESSION['user_id'];
$car_id_rand = time();
$carDetails = array(
    'request' => 'car_details',
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
    'loc' => $location, 
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
    echo json_encode(['error' => 'Failed to add car details.']);
    exit;
}


$carDocs = array(
    'request' => 'car_docs',
    'user_id' => $user_id,
    'car_det_id' => $car_det_id,
    'insurance' => new CURLFile($_FILES['car_insurance']['tmp_name'], mime_content_type($_FILES['car_insurance']['tmp_name']), $_FILES['car_insurance']['name']),
    'ssn' => $_POST['ssn'],
    'number_plate' => new CURLFile($_FILES['number_plate']['tmp_name'], mime_content_type($_FILES['number_plate']['tmp_name']), $_FILES['number_plate']['name'])
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
    $originalFileName = $_FILES['car_images']['name'][$index]; 
    $carImages['car_images[' . $index . ']'] = new CURLFile($tmpName, mime_content_type($tmpName), $originalFileName);
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
