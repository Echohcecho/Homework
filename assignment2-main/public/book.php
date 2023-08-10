<?php
  session_start();

  define('__ROOT__', '/app/src/');
  require_once __ROOT__ . 'Database/Database.php';

  $db = new Database();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>EatoEnjoy - Book a Reservation</title>
    <?php include 'components/head.html'; ?>
  </head>
  <body>
    <?php include 'components/Header/header.php'; ?>
    <main class="container">
      <div class="restaurants">
        <h1 class="page-title">Book a Reservation</h1>
        <ul class="restaurant-list">
          <?php
            $result = $db->query("SELECT * FROM restaurants;");
            $columns = $result->fetchAll(PDO::FETCH_OBJ);

            for ($i = 0; $i < count($columns); $i ++) {
              echo '<li class="restaurant-item">' .
                '<a href="/restaurant?id=' . $columns[$i]->id . '&mode=reservation">' .
                  '<img src="/img/restaurants/' . $columns[$i]->id . '.jpg" alt="' . $columns[$i]->name . '">' .
                  '<span class="restaurant-name">' . $columns[$i]->name . '</span>' .
                '</a>' .
              '</li>';
            }
          ?>
        </ul>
      </div>
    </main>
    <?php include 'components/footer.html'; ?>
  </body>
</html>
