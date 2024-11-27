<?php
session_start();

$user_id = $_SESSION['user_id'];

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
  CURLOPT_POSTFIELDS => array('request' => 'get_booking','user_id' => $user_id),
  CURLOPT_HTTPHEADER => array(
    'Authorization: Bearer e37834b4b0119181b399479527013ab1a206ca8326e23cea4427aacc3ce709a0',
  ),
));

$response = curl_exec($curl);

curl_close($curl);
// echo $response;
// exit;

$data = json_decode($response, true);
$bookings = $data['response'][0]['data'] ?? [];
?>


<div class="card padding40  rounded-5">
    <div class="row">
        <div class="col-lg-12">
            <div class="container">
                <h2 class="mb-4">Booking Requests</h2>
                <div class="row">
                <?php foreach ($bookings as $booking): ?>
                    <div class="col-lg-4 mb-4">
                        <div class="card" style="border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.2);">
                            <div class="card-body d-flex flex-column" style="padding-bottom: 0;">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="profile_avatar">
                                        <div class="profile_img">
                                            <img style="width: 55px;" src="<?php echo $booking['cust']['image'] ?: '../assets/images/profile/default.jpg'; ?>" alt="">
                                        </div>
                                    </div>
                                    <div class="ms-3">
                                        <h5 class="card-title"><?php echo $booking['cust']['name']; ?></h5>
                                        <p class="card-text"><i class="fa fa-mobile"></i> <?php echo $booking['cust']['contact']; ?></p>
                                    </div>
                                </div>
                                <h5><a href="../owner/car-details.php"><i class="fa fa-car"></i> <?php echo $booking['car']['brand'] . ' ' . $booking['car']['model'] ?></a></h5>
                                <p><i class="fa fa-calendar"></i> <?php echo $booking['from_date'] . ' to ' . $booking['to_date']; ?></p>
                            </div>
                            <div class="d-flex">
                                <button class="btn btn-success w-50" onclick="update_booking('<?php echo $booking['booking_id']; ?>','A')" style="border-radius: 0;">Accept</button>
                                <button class="btn btn-danger w-50" onclick="update_booking('<?php echo $booking['booking_id']; ?>','R')" style="border-radius: 0;">Reject</button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>
</div>

