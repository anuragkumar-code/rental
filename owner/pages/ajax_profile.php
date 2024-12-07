<?php
$curl = curl_init();

$user_id = $_POST['user_id'];

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://alliedtechnologies.cloud/clients/whips/api/v1/owner.php',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array(
    'request' => 'owner_profile',
    'user_id' => $user_id
  ),
  CURLOPT_HTTPHEADER => array(

    'Authorization: Bearer e37834b4b0119181b399479527013ab1a206ca8326e23cea4427aacc3ce709a0',
   
  ),
));

$response = curl_exec($curl);
curl_close($curl);


$data = json_decode($response, true);


if (!empty($data['response'][0]['data'])) {
    $profileData = $data['response'][0]['data'];
} else {
    $profileData = [];
}

$html = '';

$html .= '<div class="card padding40 rounded-5">
    <div class="row">
        <div class="col-lg-12">
            <form id="form-create-item" class="form-border" method="post">
                <div class="de_tab tab_simple">
                    <ul class="de_nav">
                        <li class="active"><span>Profile</span></li>
                    </ul>
                    <div class="de_tab_content">
                        <div class="tab-1">
                            <div class="row">
                                <div class="col-lg-6 mb20">
                                    <h5>Name</h5>
                                    <input readonly type="text" name="name" id="name" class="form-control" placeholder="Enter your full name" value="' . ($profileData['name'] ?? '') . '" />
                                </div>
                                <div class="col-lg-6 mb20">
                                  <h5>Email Address</h5>
                                  <input readonly type="text" name="email_address" id="email_address" class="form-control" placeholder="Enter your email" value="' . ($profileData['email'] ?? '') . '" />
                                </div>
                                <div class="col-lg-6 mb20">
                                  <h5>Contact</h5>
                                  <input readonly type="text" name="contact" id="contact" class="form-control" placeholder="Enter your contact number" value="' . ($profileData['contact'] ?? '') . '" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="card mt-4">
                    <div class="card-header">
                        <h5 class="mb-0">Change Password</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 mb20">
                                <h5>New Password</h5>
                                <input type="password" name="new_password" id="new_password" class="form-control" placeholder="Enter new password" />
                            </div>
                            <div class="col-lg-6 mb20">
                                <h5>Confirm Password</h5>
                                <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm new password" />
                            </div>
                        </div>
                    </div>
                </div>
                
                <a href="javascript:void(0)" onclick="updateData()" class="btn-main">Update</a>

            </form>
        </div>
    </div>
</div>';




echo $html;
?>
