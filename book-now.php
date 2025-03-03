<?php 
require 'config/config.php'; // Ensure the correct path
$id =  $_GET['id'];

$query = "SELECT * FROM rooms WHERE id = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$id]);
$room = $stmt->fetch(PDO::FETCH_ASSOC);


?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
        <title>Testing CRUD | Book Now</title>
    </head>
    <body>
     
        <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
            <div class="card p-5  rounded-full shadow-sm">
                <div class="card-title fw-bold text-center">
                    <h3>Book Room</h3>
                </div>
                <form action="POST" class="form" id="book-room-form">
                    <input type="text" class="form-control" name="table" placeholder="Label" value="booking" required hidden readonly>
                    <input type="text" class="form-control" name="room_id" placeholder="Label" value="<?php echo $room['id'] ?>" required hidden readonly>
                    <div class="mb-3 form-group">
                        <label for="username" class="form-label">Room Label</label>    
                        <input type="text" class="form-control" name="label" placeholder="Label" required readonly value="<?php echo $room['label'] ?>">
                    </div>
                    <div class="mb-3 form-group">
                        <label for="username" class="form-label">Price</label>    
                        <input type="number" class="form-control" name="price" placeholder="0.00" required readonly value="<?php echo $room['price'] ?>">
                    </div>
                    <div class="mb-3 form-group">
                        <label for="username" class="form-label">Check In</label>    
                        <input type="date" class="form-control" name="check_in" placeholder="Check In" required >
                    </div>
                    <div class="mb-3 form-group">
                        <label for="username" class="form-label">Check Out</label>    
                        <input type="date" class="form-control" name="check_out" placeholder="Check Out" required >
                    </div>
                    <div class="d-flex gap-2">
                        <button class="btn btn-primary w-100" type="submit" id="save-btn">Book Now</button>
                        <a href="booking.php" class="btn btn-secondary w-100"  id="signup-btn">Room List</a>
                    </div>
                </form>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="assets/js/book-room.js"></script>
    </body>
</html>
