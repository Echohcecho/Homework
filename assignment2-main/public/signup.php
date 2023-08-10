<?php
  session_start();

  if (isset($_SESSION['loggedIn'])) {
    header('Location: /');
  }

  if (isset($_POST['emailAddress']) && $_POST['emailAddress'] != '') {
    define('__ROOT__', '/app/src/');
    require_once __ROOT__ . 'Database/Database.php';

    $db = new Database();
    $result = $db->query('INSERT INTO users (firstName, lastName, emailAddress, phoneNumber, password) ' .
      'VALUES (:firstName, :lastName, :emailAddress, :phoneNumber, :password);',
      array(
        'firstName' => $_POST['firstName'],
        'lastName' => $_POST['lastName'],
        'emailAddress' => $_POST['emailAddress'],
        'phoneNumber' => $_POST['phoneNumber'],
        'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
      )
    );

    $_SESSION['loggedIn'] = true;
    $_SESSION['firstName'] = $_POST['firstName'];
    $_SESSION['lastName'] = $_POST['lastName'];
    $_SESSION['emailAddress'] = $_POST['emailAddress'];

    header('Location: /');
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>EatoEnjoy - Sign Up</title>
    <?php include 'components/head.html'; ?>
    <script src="js/signupValidate.js"></script>
  </head>
  <body>
    <?php include 'components/Header/header.php'; ?>
    <main class="container">
      <form id="form" class="form" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" onsubmit="return validate();">
        <h1>Sign Up</h1>

        <div class="input-group">
          <div>
            <div class="input-container">
              <span class="material-symbols-rounded">person</span>
              <input type="text" id="firstName" name="firstName" class="input" placeholder="First Name">
            </div>
          </div>
          <div>
            <div class="input-container">
              <span class="material-symbols-rounded">badge</span>
              <input type="text" id="lastName" name="lastName" class="input" placeholder="Last Name">
            </div>
          </div>
        </div>
        <div class="input-solo">
          <div class="input-container">
            <span class="material-symbols-rounded">alternate_email</span>
            <input type="email" id="emailAddress" name="emailAddress" class="input" placeholder="Email Address">
          </div>
        </div>
        <div class="input-solo">
          <div class="input-container">
            <span class="material-symbols-rounded">call</span>
            <input type="tel" id="phoneNumber" name="phoneNumber" class="input" placeholder="Phone Number">
          </div>
        </div>
        <div class="input-group">
          <div>
            <div class="input-container">
              <span class="material-symbols-rounded">lock</span>
              <input type="password" id="password" name="password" class="input" placeholder="Password">
            </div>
          </div>
          <div>
            <div class="input-container">
              <span class="material-symbols-rounded">key</span>
              <input type="password" id="confirmPassword" name="confirmPassword" class="input" placeholder="Confirm Password">
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Sign Up</button>
      </form>
    </main>
    <?php include 'components/footer.html'; ?>
  </body>
</html>
