<?php include ('partials/customer-header.php');?>
<?php

$renter_id = $_SESSION['user_id']; 
$image = '';
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://alliedtechnologies.cloud/clients/whips/api/v1/renter.php',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array('request' => 'renter_profile','renter_id' => $renter_id),
  CURLOPT_HTTPHEADER => array(
    'Authorization: Bearer e37834b4b0119181b399479527013ab1a206ca8326e23cea4427aacc3ce709a0',
  ),
));

$response = curl_exec($curl);

curl_close($curl);

$data = json_decode($response, true);
$fetch = $data['response'][0]['data'];
 
if($fetch) {
    $name = htmlspecialchars($fetch['name']);
    $email = htmlspecialchars($fetch['email']);
    $fetch_image = htmlspecialchars($fetch['image']);

    if (empty($fetch_image) || strpos($fetch_image, '/api/v1/') !== false) {
        $image = '../assets/images/customer-select.jpg';  
    } else {
        $image = $fetch_image; 
    }
}

// echo "<pre>"; print_r($fetch);exit;
?>
 
 
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
                        <li><a href="javascript:void(0)" onclick="loadHistory()" class="customClass" id="historyTab"><i class="fa fa-car"></i>Booking History</a></li>
                        <li><a href="javascript:void(0)" onclick="loadReviews()" class="customClass" id="reviewTab"><i class="fa fa-star"></i>Reviews</a></li>
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

<style>
    .stars {
        font-size: 1.5rem;
        color: #FFD700;
        letter-spacing: 2px; 
    }

    .stars .empty {
        color: #dcdcdc; 
    }

    #profileImage {
        padding: 10px;
        display: block;
        margin: auto;
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
</style>


<script>
    function openModal() {
        document.getElementById("editModal").style.display = "flex";
    }

    function closeModal() {
        document.getElementById("editModal").style.display = "none";
    }

    function loadProfile(){
        var renter_id = "<?php echo $_SESSION['user_id']; ?>";
        $.ajax({
            url: 'pages/ajax_profile.php',
            method: 'POST',
            data: {
                renter_id : renter_id
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

    function loadReviews(){
        $.ajax({
            url: 'pages/ajax_reviews.php',
            method: 'POST',
            success: function(response) {
                $('.customClass').removeClass('active');
                $('#reviewTab').addClass('active');
                $('#mainDiv').html('');
                $('#mainDiv').html(response);
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

        formData.append('renter_id', "<?php echo $_SESSION['user_id']; ?>");
        formData.append('name', $('#name').val());
        formData.append('email', $('#email_address').val());
        formData.append('contact', $('#contact').val());
        formData.append('house', $('#house_number').val());
        formData.append('street', $('#street').val());
        formData.append('city', $('#city').val());
        formData.append('state', $('#state').val());
        formData.append('zip_code', $('#zip_code').val());

        $.ajax({
            url: 'functions/profile/edit_customer.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (result) {
                var fetch = JSON.parse(result);
                
                if (fetch.response[0].status == true) {
                    toastr.success('Profile has been updated!')
                    loadProfile();
                } else { 
                    toastr.error('An error occurred during profile update. Please try again!');
                }
   
            },
            error: function () {
                toastr.error('Error updating profile. Please try again later');
            }
        });
        
    }
    
    function SaveProfileImage(){
        let formData = new FormData();
        
        formData.append('renter_id', "<?php echo $_SESSION['user_id']; ?>");
        const imageFile = document.getElementById('profileImage').files[0];
    
        if (imageFile) {
            formData.append('profile_image', imageFile); 
        } else {
            toastr.error("No image selected, Please select an image first.");
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
                    location.reload();
                } else {
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

<?php include ('partials/customer-footer.php'); ?>
