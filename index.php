<?php
  // Vimでコーディングするよ
  require_once("env.php"); // 環境設定
  require_once("init_cognicise_settings.php"); // コグニサイズ設定を初期化する
  require_once("view/view_header.php"); // Headerビュー
  require_once("view/view_user_select.php"); // 参加者ビュー
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
          <!-- ページ名 -->
  				<div class="col page-name">
  					<h2>コグニステップの設定</h2>
  				</div>
          <!-- Content -->
          <!-- 参加者の管理 -->
          <div class="col users-management">
            <div class="inner"><a href="management_users.php">
              <span class="btn users-management__btn">
                <i class="fa fa-users icon" aria-hidden="true"></i>参加者の管理
              </span>
            </a></div>
          </div> <!-- .users-management -->
  			</div> <!-- .page-content__nav -->
        <!-- 参加者 -->
        <div class="users-form">
          <!-- 参加者の選択 -->
          <?php viewUserSelects(); ?>
         <!-- START/STOPボタン -->
          <input class="btn btn-stop" type="button" name="" value="STOP">
          <input class="btn btn-start" type="button" name="" value="START">
        </div> <!-- .users-form -->
  		</div>  <!-- .page-content -->
  	</div> <!-- .page -->
	<!-- jquery -->
  <script src="scripts/jquery-3.2.1.min.js"></script>
  <script src="scripts/cognicise_support.js"></script>
  <script src="scripts/watch_cognicise_state.js"></script>
  </body>
</html>
