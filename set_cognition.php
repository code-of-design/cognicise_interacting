<?php
  require_once("env.php"); // 環境設定

  // コグニサイズ設定を取得する
  $cognicise_settings_file_path = "./data/cognicise_settings.json";
  $cognicise_settings_file = file_get_contents($cognicise_settings_file_path, true);
  $cognicise_settings_json = json_decode($cognicise_settings_file, true); // JSONデコード

  for ($j=0; $j<USER_SIZE; $j++) {
    if (isset($_POST["cognition_1".($j+1)])) { // 認知課題1を取得する
      $cognicise_settings_json[$j]["cognition_1"] = (int)$_POST["cognition_1".($j+1)];
    }
    if (isset($_POST["cognition_2".($j+1)])) { // 認知課題2を取得する
      $cognicise_settings_json[$j]["cognition_2"] = (int)$_POST["cognition_2".($j+1)];
    }
    if (isset($_POST["count_order".($j+1)])) { // 認知課題のカウントの順序を取得する
      $cognicise_settings_json[$j]["count_order"] = $_POST["count_order".($j+1)];
    }
    if (isset($_POST["time".($j+1)])) { // 認知課題の時間を取得する
      $cognicise_settings_json[$j]["time"] = (int)$_POST["time".($j+1)];
    }
    if (isset($_POST["rhythm".($j+1)])) { // 認知課題のリズムを取得する
      $cognicise_settings_json[$j]["rhythm"] = $_POST["rhythm".($j+1)];
    }
  }

  // コグニサイズ設定を設定する
  $handle = fopen($cognicise_settings_file_path, "w+b");
  fwrite($handle, json_encode($cognicise_settings_json));
  fclose($handle);
?>
