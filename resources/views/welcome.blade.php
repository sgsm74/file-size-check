<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
</head>

<body>
    <h1>Upload a File to API</h1>
    <form id="uploadForm">
        <!-- File Input -->
        <label for="file">Choose a file:</label>
        <input type="file" name="file" id="file" required>

        <!-- Submit Button -->
        <button type="submit">Upload</button>
    </form>

    <!-- Result Section -->
    <div id="result"></div>

    <script>
        const uploadForm = document.getElementById('uploadForm');
        const resultDiv = document.getElementById('result');

        uploadForm.addEventListener('submit', async (event) => {
            event.preventDefault();

            // Create a FormData object
            const formData = new FormData();
            const fileInput = document.getElementById('file');
            const file = fileInput.files[0];
            formData.append('file', file);

            try {
                // Send the file using fetch
                const response = await fetch('/api/upload', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'Accept': 'application/json',
                    }
                });

                const result = await response.json();

                if (response.ok) {
                    resultDiv.textContent = 'File uploaded successfully: ' + result.path;
                    resultDiv.style.color = 'green';
                } else {
                    resultDiv.textContent = 'Error: ' + result.message;
                    resultDiv.style.color = 'red';
                }
            } catch (error) {
                resultDiv.textContent = 'Error uploading file: ' + error.message;
                resultDiv.style.color = 'red';
            }
        });
    </script>
</body>

</html>
