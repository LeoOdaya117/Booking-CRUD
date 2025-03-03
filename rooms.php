<?php

session_start();
if(!isset($_SESSION['user'])){
    header('Location: login.php');
    exit();
}
require 'config/config.php'; // Ensure the correct path
$query = "SELECT * FROM rooms";
$stmt = $pdo->prepare($query);
$stmt->execute();
$rooms = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="bookings.php">My bookings</a>
                    </li>
                    
                </ul>
                <form class="d-flex">
                   
                    <button class="btn btn-outline-success" type="submit">Login</button>
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

                            foreach($rooms as $room){
                                echo '<tr >';
                                echo '<td>'.$room['label'].'</td>';
                                echo '<td>'.$room['description'].'</td>';
                                echo '<td>'.$room['price'].'</td>';
                                echo '<td>
                                        <a href="edit-room.php?id='.$room['id'].'" class="btn btn-warning">Edit</a>
                                        <a href="delete-room.php?id='.$room['id'].'" class="btn btn-danger">Delete</a>
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
