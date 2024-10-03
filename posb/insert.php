<?php
 include('db.php');
$table = $conn->real_escape_string($_POST['table']);
$data = $_POST;

// Remove table from data array
unset($data['table']);

// Validate input fields (make sure to handle types properly based on your schema)
$columns = implode(", ", array_keys($data));
$values = implode(", ", array_map(function($value) use ($conn) {
    return "'" . $conn->real_escape_string($value) . "'";
}, $data));

// Prepare SQL statement
$sql = "INSERT INTO $table ($columns) VALUES ($values)";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
