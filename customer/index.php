<?php include ('partials/customer-header.php'); ?>
<section id="subheader" class="jarallax text-light">
    <img src="../assets/images/background/2.jpg" class="jarallax-img" alt="">
    <div class="center-y relative text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
					<h1>Cars</h1>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</section>

<section id="section-cars">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="item_filter_group">
                    <h4>Vehicle Type</h4>
                    <div class="de_form">
                        <div class="de_checkbox">
                            <input id="vehicle_type_1" name="vehicle_type_1" type="checkbox" value="vehicle_type_1">
                            <label for="vehicle_type_1">Car</label>
                        </div>
                        <div class="de_checkbox">
                            <input id="vehicle_type_2" name="vehicle_type_2" type="checkbox" value="vehicle_type_2">
                            <label for="vehicle_type_2">Van</label>
                        </div>
                        <div class="de_checkbox">
                            <input id="vehicle_type_3" name="vehicle_type_3" type="checkbox" value="vehicle_type_3">
                            <label for="vehicle_type_3">Minibus</label>
                        </div>
                        <div class="de_checkbox">
                            <input id="vehicle_type_4" name="vehicle_type_4" type="checkbox" value="vehicle_type_4">
                            <label for="vehicle_type_4">Prestige</label>
                        </div>
                    </div>
                </div>
                <div class="item_filter_group">
                    <h4>Car Body Type</h4>
                    <div class="de_form">
                        <div class="de_checkbox">
                            <input id="car_body_type_1" name="car_body_type_1" type="checkbox" value="car_body_type_1">
                            <label for="car_body_type_1">Convertible</label>
                        </div>
                        <div class="de_checkbox">
                            <input id="car_body_type_2" name="car_body_type_2" type="checkbox" value="car_body_type_2">
                            <label for="car_body_type_2">Coupe</label>
                        </div>
                        <div class="de_checkbox">
                            <input id="car_body_type_3" name="car_body_type_3" type="checkbox" value="car_body_type_3">
                            <label for="car_body_type_3">Exotic Cars</label>
                        </div>
                        <div class="de_checkbox">
                            <input id="car_body_type_4" name="car_body_type_4" type="checkbox" value="car_body_type_4">
                            <label for="car_body_type_4">Hatchback</label>
                        </div>
                        <div class="de_checkbox">
                            <input id="car_body_type_5" name="car_body_type_5" type="checkbox" value="car_body_type_5">
                            <label for="car_body_type_5">Minivan</label>
                        </div>
                        <div class="de_checkbox">
                            <input id="car_body_type_6" name="car_body_type_6" type="checkbox" value="car_body_type_6">
                            <label for="car_body_type_6">Truck</label>
                        </div>
                        <div class="de_checkbox">
                            <input id="car_body_type_7" name="car_body_type_7" type="checkbox" value="car_body_type_7">
                            <label for="car_body_type_7">Sedan</label>
                        </div>
                        <div class="de_checkbox">
                            <input id="car_body_type_8" name="car_body_type_8" type="checkbox" value="car_body_type_8">
                            <label for="car_body_type_8">Sports Car</label>
                        </div>
                        <div class="de_checkbox">
                            <input id="car_body_type_9" name="car_body_type_9" type="checkbox" value="car_body_type_9">
                            <label for="car_body_type_9">Station Wagon</label>
                        </div>
                        <div class="de_checkbox">
                            <input id="car_body_type_10" name="car_body_type_10" type="checkbox" value="car_body_type_10">
                            <label for="car_body_type_10">SUV</label>
                        </div>
                    </div>
                </div>
                <div class="item_filter_group">
                    <h4>Car Seats</h4>
                    <div class="de_form">
                        <div class="de_checkbox">
                            <input id="car_seat_1" name="car_seat_1" type="checkbox" value="car_seat_1">
                            <label for="car_seat_1">2 seats</label>
                        </div>
                        <div class="de_checkbox">
                            <input id="car_seat_2" name="car_seat_2" type="checkbox" value="car_seat_2">
                            <label for="car_seat_2">4 seats</label>
                        </div>
                        <div class="de_checkbox">
                            <input id="car_seat_3" name="car_seat_3" type="checkbox" value="car_seat_3">
                            <label for="car_seat_3">6 seats</label>
                        </div>
                        <div class="de_checkbox">
                            <input id="car_seat_4" name="car_seat_4" type="checkbox" value="car_seat_4">
                            <label for="car_seat_4">6+ seats</label>
                        </div>
                    </div>
                </div>
                <div class="item_filter_group">
                    <h4>Car Engine Capacity (cc)</h4>
                    <div class="de_form">
                        <div class="de_checkbox">
                            <input id="car_engine_1" name="car_engine_1" type="checkbox" value="car_engine_1">
                            <label for="car_engine_1">1000 - 2000</label>
                        </div>
                        <div class="de_checkbox">
                            <input id="car_engine_2" name="car_engine_2" type="checkbox" value="car_engine_2">
                            <label for="car_engine_2">2000 - 4000</label>
                        </div>
                        <div class="de_checkbox">
                            <input id="car_engine_3" name="car_engine_3" type="checkbox" value="car_engine_3">
                            <label for="car_engine_3">4000 - 6000</label>
                        </div>
                        <div class="de_checkbox">
                            <input id="car_engine_4" name="car_engine_4" type="checkbox" value="car_engine_4">
                            <label for="car_engine_4">6000+</label>
                        </div>
                    </div>
                </div>
                <div class="item_filter_group">
                    <h4>Price ($)</h4>
                    <div class="price-input">
                        <div class="field">
                            <span>Min</span>
                            <input type="number" class="input-min" value="0">
                        </div>
                        <div class="field">
                            <span>Max</span>
                            <input type="number" class="input-max" value="2000">
                        </div>
                    </div>
                    <div class="slider">
                        <div class="progress"></div>
                    </div>
                    <div class="range-input">
                        <input type="range" class="range-min" min="0" max="2000" value="0" step="1">
                        <input type="range" class="range-max" min="0" max="2000" value="2000" step="1">
                    </div>
                </div>
            </div>
            
            <!-- <div class="col-lg-9">-->
            <!--    <div class="row " id="owner_car_list_div">-->
            <!--        <img style="height:80px" id="loader" src="../assets/images/balls.svg" class="" alt="">-->
            <!--    </div>-->
            <!--</div>-->

            <div class="col-lg-9">
                <div class="row" id="listRow">
                    <div class="de-icon-box p-5 text-center">
                        <!--<img src="../assets/images/twirl.svg" alt="Loading...">-->
                        <img style="height:80px" id="loader" src="../assets/images/balls.svg" class="" alt="">
                        <div class="spacer-20"></div>
                            <h4>Loading...</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<script>
    function categoryFilter() {

        $.ajax({
            type: 'POST',
            url: 'functions/cars/car-list.php',
            data: {
                
            },
            success: function(response) {
                  $('#listRow').html(''); 
              $('#listRow').html(response);
            },
            error: function() {
                alert('An error occurred while fetching the products.');
            }
        });
    }    

    setTimeout(()=>{
        categoryFilter(); 
    },1000);
</script>

<?php include ('partials/customer-footer.php'); ?>