<?php 

require '../config/config.php'; // Ensure the correct path

try {
    isset($_POST['name']) && isset($_POST['username']) && isset($_POST['password']) || die('Please fill all required fields');


    if($_POST['password'] !== $_POST['confirm-password']){
        echo json_encode([
            'success' => false,
            'message' => 'Passwords do not match',
        ]);
        exit();
    }

    $query ="INSERT INTO users(name,username, password) VALUES(?,?,?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$_POST['name'],$_POST['username'],password_hash($_POST['password'], PASSWORD_DEFAULT)]);

    echo json_encode([
        'success' => true,
        'message' => 'User created successfully',
    ]);
} catch (\Throwable $th) {
    //throw $th;
    echo json_encode([
        'success' => false,
        'message' => $th->getMessage(),
    ]);
}
?>