<div class="modal fade" id="loginPopup" tabindex="-1" aria-labelledby="loginPopupLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content custom-modal-card">
            <div class="modal-header">
                <h5 class="modal-title w-100 text-center" id="loginPopupLabel">Login</h5>
                <button type="button" class="btn-close" onclick="hideLoginPopup()" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="loginForm" method="post" action="" onsubmit="return validateForm()">
                    <div class="row mb-12" id="customerTypeDiv">
                        <div class="col-md-12" style="text-align: center;">
                            <label class="radio-img" style="display: inline-block; margin: 20px; text-align: center;">
                                <input type="radio" name="userType" value="customer" onchange="loadLoginForm(this.value)">
                                <img src="assets/images/customer-select.jpg" alt="Customer" style="width: 150px; height: 150px; border-radius: 50%;  display: block; margin: 0 auto;">
                                <p style="font-size: 18px;">Customer</p>
                            </label>
                            
                            <label class="radio-img" style="display: inline-block; margin: 20px; text-align: center;">
                                <input type="radio" name="userType" value="owner" onchange="loadLoginForm(this.value)">
                                <img src="assets/images/owner-select.jpg" alt="Owner" style="width: 150px; height: 150px; border-radius: 50%;  display: block; margin: 0 auto;">
                                <p style="font-size: 18px;">Owner</p>
                            </label>
                        </div>
                    </div>
                    <div class="loginInfo d-none">   
                        <div class="form-group mb-3">
                            <label for="email"><b>Email address</b></label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="password"><b>Password</b></label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                        </div>
                       <input type="hidden" name="customerType" id="customerType">
                    </div>
                </form>
            </div>
            <div class="modal-footer loginInfo d-none">
                <button type="button"  id="closeButton" class="btn btn-info" onclick="hideLoginPopup()" style="font-weight: 800;">Close</button>
                <a href="javascript:void(0)" class="btn-main" onclick="login()" id="loginButton">Log In</a>
            </div>
        </div>
    </div>
</div>


<div class="offcanvas offcanvas-end custom-offcanvas" id="registerOffcanvas" tabindex="-1" aria-labelledby="registerOffcanvasLabel">
    <div class="offcanvas-header" style="background-color: #4287f5; border: 2px solid #4287f5;">
        <a class="back-button d-none" id="backBtn" onclick="showSelect()"><i class="fa fa-arrow-left"></i></a>
        <h5 id="registerOffcanvasLabel" class="w-100 text-center" style="color: white;">Register</h5>
        <a class="back-button" onclick="hideRegisterOffcanvas()"><i class="fa fa-times"></i></a>
    </div>
    <div class="offcanvas-body d-flex justify-content-center align-items-center" style="overflow-y:auto">
        <form id="registerForm" class="w-100">
            <div class="row" id="customerTypeDiv">
                <div class="col-md-12" style="display: flex; justify-content: center; align-items: center;">
                    <label for="userType"><b>Who are you ?</b></label>
                </div>
                
                <div class="col-md-12" style="text-align: center;">
                    <label class="radio-img" style="display: inline-block; margin: 20px; text-align: center;">
                        <input type="radio" name="userType" value="customer" onchange="loadRegisterForm(this.value)">
                        <img src="assets/images/customer-select.jpg" alt="Customer" style="width: 150px; height: 150px; border-radius: 50%;  display: block; margin: 0 auto;">
                        <p style="font-size: 18px;">Customer</p>
                    </label>
                    <label class="radio-img" style="display: inline-block; margin: 20px; text-align: center;">
                        <input type="radio" name="userType" value="owner" onchange="loadRegisterForm(this.value)">
                        <img src="assets/images/owner-select.jpg" alt="Owner" style="width: 150px; height: 150px; border-radius: 50%;  display: block; margin: 0 auto;">
                        <p style="font-size: 18px;">Owner</p>
                    </label>
                </div>  
            </div>

            <div id="personalInfo" class="d-none">
                <h5 class="mb-3"><b>Personal Info</b></h5>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name">Full Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter full name" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="register_email">Email Address</label>
                        <input type="email" class="form-control" id="register_email" name="register_email" placeholder="Enter email" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="contact">Contact Number</label>
                        <input type="tel" class="form-control" id="contact" name="contact" placeholder="Enter contact number" pattern="[0-9]*" oninput="this.value = this.value.replace(/[^0-9]/g, '');" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="register_password">Password</label>
                        <input type="password" class="form-control" id="register_password" name="register_password" placeholder="Enter password" required>
                    </div>
                </div>
            </div>

            <div id="addressDetails" class="d-none">
                <h5 class="mb-3"><b>Address Details</b></h5>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="house">House/Apartment</label>
                        <input type="text" class="form-control" id="house" name="house" placeholder="Enter house or apartment" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="street">Street</label>
                        <input type="text" class="form-control" id="street" name="street" placeholder="Enter street" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="city">City</label>
                        <input type="text" class="form-control" id="city" name="city" placeholder="Enter city" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="state">State</label>
                        <input type="text" class="form-control" id="state" name="state" placeholder="Enter state" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="zip">Zip Code</label>
                        <input type="text" class="form-control" id="zip" name="zip" placeholder="Enter zip code" required>
                    </div>
                </div>
            </div>
            <div id = "terms-condition" class="col-md-12 d-none">
                <label>
                    <input type="checkbox" name="terms" required style="width: 16px; height: 16px; margin-right: 8px;"> 
                    I agree to the 
                    <a href="customer/terms_of_services.php" target="_blank" style="color: #4287F5; text-decoration: underline;">
                        Terms and Conditions
                    </a>
                </label>
            </div>
            <input type="hidden" name="customerType" id="customerType">
        </form>
    </div>
    <div class="offcanvas-footer" style="justify-content: space-between;">
        <button type="button" class="register-btn btn btn-info" onclick="hideRegisterOffcanvas()" style="font-weight: 800;font-size: 14px;font-family: var(--title-font);">Close</button>
        <a href="javascript:void(0)" class="register-btn btn btn-main d-none" onclick="registerUser()" id="registerButton" style="text-align: center;padding: .625rem 1.5rem .5rem;">Register</a>
    </div>
