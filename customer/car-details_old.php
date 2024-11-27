<?php include ('partials/customer-header.php'); ?>

<section id="subheader" class="jarallax text-light">
    <img src="../assets/images/background/2.jpg" class="jarallax-img" alt="">
    <div class="center-y relative text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1>Car Details</h1>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</section>

<section id="section-car-details">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6">
                <div id="slider-carousel" class="owl-carousel">
                    <div class="item">
                        <img src="../assets/images/car-single/1.jpg" alt="">
                    </div>
                    <div class="item">
                        <img src="../assets/images/car-single/2.jpg" alt="">
                    </div>
                    <div class="item">
                        <img src="../assets/images/car-single/3.jpg" alt="">
                    </div>
                    <div class="item">
                        <img src="../assets/images/car-single/4.jpg" alt="">
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <h3>BMW M2 2020</h3>
                <p>The BMW M2 is the high-performance version of the 2 Series 2-door coupé. The first generation of the M2 is the F87 coupé and is powered by turbocharged engines.</p>

                <div class="spacer-30"></div>

                <div class="de-box mb25">
                    <h4>Features</h4>
                    <ul class="ul-style-2">
                        <li>Bluetooth</li>
                        <li>Multimedia Player</li>
                        <li>Central Lock</li>
                        <li>Sunroof</li>
                    </ul>
                </div>

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
                                    <h6 class="card-title">Body</h6>
                                    <p class="card-text">Sedan</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="text-center">
                                    <h6 class="card-title">Seat</h6>
                                    <p class="card-text">2 seats</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="text-center">
                                    <h6 class="card-title">Door</h6>
                                    <p class="card-text">2 doors</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="text-center">
                                    <h6 class="card-title">Luggage</h6>
                                    <p class="card-text">150</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="text-center">
                                    <h6 class="card-title">Fuel Type</h6>
                                    <p class="card-text">Hybrid</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="text-center">
                                    <h6 class="card-title">Engine</h6>
                                    <p class="card-text">3000</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="text-center">
                                    <h6 class="card-title">Mileage</h6>
                                    <p class="card-text">200</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="text-center">
                                    <h6 class="card-title">Transmission</h6>
                                    <p class="card-text">Automatic</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</section>


<div class="modal fade" id="bookingPopup" tabindex="-1" aria-labelledby="bookingPopupLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content custom-modal-card">
      <div class="modal-header">
        <h5 class="modal-title w-100 text-center" id="bookingPopupLabel">Book a Car</h5>
        <button type="button" class="btn-close" onclick="hideBookingPopup()" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form name="contactForm" id='booking_form' class="form-s2 row g-4 on-submit-hide" method="post" action="#">
            <div class="col-lg-12 d-light">
                <div class="card car-card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="../assets/images/cars/jeep-renegade.jpg" id="car-image" class="img-fluid rounded-start" alt="Jeep Renegade">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title" id="car-name">Jeep Renegade</h5>
                                <p class="card-text"><strong>Price:</strong> $265</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-4">
                    <div class="col-lg-6">
                        <h5>Pick Up Location</h5>
                        <select name='Pick Up Location' id="pick_up_location" class="form-control opt-1-disable" required>
                            <option value='New York'>Enter your pickup location</option>
                            <option value='New York'>New York</option>
                            <option value='Pennsylvania'>Pennsylvania</option>
                            <option value='New Jersey'>New Jersey</option>
                            <option value='Connecticut'>Connecticut</option>
                            <option value='Massachusetts'>Massachusetts</option>
                            <option value='Vermont'>Vermont</option>
                            <option value='Rhode Island'>Rhode Island</option>
                            <option value='New Hampshire'>New Hampshire</option>
                        </select>
                    </div>

                    <div class="col-lg-6">
                        <h5>Destination</h5>
                        <select name='Destination' id="destination" class="form-control opt-1-disable" required>
                            <option value='New York'>Enter your destination</option>
                            <option value='New York'>New York</option>
                            <option value='Pennsylvania'>Pennsylvania</option>
                            <option value='New Jersey'>New Jersey</option>
                            <option value='Connecticut'>Connecticut</option>
                            <option value='Massachusetts'>Massachusetts</option>
                            <option value='Vermont'>Vermont</option>
                            <option value='Rhode Island'>Rhode Island</option>
                            <option value='New Hampshire'>New Hampshire</option>
                        </select>
                    </div>

                    <div class="col-lg-6">
                        <h5>Pick Up Date</h5>
                        <div class="date-time-field">
                            <input style="width: 100%;" type="text" id="date-picker" name="Pick Up Date" value="" class="form-control">
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <h5>Return Date</h5>
                        <div class="date-time-field">
                            <input style="width: 100%;" type="text" id="date-picker-2" name="Return Date" value="" class="form-control">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 mt-3" style="text-align:right;">
                <a href="javascript:void(0)" onclick="hideBookingPopup()" class="btn btn-danger">Cancel</a>
                <a href="payment.php" class="btn-main">Book Now</a>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>


<script>
    function showBookingPopup(){
        $('#bookingPopup').modal('show');
    }

    function hideBookingPopup(){
        $('#bookingPopup').modal('hide');

    }
</script>
<?php include ('partials/customer-footer.php'); ?>
