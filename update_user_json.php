<?php
  // JSONに参加者情報を更新する

  // 参加者情報
  $user_id = $_POST["user-id"]; // userId
  $user_name = $_POST["user-name"]; // 名前
  $user_age = $_POST["user-age"]; // 年齢
  $resting_hr = $_POST["user-resting-hr"]; // 安静時心拍数
  $max_hr = 207-($user_age*0.7); // 最大心拍数
  $exercise_intensity = 0.5; // 運動強度
  $target_hr = $exercise_intensity*($max_hr-$resting_hr)+$resting_hr; // 目標心拍数

  $users_file_path = "./data/users.json";
  $users_file = file_get_contents($users_file_path, true);
  $users_json = json_decode($users_file, true); // JSONデコード

  for ($i=0; $i<count($users_json); $i++) {
    if($user_id == $users_json[$i]["id"]){ // userId
      $users_json[$i]["name"] = $user_name; // user名
      $users_json[$i]["age"] = $user_age; // 年齢
      $users_json[$i]["resting_hr"] = $resting_hr; // 安静時心拍数
      $users_json[$i]["exercise_intensity"] = $exercise_intensity; // 運動強度
      $users_json[$i]["target_hr"] = (int)$target_hr; // 目標心拍数
    }
  }

  $handle = fopen($users_file_path, "w+b");
  fwrite($handle, json_encode($users_json));
  fclose($handle);

  header('Location: ./management_users.php');
  exit();
?>
