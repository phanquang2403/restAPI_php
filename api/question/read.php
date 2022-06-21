<?php 
  header("Access-Control-Allow-Origin:*");
  header("Content-Type: application/json");
  include_once('../../config/db.php');
  include_once('../../modal/question.php');


  $db = new db();
  $connect = $db->connect();
  $question = new Question($connect);
  $read = $question->read();
  $num = $read->rowCount();

  
  if($num> 0){
    $question_array =[];
    $question_array['data'] = [];


    while($row = $read->fetch(PDO::FETCH_ASSOC)){
      extract($row);
      
      $question_item = array(
        "id_cauhoi"=> $id_question,
        "title" => $title,
        "result_a" => $cau_a,
        "result_b" => $cau_b,
        "result_c" => $cau_c,
        "result_d" => $cau_d,
        "kq" => $cau_dung
      );

      array_push($question_array['data'],$question_item);
    }

    echo json_encode($question_array);
  }


?>