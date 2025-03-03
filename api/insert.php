<?php 
session_start();
require '../config/config.php'; // Ensure the correct path

$type = $_POST['table'];

switch ($type) {
    case 'rooms':
        try {
            $query = "INSERT INTO rooms(label, description, price, status) VALUES(?,?,?,?)";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$_POST['label'],$_POST['description'],$_POST['price'], 'available']);
            echo json_encode([
                'success' => true,
                'message' => 'Room created successfully',
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            echo json_encode([
                'success' => false,
                'message' => $th->getMessage(),
            ]);
        } 
        break;
    case 'booking':
        try {
            $date1 = new DateTime($_POST['check_in']);
            $date2 = new DateTime($_POST['check_out']);
            $diff = $date1->diff($date2);
            $days = $diff->days;
            $total_price = $days * $_POST['price'];

            $query = "INSERT INTO booking(roomId, user_id, start_date, end_date, number_of_days, total_price) VALUES(?,?,?,?,?,?)";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$_POST['room_id'],$_SESSION['user']['id'],$_POST['check_in'],$_POST['check_out'],$days,$total_price]);
            echo json_encode([
                'success' => true,
                'message' => 'Room booked successfully',
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            echo json_encode([
                'success' => false,
                'message' => $th->getMessage(),
            ]);
        } 
        break;
    default:
        # code...
        break;
}


?>