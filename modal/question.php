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
    
    public function show () {
      $query ="SELECT * FROM questions where id_question=? LIMIT 1";
      $stmt = $this->conn->prepare($query);
      $stmt->bindParam(1,$this->id_cauhoi);
      $stmt->execute();
      
      $row = $stmt->fetch(PDO::FETCH_ASSOC);

      $this->id_cauhoi = $row['id_question'];
      $this->title = $row['title'];
      $this->result_a = $row['cau_a'];
      $this->result_b = $row['cau_b'];
      $this->result_c = $row['cau_c'];
      $this->result_d = $row['cau_d'];
      $this->kq = $row['cau_dung'];


    }
  }
?>