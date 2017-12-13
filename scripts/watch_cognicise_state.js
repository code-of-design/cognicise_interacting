// コグニサイズ状態を監視する
var cognicise_state; // コグニサイズ状態
var end_flg = 0; // 終了フラグ

setInterval("watchCogniciseState()", 1000);

function watchCogniciseState() {
  console.log("Hello!");
  $.get('../cognicise_interacting/get_cognicise_state.php', function(data) {
    console.log("CogniciseState:", data);
    if (data == "wait" && end_flg == 0){
      alert("コグニステップを終了しました。");
      end_flg = 1;
    }
  });

  // TODO: コグニステップ設定を初期化する
}
