<?php
  require_once("env.php"); // 環境設定
  require_once("view/view_header.php"); // Headerビュー
  require_once("./view/view_users_all.php"); // 参加者ビュー

  $user_num = $_GET["user_num"]; // user番号
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
          <a href="<?php echo PAGE_INDEX; ?>">
            <i class="fa fa-angle-double-left icon" aria-hidden="true"></i>
          </a>
        </div>
        <!-- ページ名 -->
				<div class="col page-name">
          <h2 class="user-select-header__user">
            参加者<?php echo $user_num; ?>の選択
          </h2>
				</div>
			</div> <!-- .page-content__nav -->
      <!-- 参加者の一覧 -->
      <ul class="users-all">
        <?php viewUsersAll("select", $user_num); ?> <!-- viewの種類, user番号 -->
        <!-- 参加者なし -->
        <li class="user no-user">
          <span class="no-user-btn">
              <a href="select_user_json.php?user_num=<?php echo $user_num; ?>&user_id=-1">参加者なし</a>
          </span>
        </li> <!-- .user -->
      </ul> <!-- .users-all -->
		</div>  <!-- .page-content -->
	</div> <!-- .page -->
  <!-- jquery -->
  <script src="scripts/jquery-3.2.1.min.js"></script>
  </body>
</html>
