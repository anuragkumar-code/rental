<?php include ('partials/owner-header.php'); ?>

<section id="subheader" class="jarallax text-light">
    <img src="../assets/images/background/4.jpg" class="jarallax-img" alt="">
    <div class="center-y relative text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1>Add New Car</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="add-car-form" class="container mt-5 mb-5">
    <form id="car-registration-form" method="POST" enctype="multipart/form-data">
        <div class="row">
            <h3>Enter Car Details</h3>
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
                        <label for="model">Select Model</label>
                        <input type="text" id="model" name="model" class="form-control" placeholder="Enter Car Model">
                        <p id="modelError" class="d-none text-danger errorClass">Please enter the car model</p>
                        
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="car_name">Car Name</label>
                        <input type="text" id="car_name" name="car_name" class="form-control" placeholder="Enter car name">
                        <p id="nameError" class="d-none text-danger errorClass">Please enter car name</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="car_type">Car Type</label>
                        <input type="text" id="car_type" name="car_type" class="form-control" placeholder="Sedan, SUV, etc.">
                        <p id="typeError" class="d-none text-danger errorClass">Please enter car type</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="engine_specs">Engine Specs</label>
                        <input type="text" id="engine_specs" name="engine_specs" class="form-control" placeholder="Enter Engine Specs">
                        <p id="engineError" class="d-none text-danger errorClass">Please enter enginer power</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="car_color">Car Color</label>
                        <input type="text" id="car_color" name="car_color" class="form-control" placeholder="Enter color">
                        <p id="colorError" class="d-none text-danger errorClass">Please enter car color</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="seats">No of Seats</label>
                        <input type="text" id="seats" name="seats" class="form-control" placeholder="Enter No. of Seats">
                        <p id="seatsError" class="d-none text-danger errorClass">Please enter number of seats</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="speed">Top Speed</label>
                        <input type="text" id="speed" name="speed" class="form-control" placeholder="Enter Top Speed (miles/hr)">
                        <p id="speedError" class="d-none text-danger errorClass">Please enter top speed</p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" id="price" name="price" class="form-control" placeholder="Enter price">
                        <p id="priceError" class="d-none text-danger errorClass">Please enter price</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="gear_type">Gear Type</label>
                        <select class="form-select" id="gear_type">
                            <option disabled selected>Select gear type</option>
                            <option value="manual">Manual</option>
                            <option value="automatic">Automatic</option>
                        </select>
                        <p id="gearError" class="d-none text-danger errorClass">Please select gear type car color</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="fuel_type">Fuel Type</label>
                        <select id="fuel_type" class="form-select">
                            <option disabled selected>Select fuel type</option>
                            <option value="petrol">Petrol</option>
                            <option value="diesel">Diesel</option>
                        </select>
                        <p id="fuelError" class="d-none text-danger errorClass">Please select fuel type</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea type="text" id="description" name="description" class="form-control" placeholder="Enter description of the car..."></textarea>
                        <p id="descError" class="d-none text-danger errorClass">Please enter description of the car</p>
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
    
        formData.append('car_insurance', car_insurance);
        formData.append('number_plate', number_plate);
        formData.append('ssn', ssn);

        for (let i = 0; i < car_images.length; i++) {
            formData.append('car_images[]', car_images[i]);
        }

        $.ajax({
            type: 'POST',
            url: 'functions/cars/add-car.php',
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