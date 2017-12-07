<?php
  require_once("env.php");

  $file_path = "./data/cognicise_state.json";
  // JSONの読み込み
  $file = file_get_contents($file_path, true);
  $json = json_decode($file, true); // JSONデコード

  // コグニサイズの状態
  echo $json["state"];
?>
