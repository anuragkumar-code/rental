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
  CURLOPT_POSTFIELDS => array('request' => 'get_booking','user_id' => $user_id),
  CURLOPT_HTTPHEADER => array(
    'Authorization: Bearer e37834b4b0119181b399479527013ab1a206ca8326e23cea4427aacc3ce709a0'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
$response_data = json_decode($response, true);


$html = ''; 

if ($response_data['response'][0]['status'] === true && !empty($response_data['response'][0]['data'])) 
{

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
                                    </tr>
                                  </thead>
                                  <tbody>';
                                 
    
                        foreach ($booking_data as $data) {
                            $html .= '<tr>
                                      <td><span class="d-lg-none d-sm-block">Order ID</span><div class="badge bg-gray-100 text-dark">#' . $data['booking_id'] . '</div></td>
                                      <td><span class="d-lg-none d-sm-block">Car Name</span><span class="bold">' . $data['car']['brand']. ' ' . $data['car'] ['model'] . '</span></td>
                                      <td><span class="d-lg-none d-sm-block">Customer Name</span>' . $data['cust']['name'] . '</td>
                               
                                      <td><span class="d-lg-none d-sm-block">Pick Up Date</span>' . $data['from_date'] . '</td>
                                      <td><span class="d-lg-none d-sm-block">Return Date</span>' . $data['to_date'] . '</td>
                                      <td>
                                              <span class="d-lg-none d-sm-block">Payment Status</span>
                                              ' . ($data['is_paid'] === 'Y' 
                                                  ? '<div class="badge rounded-pill bg-success">Compeleted</div>' 
                                                  : '<div class="badge rounded-pill bg-danger">Not Compeleted</div>') . '
                                          </td>
                                    <td>
                                              <span class="d-lg-none d-sm-block">Status</span>
                                              ' . (
                                                  $data['status'] == 'DC'
                                                      ? '<div class="badge rounded-pill bg-danger">Request Declined</div>'
                                                      : ($data['status'] == 'AC'
                                                          ? '<div class="badge rounded-pill bg-primary">Ride Accepted</div>'
                                                          : ($data['status'] == 'success'
                                                              ? '<div class="badge rounded-pill bg-success">Success</div>'
                                                              : '<div class="badge rounded-pill bg-warning">Request Pending</div>'
                                                            )
                                                        )
                                                ) . '
                                          </td>

                                    </tr>';
                        }

        $html .= '
                                     
                                  </tbody>
                                </table>
                            </div>';


                          }  else {
    $html .= '<div class="card padding30 rounded-5 mb25 ">
                                <h4>No Bookings to show!!</h4></div>';
}

echo $html;
                            

?>