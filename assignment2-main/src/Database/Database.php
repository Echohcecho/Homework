<?php
  class Database {
    private $pdo = null;
    private $stmt = null;

    function __construct() {
      $this->loadEnvFile();

      try {
        $this->pdo = new PDO(
          'mysql:host=db;port=3306;dbname=eatoenjoy;charset=utf8',
          'eatoenjoy',
          'Yrfq9As%H67ZJ%R34!3igq#cMKvvm#9T'
        );
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $exception) {
        $this->handleException($exception);
      }
    }

    private function loadEnvFile() {
      require '/var/www/html/vendor/autoload.php';

      $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
      $dotenv->load();
    }

    private function handleException($exception) {
      echo $exception->getMessage();
    }

    public function query($query, $params = array()) {
      if ($this->pdo !== null) {
        if (($this->stmt = $this->pdo->prepare($query)) !== false) {
          if (($this->stmt->execute($params)) !== false) {
            return $this->stmt;
          }
        }
      }

      return false;
    }
  }
?>
