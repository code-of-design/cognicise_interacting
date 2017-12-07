// 認知課題のPOST通信
$('[name=cognition1]').change(function() {
  var cognition = $('[name=cognition1]').val();
  $.post( "set_cognition.php", {cognition1: cognition}, function(data){
    console.log(data);
  });
});
$('[name=cognition2]').change(function() {
  var cognition = $('[name=cognition2]').val();
  $.post( "set_cognition.php", {cognition2: cognition});
});
$('[name=cognition3]').change(function() {
  var cognition = $('[name=cognition3]').val();
  $.post( "set_cognition.php", {cognition3: cognition});
});
$('[name=cognition4]').change(function() {
  var cognition = $('[name=cognition4]').val();
  $.post( "set_cognition.php", {cognition4: cognition});
});

// 認知課題の時間のPOST通信
$('[name=time1]').change(function() {
  var time = $('[name=time1]').val();
  $.post("set_cognition.php", {time1: time});
});
$('[name=time2]').change(function() {
  var time = $('[name=time2]').val();
  $.post("set_cognition.php", {time2: time});
});
$('[name=time3]').change(function() {
  var time = $('[name=time3]').val();
  $.post("set_cognition.php", {time3: time});
});
$('[name=time4]').change(function() {
  var time = $('[name=time4]').val();
  $.post("set_cognition.php", {time4: time});
});

// 認知課題のリズムのPOST通信
$('[name=rhythm1]').change(function() {
  var rhythm = $('[name=rhythm1]').val();
  $.post("set_cognition.php", {rhythm1: rhythm});
});
$('[name=rhythm2]').change(function() {
  var rhythm = $('[name=rhythm2]').val();
  $.post("set_cognition.php", {rhythm2: rhythm});
});
$('[name=rhythm3]').change(function() {
  var rhythm = $('[name=rhythm3]').val();
  $.post("set_cognition.php", {rhythm3: rhythm});
});
$('[name=rhythm4]').change(function() {
  var rhythm = $('[name=rhythm4]').val();
  $.post("set_cognition.php", {rhythm4: rhythm});
});

// STARTボタン
$('.btn-start').click(function() {
  $(this).addClass('btn-start--active');  // classの追加
  $('.btn-stop').addClass('btn-stop--active');  // classの追加

  // コグニサイズ状態のPOST通信
  $.post('set_cognicise_state.php', {state: "active"}, function(data) { // コグニサイズ状態: active
    console.log("CogniciseState:", data);
  });

  // 認知課題JSONのPOST通信
  $.post('set_cognition_json.php', {}, function(data) {
    console.log(data);
  });
});
