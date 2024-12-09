<?php

$brandCurl = curl_init();
curl_setopt_array($brandCurl, array(
    CURLOPT_URL => 'https://alliedtechnologies.cloud/clients/whips/api/v1/owner.php',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => array('request' => 'get_brands'),
    CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer e37834b4b0119181b399479527013ab1a206ca8326e23cea4427aacc3ce709a0'
    ),
));
$brandResponse = curl_exec($brandCurl);
curl_close($brandCurl);

$brandData = json_decode($brandResponse, true);
$brands = isset($brandData['response'][0]['data']) ? $brandData['response'][0]['data'] : [];


$categoryCurl = curl_init();

curl_setopt_array($categoryCurl, array(
  CURLOPT_URL => 'https://alliedtechnologies.cloud/clients/whips/api/v1/owner.php',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array('request' => 'get_categories'),
  CURLOPT_HTTPHEADER => array(
    'Authorization: Bearer e37834b4b0119181b399479527013ab1a206ca8326e23cea4427aacc3ce709a0',
  ),
));

$categoryResponse = curl_exec($categoryCurl);
curl_close($categoryCurl);

$categoryData = json_decode($categoryResponse, true);
$categories = isset($categoryData['response'][0]['data']) ? $categoryData['response'][0]['data'] : [];

// echo "<pre>"; print_r($categories);exit;

$carCurl  = curl_init();
curl_setopt_array($carCurl , array(
    CURLOPT_URL => 'https://alliedtechnologies.cloud/clients/whips/api/v1/renter.php',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => array(
        'request' => 'getcardetails',
        'car_id' => $_POST['car_id']
    ),
    CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer e37834b4b0119181b399479527013ab1a206ca8326e23cea4427aacc3ce709a0'
    ),
));

$response = curl_exec($carCurl );
curl_close($carCurl);

