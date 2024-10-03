<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $location_id = $_POST['location_id'];
    $total_population = $_POST['total_population'];
    $male_population = $_POST['male_population'];
    $female_population = $_POST['female_population'];
    $senior_citizen_population = $_POST['senior_citizen_population'];
    $child_population = $_POST['child_population'];
    $youth_population = $_POST['youth_population'];
    $farmer_population = $_POST['farmer_population'];
    $business_population = $_POST['business_population'];

    // Database connection parameters
    $host = 'localhost'; // Your database host
    $db = 'your_database_name'; // Your database name
    $user = 'your_username'; // Your database username
    $pass = 'your_password'; // Your database password

    // Create connection
    $conn = new mysqli($host, $user, $pass, $db);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO demographics (location_id, total_population, male_population, female_population, senior_citizen_population, child_population, youth_population, farmer_population, business_population) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("iiiiiiiii", $location_id, $total_population, $male_population, $female_population, $senior_citizen_population, $child_population, $youth_population, $farmer_population, $business_population);

    // Execute the statement
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close connections
    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request method.";
}
?>
