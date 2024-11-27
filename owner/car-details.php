<?php include ('partials/owner-header.php');

$curl = curl_init();

$card_id_old = $_GET['car_id'];
$card_id = sprintf("%08d", $card_id_old);


curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://alliedtechnologies.cloud/clients/whips/api/v1/renter.php',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => array('request' => 'getcardetails', 'car_id' => $card_id),
    CURLOPT_HTTPHEADER => array(
        'token: 1245',
        'Authorization: Bearer e37834b4b0119181b399479527013ab1a206ca8326e23cea4427aacc3ce709a0',
        'Cookie: PHPSESSID=ooa60ppb0fg5mc8s7cuvkcm7cg'
    ),
));

$response = curl_exec($curl);
curl_close($curl);

$response_data = json_decode($response, true);
 ?>
<section id="subheader" class="jarallax text-light">
    <img src="../assets/images/background/4.jpg" class="jarallax-img" alt="">
    <div class="center-y relative text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1>Edit Car</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="add-car-form" class="container mt-5 mb-5">
   <?php if ($response_data['response'][0]['status'] === true && !empty($response_data['response'][0]['data']['car_details'])){ 
        $car_data = $response_data['response'][0]['data']['car_details'];
    $car_owner_details = $car_data['owner'];
   ?>
    
    <form id="car-registration-form" method="POST" enctype="multipart/form-data">
        <div class="row">
            <h3>Edit Car Details</h3>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="brand">Select Brand</label>
                        <select id="brand" name="brand" class="form-select" required>
    <option value="">Select Car Brand</option>
    <?php
    // Assuming $brands is the array of brands fetched from your function
    foreach ($brands as $brand) {
        // Check if the current brand matches the value in $car_data['brand']
        $selected = ($brand == $car_data['brand']) ? 'selected' : '';
        echo "<option value=\"$brand\" $selected>$brand</option>";
    }
    ?>
</select>
                        <p id="brandsError" class="d-none text-danger errorClass">Please select the car brand</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="model">Model</label>
                       <input type="text" id="model" name="model" class="form-control" placeholder="Enter Car Model" value="<?php echo htmlspecialchars($car_data['model']); ?>">
                        <p id="modelError" class="d-none text-danger errorClass">Please enter the car model</p>
                        
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="car_name">Car Name</label>
                        <input type="text" id="car_name" name="car_name" class="form-control" placeholder="Enter car name" value="<?php echo htmlspecialchars($car_data['model']); ?>">
                        <p id="nameError" class="d-none text-danger errorClass">Please enter car name</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="car_type">Car Type</label>
                        <input type="text" id="car_type" name="car_type" class="form-control" placeholder="Sedan, SUV, etc." value="<?php echo htmlspecialchars($car_data['cat_name']); ?>">
                        <p id="typeError" class="d-none text-danger errorClass">Please enter car type</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="engine_specs">Engine Specs</label>
                        <input type="text" id="engine_specs" name="engine_specs" class="form-control" placeholder="Enter Engine Specs" value="<?php echo htmlspecialchars($car_data['engine']); ?>">
                        <p id="engineError" class="d-none text-danger errorClass">Please enter enginer power</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="car_color">Car Color</label>
                        <input type="text" id="car_color" name="car_color" class="form-control" placeholder="Enter color" value="<?php echo htmlspecialchars($car_data['color']); ?>">
                        <p id="colorError" class="d-none text-danger errorClass">Please enter car color</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="seats">No of Seats</label>
                        <input type="text" id="seats" name="seats" class="form-control" placeholder="Enter No. of Seats" value="<?php echo htmlspecialchars($car_data['seats']); ?>">
                        <p id="seatsError" class="d-none text-danger errorClass">Please enter number of seats</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="speed">Top Speed</label>
                        <input type="text" id="speed" name="speed" class="form-control" placeholder="Enter Top Speed (miles/hr)" value="<?php echo htmlspecialchars($car_data['speed']); ?>">
                        <p id="speedError" class="d-none text-danger errorClass">Please enter top speed</p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="price">Price ($)</label>
                        <input type="text" id="price" name="price" class="form-control" placeholder="Enter price" value="<?php echo htmlspecialchars($car_data['price']); ?>">
                        <p id="priceError" class="d-none text-danger errorClass">Please enter price</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="gear_type">Gear/ Transmission </label>
                     
                        <input type="text" id="gear_type" name="gear_type" class="form-control" placeholder="Enter Transmission" value="<?php echo htmlspecialchars($car_data['gear']); ?>">
                      
                        <p id="gearError" class="d-none text-danger errorClass">Please enter gear/ transmission</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="fuel_type">Fuel Type</label>
                       <select id="fuel_type" name="fuel_type" class="form-select" required>
                            <option disabled selected>Select fuel type</option>
                            <option value="petrol" <?php echo ($car_data['fuel'] == 'petrol') ? 'selected' : ''; ?>>Petrol</option>
                            <option value="diesel" <?php echo ($car_data['fuel'] == 'diesel') ? 'selected' : ''; ?>>Diesel</option>
                        </select>

                        <p id="fuelError" class="d-none text-danger errorClass">Please select fuel type</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea type="text" id="description" name="description" class="form-control" placeholder="Enter description of the car..." ><?php echo htmlspecialchars($car_data['desc']); ?></textarea>
                        
                        <p id="descError" class="d-none text-danger errorClass">Please enter description of the car</p>
                    </div>
                </div>
                
                
                 <div class="col-md-4">
                    <div class="form-group">
                        <label for="insurance">Insurance</label>
                     
                        <input type="text" id="insurance" name="insurance" class="form-control" placeholder="Enter Insurance Details" value="<?php echo htmlspecialchars($car_data['insurance']); ?>">
                      
                        <p id="insuranceErrors" class="d-none text-danger errorClass">Please enter Insurance details</p>
                    </div>
                </div>
                
                 <div class="col-md-4">
                    <div class="form-group">
                        <label for="number_plate">Number Plate</label>
                     
                        <input type="text" id="number_plate" name="number_plate" class="form-control" placeholder="Enter Number Plate Details" value="<?php echo htmlspecialchars($car_data['number_plate']); ?>">
                      
                        <p id="numberplateError" class="d-none text-danger errorClass">Please enter number plate details</p>
                    </div>
                </div>
            </div>
        </div>
        
        
         <div class="row">
            <h3>Car Location</h3>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="car_loc">Car Location</label>
                         <input type="text" id="car_loc" name="car_loc" class="form-control" placeholder="Enter Location of car" value="<?php echo htmlspecialchars($car_data['loc']); ?>">
                        <p id="locationError" class="d-none text-danger errorClass">Please enter Car Location</p>
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="car_lat">Car Latitude</label>
                        <input type="hidden" id="car_id" name="car_id" class="form-control" value="<?php echo $card_id; ?>">
                         <input type="text" id="car_lat" name="car_lat" class="form-control" placeholder="Enter Latitude"   pattern="^(\+|-)?([1-8]?\d(\.\d+)?|90(\.0+)?)$" value="<?php echo htmlspecialchars($car_data['lat']); ?>">
                        <p id="latitudeError" class="d-none text-danger errorClass">Please enter latitude</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="car_lng">Car Longitude</label>
                    
                         <input type="text" id="car_lng" name="car_lng" class="form-control" placeholder="Enter Longitude" pattern="^(\+|-)?(1[0-7]\d(\.\d+)?|[1-9]?\d(\.\d+)?|180(\.0+)?)$" value="<?php echo htmlspecialchars($car_data['lng']); ?>">
                        <p id="longitudeError" class="d-none text-danger errorClass">Please enter longitude</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <h3>Car Documents</h3>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="car_insurance">Car Insurance</label>
                        <input type="file" class="form-control" id="car_insurance" name="car_insurance" />
                        <p id="insuranceError" class="d-none text-danger errorClass">Please upload car insurance</p>
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="number_plate">Car Number Plate</label>
                        <input type="file" class="form-control" id="number_plate" name="number_plate" />
                        <p id="numberPlateError" class="d-none text-danger errorClass">Please upload car number plate</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="ssn">Social Security Number</label>
                        <input type="text" class="form-control" id="ssn" name="ssn" placeholder="Enter SSN" />
                        <p id="ssnError" class="d-none text-danger errorClass">Please enter SSN</p>
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
                        <p id="imagesError" class="d-none text-danger errorClass">Please upload atleast one image</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-navigation mt-4">
            <a href="javascript:void(0)" onclick="addCar()" class="btn btn-success">Submit</a>
        </div>
    </form>
      <?php } else echo "No car details available." ;?>

