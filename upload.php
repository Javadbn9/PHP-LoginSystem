<?php
session_start();
if (!isset($_SESSION['profile_name'])) {
    header("Location: index.html");
    exit();
}
$profile_name = $_SESSION['profile_name'];

$servername = "localhost";
//username=
//password=
//...

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"])) {
    $target_dir = "Uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $caption = $_POST['caption'];

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $sql = "INSERT INTO images (profile_name, image_path, caption) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $profile_name, $target_file, $caption);

        if ($stmt->execute()) {
            header("Location: profile.php?success=1");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $stmt->close();
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
    $conn->close();
}
?>