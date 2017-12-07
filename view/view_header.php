<?php
// Header
function viewHeader($page_index){
	$dom = <<<EOM
  <!-- ロゴ -->
  <div class="container container-fluid logo">
		<div class="row inner">
			<a href="{$page_index}">
				<img class="col-6 logo__img" src="data/images/logo.png" alt="">
			</a>
		</div> <!-- .inner -->
  </div> <!-- .logo -->
EOM;
	echo $dom;
}
?>
