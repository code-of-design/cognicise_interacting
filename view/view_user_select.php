<?php
// 参加者の選択
function viewUserSelects() {
	$cognicise_settings_file_path = "./data/cognicise_settings.json"; // コグニサイズ設定
  $cognicise_settings_file = file_get_contents($cognicise_settings_file_path, true);
  $cognicise_settings_json = json_decode($cognicise_settings_file, true); // JSONデコード

	for ($j=0; $j<USER_SIZE; $j++) {
		$user_id = $cognicise_settings_json[$j]["user_id"]; // userId
		$user_name = $cognicise_settings_json[$j]["user_name"]; // user名
		viewuser(($j+1), $user_id, $user_name); // user番号, userId, user名
	}
}

function viewUser($user_num, $user_id, $user_name){ // user番号, userId, user名
// selectのデフォルト値の更新
$cognicise_settings_file_path = "./data/cognicise_settings.json"; // コグニサイズ設定
$cognicise_settings_file = file_get_contents($cognicise_settings_file_path, true);
$cognicise_settings_json = json_decode($cognicise_settings_file, true); // JSONデコード
$cognition_selected = array(); // 認知課題selectのデフォルト値
$time_selected = array(); // 時間selectのデフォルト値
$rhythm_selected = array(); // リズムselectのデフォルト値
$cognition_selected_num = $cognicise_settings_json[$user_num-1]["cognition"];
$time_selected_num = $cognicise_settings_json[$user_num-1]["time"];
$rhythm_selected_num = $cognicise_settings_json[$user_num-1]["rhythm"];
// 認知課題
for ($i=0; $i<6 ; $i++) {
	if ($cognition_selected_num == ($i+1)) {
		$cognition_selected[$i] = "selected";
	}
	else {
		$cognition_selected[$i] = "";
	}
}
// 時間
if ($time_selected_num == 30) {
	$time_selected[0] = "selected";
	$time_selected[1] = "";
}
else if ($time_selected_num == 60) {
	$time_selected[0] = "";
	$time_selected[1] = "selected";
}
 // リズム
if ($rhythm_selected_num == "low") {
	$rhythm_selected[0] = "selected";
	$rhythm_selected[1] = "";
	$rhythm_selected[2] = "";
}
else if ($rhythm_selected_num == "normal"){
	$rhythm_selected[0] = "";
	$rhythm_selected[1] = "selected";
	$rhythm_selected[2] = "";
}
else if ($rhythm_selected_num == "fast"){
	$rhythm_selected[0] = "";
	$rhythm_selected[1] = "";
	$rhythm_selected[2] = "selected";
}

$dom = <<<EOM
	<div class="user-select">
		<div class="container inner">
			<!-- Header -->
		  <div class="row user-select-header">
				<!-- user番号 -->
				<span class="col user-number">{$user_num}</span>
		    <span class="col-1 btn user-select-btn">
					<a href="select_user.php?user_num={$user_num}">参加者の選択</a>
				</span>
		  </div> <!-- .user-select-header -->
		  <ul class="row user-select-content">
	      <li class="col">
	        <label class="label" for="name">名前</label>
					<a href="user_info.php?user_id={$user_id}"> <!-- 参加者情報ページ -->
	        	<input class="input-text name" type="text" name="name{$user_num}" value="{$user_name}" readonly>
					</a>
	      </li>
	      <li class="col">
	        <label class="label" for="cognition">認知課題</label>
	        <select class="cognition" name="cognition{$user_num}">
	          <option value="1" {$cognition_selected[0]}>3の倍数で拍手</option>
	          <option value="2" {$cognition_selected[1]}>3の倍数で拍手(引き算)</option>
	          <option value="3" {$cognition_selected[2]}>4の倍数で拍手</option>
	          <option value="4" {$cognition_selected[3]}>4の倍数で拍手(引き算)</option>
						<option value="5" {$cognition_selected[4]}>3と4の倍数で拍手</option>
						<option value="6" {$cognition_selected[5]}>3と4の倍数で拍手(引き算)</option>
	        </select>
	      </li>
	      <li class="col">
	        <label class="label" for="time">時間</label>
	        <select class="time" name="time{$user_num}">
	          <option value="30" {$time_selected[0]}>30</option>
	          <option value="60" {$time_selected[1]}>60</option>
	        </select>秒
	      </li>
				<li class="col">
	        <label class="label" for="rhythm">リズム</label>
	        <select class="rhythm" name="rhythm{$user_num}">
	          <option value="low" {$rhythm_selected[0]}>遅い</option>
	          <option value="normal" {$rhythm_selected[1]}>普通</option>
	          <option value="fast" {$rhythm_selected[2]}>速い</option>
	        </select>
	      </li>
			
		  </ul> <!-- .user-select-content -->
		</div> <!-- .inner -->
	</div> <!-- .user-select -->
EOM;
	echo $dom;
}
?>
