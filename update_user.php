<?php
  require_once("env.php"); // 環境設定
  require_once("view/view_header.php"); // Headerビュー

  $user_id = $_GET["user_id"]; // userId

  $users_file_path = "./data/users.json";
  $users_file = file_get_contents($users_file_path, true);
  $users_json = json_decode($users_file, true); // JSONデコード

  for ($i=0; $i<count($users_json); $i++) {
    if($user_id == $users_json[$i]["id"]){ // userId
      $name = $users_json[$i]["name"]; // user名
      $age = $users_json[$i]["age"]; // 年齢
      $resting_hr = (int)$users_json[$i]["resting_hr"]; // 安静時心拍数
    }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?php echo LOGO_TITLE; ?></title>
    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="stylesheets/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet"  href="stylesheets/font-awesome-4.7.0/css/font-awesome.min.css">
    <!-- Stylesheets -->
    <!-- <link rel="stylesheet" href="<?php echo STYLESHEET; ?>" type="text/css"> -->
    <link rel="stylesheet" href="<?php echo STYLESHEET_MIN; ?>" type="text/css">
  </head>
  <body>
    <div class="page">
	    <!-- Header -->
		<header class="page-header">
      <?php viewHeader(PAGE_INDEX); ?>
		</header> <!-- .page-header -->
		<!-- Content -->
		<div class="container container-fluid page-content">
			<!-- コンテンツナビゲーション -->
			<div class="row page-content__nav">
        <!-- 戻るボタン -->
        <div class="col-1 page-back">
          <a href="management_users.php">
            <i class="fa fa-angle-double-left icon" aria-hidden="true"></i>
          </a>
        </div>
        <!-- ページ名 -->
				<div class="col page-name">
					<h2>参加者情報の更新</h2>
				</div>
			</div> <!-- .page-content__nav -->
      <form class="resist-new-user-form" action="update_user_json.php" method="POST">
        <input type="hidden" name="user-id" value="<?php echo $user_id; ?>">
        <ul>
          <li>
            <label for="user-name">名前</label>
            <input type="text" name="user-name" value="<?php echo $name; ?>">
          </li>
          <li>
            <label for="user-age">年齢</label>
            <input type="text" name="user-age" value="<?php echo $age; ?>"><span class="unit">歳</span>
          </li>
          <!--
          <li>
            <label for="user-resting-hr">安静時心拍数</label>
            <input type="text" name="user-resting-hr" value="<?php echo $resting_hr; ?>"><span class="unit">BPM</span>
          </li>
          <li> -->
            <input class="btn regist-btn" type="submit" name="submit" value="更新">
          </li>
        </ul>
      </form>
		</div>  <!-- .page-content -->
	</div> <!-- .page -->
  <!-- jquery -->
  <script src="scripts/jquery-3.2.1.min.js"></script>
  </body>
</html>
