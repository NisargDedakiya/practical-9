<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Sanitize input
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Validate inputs
    if (!empty($name) && !empty($email) && !empty($message)) {

        // ========== TEXT FILE ==========
        $textData = "Name: $name | Email: $email | Message: $message" . PHP_EOL;
        file_put_contents("data.txt", $textData, FILE_APPEND);

        // ========== CSV FILE ==========
        $csvFile = fopen("data.csv", "a");
        fputcsv($csvFile, [$name, $email, $message]);
        fclose($csvFile);

        // ========== JSON FILE ==========
        $jsonFile = "data.json";
        $jsonData = [];

        if (file_exists($jsonFile)) {
            $jsonData = json_decode(file_get_contents($jsonFile), true);
        }

        $jsonData[] = ["name" => $name, "email" => $email, "message" => $message];
        file_put_contents($jsonFile, json_encode($jsonData, JSON_PRETTY_PRINT));

        // ========== Confirmation ==========
        echo "<h2>✅ Form Submitted Successfully!</h2>";
        echo "<p>Your data has been saved to text, CSV, and JSON files.</p>";
        echo "<a href='index.php'>Back to Form</a> | <a href='display.php'>View Records</a>";

    } else {
        echo "<h3>❌ Please fill all fields properly.</h3>";
        echo "<a href='index.php'>Try Again</a>";
    }
} else {
    echo "<h3>Invalid request method.</h3>";
}
?>
