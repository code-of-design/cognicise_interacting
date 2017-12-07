<?php
  require_once("../env.php"); // 環境設定

  $file_path = "../data/cognicise_state.json";
  $file = file_get_contents($file_path, true);
  $json = json_decode($file, true); // JSONエンコード

  // コグニサイズの状態
  $json["state"] = $_POST["state"];

  $handle = fopen($file_path, "w+b");
  fwrite($handle, json_encode($json));
  fclose($handle);

  echo $json["state"]; // POST通信レスポンス
?>
