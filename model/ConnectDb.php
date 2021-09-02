<?php
// Singleton to connect db.
class ConnectDb {
    // Hold the class instance.
    private static $instance = null;
    private $conn;
    
     
    // The db connection is established in the private constructor.
    private function __construct()
    {
     // $this->conn = new PDO("mysql:host={$this->host};
     //dbname={$this->name}", $this->user,$this->pass,
     //array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));

     $this->conn = new PDO('mysql:host=localhost;dbname=db_panificadora;charset=utf8', 'root', '123456');                          
     
     $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }
    
    public static function getInstance()
    {
      if(!self::$instance)
      {
        self::$instance = new ConnectDb();
      }
     
      return self::$instance;
    }
    
    public function getConnection()
    {
      return $this->conn;
    }
  }

  ?>