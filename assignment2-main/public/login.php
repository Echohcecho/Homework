<?php
  session_start();

  if (isset($_SESSION['loggedIn'])) {
    header('Location: /');
  }

  if (isset($_POST['emailAddress'])) {
    define('__ROOT__', '/app/src/');
    require_once __ROOT__ . 'Database/Database.php';

    $db = new Database();
    $result = $db->query('SELECT firstName, lastName, password FROM users WHERE emailAddress = :emailAddress;',
      array(
        'emailAddress' => $_POST['emailAddress'],
      )
    );

    $columns = $result->fetch(PDO::FETCH_OBJ);

    if (password_verify($_POST['password'], $columns->password)) {
      $_SESSION['loggedIn'] = true;
      $_SESSION['firstName'] = $columns->firstName;
      $_SESSION['lastName'] = $columns->lastName;
      $_SESSION['emailAddress'] = $_POST['emailAddress'];

      header('Location: /');
    } else {
      echo "<script>
      window.addEventListener('DOMContentLoaded', () => {
        const form = document.getElementById('form');
        const emailAddress = document.getElementById('emailAddress');
        const password = document.getElementById('password');

        emailAddress.parentNode.classList.add('error');
        password.parentNode.classList.add('error');

        const err = document.createElement('span');
        err.setAttribute('id', 'errPass');
        err.classList.add('error');
        err.innerHTML = '<strong>&times;</strong> Invalid email address and/or password.';

        if (password.parentNode.parentNode.contains(document.getElementById('errPass')) === false) {
          password.parentNode.parentNode.appendChild(err);
        }
      });
      </script>";
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>EatoEnjoy - Log In</title>
    <?php include 'components/head.html'; ?>
    <script src="js/loginValidate.js"></script>
  </head>
  <body>
    <?php include 'components/Header/header.php'; ?>
    <main class="container">
      <form id="form" class="form" method="POST" action="/login" onsubmit="return validate();">
        <h1>Log In</h1>

        <div class="input-solo">
          <div class="input-container">
            <span class="material-symbols-rounded">alternate_email</span>
            <input type="email" id="emailAddress" name="emailAddress" class="input" placeholder="Email Address">
          </div>
        </div>
        <div class="input-solo">
          <div class="input-container">
            <span class="material-symbols-rounded">lock</span>
            <input type="password" id="password" name="password" class="input" placeholder="Password">
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Log In</button>
      </form>
    </main>
    <?php include 'components/footer.html'; ?>
  </body>
</html>
