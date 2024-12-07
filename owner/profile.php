<?php include ('partials/owner-header.php'); ?>

<?php

$user_id = $_SESSION['user_id']; 
$image = '../assets/images/profile/default.jpg';
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://alliedtechnologies.cloud/clients/whips/api/v1/owner.php',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array('request' => 'owner_profile','user_id' => $user_id),
  CURLOPT_HTTPHEADER => array(
    
    'Authorization: Bearer e37834b4b0119181b399479527013ab1a206ca8326e23cea4427aacc3ce709a0',
    
  ),
));

$response = curl_exec($curl);
curl_close($curl);
$data = json_decode($response, true);
 
$fetch = $data['response'][0]['data'];
 
 
if ($fetch) {
    $name = htmlspecialchars($fetch['name']);
    $email = htmlspecialchars($fetch['email']);
    $image = htmlspecialchars($fetch['image']);
}
 

?>

 <style>
    .profile_img-01 {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        overflow: hidden;
        cursor: pointer;
        display: inline-block;
    }

    .profile_img-01 img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    #fileInput {
        display: none;
    }
</style>

<section id="subheader" class="jarallax text-light">
    <img src="../assets/images/background/4.jpg" class="jarallax-img" alt="">
    <div class="center-y relative text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1>My Profile</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="section-settings" class="bg-gray-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 mb30">
                <div class="card padding30 rounded-5">
                    <div class="profile_avatar">
                        <div class="profile_img">
                            <img src="<?php echo $image; ?>" alt="Profile Image">
                             <span class="edit-icon" onclick="openModal()">&#9998;</span> 
                            
                        </div>
                        <div class="profile_name">
                            <h4>
                                <?= $name ?>
                                <span class="profile_username text-gray"><?= $email ?></span>
                            </h4>
                        </div>
                    </div>
                    <div class="spacer-20"></div>
                    <ul class="menu-col">
                        <li><a href="javascript:void(0)" onclick="loadProfile()" class="active customClass" id="personalTab"><i class="fa fa-user"></i>Personal Details</a></li>
                        <li><a href="javascript:void(0)" onclick="loadBank()" class="customClass" id="bankTab"><i class="fa fa-calendar"></i>Bank Details</a></li>
                        <!-- <li><a href="javascript:void(0)" onclick="loadBookings()" class="customClass" id="bookingTab"><i class="fa fa-car"></i>Bookings Request</a></li> -->
                        <li><a href="javascript:void(0)" onclick="loadHistory()" class="customClass" id="historyTab"><i class="fa fa-car"></i>Booking History</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-9" id="mainDiv">
                <div class="card padding40  rounded-5">
                    <div class="row">
                        <div class="col-lg-12">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div id="editModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h3>Edit Profile Image</h3>
        <p>Upload a new image here</p>
        <input type="file" id="profileImage"  accept="image/*">
        <button type="button" class="btn-main" onclick="SaveProfileImage()">Update Profile Image</button>
    </div>
</div>

<div class="modal fade" id="add_review" tabindex="-1" aria-labelledby="add_reviewLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add_reviewLabel">Add Review</h5>
                <a href="javascript:void(0)" class="btn-close" onclick="hideReviewPopup()" aria-label="Close"></a>
            </div>
            <div class="modal-body">
                <form id="reviewForm">
                    <div class="mb-3">
                        <div class="star-rating" id="starRating">
                            <span data-value="1">☆</span>
                            <span data-value="2">☆</span>
                            <span data-value="3">☆</span>
                            <span data-value="4">☆</span>
                            <span data-value="5">☆</span>
                        </div>
                    </div>
                    <div class="mt-5 mb-3">
                        <textarea class="form-control" id="reviewContent" name="review" rows="4" placeholder="Write your review here..."></textarea>
                        <input type="hidden" id="review_customer_id">
                        <input type="hidden" id="star_reviews">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <a href="javascript:void(0)" class="btn-main" onclick="hideReviewPopup()">Close</a>
                <a href="javascript:void(0)" class="btn-main" onclick="add_review()">Add Review</a>
            </div>
        </div>
    </div>
</div>

