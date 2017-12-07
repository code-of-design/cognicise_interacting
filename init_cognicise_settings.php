<?php
  // コグニサイズ状態を初期化する
  $cognicise_state_file_path = "./data/cognicise_state.json";
  $cognicise_state_file = file_get_contents($cognicise_state_file_path, true);
  $cognicise_state_json = json_decode($cognicise_state_file, true); // JSONエンコード
  $cognicise_state_json["state"] = "ready"; // コグニサイズ状態
  $handle = fopen($cognicise_state_file_path, "w+b");
  fwrite($handle, json_encode($cognicise_state_json));
  fclose($handle);

  // コグニサイズ設定を初期化する
  $cognicise_settings_file_path = "./data/cognicise_settings.json";
  $cognicise_settings_file = file_get_contents($cognicise_settings_file_path, true);
  $cognicise_settings_json = json_decode($cognicise_settings_file, true); // JSONエンコード
  for($j=0; $j<USER_SIZE; $j++){
    /*
    $cognicise_settings_json[$j]["user_id"] = -1; // userId
    $cognicise_settings_json[$j]["user_name"] = ""; // user名
    $cognicise_settings_json[$j]["cognition"] = 1; // 認知課題
    $cognicise_settings_json[$j]["time"] = 30; // 時間
    $cognicise_settings_json[$j]["rhythm"] = "low"; // リズム */
  }
  $handle = fopen($cognicise_settings_file_path, "w+b");
  fwrite($handle, json_encode($cognicise_settings_json));
  fclose($handle);
?>
