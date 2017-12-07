<?php
  require_once("env.php"); // 環境設定

  $cognicise_settings_file_path = "./data/cognicise_settings.json"; // コグニサイズ設定JSON
  $cognitions_file_path = "./data/cognitions.json"; // 認知課題JSON
  $cognicise_settings_file = file_get_contents($cognicise_settings_file_path , true);
  $cognitions_file = file_get_contents($cognitions_file_path, true);
  $cognicise_settings_json = json_decode($cognicise_settings_file, true); // JSONデコード
  $cognitions_json = json_decode($cognitions_file , true); // JSONデコード

  $cognitions_size = count($cognitions_json); // 認知課題JSONのサイズ
  $cognition_id = $cognitions_size; // 認知課題Id
  date_default_timezone_set('Asia/Tokyo'); // タイムゾーン
  $current_date = time();
  $date = date("Y/m/d", $current_date); // 日付
  $begin_time = date("H:i:s", $current_date); // 開始時刻

  $cognitions_json[$cognitions_size]["id"] = $cognition_id;
  $cognitions_json[$cognitions_size]["date"] = $date;
  $cognitions_json[$cognitions_size]["begin_time"] = $begin_time;
  $cognitions_json[$cognitions_size]["end_time"] = ""; // TODO: 終了時間

  // コグニサイズ設定のuserを取得する
  for ($j=0; $j<USER_SIZE; $j++) {
    $cognitions_json[$cognitions_size][$j]["user_id"] = $cognicise_settings_json[$j]["user_id"]; // user_id
    $cognitions_json[$cognitions_size][$j]["cognition"] = $cognicise_settings_json[$j]["cognition"]; // 認知課題
    $cognitions_json[$cognitions_size][$j]["time"] = $cognicise_settings_json[$j]["time"]; // 時間
    $cognitions_json[$cognitions_size][$j]["rhythm"] = $cognicise_settings_json[$j]["rhythm"]; // リズム
    $cognitions_json[$cognitions_size][$j]["answer_rate"] = 0; // TODO: 正答率
  }

  // 認知課題JSONにuserを設定する
  $handle = fopen($cognitions_file_path, "w+b");
  fwrite($handle, json_encode($cognitions_json));
  fclose($handle);
?>
