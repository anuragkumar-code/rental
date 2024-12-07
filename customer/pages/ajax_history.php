<?php

session_start();

$curl = curl_init();
$renter_id = $_SESSION['user_id']; 
// $renter_id = '1';

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://alliedtechnologies.cloud/clients/whips/api/v1/renter.php',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array('request' => 'get_booking', 'renter_id' => $renter_id),
  CURLOPT_HTTPHEADER => array(
    'Authorization: Bearer e37834b4b0119181b399479527013ab1a206ca8326e23cea4427aacc3ce709a0'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
$response_data = json_decode($response, true);

$html = '';

if ($response_data['response'][0]['status'] === true && !empty($response_data['response'][0]['data'])) {
  
  $booking_data = $response_data['response'][0]['data'];

  $html .= '<div class="card padding30 rounded-5 mb25">
    <h4>Booking History</h4>
    <table class="table de-table">
      <thead>
        <tr>
          <th scope="col"><span class="fs-12 text-gray">Order ID</span></th>
          <th scope="col"><span class="fs-12 text-gray">Car Name</span></th>
          <th scope="col"><span class="fs-12 text-gray">Owner Name</span></th>
          <th scope="col"><span class="fs-12 text-gray">Pick Up Date</span></th>
          <th scope="col"><span class="fs-12 text-gray">Return Date</span></th>
           <th scope="col"><span class="fs-12 text-gray">Payment Status</span></th>
          <th scope="col"><span class="fs-12 text-gray">Status</span></th>
        </tr>
      </thead>
      <tbody>';
      foreach ($booking_data as $data) {
        $paymentStatusClass = $data['is_paid'] === 'Y' ? 'bg-success' : 'bg-danger';
        $paymentStatusText = $data['is_paid'] === 'Y' ? 'Completed' : 'Not Completed';
    
        switch ($data['status']) {
            case 'DC':
                $statusClass = 'bg-danger';
                $statusText = 'Request Declined';
                break;
            case 'AC':
                $statusClass = 'bg-primary';
                $statusText = 'Ride Accepted';
                break;
            case 'success':
                $statusClass = 'bg-success';
                $statusText = 'Success';
                break;
            default:
                $statusClass = 'bg-warning';
                $statusText = 'Request Pending';
                break;
        }
    
        $html .= '<tr>
            <td>
                <span class="badge bg-gray-100 text-dark">#' . $data['booking_id'] . '</span>
            </td>
            <td>
                <span class="bold">' . $data['car']['brand'] . ' ' . $data['car']['model'] . '</span>
            </td>
            <td>
                <span>' . $data['owner']['name'] . '</span>
            </td>
            <td>
                <span>' . $data['from_date'] . '</span>
            </td>
            <td>
                <span>' . $data['to_date'] . '</span>
            </td>
            <td>
                <div class="badge rounded-pill ' . $paymentStatusClass . '">' . $paymentStatusText . '</div>
            </td>
            <td>
                <div class="badge rounded-pill ' . $statusClass . '">' . $statusText . '</div>
            </td>
        </tr>';
      }
    
  $html .= '</tbody>
    </table>
   </div>';

} else {
  $html .= '<div class="card padding30 rounded-5 mb25 ">
    <h4>No Bookings to show!!</h4>
  </div>';
}

echo $html;
