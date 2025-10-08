<!DOCTYPE html>
<html>
<head>
    <title>Submit Your Details</title>
    <style>
        body { font-family: Arial; margin: 40px; }
        form { width: 300px; }
        input, textarea { width: 100%; margin: 5px 0; padding: 8px; }
        input[type=submit] { background: #007BFF; color: white; border: none; cursor: pointer; }
        input[type=submit]:hover { background: #0056b3; }
    </style>
</head>
<body>
    <h2>Submit Your Details</h2>
    <form action="submit.php" method="POST">
        <label>Name:</label>
        <input type="text" name="name" required>

        <label>Email:</label>
        <input type="email" name="email" required>

        <label>Message:</label>
        <textarea name="message" required></textarea>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
