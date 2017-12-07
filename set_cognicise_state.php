<?php
  require_once("env.php"); // 環境設定

  $cognicise_state_file_path = "./data/cognicise_state.json";
  $cognicise_state_file = file_get_contents($cognicise_state_file_path, true);
  $cognicise_state_file_json = json_decode($cognicise_state_file, true); // JSONデコード
  $cognicise_state_file_json["state"] = $_POST["state"]; // コグニサイズ状態

  $handle = fopen($cognicise_state_file_path, "w+b");
  fwrite($handle, json_encode($cognicise_state_file_json));
  fclose($handle);

  echo $json["state"]; // コグニサイズ状態
?>
