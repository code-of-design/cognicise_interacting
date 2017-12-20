<?php
function viewUsersAll($view_type, $user_num) { // ビュー種類, user番号
  $users_file_path = "./data/users.json";
  $users_file = file_get_contents($users_file_path, true);
  $users_json = json_decode($users_file, true); // JSONデコード

  for ($i=0; $i<count($users_json); $i++) {
    $id = $users_json[$i]["id"]; // userId
    $name = $users_json[$i]["name"]; // user名
    $age = $users_json[$i]["age"]; // 年齢
    $ei = 0; // $users_json[$i]["exercise_intensity"]*100; // 運動強度
    $resting_hr = 0; // $users_json[$i]["resting_hr"];// 安静時心拍数
    $target_hr = 0; // (int)$users_json[$i]["target_hr"]; // 目標心拍数

    if($view_type == "update"){ // 参加者の更新
      viewUserUpdate($id, $name, $age, $resting_hr, $ei, $target_hr);
    }
    if($view_type == "select"){ // 参加者の選択
      viewUserSelect($user_num, $id, $name, $age, $resting_hr, $ei, $target_hr);
    }
  }
}

// 参加者の更新
function viewUserUpdate($id, $name, $age, $resting_hr, $ei, $target_hr){ // userId, user名, 年齢, 安静時心拍数, 運動強度, 目標心拍数
  $dom = <<<EOM
  <!-- 参加者 -->
  <li class="user">
    <span class="row inner">
      <span class="col-3 user-item">
        <span class="label">名前</span>
        <span class="value">{$name}</span>
      </span>
      <span class="col-3 user-item">
        <span class="label">年齢</span>
        <span class="value">{$age}</span><span> 歳</span>
      </span>
      <!--
      <span class="col user-item">
        <span class="label">安静時心拍数</span>
        <span class="value">{$resting_hr}</span><span> BPM</span>
      </span> -->
      <!--
      <span class="col user-item">
        <span class="label">運動強度</span>
        <span class="value">{$ei}</span><span> %</span>
      </span> -->
      <!--
      <span class="col user-item">
        <span class="label">目標心拍数</span>
        <span class="value">{$target_hr}</span><span> BPM</span>
      </span> -->
    </span> <!-- .inner -->
    <span class="btn-user-update-select">
      <a href="update_user.php?user_id={$id}">更新</a>
    </span>
  </li> <!-- .user -->
EOM;
  echo $dom;
}

// 参加者の選択
function viewUserSelect($user_num ,$id, $name, $age, $resting_hr, $ei, $target_hr){ // user番号, userId, user名, 年齢, 安静時心拍数, 運動強度, 目標心拍数
  $dom = <<<EOM
  <!-- 参加者 -->
  <li class="user">
    <span class="row inner">
      <span class="col-3 user-item">
        <span class="label">名前</span>
        <span class="value">{$name}</span>
      </span>
      <span class="col-3 user-item">
        <span class="label">年齢</span>
        <span class="value">{$age}</span><span>歳</span>
      </span>
      <!--
      <span class="col user-item">
        <span class="label">安静時心拍数</span>
        <span class="value">{$resting_hr}</span><span>BPM</span>
      </span> -->
      <!--
      <span class="col user-item">
        <span class="label">運動強度</span>
        <span class="value">{$ei}</span><span>%</span>
      </span> -->
      <!--
      <span class="col user-item">
        <span class="label">目標心拍数</span>
        <span class="value">{$target_hr}</span><span>BPM</span>
      </span> -->
    </span> <!-- .inner -->
    <span class="btn-user-update-select">
      <a href="select_user_json.php?user_num={$user_num}&user_id={$id}">選択</a>
    </span>
  </li> <!-- .user -->
EOM;
  echo $dom;
}
?>
