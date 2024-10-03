<!-- delete_demographics.php -->
<?php
 include('db.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the location ID to delete
    $delete_location_id = $_POST['delete_location_id'];
    // Prepare and bind for deletion
    $stmt = $conn->prepare("DELETE FROM demographics WHERE location_id = ?");
    $stmt->bind_param("i", $delete_location_id);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Record deleted successfully";
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
