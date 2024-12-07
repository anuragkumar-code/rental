<?php
session_start();
$curl = curl_init();

$user_id = $_SESSION['user_id']; 

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
    'Authorization: Bearer e37834b4b0119181b399479527013ab1a206ca8326e23cea4427aacc3ce709a0'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
$response_data = json_decode($response, true);

$html = ''; 

if ($response_data['response'][0]['status'] === true && !empty($response_data['response'][0]['data'])){

  $booking_data = $response_data['response'][0]['data'];

  $html .= '<div class="card padding30 rounded-5 mb25">
    <h4>Booking History</h4>
    <table class="table de-table">
      <thead>
        <tr>
          <th scope="col"><span class="fs-12 text-gray">Order ID</span></th>
          <th scope="col"><span class="fs-12 text-gray">Car Name</span></th>
          <th scope="col"><span class="fs-12 text-gray">Customer Name</span></th>
          <th scope="col"><span class="fs-12 text-gray">Pick Up Date</span></th>
          <th scope="col"><span class="fs-12 text-gray">Return Date</span></th>
          <th scope="col"><span class="fs-12 text-gray">Payment Status</span></th>
          <th scope="col"><span class="fs-12 text-gray">Status</span></th>
          <th scope="col"><span class="fs-12 text-gray">Action</span></th>
        </tr>
      </thead>
      <tbody>';
    
      foreach ($booking_data as $data) {
        $payment_status = $data['is_paid'] === 'Y' ? ['label' => 'Completed', 'color' => 'bg-success'] : ['label' => 'Not Completed', 'color' => 'bg-danger'];
        
        switch ($data['status']) {
          case 'DC':
            $booking_status = ['label' => 'Request Declined', 'color' => 'bg-danger'];
            break;
          case 'AC':
            $booking_status = ['label' => 'Ride Accepted', 'color' => 'bg-primary'];
            break;
          case 'success':
            $booking_status = ['label' => 'Success', 'color' => 'bg-success'];
            break;
          default:
            $booking_status = ['label' => 'Request Pending', 'color' => 'bg-warning'];
        }
    
        $html .= '<tr>
          <td>
            <span class="badge bg-gray-100 text-dark">#' . $data['booking_id'] . '</span>
          </td>
          <td>
            <span class="bold">' . $data['car']['brand'] . ' ' . $data['car']['model'] . '</span>
          </td>
          <td>
            <span class="d-sm-block">' . $data['cust']['name'] . '</span>
          </td>
          <td>
            <span class="d-sm-block">' . $data['from_date'] . '</span>
          </td>
          <td>
            <span class="d-sm-block">' . $data['to_date'] . '</span>
          </td>
          <td>
            <span class="badge rounded-pill ' . $payment_status['color'] . '">' . $payment_status['label'] . '</span>
          </td>
          <td>
            <span class="badge rounded-pill ' . $booking_status['color'] . '">' . $booking_status['label'] . '</span>
          </td>
          <td class="text-center">
            <a title="Click here to add review" href="javascript:void(0)" onclick=showReviewPopup('.$data['renter_id'].')><i class="fa fa-edit"></i></a>
          </td>
        </tr>';
      }
    

  $html .= '</tbody>
    </table>
  </div>';

}else {
  $html .= '<div class="card padding30 rounded-5 mb25 "><h4>No Bookings to show!!</h4></div>';
}

echo $html;
                            

?>