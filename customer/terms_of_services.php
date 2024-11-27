<?php include ('partials/customer-header.php'); ?>

<style>
.container_tr {
    padding: 50px;
    background-color: #f9f9f9;
    margin-top: 20px;
    border-radius: 8px;
    box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
}

.heading_tr {
    font-size: 28px;
    font-weight: bold;
    margin-bottom: 20px;
    color: #333;
    text-align: center;
}

.data_tr {
    line-height: 1.6;
     background-color: #ebfcfc;
      padding: 50px;
}

.para_tr {
    font-size: 16px;
    color: #555;
    margin-bottom: 20px;
}

.para_tr strong {
    color: #333;
    font-weight: bold;
}

ul {
    margin-left: 20px;
    list-style-type: disc;
}

ul li {
    margin-bottom: 10px;
}

/* Button Styling */
.accept-btn {
    display: block;
    width: 200px;
    padding: 12px 0;
    margin: 30px auto 0;
    background-color: #28a745;
    color: white;
    text-align: center;
    font-size: 16px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.accept-btn:hover {
    background-color: #218838;
}
</style>


<section id="subheader" class="jarallax text-light">
    <img src="../assets/images/background/2.jpg" class="jarallax-img" alt="">
    <div class="center-y relative text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
					<h1>Review Terms of Services</h1>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</section>



<div class="container_tr"> 
    <h4 class="heading_tr">Terms of Services</h4> 
    <div class="data_tr"> 
        <p class="para_tr"> 
            <strong>1. Agreement Overview</strong><br>
            By renting a vehicle from Whip, you agree to the terms and conditions set forth in this document. This agreement governs the relationship between the customer (you) and WHIP, for the duration of the rental period.
        </p>
        
        <p class="para_tr">
            <strong>2. Eligibility</strong><br>
            To rent a vehicle, you must:
            <ul>
                <li>Be at least 21 years old.</li>
                <li>Hold a valid driver’s license.</li>
                <li>Provide a valid credit or debit card for security deposit.</li>
            </ul>
        </p>

        <p class="para_tr">
            <strong>3. Rental Period</strong><br>
            The rental period begins at the time of vehicle pick-up and ends upon its return. Late returns may result in additional charges.
        </p>

        <p class="para_tr">
            <strong>4. Payment and Fees</strong><br>
            <ul>
                <li>The rental fees are calculated based on the duration and type of vehicle selected.</li>
                <li>Fuel charges, tolls, and parking fees are the customer’s responsibility.</li>
                <li>Late fees may apply if the vehicle is returned after the agreed rental period.</li>
            </ul>
        </p>

        <p class="para_tr">
            <strong>5. Vehicle Usage</strong><br>
            The vehicle must not be used for illegal purposes, off-roading, racing, or sub-rental to other individuals.
        </p>

        <p class="para_tr">
            <strong>6. Insurance and Liability</strong><br>
            Basic insurance coverage is included in your rental. You may opt for additional coverage at an extra cost.
        </p>

        <p class="para_tr">
            <strong>7. Cancellation Policy</strong><br>
            Cancellations made within 24 hours of booking will receive a full refund. Cancellations after 24 hours will incur a cancellation fee equivalent to one day’s rental charge.
        </p>

        <p class="para_tr">
            <strong>8. Privacy Policy</strong><br>
            We value your privacy and are committed to protecting your personal information. For details on how we handle your data, please refer to our Privacy Policy.
        </p>

        <p class="para_tr">
            <strong>9. Amendments</strong><br>
            WHIP reserves the right to modify these terms at any time. Any changes will be communicated via our website or email.
        </p>

        <p class="para_tr">
            <strong>10. Contact Information</strong><br>
            For any questions or concerns, please contact our customer service team at contact@whip.com .
        </p>
    </div>
    <form action="#" method="POST">
    <button type="submit" class="accept-btn">Accept Terms</button>
</form>
</div>
<!-- Accept Button -->




<?php include ('partials/customer-footer.php'); ?>