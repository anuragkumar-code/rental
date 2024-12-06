<div class="modal fade" id="loginPopup" tabindex="-1" aria-labelledby="loginPopupLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content custom-modal-card">
            <div class="modal-header">
                <h5 class="modal-title w-100 text-center" id="loginPopupLabel">Login</h5>
                <button type="button" class="btn-close" onclick="hideLoginPopup()" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="login_form" method="post">
                    <div class="row mb-12">
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
                            <label for="login_email"><b>Email address</b></label>
                            <input type="email" class="form-control" id="login_email" name="login_email" placeholder="Enter email" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="login_password"><b>Password</b></label>
                            <input type="password" class="form-control" id="login_password" name="login_password" placeholder="Enter password" required>
                        </div>
                       <input type="hidden" name="login_user_type" id="login_user_type">
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
        <h5 id="registerOffcanvasLabel" class="w-100 text-center" style="color: white;">Register</h5>
        <a class="back-button" onclick="hideRegisterOffcanvas()"><i class="fa fa-times"></i></a>
    </div>
    <div class="offcanvas-body d-flex justify-content-center align-items-center" style="overflow-y:auto">
        <form id="register_form" class="w-100">
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

            <div id="personal_info_div" class="d-none">
                <h5 class="mb-3"><b>Personal Info</b></h5>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="register_name">Full Name</label>
                        <input type="text" class="form-control" id="register_name" name="register_name" placeholder="Enter full name" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="register_email">Email Address</label>
                        <input type="email" class="form-control" id="register_email" name="register_email" placeholder="Enter email" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="register_contact">Contact Number</label>
                        <input type="tel" class="form-control" id="register_contact" name="register_contact" placeholder="Enter contact number" pattern="[0-9]*" oninput="this.value = this.value.replace(/[^0-9]/g, '');" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="register_password">Password</label>
                        <input type="password" class="form-control" id="register_password" name="register_password" placeholder="Enter password" required>
                    </div>
                </div>
            </div>

            <div id="address_details_div" class="d-none">
                <h5 class="mb-3"><b>Address Details</b></h5>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="register_house">House/Apartment</label>
                        <input type="text" class="form-control" id="register_house" name="register_house" placeholder="Enter house or apartment" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="register_street">Street</label>
                        <input type="text" class="form-control" id="register_street" name="register_street" placeholder="Enter street" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="register_city">City</label>
                        <input type="text" class="form-control" id="register_city" name="register_city" placeholder="Enter city" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="register_state">State</label>
                        <input type="text" class="form-control" id="register_state" name="register_state" placeholder="Enter state" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="register_zip">Zip Code</label>
                        <input type="text" class="form-control" id="register_zip" name="register_zip" placeholder="Enter zip code" required>
                    </div>
                </div>
            </div>
            <div id="terms_condition_div" class="col-md-12 d-none">
                <label>
                    <input type="checkbox" id="register_terms" name="register_terms" required style="width: 16px; height: 16px; margin-right: 8px;"> 
                    I agree to the 
                    <a href="customer/terms_of_services.php" target="_blank" style="color: #4287F5; text-decoration: underline;">
                        Terms and Conditions
                    </a>
                </label>
            </div>
            <input type="hidden" id="register_user_type">
            <input type="hidden" id="register_user_lat">
            <input type="hidden" id="register_user_long">
        </form>
    </div>
    <div class="offcanvas-footer" style="justify-content: space-between;">
        <button type="button" class="register-btn btn btn-info" onclick="hideRegisterOffcanvas()" style="font-weight: 800;font-size: 14px;font-family: var(--title-font);">Close</button>
        <a href="javascript:void(0)" class="register-btn btn btn-main d-none" onclick="registerUser()" id="register_button" style="text-align: center;padding: .625rem 1.5rem .5rem;">Register</a>
    </div>
</div>

<div id="pageOverlay"></div>