</section>


<style>
    #add-car-form {
        background-color: #f9f9f9;
        padding: 40px;
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }
    .form-group {
        margin-bottom: 20px;
    }
    h2 {
        color: #333;
        margin-bottom: 15px;
    }
</style>


<script>
    //  function editCar()
    function addCar() {
        $('.errorClass').addClass('d-none');

        var brand = $('#brand').val();
        var model = $('#model').val();
        var car_name = $('#car_name').val();
        var car_type = $('#car_type').val();
        var engine_specs = $('#engine_specs').val();
        var car_color = $('#car_color').val();
        var seats = $('#seats').val();
        var speed = $('#speed').val();
        var price = $('#price').val();
        var gear_type = $('#gear_type').val();
        var fuel_type = $('#fuel_type').val();
        var description = $('#description').val();
        var car_id = $('#car_id').val();
        var car_lng = $('#car_lng').val();
        var car_lat = $('#car_lat').val();
        var car_loc = $('#car_loc').val();
        var car_insurance = $('#car_insurance')[0].files[0];
        var number_plate = $('#number_plate')[0].files[0];
        var ssn = $('#ssn').val();

        var car_images = $('#car_images')[0].files;

        // if (!brand) { $('#brandsError').removeClass('d-none'); return; }
        // if (!model) { $('#modelError').removeClass('d-none'); return; }
        // if (!car_name) { $('#nameError').removeClass('d-none'); return; }
        // if (!car_type) { $('#typeError').removeClass('d-none'); return; }
        // if (!engine_specs) { $('#engineError').removeClass('d-none'); return; }
        // if (!car_color) { $('#colorError').removeClass('d-none'); return; }
        // if (!seats) { $('#seatsError').removeClass('d-none'); return; }
        // if (!speed) { $('#speedError').removeClass('d-none'); return; }
        // if (!price) { $('#priceError').removeClass('d-none'); return; }
        // if (!gear_type) { $('#gearError').removeClass('d-none'); return; }
        // if (!fuel_type) { $('#fuelError').removeClass('d-none'); return; }
        // if (!description) { $('#descError').removeClass('d-none'); return; }
        // if (!car_insurance) { $('#insuranceError').removeClass('d-none'); return; }
        // if (!number_plate) { $('#numberPlateError').removeClass('d-none'); return; }
        // if (!ssn) { $('#ssnError').removeClass('d-none'); return; }
        // if (car_images.length === 0) { $('#imagesError').removeClass('d-none'); return; }

        var formData = new FormData();
        formData.append('brand', brand);
        formData.append('model', model);
        formData.append('car_name', car_name);
        formData.append('car_type', car_type);
        formData.append('engine_specs', engine_specs);
        formData.append('car_color', car_color);
        formData.append('seats', seats);
        formData.append('speed', speed);
        formData.append('price', price);
        formData.append('gear_type', gear_type);
        formData.append('fuel_type', fuel_type);
        formData.append('description', description);
        formData.append('car_id', car_id);
        formData.append('car_lng', car_lng);
        formData.append('car_lat', car_lat);
        formData.append('car_loc', car_loc);
           
        formData.append('car_insurance', car_insurance);
        formData.append('number_plate', number_plate);
        formData.append('ssn', ssn);

        for (let i = 0; i < car_images.length; i++) {
            formData.append('car_images[]', car_images[i]);
        }

        $.ajax({
            type: 'POST',
            url: 'functions/cars/edit-car.php',
            data: formData,
            processData: false,
            contentType: false, 
            success: function(response) {
                console.log(response);
                alert('Car details submitted successfully.');
            },
            error: function(xhr, status, error) {
                alert('An error occurred: ' + error);
                console.log(xhr.responseText);
            }
        });
    }

    function get_brands(){
        $.ajax({
            type: 'POST',
            url: 'functions/cars/get-brands.php',
            data: {
                
            },
            success: function(response) {
                
                const data = JSON.parse(response);
                const brands = data.response[0].data;
            
                const brandSelect = $('#brand');
                brandSelect.empty(); 
                brandSelect.append('<option selected disabled>Select Car Brand</option>');

                brands.forEach((brandItem) => {
                    brandSelect.append(`<option value="${brandItem.brands}">${brandItem.brands}</option>`);
                });
                
            },
            error: function() {
                alert('An error occurred while brands.');
            }
        });
    }
    

    setTimeout(()=>{
        get_brands(); 
    },300);
</script>


<?php include ('partials/owner-footer.php'); ?>