<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bulk SMS Sender</title>
    <link rel="stylesheet" href="../../dist/css/styleme.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <div class="container">
        <h1>Send Bulk SMS</h1>
        <form id="smsForm">
            <label for="recipients">Recipients (comma-separated):</label>
            <input type="text" id="recipients" name="recipients" required>
            
            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="4" required></textarea>
            
            <button type="submit">Send SMS</button>
            <div id="response"></div>
        </form>
    </div>

    <script>
        document.getElementById('smsForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const recipients = document.getElementById('recipients').value;
    const message = document.getElementById('message').value;
    
    fetch('/send-sms', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ recipients, message })
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById('response').innerText = 'SMS sent successfully!';
        console.log(data);
    })
    .catch(error => {
        document.getElementById('response').innerText = 'Failed to send SMS.';
        console.error('Error:', error);
    });
});

    </script>
</body>
</html>

