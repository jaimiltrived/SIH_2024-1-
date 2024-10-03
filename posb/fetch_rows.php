<?php
include('db.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $table = isset($_GET['table']) ? $conn->real_escape_string($_GET['table']) : '';

    if (empty($table)) {
        echo json_encode(['error' => 'No table specified.']);
        exit;
    }

    $sql = "SHOW COLUMNS FROM $table"; 
    $result = $conn->query($sql);

    if (!$result) {
        echo json_encode(['error' => 'Query error: ' . $conn->error]);
        exit;
    }

    $columns = [];
    while ($row = $result->fetch_assoc()) {
        $columns[] = $row['Field']; 
    }

    echo json_encode(['columns' => $columns]);
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $table = isset($_POST['table']) ? $conn->real_escape_string($_POST['table']) : '';
    
    if (empty($table)) {
        echo json_encode(['error' => 'No table specified.']);
        exit;
    }

    $whereClauses = [];

    foreach ($_POST as $key => $value) {
        if ($key !== 'table' && !empty($value)) {
            $whereClauses[] = "$key = '" . $conn->real_escape_string($value) . "'";
        }
    }

    // Build the SQL query
    $sql = "SELECT * FROM $table";

    if (!empty($whereClauses)) {
        $whereSql = ' WHERE ' . implode(' AND ', $whereClauses);
        $sql .= $whereSql;  // Append the WHERE clause if there are any conditions
    }

    $result = $conn->query($sql);

    if (!$result) {
        echo json_encode(['error' => 'Query error: ' . $conn->error]);
        exit;
    }

    $results = [];
    while ($row = $result->fetch_assoc()) {
        $results[] = $row;
    }

    echo json_encode(['results' => $results]);
}

$conn->close();
?>
