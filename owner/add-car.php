<?php include ('partials/owner-header.php'); ?>

<style>
    body.dimmed {
        opacity: 0.5;
        pointer-events: none; 
    }
</style>

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
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="model">Enter Model</label>
                        <input type="text" id="model" name="model" class="form-control" placeholder="Enter Car Model">
                        
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="car_type">Car Category</label>
                        <select id="car_type" name="car_type" class="form-select" required>
                            <option value="">Select car category</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="engine_specs">Engine Specs</label>
                        <input type="text" id="engine_specs" name="engine_specs" class="form-control" placeholder="Enter Engine Specs">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="car_color">Car Color</label>
                        <input type="text" id="car_color" name="car_color" class="form-control" placeholder="Enter color">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="seats">No of Seats</label>
                        <select id="seats" name="seats" class="form-select" required>
                            <option selected disabled>Select car seats</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="speed">Top Speed</label>
                        <input type="text" id="speed" name="speed" class="form-control" placeholder="Enter Top Speed (miles/hr)">
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" id="price" name="price" class="form-control" placeholder="Enter price">
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
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" id="location" name="location" class="form-control" placeholder="Enter car location">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea type="text" id="description" name="description" class="form-control" placeholder="Enter description of the car..."></textarea>
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
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="number_plate">Car Number Plate</label>
                        <input type="file" class="form-control" id="number_plate" name="number_plate" />
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
        var car_type = $('#car_type').val();
        var engine_specs = $('#engine_specs').val();
        var car_color = $('#car_color').val();
        var seats = $('#seats').val();
        var speed = $('#speed').val();
        var price = $('#price').val();
        var gear_type = $('#gear_type').val();
        var fuel_type = $('#fuel_type').val();
        var location = $('#location').val();
        var description = $('#description').val();
    
        var car_insurance = $('#car_insurance')[0].files[0];
        var number_plate = $('#number_plate')[0].files[0];
        var ssn = $('#ssn').val();

        var car_images = $('#car_images')[0].files;

        $('body').addClass('dimmed');

        var formData = new FormData();
        formData.append('brand', brand);
        formData.append('model', model);
        formData.append('car_type', car_type);
        formData.append('engine_specs', engine_specs);
        formData.append('car_color', car_color);
        formData.append('seats', seats);
        formData.append('speed', speed);
        formData.append('price', price);
        formData.append('gear_type', gear_type);
        formData.append('fuel_type', fuel_type);
        formData.append('location', location);
        formData.append('description', description);

        formData.append('car_lat', getCookie('car_lat'));
        formData.append('car_lng', getCookie('car_lng'));

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
                $('body').removeClass('dimmed');
                toastr.success('Car added successfully.');

                setTimeout(()=>{
                    window.location.reload()
                },400);
            },
            error: function(xhr, status, error) {
                $('body').removeClass('dimmed');
                toastr.error('An error occurred: ' + error);
                console.log(xhr.responseText);
            },
            complete: function() {
            $('body').removeClass('dimmed');
        }
        });
    }

    function get_brands(){
        $.ajax({
            type: 'POST',
            url: 'functions/cars/get-brands.php',
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

    function get_categories(){
        $.ajax({
            type: 'POST',
            url: 'functions/cars/get-categories.php',
            success: function(response) {
                
                const data = JSON.parse(response);
                const categories = data.response[0].data;
            
                const getCategories = $('#car_type');
                getCategories.empty(); 
                getCategories.append('<option selected disabled>Select Car Category</option>');

                categories.forEach((category) => {
                    getCategories.append(`<option value="${category.brands}">${category.brands}</option>`);
                });
                
            },
            error: function() {
                alert('An error occurred while brands.');
            }
        });
    }
    

    setTimeout(()=>{
        get_brands(); 
        get_categories();
        getAndStoreLocation();
    },300);


    function getAndStoreLocation() {
        let lat = getCookie('car_lat');
        let lng = getCookie('car_lng');

        if (lat && lng) {
            return; 
        }

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                function (position) {
                    lat = position.coords.latitude;
                    lng = position.coords.longitude;
                    setCookie('car_lat', lat, 7); 
                    setCookie('car_lng', lng, 7);

                }
            );
        } else {
            console.error("Geolocation is not supported by this browser.");
        }
    }

    function setCookie(name, value, days) {
        const date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000)); 
        document.cookie = `${name}=${value};expires=${date.toUTCString()};path=/`;
    }

    function getCookie(name) {
        const cookies = document.cookie.split('; ');
        for (let i = 0; i < cookies.length; i++) {
            const [key, value] = cookies[i].split('=');
            if (key === name) {
                return value;
            }
        }
        return null;
    }
</script>


<?php include ('partials/owner-footer.php'); ?>