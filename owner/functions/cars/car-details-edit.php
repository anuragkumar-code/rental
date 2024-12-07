<form id="car-registration-form" method="POST" enctype="multipart/form-data">
    <div class="row">
        <h3>Edit Car Details</h3>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="brand">Select Brand</label>
                    <select id="brand" name="brand" class="form-select" required>
                        <option value="">Select Car Brand</option>
                    </select>
                    <p id="brandsError" class="d-none text-danger errorClass">Please select the car brand</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="model">Model</label>
                   <input type="text" id="model" name="model" class="form-control" placeholder="Enter Car Model" value="">
                    <p id="modelError" class="d-none text-danger errorClass">Please enter the car model</p>
                    
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="car_name">Car Name</label>
                    <input type="text" id="car_name" name="car_name" class="form-control" placeholder="Enter car name" value="">
                    <p id="nameError" class="d-none text-danger errorClass">Please enter car name</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="car_type">Car Type</label>
                    <input type="text" id="car_type" name="car_type" class="form-control" placeholder="Sedan, SUV, etc." value="">
                    <p id="typeError" class="d-none text-danger errorClass">Please enter car type</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="engine_specs">Engine Specs</label>
                    <input type="text" id="engine_specs" name="engine_specs" class="form-control" placeholder="Enter Engine Specs" value="">
                    <p id="engineError" class="d-none text-danger errorClass">Please enter enginer power</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="car_color">Car Color</label>
                    <input type="text" id="car_color" name="car_color" class="form-control" placeholder="Enter color" value="">
                    <p id="colorError" class="d-none text-danger errorClass">Please enter car color</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="seats">No of Seats</label>
                    <input type="text" id="seats" name="seats" class="form-control" placeholder="Enter No. of Seats" value="">
                    <p id="seatsError" class="d-none text-danger errorClass">Please enter number of seats</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="speed">Top Speed</label>
                    <input type="text" id="speed" name="speed" class="form-control" placeholder="Enter Top Speed (miles/hr)" value="">
                    <p id="speedError" class="d-none text-danger errorClass">Please enter top speed</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="price">Price ($)</label>
                    <input type="text" id="price" name="price" class="form-control" placeholder="Enter price" value="">
                    <p id="priceError" class="d-none text-danger errorClass">Please enter price</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="gear_type">Gear/ Transmission </label>
                    <input type="text" id="gear_type" name="gear_type" class="form-control" placeholder="Enter Transmission" value="">
                    <p id="gearError" class="d-none text-danger errorClass">Please enter gear/ transmission</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="fuel_type">Fuel Type</label>
                   <select id="fuel_type" name="fuel_type" class="form-select" required>
                        <option disabled selected>Select fuel type</option>
                    </select>
                    <p id="fuelError" class="d-none text-danger errorClass">Please select fuel type</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea type="text" id="description" name="description" class="form-control" placeholder="Enter description of the car..." ></textarea>
                    
                    <p id="descError" class="d-none text-danger errorClass">Please enter description of the car</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="insurance">Insurance</label>
                    <input type="text" id="insurance" name="insurance" class="form-control" placeholder="Enter Insurance Details" value="">
                    <p id="insuranceErrors" class="d-none text-danger errorClass">Please enter Insurance details</p>
                </div>
            </div>
             <div class="col-md-4">
                <div class="form-group">
                    <label for="number_plate">Number Plate</label>
                    <input type="text" id="number_plate" name="number_plate" class="form-control" placeholder="Enter Number Plate Details" value="">
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
                     <input type="text" id="car_loc" name="car_loc" class="form-control" placeholder="Enter Location of car" value="">
                    <p id="locationError" class="d-none text-danger errorClass">Please enter Car Location</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="car_lat">Car Latitude</label>
                    <input type="hidden" id="car_id" name="car_id" class="form-control" value="<?php echo $card_id; ?>">
                     <input type="text" id="car_lat" name="car_lat" class="form-control" placeholder="Enter Latitude"   pattern="^(\+|-)?([1-8]?\d(\.\d+)?|90(\.0+)?)$" value="">
                    <p id="latitudeError" class="d-none text-danger errorClass">Please enter latitude</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="car_lng">Car Longitude</label>
                    <input type="text" id="car_lng" name="car_lng" class="form-control" placeholder="Enter Longitude" pattern="^(\+|-)?(1[0-7]\d(\.\d+)?|[1-9]?\d(\.\d+)?|180(\.0+)?)$" value="">
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