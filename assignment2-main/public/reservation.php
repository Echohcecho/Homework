<?php
  session_start();

  $id = $_POST['restaurantId'];
  $date = $_POST['date-select'];
  $time = $_POST['time-select'];
  $duration = $_POST['duration-select'];

  define('__ROOT__', '/app/src/');
  require_once __ROOT__ . 'Database/Database.php';

  $db = new Database();

  $result = $db->query("SELECT * FROM restaurants WHERE id = $id;");
  $restaurant = $result->fetch(PDO::FETCH_OBJ);

  $result = $db->query("SELECT * FROM reservations WHERE restaurantId = $id AND date = '$date' AND time = '$time';");
  $reservation = $result->fetch(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>EatoEnjoy - Reservation for <?php echo $restaurant->name; ?></title>
    <?php include 'components/head.html'; ?>
  </head>
  <body>
    <?php include 'components/Header/header.php'; ?>
    <main class="container">
      <div class="reservation vertical-align">
        <h1 class="page-title">
        <?php
          if ($reservation) {
            echo 'This reservation is already booked. Please try again.';
          } else {
            $bookedFor = date_create($date . ' ' . $time);
            $db->query("INSERT INTO reservations (restaurantId, date, time, duration) VALUES ($id, '$date', '$time', $duration);");
            echo 'Your reservation has been booked for <br>' . date_format($bookedFor, "g:i a") . 
            ' on ' . date_format($bookedFor, "l, M j, Y") . 
            '<br> at <span class="restaurant-title">' . $restaurant->name . '</span>.';
          }
        ?>
        </h1>
      </div>
    </main>
    <?php include 'components/footer.html'; ?>
  </body>
</html>
