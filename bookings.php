<?php 

session_start();
if(!isset($_SESSION['user'])){
    header('Location: login.php');
    exit();
}
require 'config/config.php'; // Ensure the correct path

$bookings = [];
echo $_SESSION['user']['id'];
try {
    $query = "SELECT bookings.*, rooms.* 
              FROM bookings 
              INNER JOIN rooms ON bookings.room_id = rooms.id 
              WHERE bookings.user_id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$_SESSION['user']['id']]);
    $bookings = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (\Throwable $th) {
    //throw $th;
}

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
        <title>Testing CRUD | Dashboard</title>
    </head>
    <body>
        <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Booking System</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="bookings.php">My bookings</a>
                    </li>
                    
                </ul>
                <form class="d-flex">
                   
                    <a href="login.php" class="btn btn-outline-success" type="submit">Login</a>
                </form>
                </div>
            </div>
        </nav>
     
        <div class="container d-flex justify-content-center align-items-center" style="height: 80vh;">

            <div class="d-block">
                <a href="create-rooms.php" class="btn btn-primary">Add Room</a>
                <table class="table">
                    <tr>
                        <th>Room Name</th>
                        <th>Room Description</th>
                        <th>Room Price</th>
                        <th>Action</th>
                    </tr>
                    <tbody>
                        <?php 

                            foreach($bookings as $book){
                                echo '<tr >';
                                echo '<td>'.$book['label'].'</td>';
                                echo '<td>'.$book['description'].'</td>';
                                echo '<td>'.$book['price'].'</td>';
                                echo '<td>
                                        <a href="edit-room.php?id='.$book['id'].'" class="btn btn-warning">Edit</a>
                                        <a href="delete-room.php?id='.$book['id'].'" class="btn btn-danger">Delete</a>
                                    </td>';
                                echo '</tr>';
                            }
                        
                        ?>
                    </tbody>
                </table>
            </div>

        </div>
        

        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
       
    </body>
</html>
