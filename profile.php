<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch();

if (!$user) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Albert+Sans:ital,wght@0,100..900;1,100..900&family=Poetsen+One&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: rgba(169, 169, 169, 0.71);
        }
        .form-container {
            z-index: 1;
            text-align: center;
            background-color: rgba(255, 255, 255, 0.7);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: white;
        }
        .font-poetsen {
            font-family: "Poetsen One", sans-serif;
            font-weight: 400;
            font-style: normal;
        }
        .font-albert {
            font-family: "Albert Sans", sans-serif;
            font-optical-sizing: auto;
            font-weight: <600>;
            font-style: normal;
        }
    </style>
</head>
<body>
<div class="form-container w-25">
    <h2 class="pb-3 font-poetsen text-dark">Profile</h2>
    <div class="d-flex flex-column align-items-start pt-2 pb-4">
        <p class="font-albert"><strong>Username:</strong> <?= htmlspecialchars($user['username']) ?></p>
        <p class="font-albert"><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></p>
        <p class="font-albert"><strong>First Name:</strong> <?= htmlspecialchars($user['first_name']) ?></p>
        <p class="font-albert"><strong>Last Name:</strong> <?= htmlspecialchars($user['last_name']) ?></p>
    </div>
    <div class="d-flex flex-column align-items-end">
        <a href="logout.php" class="btn btn-outline-danger">Logout</a>
    </div>
</div>

<script src="path/to/particles.min.js"></script>
</body>
</html>
