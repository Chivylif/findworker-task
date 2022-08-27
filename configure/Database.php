<?php
class Database {
    // DB Params For Development
    // private $host = 'localhost';
    // private $db_name = 'findworker';
    // private $username = 'root';
    // private $password = '';
    // private $conn;

    //Remote Database Connection
    private $host = 'remotemysql.com';
    private $db_name = 'wCndwvuakm';
    private $username = 'wCndwvuakm';
    private $password = 'GwpxXxzEKz';
    private $conn;

    // DB Connect
    public function connect() {
      $this->conn = null;

      try { 
        $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch(PDOException $e) {
        echo 'Connection Error: ' . $e->getMessage();
      }

      return $this->conn;
    }
}
?>