<style>

    .star-rating {
        display: flex;
        justify-content: flex-start;
        gap: 5px;
        font-size: 36px; 
        cursor: pointer;
    }
    .star-rating span {
        color: #ccc;
        transition: color 0.3s ease;
    }
    .star-rating span.selected {
        color: #ffc107;
    }

    .profile_img {
        position: relative;
        display: inline-block;
    }

    .profile_img img {
        width: 100%;
        height: auto;
        border-radius: 50%;
    }

    .profile_img .edit-icon {
        position: absolute;
        bottom: 10px;
        right: 10px;
        background-color: #ffffff;
        color: #333; 
        padding: 5px;
        border-radius: 50%;
        font-size: 16px;
        cursor: pointer;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
    }

    .profile_img .edit-icon:hover {
        background-color: #f0f0f0; 
    }

    .modal {
        display: none; 
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5); 
        justify-content: center;
        align-items: center;
    }

    .modal-content {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        width: 350px;
        position: relative;
        text-align: center;
    }

    .close {
        position: absolute;
        top: 10px;
        right: 10px;
        font-size: 20px;
        font-weight: bold;
        cursor: pointer;
    }

    #profileImage {
        padding: 10px;
        display: block;
        margin: auto;
    }
</style>


<script>

    document.addEventListener('DOMContentLoaded', () => {
    const starRating = document.getElementById('starRating');
    let selectedRating = 0; 

    starRating.addEventListener('click', (event) => {
        if (event.target.tagName === 'SPAN') {
        const value = parseInt(event.target.getAttribute('data-value'));
        selectedRating = value; 
        updateStarRating(value);
        }
    });

    function updateStarRating(value) {
        const stars = starRating.querySelectorAll('span');
        const starReviewsInput = document.getElementById('star_reviews');
        stars.forEach((star) => {
        const starValue = parseInt(star.getAttribute('data-value'));
        star.classList.toggle('selected', starValue <= value);
        });

        if (starReviewsInput) {
        starReviewsInput.value = value;
        }
    }

    window.submitReview = function () {
        const reviewText = document.getElementById('reviewContent').value;
        const starReviewsValue = document.getElementById('star_reviews').value;
    };
    });


    function openModal() {
        document.getElementById("editModal").style.display = "flex";
    }

    function closeModal() {
        document.getElementById("editModal").style.display = "none";
    }

    setTimeout(()=>{
        loadProfile()
    },500);

    function loadProfile(){
        var user_id = "<?php echo $_SESSION['user_id']; ?>";
        $.ajax({
            url: 'pages/ajax_profile.php',
            method: 'POST',
            data: {
                
                user_id : user_id
            },
            success: function(response) {
                $('.customClass').removeClass('active');
                $('#personalTab').addClass('active');

                $('#mainDiv').html('');
                $('#mainDiv').html(response);
                
            },
            error: function() {
                toastr.error('<b>An error occurred while processing your request. Please try again.</b>');
            }
        });
    }

    function loadBank(){
        var owner_id = "<?php echo $_SESSION['user_id']; ?>";
        $.ajax({
            url: 'pages/ajax_bank.php',
            method: 'POST',
            data: {
                
                  owner_id : owner_id
            },
            success: function(response) {
                $('.customClass').removeClass('active');
                $('#bankTab').addClass('active');

                $('#mainDiv').html('');
                $('#mainDiv').html(response);
                
            },
            error: function() {
                toastr.error('<b>An error occurred while processing your request. Please try again.</b>');
            }
        });
    }

    function updateBank(owner_id){

        var holder_name = $('#account_holder_name').val();
        var bank_name = $('#bank_name').val();
        var bank_code = $('#bank_code').val();
        var routing_number = $('#routing_number').val();
        var account_number = $('#account_number').val();

        if (bank_name == '') {
            toastr.error('Please enter bank name.');
            return;
        }

        if (bank_code == '') {
            toastr.error('Please enter bank code.');
            return;
        }

        if (account_number == '') {
            toastr.error('Please enter bank account number.');
            return;
        }

        if (routing_number == '') {
            toastr.error('Please enter routing number.');
            return;
        }

        if (account_number == '') {
            toastr.error('Please enter bank account holder name.');
            return;
        }


        $('#updateBankBtn').prop('disabled', true).text('Updating...');

        $.ajax({
            url: 'functions/profile/ajax_bank.php',
            method: 'POST',
            data: {
                owner_id : owner_id,
                holder_name : holder_name,
                bank_name : bank_name,
                bank_code : bank_code,
                routing_number : routing_number,
                account_number : account_number
            },
            success: function (response) {
                try {
                    var res = JSON.parse(response);
                    if (res.response[0].status) {
                        toastr.success(res.response[0].msg || 'Bank details updated successfully!');
                    } else {
                        toastr.error(res.response[0].msg || 'Failed to update bank details.');
                    }
                } catch (error) {
                    toastr.error('An unexpected error occurred. Please try again.');
                }
            },
            error: function() {
                toastr.error('<b>An error occurred while processing your request. Please try again.</b>');
            },
            complete: function () {
                $('#updateBankBtn').prop('disabled', false).text('Update');
            }
        });
    }

    function loadHistory(){
        $.ajax({
            url: 'pages/ajax_history.php',
            method: 'POST',
            success: function(response) {
                $('.customClass').removeClass('active');
                $('#historyTab').addClass('active');
                $('#mainDiv').html('');
                $('#mainDiv').html(response);
            },
            error: function() {
                toastr.error('<b>An error occurred while processing your request. Please try again.</b>');
            }
        });
    }

    function showReviewPopup(customer_id){
        $('#review_customer_id').val('');
        $('#star_reviews').val('');

        $('#review_customer_id').val(customer_id);
        $('#add_review').modal('show');
    }

    function hideReviewPopup(){
        $('#review_customer_id').val('');
        $('#star_reviews').val('');
        
        $('#add_review').modal('hide');

    }

    function add_review(){
        var customer_id = $('#review_customer_id').val();

        var ratings = $('#star_reviews').val();
        var review = $('#reviewContent').val();

        $.ajax({
            url: 'functions/profile/ajax_addreview.php',
            method: 'POST',
            data:{
                customer_id: customer_id,
                ratings: ratings,
                review: review
            },
            success: function(response) {
                try {
                    var jsonResponse = JSON.parse(response); 
                    if (jsonResponse.response && jsonResponse.response.length > 0) {
                        var res = jsonResponse.response[0];
                        if (res.status === true) {
                            toastr.success(`<b>${res.msg}</b>`);

                            hideReviewPopup();
                        } else {
                            toastr.error(`<b>${res.reason || 'An error occurred.'}</b>`);
                        }
                    } else {
                        toastr.error('<b>Something went wrong. Please try again.</b>');
                    }
                } catch (e) {
                    toastr.error('<b>Failed to process the response.</b>');
                }
            },
            error: function() {
                toastr.error('<b>An error occurred while processing your request. Please try again.</b>');
            }
        });
    }

    // function loadBookings(){
    //     $.ajax({
    //         url: 'pages/ajax_bookings.php',
    //         method: 'POST',
    //         success: function(response) {
    //             $('.customClass').removeClass('active');
    //             $('#bookingTab').addClass('active');
    //             $('#mainDiv').html('');
    //             $('#mainDiv').html(response);
                
    //         },
    //         error: function() {
    //             toastr.error('<b>An error occurred while processing your request. Please try again.</b>');
    //         }
    //     });
    // }

    function update_booking(booking_id,status){
        $.ajax({
            url: 'functions/update_booking.php',
            method: 'POST',
            data : {
                status : status,
                booking_id : booking_id
            },
            success: function(response) {
                
            },
            error: function() {
                toastr.error('<b>An error occurred while processing your request. Please try again.</b>');
            }
        });
    }
    
    
    $(document).ready(function() {
        loadProfile(); 
    });
    
    function updateData(){
        let formData = new FormData();
        formData.append('user_id', "<?php echo $_SESSION['user_id']; ?>");
        formData.append('name', $('#name').val());
        formData.append('email', $('#email_address').val());
        formData.append('contact', $('#contact').val());
           
        $.ajax({
            url: 'functions/profile/edit_owner.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (result) {
                var fetch = JSON.parse(result);

                if (fetch.response[0].status == true) {
                    toastr.success('Profile has been updated!')
                    loadProfile();
                }else { 
                    toastr.error('An error occurred during profile update. Please try again!');
                }
            },
            error: function () {
                alert('Error updating profile.');
            }
        });
        
    }
    
    
    function SaveProfileImage(){
        let formData = new FormData();
        
        formData.append('user_id', "<?php echo $_SESSION['user_id']; ?>");
        const imageFile = document.getElementById('profileImage').files[0];
    
        if (imageFile) {
            formData.append('profile_image', imageFile); 
        } else {
            alert("No image selected. Please select an image first.");
            return; 
        }

        $.ajax({
            url: 'functions/profile/edit_profile_image.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (abc) {
                var fetch = JSON.parse(abc);
                if (fetch.response[0].status == true) {
                    toastr.success('Profile image has been updated!')
                    // loadProfile();
                    location.reload();
                }else {
                    toastr.error('An error occurred during profile image update. Please try again!');
                    $('#editModal').modal('hide'); 
                    $('#profileImage').val(''); 
                        
                }
            },
            error: function () {
                toastr.error('An error occurred while profile image update. Please try again!');
            }
        });
        
    }
    
</script>


<?php include ('partials/owner-footer.php'); ?>
