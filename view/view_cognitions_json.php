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
          $cognition_1 = $cognitions_json[$i][$j]["cognition_1"]; // 認知課題1
          $cognition_2 = $cognitions_json[$i][$j]["cognition_2"]; // 認知課題2
          $count_order = $cognitions_json[$i][$j]["count_order"]; //カウントの順序
          $time = $cognitions_json[$i][$j]["time"]; // 時間
          $rhythm = $cognitions_json[$i][$j]["rhythm"]; // リズム
          $answer_rate = $cognitions_json[$i][$j]["answer_rate"]; // 認知課題の正答率
          $date = $cognitions_json[$i]["date"]; // 日付
          $end_time = $cognitions_json[$i]["end_time"]; // 終了時刻
          viewCognitions($cognition_1, $cognition_2, $count_order, $time, $rhythm, $answer_rate, $date, $end_time);
      }
    }
  }
}

// 認知課題を表示する
function viewCognitions($cognition_1, $cognition_2, $count_order, $time, $rhythm, $answer_rate, $date, $end_time){
  // 認知課題1
  switch ($cognition_1) {
    case 2:
      $cognition_1_value = "2の倍数で拍手";
      break;
    case 3:
      $cognition_1_value = "3の倍数で拍手";
      break;
    case 4:
      $cognition_1_value = "4の倍数で拍手";
      break;
    case 5:
      $cognition_1_value = "5の倍数で拍手";
      break;
    case 6:
      $cognition_1_value = "6の倍数で拍手";
      break;
    case 7:
      $cognition_1_value = "7の倍数で拍手";
      break;
    case 8:
      $cognition_1_value = "8の倍数で拍手";
      break;
    case 9:
      $cognition_1_value = "9の倍数で拍手";
      break;
    default:
      break;
  }

  // 認知課題2
  switch ($cognition_2) {
    case -1:
      $cognition_2_value = "なし";
      break;
    case 2:
      $cognition_2_value = "2の倍数で拍手";
      break;
    case 3:
      $cognition_2_value = "3の倍数で拍手";
      break;
    case 4:
      $cognition_2_value = "4の倍数で拍手";
      break;
    case 5:
      $cognition_2_value = "5の倍数で拍手";
      break;
    case 6:
      $cognition_2_value = "6の倍数で拍手";
      break;
    case 7:
      $cognition_2_value = "7の倍数で拍手";
      break;
    case 8:
      $cognition_2_value = "8の倍数で拍手";
      break;
    case 9:
      $cognition_2_value = "9の倍数で拍手";
      break;
    default:
      break;
  }

  // カウントの順序
  switch ($count_order) {
    case 'asc':
      $count_order_value = "足し算";
      break;
    case 'desc':
      $count_order_value = "引き算";
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
    <span class="col item">{$cognition_1_value}</span>
    <span class="col item">{$cognition_2_value}</span>
    <span class="col item">{$count_order_value}</span>
    <span class="col item">{$time}秒</span>
    <span class="col item">{$rhythm_value}</span>
    <span class="col item">{$answer_rate}%</span>
    <span class="col item">{$date} {$end_time}</span>
  </li>
EOM;
  echo $dom;
}
?>
