<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JSON Generator</title>
</head>
<body>
    <label for="data-labels">Data Labels (comma-separated): </label>
    <input type="text" id="data-labels" placeholder="e.g., Label1,Label2,Label3">
    
    <label for="data-values">Data Values (comma-separated): </label>
    <input type="text" id="data-values" placeholder="e.g., 10,20,30">
    
    <button onclick="generateJSON()">Generate JSON</button>

    <script>
        function generateJSON() {
            const labelsInput = document.getElementById('data-labels');
            const valuesInput = document.getElementById('data-values');

            const labels = labelsInput.value.split(',').map(label => label.trim());
            const values = valuesInput.value.split(',').map(value => parseFloat(value.trim()));

            if (labels.length !== values.length) {
                alert("Number of labels must be equal to the number of values.");
                return;
            }

            const data = {
                labels: labels,
                values: values
            };

            const jsonData = JSON.stringify(data, null, 2);

            const blob = new Blob([jsonData], { type: 'application/json' });
            const a = document.createElement('a');
            a.href = URL.createObjectURL(blob);
            a.download = 'generated_data.json';
            a.textContent = 'Download JSON';

            document.body.appendChild(a);
            a.click();

            document.body.removeChild(a);
        }
    </script>
</body>
</html>
