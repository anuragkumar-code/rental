<?php

session_start();

$customer_id = $_SESSION['user_id'];
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
  CURLOPT_POSTFIELDS => array('request' => 'get_reviews'),
  CURLOPT_HTTPHEADER => array(
    'Authorization: Bearer e37834b4b0119181b399479527013ab1a206ca8326e23cea4427aacc3ce709a0'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
$response_data = json_decode($response, true);

$html = '';

if ($response_data['response'][0]['status'] === true && !empty($response_data['response'][0]['data'])) {

    $reviews = array_filter($response_data['response'][0]['data'], function ($review) use ($customer_id) {
        return $review['customer_id'] == $customer_id;
    });

    $html .= '<div class="card padding30 rounded-5 mb25">
        <h4>Reviews</h4>
        <table class="table de-table">
        <thead>
            <tr>
            <th scope="col"><span class="fs-12 text-gray">S. No.</span></th>
            <th scope="col"><span class="fs-12 text-gray">Ratings</span></th>
            <th scope="col"><span class="fs-12 text-gray">Review</span></th>
            </tr>
        </thead>
        <tbody>';

        $index = 1;
        foreach ($reviews as $data) {
            $filledStars = str_repeat('★', (int)$data['rating']);
            $emptyStars = str_repeat('☆', 5 - (int)$data['rating']);
            $stars = $filledStars . $emptyStars;

            $html .= '<tr>
                <td>' . $index++ . '</td>
                <td><span class="stars">' . $stars .'</span></td>
                <td>' . htmlspecialchars($data['msg']) . '</td>
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
