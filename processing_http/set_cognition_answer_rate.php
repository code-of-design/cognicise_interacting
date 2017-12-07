<?php
  require_once("../env.php"); // 環境設定

  // 認知課題の正答率を取得する
  $answer_rate = array();
  $answer_rate[0] = $_POST["answer_rate0"];
  $answer_rate[1] = $_POST["answer_rate1"];
  $answer_rate[2] = $_POST["answer_rate2"];
  $answer_rate[3] = $_POST["answer_rate3"];

  $cognitions_file_path = "../data/cognitions.json"; // 認知課題JSON
  $cognitions_file = file_get_contents($cognitions_file_path, true);
  $cognitions_json = json_decode($cognitions_file , true); // JSONデコード

  $cognitions_size = count($cognitions_json); // 認知課題JSONのサイズ

  // 終了時刻を設定する
  date_default_timezone_set('Asia/Tokyo'); // タイムゾーン
  $current_date = time();
  $end_time = date("H:i:s", $current_date); // 終了時刻
  $cognitions_json[$cognitions_size-1]["end_time"] = $end_time; // 終了時間

  // 認知課題の正答率を設定する
  for ($j=0; $j<USER_SIZE; $j++) {
    $cognitions_json[$cognitions_size-1][$j]["answer_rate"] = (int)$answer_rate[$j]; // 正答率
  }

  // 認知課題JSONを設定する
  $handle = fopen($cognitions_file_path, "w+b");
  fwrite($handle, json_encode($cognitions_json));
  fclose($handle);
?>
