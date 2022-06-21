<?php 
  class Question {

    private $conn;

    public $id_cauhoi;
    public $title;
    public $result_a;
    public $result_b;
    public $result_c;
    public $result_d;
    public $kq ;
    
    public function __construct($db){
      $this->conn = $db;
    } 

    public function read () {
      $query = "SELECT * FROM questions";
      $stmt = $this->conn->prepare($query);
      
      $stmt->execute();
      return $stmt;
      
    }

  }
?>