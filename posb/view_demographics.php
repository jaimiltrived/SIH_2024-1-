<!-- view_demographics.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Demographics</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Demographic Data</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Location</th>
                <th>Total Population</th>
                <th>Male Population</th>
                <th>Female Population</th>
                <th>Senior Citizens</th>
                <th>child_population/th>
                <th>youth_population</th>
                <th>farmer_population</th>
                <th>business_population</th>
                <!-- Add more fields -->
            </tr>
        </thead>
        <tbody>
        <?php
        include('db.php');

        $sql = "SELECT * FROM demographics d JOIN locations l ON d.location_id = l.id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['village']}, {$row['block']}, {$row['district']}, {$row['state']}</td>
                    <td>{$row['total_population']}</td>
                    <td>{$row['male_population']}</td>
                    <td>{$row['female_population']}</td>
                    <td>{$row['senior_citizen_population']}</td>
                    <td>{$row['child_population']}</td>
                    <td>{$row['youth_population']}</td>
                    <td>{$row['farmer_population']}</td> 
                    <td>{$row['business_population']}</td> 
                </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No data found</td></tr>";
        }

        $conn->close();
        ?>
        </tbody>
    </table>
</div>

</body>
</html>
