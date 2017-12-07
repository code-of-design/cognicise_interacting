<?php
// 認知課題JSONを探索する
function searchCognitions($user_id) {
  // 認知課題JSON
  $cognitions_file_path = "./data/cognitions.json";
  $cognitions_file = file_get_contents($cognitions_file_path, true);
  $cognitions_json = json_decode($cognitions_file, true); // JSONデコード

  // TODO: 線形探索を修正する
  for ($i=0; $i<count($cognitions_json); $i++) {
    for ($j=0; $j<4; $j++) {
      $search_index = $cognitions_json[$i][$j]["user_id"];
      if ($search_index == $user_id) { // userId
          $cognition = $cognitions_json[$i][$j]["cognition"]; // 認知課題
          $time = $cognitions_json[$i][$j]["time"]; // 時間
          $rhythm = $cognitions_json[$i][$j]["rhythm"]; // リズム
          $answer_rate = $cognitions_json[$i][$j]["answer_rate"]; // 認知課題の正答率
          $date = $cognitions_json[$i]["date"]; // 日付
          $end_time = $cognitions_json[$i]["end_time"]; // 終了時刻
          viewCognitions($cognition, $time, $rhythm, $answer_rate, $date, $end_time);
      }
    }
  }
}

// 認知課題を表示する
function viewCognitions($cognition, $time, $rhythm, $answer_rate, $date, $end_time){
  // 認知課題
  switch ($cognition) {
    case 1:
      $cognition_value = "3の倍数で拍手";
      break;
    case 2:
      $cognition_value = "3の倍数で拍手(引き算)";
      break;
    case 3:
      $cognition_value = "4の倍数で拍手";
      break;
    case 4:
      $cognition_value = "4の倍数で拍手(引き算)";
      break;
    case 5:
      $cognition_value = "3と4の倍数で拍手";
      break;
    case 6:
      $cognition_value = "3と4の倍数で拍手(引き算)";
      break;
    default:
      break;
  }

  // リズム
  switch ($rhythm) {
    case "low":
      $rhythm_value = "遅い";
      break;
    case "normal":
      $rhythm_value = "普通";
      break;
    case "fast":
      $rhythm_value = "速い";
      break;
    default:
      break;
  }

  $dom = <<<EOM
  <li class="row">
    <span class="col item">{$cognition_value}</span>
    <span class="col-2 item">{$time}秒</span>
    <span class="col-2 item">{$rhythm_value}</span>
    <span class="col-2 item">{$answer_rate}%</span>
    <span class="col item">{$date} {$end_time}</span>
  </li>
EOM;
  echo $dom;
}
?>
