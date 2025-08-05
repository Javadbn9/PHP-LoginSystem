<?php
$servername = "localhost";
//username=
//password=
//...

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $profile_name = $_POST['profile_name'];

    $sql = "INSERT INTO users (email, password, profile_name) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $email, $password, $profile_name);

    if ($stmt->execute()) {
        session_start();
        $_SESSION['profile_name'] = $profile_name;
        $_SESSION['email'] = $email;
        header("Location: profile.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>