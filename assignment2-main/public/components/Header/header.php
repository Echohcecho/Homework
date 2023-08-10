<header class="header">
  <div class="logo">
    <a href="/">
      <img src="/img/logo.svg" alt="EatoEnjoy" title="EatoEnjoy">
    </a>
  </div>
  <div class="account">
    <?php
      if (isset($_SESSION['loggedIn'])) {
        include 'components/Header/user.php';
      } else {
        include 'components/Header/navigation.html';
      }
    ?>
  </div>
</header>
