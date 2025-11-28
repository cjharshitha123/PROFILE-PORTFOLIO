<?php

// ---- FORM PROCESSOR ----
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name    = $_POST['name'] ?? "";
    $email   = $_POST['email'] ?? "";
    $usn     = $_POST['usn'] ?? "";
    $address = $_POST['address'] ?? "";
    $phone   = $_POST['phone'] ?? "";

    // Validate USN
    if (!preg_match("/^[1-4][A-Z]{2}\d{2}[A-Z]{2}\d{3}$/", $usn)) {
        echo "<h2 style='color:red;'>Invalid USN Format!</h2>";
        echo "<a href='index.html'>Go Back</a>";
        exit;
    }

    // Save to file (or you can change this to MySQL)
    $data = "$name | $email | $usn | $address | $phone\n";
    file_put_contents("form_data.txt", $data, FILE_APPEND);

    echo "<h2 style='color:green;'>Form submitted successfully!</h2>";
    echo "<a href='index.html'>Go Back</a>";
} else {
    echo "Invalid request!";
}

?>
