<?php
  session_start();

  date_default_timezone_set('America/New_York');

  $id = $_GET['id'];
  $mode = $_GET['mode'];

  define('__ROOT__', '/app/src/');
  require_once __ROOT__ . 'Database/Database.php';

  $db = new Database();

  $result = $db->query("SELECT * FROM restaurants WHERE id = $id;");
  $restaurant = $result->fetch(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>EatoEnjoy - <?php echo $restaurant->name; ?></title>
    <?php include 'components/head.html'; ?>
  </head>
  <body>
    <?php include 'components/Header/header.php'; ?>
    <main class="container">
      <?php
        if ($mode == 'reservation') {
          echo '<div class="reservation">
            <form class="form" method="POST" action="reservation.php">
              <h1 class="page-title">
                Booking a Reservation at
                <span class="restaurant-title">' . $restaurant->name . '</span>
              </h1>
              <div class="input-container">
                <span class="material-symbols-rounded">calendar_month</span>
                <input type="date" class="input" id="date-select" name="date-select" value="' .  date('Y-m-d') . '">
                <span class="material-symbols-rounded">schedule</span>
                <input type="time" class="input" id="time-select" name="time-select" value="' . date('H:i') . '">
                <span class="material-symbols-rounded">alarm</span>
                <div class="reservation-duration">
                  <input type="number" class="input" id="duration-select" name="duration-select" value="2">
                  Hours
                </div>
                <input type="hidden" name="restaurantId" value="' . $_GET['id'] . '">
                <input type="hidden" name="viewMode" value="' . $_GET['mode'] . '">
                <button type="submit" class="go-circle">
                  <span class="material-symbols-rounded">arrow_forward</span>
                </button>
              </div>
            </form>
          </div>';
        }
      ?>
    </main>
    <?php include 'components/footer.html'; ?>
  </body>
</html>
