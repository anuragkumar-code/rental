<?php include ('partials/customer-header.php'); ?>

<section id="subheader" class="jarallax text-light">
    <img src="../assets/images/background/2.jpg" class="jarallax-img" alt="">
    <div class="center-y relative text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1>Payment</h1>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</section>

<section class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow-sm p-4 mb-4" style="border-radius: 15px; background-color: #f9f9f9;">
                <img src="../assets/images/cars/jeep-renegade.jpg" class="card-img-top mb-3" alt="Car Image" style="border-radius: 10px;">
                <div class="card-body">
                    <h5 class="card-title mb-3">Jeep Renegade</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between">
                            <span><strong>Pick Up Date:</strong></span> <span>12th October 2024</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span><strong>Drop Off Date:</strong></span> <span>15th October 2024</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span><strong>Pick Up Location:</strong></span> <span>New York</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span><strong>Drop Off Location:</strong></span> <span>Pennsylvania</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>


        <div class="col-md-6">
            <div class="card shadow-sm p-4 mb-4" style="border-radius: 15px; background-color: #f9f9f9;">
                <div class="card-body">
                    <h5 class="card-title">Payment Details</h5>
                    <form id="payment-form" action="../customer/thank-you.php">
                        <div class="mb-3">
                            <label for="cardName" class="form-label">Cardholder Name</label>
                            <input type="text" class="form-control" id="cardName" placeholder="Enter your name" required>
                        </div>
                        <div class="mb-3">
                            <label for="cardNumber" class="form-label">Card Number</label>
                            <input type="tel" pattern="[0-9]*" class="form-control" id="cardNumber" placeholder="Enter your card number"  oninput="this.value = this.value.replace(/[^0-9]/g, '');" maxlength="16" required>
                    
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="expiryDate" class="form-label">Expiry Date</label>
                                <!--<input type="text" class="form-control" id="expiryDate" placeholder="MM/YY" required>-->
                                <input type="text" class="form-control" id="expiryDate" 
  placeholder="MM/YY" 
  pattern="(0[1-9]|1[0-2])\/\d{2}" 
  maxlength="5" 
  oninput="this.value = this.value.replace(/[^0-9\/]/g, '').replace(/(\/{2,})/g, '/');" 
  required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="cvv" class="form-label">CVV</label>
                                <input type="text" class="form-control" id="cvv" placeholder="CVV" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Proceed to Payment</button>
                    </form>
                    
                    <div class="text-center mt-4">
                        <h6>We accept:</h6>
                        <div class="d-flex justify-content-center align-items-center">
                            <img src="../assets/images/payments/visa.png" alt="Visa" class="img-fluid mx-2" style="width: 50px;">
                            <img src="../assets/images/payments/master-card.png" alt="MasterCard" class="img-fluid mx-2" style="width: 50px;">
                            <img src="../assets/images/payments/google-pay.png" alt="Google pay" class="img-fluid mx-2" style="width: 50px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include ('partials/customer-footer.php'); ?>
