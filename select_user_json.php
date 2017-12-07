<?php
  // JSONに参加者を追加する
  $cognicise_settings_file_path = "./data/cognicise_settings.json";
  $users_file_path = "./data/users.json";

  $user_num = $_GET["user_num"]; // user番号
  $user_id = $_GET["user_id"]; // userId

  // UsesJSONを取得する
  $cognicise_settings_file = file_get_contents($cognicise_settings_file_path, true);
  $cognicise_settings_json = json_decode($cognicise_settings_file, true); // JSONデコード
  $users_file = file_get_contents($users_file_path, true);
  $users_json = json_decode($users_file, true); // JSONデコード

  // userIdの探索
  for ($i=0; $i<count($users_json); $i++) {
    if ($users_json[$i]["id"] == $user_id) {
      $cognicise_settings_json[$user_num-1]["user_id"] = $users_json[$i]["id"]; // userId
      $cognicise_settings_json[$user_num-1]["user_name"] = $users_json[$i]["name"]; // user名
    }
    elseif ($user_id == (-1)) { // 参加者なし
      $cognicise_settings_json[$user_num-1]["user_id"] = -1; // userId
      $cognicise_settings_json[$user_num-1]["user_name"] = ""; // user名
    }
  }

  // UsersJSONを設定する
  $handle = fopen($cognicise_settings_file_path, "w+b");
  fwrite($handle, json_encode($cognicise_settings_json));
  fclose($handle);

  header('Location: ./index.php');
  exit();
?>
