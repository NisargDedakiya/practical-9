<?php
$jsonFile = "data.json";
echo "<h2>📋 Submitted Records</h2>";

if (file_exists($jsonFile)) {
    $data = json_decode(file_get_contents($jsonFile), true);

    if (!empty($data)) {
        echo "<table border='1' cellpadding='8' cellspacing='0'>
                <tr style='background:#f2f2f2;'>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Message</th>
                </tr>";

        foreach ($data as $row) {
            echo "<tr>
                    <td>{$row['name']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['message']}</td>
                  </tr>";
        }

        echo "</table>";
    } else {
        echo "<p>No data available yet.</p>";
    }
} else {
    echo "<p>No records found. Please submit the form first.</p>";
}
echo "<br><a href='index.php'>Back to Form</a>";
?>
