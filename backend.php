<?php
$storage_file = "messages.txt";
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name    = trim($_POST["name"] ?? "");
    $email   = trim($_POST["email"] ?? "");
    $message = trim($_POST["message"] ?? "");

    if ($name && $email && $message) {

        $data  = "Name: $name\n";
        $data .= "Email: $email\n";
        $data .= "Message: $message\n";
        $data .= "Submitted On: " . date("d-m-Y H:i:s") . "\n";
        $data .= "-------------------------------\n";

        file_put_contents($storage_file, $data, FILE_APPEND);

        echo "Message sent successfully!";
    } else {
        echo "Please fill all fields!";
    }
}
if (isset($_GET["view"])) {

    if (file_exists($storage_file)) {
        echo "<pre>";
        echo htmlspecialchars(file_get_contents($storage_file));
        echo "</pre>";
    } else {
        echo "No messages available.";
    }
}

?>
