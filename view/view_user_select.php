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
$cognition_1_selected = array(); // 認知課題1selectのデフォルト値
$cognition_2_selected = array(); // 認知課題2selectのデフォルト値
$cognition_1_size = 7; // 認知課題1のサイズ
$cognition_2_size = 8; // 認知課題2のサイズ
$count_order_selected = array(); // カウントの順序のデフォルト値
$time_selected = array(); // 時間selectのデフォルト値
$rhythm_selected = array(); // リズムselectのデフォルト値
$cognition_1_selected_num = $cognicise_settings_json[$user_num-1]["cognition_1"]; // 認知課題1
$cognition_2_selected_num = $cognicise_settings_json[$user_num-1]["cognition_2"]; // 認知課題2
$count_order_selected_num = $cognicise_settings_json[$user_num-1]["count_order"]; // カウントの順序
$time_selected_num = $cognicise_settings_json[$user_num-1]["time"]; // 時間
$rhythm_selected_num = $cognicise_settings_json[$user_num-1]["rhythm"]; // リズム
// 認知課題1
for ($i=0; $i<$cognition_1_size ; $i++) {
	if ($cognition_1_selected_num == ($i+1)) {
		$cognition_1_selected[$i] = "selected";
	}
	else {
		$cognition_1_selected[$i] = "";
	}
}
// 認知課題2
for ($i=0; $i<$cognition_2_size ; $i++) {
	if ($cognition_2_selected_num == ($i+1)) {
		$cognition_2_selected[$i] = "selected";
	}
	else {
		$cognition_2_selected[$i] = "";
	}
}
// カウントの順序
if ($count_order_selected_num  == "asc") {
	$count_order_selected[0] = "selected";
	$count_order_selected[1] = "";
}
else if ($count_order_selected_num == "desc") {
	$count_order_selected[0] = "";
	$count_order_selected[1] = "selected";
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
	        <label class="label" for="cognition_1">認知課題1</label>
	        <select class="cognition_1" name="cognition_1{$user_num}">
	          <option value="2" {$cognition_1_selected[0]}>2の倍数で拍手</option>
	          <option value="3" {$cognition_1_selected[1]}>3の倍数で拍手</option>
						<option value="4" {$cognition_1_selected[2]}>4の倍数で拍手</option>
						<option value="5" {$cognition_1_selected[3]}>5の倍数で拍手</option>
						<option value="6" {$cognition_1_selected[4]}>6の倍数で拍手</option>
						<option value="7" {$cognition_1_selected[5]}>7の倍数で拍手</option>
						<option value="8" {$cognition_1_selected[6]}>8の倍数で拍手</option>
						<option value="9" {$cognition_1_selected[7]}>9の倍数で拍手</option>
	        </select>
	      </li>
				<li class="col">
	        <label class="label" for="cognition_2">認知課題2</label>
	        <select class="cognition_2" name="cognition_2{$user_num}">
						<option value="0" {$cognition_2_selected[0]}>なし</option>
	          <option value="2" {$cognition_2_selected[1]}>2の倍数で拍手</option>
	          <option value="3" {$cognition_2_selected[2]}>3の倍数で拍手</option>
						<option value="4" {$cognition_2_selected[3]}>4の倍数で拍手</option>
						<option value="5" {$cognition_2_selected[4]}>5の倍数で拍手</option>
						<option value="6" {$cognition_2_selected[5]}>6の倍数で拍手</option>
						<option value="7" {$cognition_2_selected[6]}>7の倍数で拍手</option>
						<option value="8" {$cognition_2_selected[7]}>8の倍数で拍手</option>
						<option value="9" {$cognition_2_selected[8]}>9の倍数で拍手</option>
	        </select>
	      </li>
				<li class="col">
	        <label class="label" for="count_order">カウントの順序</label>
	        <select class="count_order" name="count_order{$user_num}">
	          <option value="asc" {$count_order_selected[0]}>足し算</option>
	          <option value="desc" {$count_order_selected[1]}>引き算</option>
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
