<?php
require '../config/config.php'; // Ensure the correct path

$query = "SELECT * FROM users WHERE username = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$_POST['username']]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user && password_verify($_POST['password'], $user['password'])) {
    session_start();
    $_SESSION['user'] = $user;

    echo json_encode([
        'success' => true,
        'message' => 'Login Successful',
    ]);
} else {
    echo json_encode([
        'success' => false, // Fix: Set failure response
        'message' => 'Invalid username or password', // Fix: Correct failure message
    ]);
}
?>