$response_data = json_decode($response, true);
if ($response_data['response'][0]['status'] === true && !empty($response_data['response'][0]['data']['car_details'])) {
    $car_data = $response_data['response'][0]['data']['car_details'];
    $car_images = isset($car_data['image']) ? $car_data['image'] : [];
?>


    <form id="car-registration-form" method="POST" enctype="multipart/form-data">
        <div class="row">
            <h3>Edit Car Details</h3>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="brand">Select Brand</label>
                        <select id="brand" name="brand" class="form-select" required>
                            <option disabled>Select Car Brand</option>
                            <?php foreach ($brands as $brand): ?>
                                <option value="<?php echo htmlspecialchars($brand['brands']); ?>" 
                                    <?php echo $car_data['brand'] === $brand['brands'] ? 'selected' : ''; ?>>
                                    <?php echo htmlspecialchars($brand['brands']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="model">Model</label>
                        <input type="text" id="model" name="model" class="form-control" placeholder="Enter Car Model" value="<?php echo $car_data['model']; ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="car_name">Car Name</label>
                        <input type="text" id="car_name" name="car_name" class="form-control" placeholder="Enter car name" value="<?php echo $car_data['cat_name']; ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="car_type">Car Category</label>
                        <select id="category" name="category" class="form-select" required>
                            <option disabled>Select Car Category</option>
                            <?php foreach ($categories as $category): ?>
                                <option value="<?php echo htmlspecialchars($category['brands']); ?>" 
                                    <?php echo $car_data['cat_name'] === $category['brands'] ? 'selected' : ''; ?>>
                                    <?php echo htmlspecialchars($category['brands']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="engine_specs">Engine Specs</label>
                        <input type="text" id="engine_specs" name="engine_specs" class="form-control" placeholder="Enter Engine Specs" value="<?php echo $car_data['engine']; ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="car_color">Car Color</label>
                        <input type="text" id="car_color" name="car_color" class="form-control" placeholder="Enter color" value="<?php echo $car_data['color']; ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="seats">No of Seats</label>
                        <select id="seats" name="seats" class="form-select" required>
                            <option disabled>Select number of seats</option>
                            <option value="2" <?php if($car_data['seats'] == 2){echo "selected";} ?>>2</option>
                            <option value="3" <?php if($car_data['seats'] == 3){echo "selected";} ?>>3</option>
                            <option value="4" <?php if($car_data['seats'] == 4){echo "selected";} ?>>4</option>
                            <option value="5" <?php if($car_data['seats'] == 5){echo "selected";} ?>>5</option>
                            <option value="6" <?php if($car_data['seats'] == 6){echo "selected";} ?>>6</option>
                            <option value="7" <?php if($car_data['seats'] == 7){echo "selected";} ?>>7</option>
                            <option value="8" <?php if($car_data['seats'] == 8){echo "selected";} ?>>8</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="speed">Top Speed</label>
                        <input type="text" id="speed" name="speed" class="form-control" placeholder="Enter Top Speed (miles/hr)" value="<?php echo $car_data['speed']; ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="price">Price ($)</label>
                        <input type="text" id="price" name="price" class="form-control" placeholder="Enter price" value="<?php echo $car_data['price']; ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="gear_type">Gear Type </label>
                        <select id="gear_type" name="gear_type" class="form-select" required>
                            <option disabled>Select gear type</option>
                            <option value="Manual" <?php if($car_data['gear'] == "Manual"){echo "selected";} ?>>Manual</option>
                            <option value="Automatic" <?php if($car_data['gear'] == "Automatic"){echo "selected";} ?>>Automatic</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="fuel_type">Fuel Type</label>
                        <select id="fuel_type" name="fuel_type" class="form-select" required>
                            <option disabled>Select fuel type</option>
                            <option value="Petrol" <?php if($car_data['feul'] == "Petrol"){echo "selected";} ?>>Petrol</option>
                            <option value="Diesel" <?php if($car_data['feul'] == "Diesel"){echo "selected";} ?>>Diesel</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea type="text" id="description" name="description" class="form-control" placeholder="Enter description of the car..." ><?php echo $car_data['desc']; ?></textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <h3>Car Documents</h3>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="new_car_insurance">Car Insurance</label>
                        <input style="margin-bottom:15px" type="file" class="form-control" id="new_car_insurance" name="new_car_insurance" />
                        <input type="hidden" id="old_car_insurance" name="old_car_insurance" value="<?php echo $car_data['insurance']; ?>" />
                        <a class="btn btn-sm btn-primary" title="Click here to download insurance" target="_blank" href="https://alliedtechnologies.cloud/clients/whips/api/v1/<?php echo $car_data['insurance']; ?>"><i class="fa fa-download"></i> View Insurance</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="new_number_plate">Car Number Plate</label>
                        <input style="margin-bottom:15px" type="file" class="form-control" id="new_number_plate" name="new_number_plate" />
                        <input type="hidden" id="old_number_plate" name="old_number_plate" value="<?php echo $car_data['insurance']; ?>" />
                        <a class="btn btn-sm btn-primary" title="Click here to download number plate" target="_blank" href="https://alliedtechnologies.cloud/clients/whips/api/v1/<?php echo $car_data['number_plate']; ?>"><i class="fa fa-download"></i> View Number Plate</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="ssn">Social Security Number</label>
                        <input type="text" class="form-control" id="ssn" name="ssn" placeholder="Enter SSN" />
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <h3>Current Car Images</h3>
            <div class="col-md-12">
                <div class="form-group">
                    <div class="d-flex flex-wrap gap-3">
                        <?php if (!empty($car_images)): ?>
                            <?php foreach ($car_images as $index => $image_url): ?>
                                <div class="car-image-container position-relative" id="image-container-<?php echo $index; ?>">
                                    <img src="<?php echo htmlspecialchars($image_url); ?>" alt="Car Image" class="img-thumbnail" style="width: 150px; height: auto;" />
                                    <button type="button" class="btn btn-danger btn-sm remove-image-btn position-absolute" style="top: 5px; right: 5px;" onclick="removeImage(<?php echo $index; ?>, '<?php echo htmlspecialchars($image_url); ?>')">
                                        &times;
                                    </button>
                                    <p>
                                        <a href="<?php echo htmlspecialchars($image_url); ?>" target="_blank" class="btn btn-sm btn-primary">View Full Image</a>
                                    </p>
                                    <input type="hidden" name="existing_car_images[]" value="<?php echo htmlspecialchars($image_url); ?>">
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>No images uploaded for this car.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <h3>Car Images</h3>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="car_images">Car Images</label>
                        <input type="file" class="form-control" id="car_images" name="car_images[]" multiple />
                    </div>
                </div>
            </div>
        </div>
        <div class="form-navigation mt-4">
            <a href="javascript:void(0)" onclick="addCar()" class="btn btn-success">Submit</a>
        </div>
    </form>

   

<?php } ?>