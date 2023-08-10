<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>EatoEnjoy</title>
    <?php include 'components/head.html'; ?>
    <script async
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDhjeF9-FXb4dPcVE8qt8JaSyMo8DB6aD8&libraries=places&callback=initMap">
    </script>
    <script src="/js/address.js"></script>
  </head>
  <body>
    <?php include 'components/Header/header.php'; ?>
    <main class="container">
      <div class="home">
        <form class="form" action="/book" onsubmit="return validate();">
          <h1 class="title">Find Restaurants Near You</h1>
          <div class="input-container">
            <span class="material-symbols-rounded">location_on</span>
            <input type="text" class="input" id="address-search" placeholder="Enter your address">
            <button class="go-circle">
              <span class="material-symbols-rounded">arrow_forward</span>
            </button>
          </div>
        </form>
      </div>
    </main>
    <?php include 'components/footer.html'; ?>
  </body>
</html>
