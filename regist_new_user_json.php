<?php
  // JSONに新規参加者を追加する
  $users_file_path = "./data/users.json";

  // USERS JSONの読み込み
  $users_file = file_get_contents($users_file_path, true);
  $users_json = json_decode($users_file, true); // JSONデコード

  // 新規参加者
  $user_id = $users_json[count($users_json)-1]["id"]+1; // userId
  $user_name = $_POST["user-name"]; // user名
  $user_age = $_POST["user-age"]; // 年齢
  $resting_hr = $_POST["user-resting-hr"]; // 安静時心拍数
  $max_hr = 207-($user_age*0.7); // 最大心拍数
  $exercise_intensity = 0.5; // 運動強度
  $target_hr = $exercise_intensity*($max_hr-$resting_hr)+$resting_hr; // 目標心拍数

  $new_user = array(
    "id" => $user_id,
    "name" => $user_name,
    "age" => $user_age,
    "resting_hr" => $resting_hr,
    "exercise_intensity" => $exercise_intensity,
    "target_hr" => $target_hr
  );

  array_push($users_json, $new_user); // 新規参加者の追加

  // USERS JSONの書き込み
  $handle = fopen($users_file_path, "w+b");
  fwrite($handle, json_encode($users_json));
  fclose($handle);

  header('Location: ./management_users.php');
  exit();
?>