</div>

<!-- <div id="loader" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 9999;">
    <div class="spinner-border text-primary" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
</div> -->

<div id="pageOverlay" style="display: none;"></div>



<style>





#pageOverlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5); /* Faded effect */
    z-index: 9999; /* Ensure it's on top of all elements */
    pointer-events: none; /* Disable interactions */
}
    .radio-img {
        display: inline-block;
        text-align: center;
        margin: 10px;
        cursor: pointer;
    }

    .radio-img img {
        width: 100px;
        height: 100px;
        border: 2px solid transparent;
        border-radius: 5px;
        transition: border-color 0.3s ease;
    }

    .radio-img input[type="radio"] {
        display: none;
    }

    .radio-img input[type="radio"]:checked + img {
        border: 2px solid #3a6abf;
    }

    .radio-img p {
        margin-top: 5px;
        font-weight: bold;
    }
    
    .radio-img img {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .radio-img img:hover {
        transform: scale(1.1); 
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        border: 5px solid #4287f5;
    }

    input[type="checkbox"] {
        -webkit-appearance: checkbox;
    }

</style>

<script>


function login() {
    var email = $('#email').val();
    var password = $('#password').val();
    var userType = $('#customerType').val();

    if (userType == '') {
        toastr.error('Something went wrong! Not able to verify you.');
        return;
    }

    if (email == '') {
        toastr.error('Please enter your email address.');
        return;
    } else if (!validateEmail(email)) {
        toastr.error('Please enter a valid email address.');
        return;
    }

    if (password == '') {
        toastr.error('Please enter your password.');
        return;
    } else if (password.length < 6) {
        toastr.error('Password must be at least 6 characters long.');
        return;
    }

    var request = (userType === 'owner') ? 'login@rental' : 'login_renter@rental';

    var data = {
        email: email,
        password: password,
        userType: request,
    };

    
    $('#pageOverlay').css({
        display: 'block',
        pointerEvents: 'all' 
    });

    $.ajax({
        type: 'POST',
        url: 'functions/login.php',
        data: data,
        success: function (response) {
            var result = JSON.parse(response);

            if (result.status) {
                toastr.success(result.message);
                window.location.href = result.redirect_url;
            } else {
                toastr.error(result.message);
            }
        },
        error: function () {
            toastr.error('An error occurred during registration. Please try again!');
        },
        complete: function () {
            // Hide the overlay after the AJAX request is complete
            $('#pageOverlay').css('display', 'none');
        }
    });
}

    
    function validateEmail(email) {
        var re = /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/;
        return re.test(email.toLowerCase());
    }


    function registerUser() {
        var userType = $('#customerType').val();
        var name = $('#name').val();
        var email = $('#register_email').val();
        var contact = $('#contact').val();
        var password = $('#register_password').val();
        var house = $('#house').val();
        var street = $('#street').val();
        var city = $('#city').val();
        var state = $('#state').val();
        var zip = $('#zip').val();

          
        if (name == '') {
            toastr.error('Please enter your full name.');
            return;
        }

  
        if (email == '') {
            toastr.error('Please enter your email address.');
            return;
        }

        if (contact == '') {
            toastr.error('Please enter your contact number.');
            return;
        } 

        if (password == '') {
            toastr.error('Please enter password.');
            return;
        } else if (password.length < 6) {
            toastr.error('Password must be at least 6 characters long.');
            return;
        }

   
        if (userType == 'customer') {
            if (house == '') {
                toastr.error('Please enter your house or apartment.');
                return;
            }
            if (street == '') {
                toastr.error('Please enter your street.');
                return;
            }
            if (city == '') {
                toastr.error('Please enter your city.');
                return;
            }
            if (state == '') {
                toastr.error('Please enter your state.');
                return;
            }
            if (zip == '') {
                toastr.error('Please enter your zip code.');
                return;
            }
        }
   

        var data = {
            name: name,
            email: email,
            contact: contact,
            password: password,
        };

        if (userType === 'customer') {
            data.house = house;
            data.street = street;
            data.city = city;
            data.state = state;
            data.zip_code = zip;
            data.lat = '1';
            data.lng = '1';
        }

        data.request = userType === 'owner' ? 'register_customer@rental' : 'register_renter@rental';
        
        console.log(data);

         $('#pageOverlay').css({
        display: 'block',
        pointerEvents: 'all' 
    });
        // return;
        $.ajax({
            type: 'POST',
            url: 'functions/registration.php',
            data: data,
            success: function (response) {
                var jsonResponse = JSON.parse(response);
                
                console.log(jsonResponse);
                
                var resData = jsonResponse.response[0];

                if (resData.status) {
                    var userData = resData.data;
                    var message = 'Registration successful! Welcome, ' + userData.name + '.';
                        
                    toastr.success(message);

                    hideRegisterOffcanvas(); 
                } else {
                   var error_message = 'Registration failed: ' + resData.msg;
                    toastr.error(error_message);
                }
                
            },
            error: function() {
                toastr.error('An error occurred during registration. Please try again!');
            }
        });
    }



    function showSelect(){
        loadRegisterForm('');
    }

    function loadRegisterForm(type){
       
        if(type == ''){
            $('#userType').val('');
            $('#customerTypeDiv').removeClass('d-none');
            $('#backBtn').addClass('d-none');

            $('#personalInfo').addClass('d-none');
            $('#addressDetails').addClass('d-none');
            $('#registerButton').addClass('d-none');
            $('#terms-condition').addClass('d-none');
    
            $('#customerType').val('');

            return;

        }
        
        if(type == 'customer'){
            $('#addressDetails').removeClass('d-none');
            $('#terms-condition').removeClass('d-none');
        }

        if(type == 'owner'){
            $('#addressDetails').addClass('d-none');
            $('#terms-condition').addClass('d-none');
        }
 
        $('#registerButton').removeClass('d-none');
        $('#personalInfo').removeClass('d-none');
        $('#customerTypeDiv').addClass('d-none');
        $('#backBtn').removeClass('d-none');
        $('#terms-condition').removeClass('d-none');

        $('#customerType').val(type);
        console.log(type);


    }

    function showRegisterOffcanvas() {
        $('#registerOffcanvas').offcanvas('show'); 
    }

    function hideRegisterOffcanvas() {
        $('#registerOffcanvas').offcanvas('hide'); 
    }

    function showLoginPopup(){
        $('#loginPopup').modal('show');
    }

    function hideLoginPopup(){
        $('#loginPopup').modal('hide');
    }
    
    
    function loadLoginForm(type){
        $('.loginInfo').removeClass('d-none');
        $('#customerType').val('');
        $('#customerType').val(type);

    }


</script>

