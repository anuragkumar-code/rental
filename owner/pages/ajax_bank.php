<?php

$owner_id = $_POST['owner_id'];

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://alliedtechnologies.cloud/clients/whips/api/v1/boosted.php',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => array('request' => 'fetchBankDetails', 'owner_id' => $owner_id),
));

$response = curl_exec($curl);
curl_close($curl);

$data = json_decode($response, true);

if (!empty($data['response'][0]['data'])) {
    $bankDetails = $data['response'][0]['data'];
} else {
    $bankDetails = [
        'bank_name' => '',
        'account_number' => '',
        'routing_number' => '',
        'holder_name' => ''
    ];
}

?>

<div class="card padding40 rounded-5">
    <div class="row">
        <div class="col-lg-12">
            <form id="form-create-item" class="form-border" method="post" action="email.php">
                <div class="de_tab tab_simple">
                    <ul class="de_nav">
                        <li class="active"><span>Bank Details</span></li>
                    </ul>
                    <div class="de_tab_content">                            
                        <div class="tab-1">
                            <div class="row">
                                <div class="col-lg-6 mb20">
                                    <h5>Bank Name</h5>
                                    <input type="text" name="bank_name" id="bank_name" class="form-control" placeholder="Enter bank name" 
                                           value="<?php echo htmlspecialchars($bankDetails['bank_name']); ?>" />
                                </div>
                                <div class="col-lg-6 mb20">
                                    <h5>Account Number</h5>
                                    <input type="text" name="account_number" id="account_number" class="form-control" placeholder="Enter account number" 
                                           value="<?php echo htmlspecialchars($bankDetails['account_number']); ?>" />
                                </div>
                                <div class="col-lg-6 mb20">
                                    <h5>Routing Number</h5>
                                    <input type="text" name="routing_number" id="routing_number" class="form-control" placeholder="Enter routing number" 
                                           value="<?php echo htmlspecialchars($bankDetails['routing_number']); ?>" />
                                </div>
                                <div class="col-lg-6 mb20">
                                    <h5>Account Holder Name</h5>
                                    <input type="text" name="account_holder_name" id="account_holder_name" class="form-control" placeholder="Enter account holder name" 
                                           value="<?php echo htmlspecialchars($bankDetails['holder_name']); ?>" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="javascript:void(0)" id="updateBankBtn" onclick="updateBank(<?php echo $owner_id; ?>)" class="btn-main">Update</a>
            </form>
        </div>
    </div>
</div>
