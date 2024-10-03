<!-- demographics_chart.php -->
<canvas id="populationChart"></canvas>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('populationChart').getContext('2d');
    const populationChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Male', 'Female', 'Senior Citizens', 'Youth', 'Farmers', 'Business'],
            datasets: [{
                label: 'Population Distribution',
                data: [1200, 1300, 500, 800, 400, 300], // Replace with dynamic data
                backgroundColor: ['#36A2EB', '#FF6384', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40'],
            }]
        }
    });
</script>
