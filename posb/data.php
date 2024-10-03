<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Search Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        form {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin: 0 auto 20px;
            max-width: 600px;
        }

        label {
            display: block;
            margin: 10px 0 5px;
        }

        input[type="text"], select {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #5cb85c;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #4cae4c;
        }

        #rowsDisplay, #searchResults {
            margin-top: 20px;
            background: #fff;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            padding: 5px 0;
        }

        .error {
            color: red;
        }

        .result-item {
            background-color: #f9f9f9;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h1>Database Search Form</h1>

    <form id="tableForm">
        <label for="tableSelect">Select Table:</label>
        <select id="tableSelect" name="table">
            <option value="demographics">Demographics</option>
            <option value="economic_data">Economic Data</option>
            <option value="financial_products">Financial Products</option>
        </select>
        <button type="button" id="viewColumnsBtn">View Columns</button>
    </form>

    <div id="rowsDisplay"></div>

    <form id="searchForm" method="post" action="fetch_rows.php" style="display: none;">
        <h2>Search Criteria</h2>
        <div id="searchFields"></div>
        <button type="submit">Search</button>
    </form>

    <div id="searchResults"></div>

    <script>
        document.getElementById('viewColumnsBtn').onclick = function() {
            const table = document.getElementById('tableSelect').value;
            const url = 'fetch_rows.php?table=' + encodeURIComponent(table);

            fetch(url)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.error) {
                        document.getElementById('rowsDisplay').innerHTML = `<p class="error">Error: ${data.error}</p>`;
                        return;
                    }

                    let rowsHtml = '<h2>Columns:</h2><ul>';
                    data.columns.forEach(col => {
                        rowsHtml += `<li><label><input type="checkbox" name="selectedColumns" value="${col}">${col}</label></li>`;
                    });
                    rowsHtml += '</ul>';
                    rowsHtml += '<button id="generateSearchFieldsBtn">Generate Search Fields</button>';
                    document.getElementById('rowsDisplay').innerHTML = rowsHtml;

                    document.getElementById('generateSearchFieldsBtn').onclick = function() {
                        const checkboxes = document.querySelectorAll('input[name="selectedColumns"]:checked');
                        const selectedColumns = Array.from(checkboxes).map(checkbox => checkbox.value);

                        const searchFieldsHtml = generateSearchFields(selectedColumns);
                        document.getElementById('searchFields').innerHTML = searchFieldsHtml;
                        document.getElementById('searchForm').style.display = 'block';
                    };
                })
                .catch(error => {
                    document.getElementById('rowsDisplay').innerHTML = `<p class="error">Error fetching data: ${error.message}</p>`;
                });
        };

        function generateSearchFields(columns) {
            return columns.map(col => {
                return `<label for="${col}">${col}:</label><input type="text" name="${col}" id="${col}"><br>`;
            }).join('');
        }

        // Handle search form submission
        document.getElementById('searchForm').onsubmit = function(event) {
            event.preventDefault();

            const formData = new FormData(this);
            const table = document.getElementById('tableSelect').value;
            formData.append('table', table);

            fetch('fetch_rows.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    document.getElementById('searchResults').innerHTML = `<p class="error">Error: ${data.error}</p>`;
                    return;
                }

                // Display search results
                let resultsHtml = '<h2>Search Results:</h2><ul>';
                data.results.forEach(row => {
                    resultsHtml += '<li class="result-item">' + JSON.stringify(row) + '</li>';
                });
                resultsHtml += '</ul>';

                document.getElementById('searchResults').innerHTML = resultsHtml;
            })
            .catch(error => {
                document.getElementById('searchResults').innerHTML = `<p class="error">Error fetching results: ${error.message}</p>`;
            });
        };
    </script>
</body>
</html>
