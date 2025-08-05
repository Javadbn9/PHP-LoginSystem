<?php
session_start();
if (!isset($_SESSION['profile_name'])) {
    header("Location: index.html");
    exit();
}
$profile_name = $_SESSION['profile_name'];
$email = $_SESSION['email'];
$success = isset($_GET['success']) ? "Upload successful!" : "";

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: index.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .upload-btn {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background: #00cc99;
            color: #fff;
            border: none;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            font-size: 1.5em;
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            cursor: pointer;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .upload-btn:hover {
            background: #009966;
            transform: scale(1.1);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.4);
        }

        @media (max-width: 600px) {
            .upload-btn {
                bottom: 20px;
                right: 20px;
                width: 40px;
                height: 40px;
                font-size: 1.2em;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="nav-container">
            <button onclick="window.location.href='index.html'" class="nav-btn">Back to Home</button>
            <a href="?logout=1" class="nav-btn logout-btn">Logout</a>
        </div>
    </nav>
    <div class="content-container">
        <header class="profile-header">
            <div class="profile-info">
                <h2>Welcome, <?php echo htmlspecialchars($profile_name); ?></h2>
                <p>Email: <?php echo htmlspecialchars($email); ?></p>
            </div>
            <?php if ($success) echo "<p class='success'>$success</p>"; ?>
        </header>
        <div class="gallery">
            <?php

            $servername = "localhost";
            //username=
            //password=
            //...



            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT image_path, caption, upload_date FROM images WHERE profile_name = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $profile_name);
            $stmt->execute();
            $result = $stmt->get_result();

            while ($row = $result->fetch_assoc()) {
                echo "<div class='gallery-item'>";
                echo "<img src='" . htmlspecialchars($row['image_path']) . "' alt='User Image'>";
                echo "<div class='gallery-text'>";
                echo "<p>" . htmlspecialchars($row['caption']) . "</p>";
                echo "<p class='date'>Uploaded on: " . htmlspecialchars($row['upload_date']) . "</p>";
                echo "</div>";
                echo "</div>";
            }

            $stmt->close();
            $conn->close();
            ?>
        </div>
        <a href="upload.html" class="upload-btn">+</a>
    </div>
</body>
</html>