<style>
    #pageOverlay {
        display: none; 
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 9999;
        pointer-events: none;
    }

    #pageOverlay.active {
        display: block;
        animation: pulse 1.5s infinite; 
    }

    @keyframes pulse {
        0% {
            opacity: 0.5;
        }
        50% {
            opacity: 0.8;
        }
        100% {
            opacity: 0.5;
        }
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
    $(document).ready(function () {
        getAndStoreLocation();
    });

    function login() {
        var email = $('#login_email').val();
        var password = $('#login_password').val();
        var userType = $('#login_user_type').val();

        if (userType == '') {
            toastr.error('Something went wrong! Not able to verify you.');
            setTimeout(()=>{
                window.location.reload();
            },300);
        }

        if (email == '') {
            toastr.error('Please enter email address.');
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

        
        $('#pageOverlay').css({ display: 'block', pointerEvents: 'all' });

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
                toastr.error('An error occurred during login. Please try again!');
            },
            complete: function () {
                $('#pageOverlay').css('display', 'none');
            }
        });
    }
    
    function validateEmail(email) {
        var re = /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/;
        return re.test(email.toLowerCase());
    }


    function registerUser() {

        if (!$('#register_terms').is(':checked')) {
            toastr.error("You must agree to the terms and conditions.");
            return;
        }

        var user_type = $('#register_user_type').val();

        var name = $('#register_name').val();
        var email = $('#register_email').val();
        var contact = $('#register_contact').val();
        var password = $('#register_password').val();

        var lat = $('#register_user_lat').val();
        var long = $('#register_user_long').val();

        var house = null;
        var street = null;
        var city = null;
        var state = null;
        var zip = null;

        if(user_type == "customer"){
            house = $('#register_house').val();
            street = $('#register_street').val();
            city = $('#register_city').val();
            state = $('#register_state').val();
            zip = $('#register_zip').val();
        }
          
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

   
        if (user_type == 'customer') {
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
            lat: lat,
            lng: long
        };

        if (user_type === 'customer') {
            data.house = house;
            data.street = street;
            data.city = city;
            data.state = state;
            data.zip_code = zip;
        }

        data.request = user_type === 'owner' ? 'register_customer@rental' : 'register_renter@rental';
        
        $('#pageOverlay').addClass('active');

        $.ajax({
            type: 'POST',
            url: 'functions/registration.php',
            data: data,
            success: function (response) {
                var jsonResponse = JSON.parse(response);

                if (jsonResponse.response[0].status) {
                    toastr.success('Registration successful!');
                    hideRegisterOffcanvas(); 
                } else {
                    $('#pageOverlay').removeClass('active');
                    toastr.error('Registration failed: ' + jsonResponse.response[0].msg);
                }
            },
            error: function () {
                $('#pageOverlay').removeClass('active');
                
                toastr.error('An error occurred during registration. Please try again!');
            },
            complete: function () {
                $('#pageOverlay').removeClass('active');
            },
        });
    }

    function loadRegisterForm(type){

        getAndStoreLocation();

        $("#register_form").find("input, select, textarea").each(function() {
            if (this.type === "radio") {
                return; 
            } else if (this.type === "checkbox") {
                this.checked = false; 
            } else {
                $(this).val("");
            }
        });

        $('#personal_info_div').removeClass('d-none');

        $('#register_button').removeClass('d-none');
        $('#register_back_btn').removeClass('d-none');
        $('#terms_condition_div').removeClass('d-none');
        
        var lat = getCookie('user_lat') || null;
        var lng = getCookie('user_lng') || null;

        if(type == 'customer'){
            $('#address_details_div').removeClass('d-none');
        }

        if(type == 'owner'){
            $('#address_details_div').addClass('d-none');
        }

        $('#register_user_lat').val(lat);
        $('#register_user_long').val(lng);
        $('#register_user_type').val(type);
 
    }

    function showRegisterOffcanvas() {
        $('#personal_info_div').addClass('d-none');
        $('#address_details_div').addClass('d-none');
        $('#terms_condition_div').addClass('d-none');
        $('#register_button').addClass('d-none');
        
        $("#register_form").trigger("reset");
        $('#registerOffcanvas').offcanvas('show'); 
    }

    function hideRegisterOffcanvas() {
        $('#registerOffcanvas').offcanvas('hide'); 
    }

    function showLoginPopup(){

        $('#login_form').trigger("reset");
        $('#loginButton').addClass('d-none');
        $('.loginInfo').addClass('d-none');

        $('#loginPopup').modal('show');
    }

    function hideLoginPopup(){
        $('#loginPopup').modal('hide');
    }
    
    
    function loadLoginForm(type){
        $('.loginInfo').removeClass('d-none');
        $('#loginButton').removeClass('d-none');

        $('#login_user_type').val('');
        $('#login_user_type').val(type);

    }


    //below functions are only for geolocation

    function getAndStoreLocation() {
        let lat = getCookie('user_lat');
        let lng = getCookie('user_lng');

        if (lat && lng) {
            return; 
        }

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                function (position) {
                    lat = position.coords.latitude;
                    lng = position.coords.longitude;
                    setCookie('user_lat', lat, 7); 
                    setCookie('user_lng', lng, 7);

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

