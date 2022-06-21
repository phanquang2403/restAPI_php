<?php 
   header("Access-Control-Allow-Origin:*");
   header("Content-Type: application/json");
   include_once('../../config/db.php');
   include_once('../../modal/question.php');

   $db = new db();
   $connect = $db->connect();

   $question = new Question($connect);

   $question->id_cauhoi = isset($_GET['id']) ? isset($_GET['id']) : die();

  $question->show();

  $question_item = array(
    "id_cauhoi"=> $question->id_cauhoi,
    "title" => $question->title,
    "result_a" => $question->result_a,
    "result_b" => $question->result_b,
    "result_c" => $question->result_c,
    "result_d" => $question->result_d,
    "kq" => $question->kq
  );
  

  print_r(json_encode($question_item));
  


?>