<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add or Delete Demographics</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <!-- Add Demographic Data Section -->
    <div class="row">
        <div class="col-lg-6">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h3>Add Demographic Data</h3>
                </div>
                <div class="card-body">
                    <form action="add_demographics.php" method="post">
                        <div class="mb-3">
                            <label for="location_id" class="form-label">Location ID:</label>
                            <input type="number" class="form-control" name="location_id" placeholder="Enter Location ID" required>
                        </div>
                        <div class="mb-3">
                            <label for="total_population" class="form-label">Total Population:</label>
                            <input type="number" class="form-control" name="total_population" placeholder="Enter Total Population" required>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="male_population" class="form-label">Male Population:</label>
                                <input type="number" class="form-control" name="male_population" placeholder="Enter Male Population" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="female_population" class="form-label">Female Population:</label>
                                <input type="number" class="form-control" name="female_population" placeholder="Enter Female Population" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="senior_citizen_population" class="form-label">Senior Citizen Population:</label>
                                <input type="number" class="form-control" name="senior_citizen_population" placeholder="Enter Senior Citizen Population" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="child_population" class="form-label">Child Population:</label>
                                <input type="number" class="form-control" name="child_population" placeholder="Enter Child Population" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="youth_population" class="form-label">Youth Population:</label>
                                <input type="number" class="form-control" name="youth_population" placeholder="Enter Youth Population" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="farmer_population" class="form-label">Farmer Population:</label>
                                <input type="number" class="form-control" name="farmer_population" placeholder="Enter Farmer Population" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="business_population" class="form-label">Business Population:</label>
                            <input type="number" class="form-control" name="business_population" placeholder="Enter Business Population" required>
                        </div>
                        <div class="d-flex justify-content-between">
                            <input type="submit" class="btn btn-success" name="submit" value="Add Data">
                            <a href="data.php" class="btn btn-secondary">Search the data</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Delete Demographic Data Section -->
        <div class="col-lg-6 mt-4 mt-lg-0">
            <div class="card shadow-sm">
                <div class="card-header bg-danger text-white">
                    <h3>Delete Demographic Data</h3>
                </div>
                <div class="card-body">
                    <form action="delete_demographics.php" method="post">
                        <div class="mb-3">
                            <label for="delete_location_id" class="form-label">Location ID to Delete:</label>
                            <input type="number" class="form-control" name="delete_location_id" placeholder="Enter Location ID to Delete" required>
                        </div>
                        <div class="d-flex justify-content-between">
                            <input type="submit" class="btn btn-danger" value="Delete Data">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS Bundle (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
