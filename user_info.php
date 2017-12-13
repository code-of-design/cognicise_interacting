<?php
  require_once("env.php"); // 環境設定
  require_once("view/view_header.php"); // Headerビュー
  require_once("./view/view_cognitions_json.php"); // 認知課題JSONビュー

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
    <style media="screen">
      /* 参加者情報 */
      .user-name{
        margin-bottom: 30px;
        font-size: 24px;
      }
    </style>
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
          <a href="index.php">
            <i class="fa fa-angle-double-left icon" aria-hidden="true"></i>
          </a>
        </div>
        <!-- ページ名 -->
				<div class="col page-name">
					<h2>参加者情報</h2>
				</div>
			</div> <!-- .page-content__nav -->
      <!-- 参加者の名前 -->
      <div class="user-name"><?php echo $name; ?> さん</div>
        <!-- 認知課題 -->
        <div class="cognitions">
          <ul class="container">
            <li class="row">
              <span class="col item">認知課題1</span>
              <span class="col item">認知課題2</span>
              <span class="col item">カウントの順序</span>
              <span class="col item">時間</span>
              <span class="col item">リズム</span>
              <span class="col item">正答率</span>
              <span class="col item">日付</span>
            </li>
            <!-- TODO: 認知課題JSONを探索する -->
            <?php searchCognitions($user_id); ?>
          </ul>
        </div>
		</div>  <!-- .page-content -->
	</div> <!-- .page -->
  <!-- jquery -->
  <script src="scripts/jquery-3.2.1.min.js"></script>
  </body>
</html>
