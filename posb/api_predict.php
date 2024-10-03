
<?php
header('Content-Type: application/json');

// Get JSON input
$input = file_get_contents('php://input');
$data = json_decode($input, true);

// Check if 'data' is set
if (isset($data['data'])) {
    $received_data = $data['data'];
    // Process the received data (e.g., call ML model)
    
    // Example response
    $response = [
        'prediction' => ['Sukanya Samriddhi Account (SSA)', 'Senior Citizen Social Security (SCSS)']
    ];
} else {
    $response = ['error' => 'No data received'];
}

echo json_encode($response);
?>
