// 認知課題1のPOST通信
$('[name=cognition_11]').change(function() {
  var cognition = $('[name=cognition_11]').val();
  $.post( "set_cognition.php", {cognition_11: cognition}, function(data){
    console.log(data);
  });
});
$('[name=cognition_12]').change(function() {
  var cognition = $('[name=cognition_12]').val();
  $.post( "set_cognition.php", {cognition_12: cognition});
});
$('[name=cognition_13]').change(function() {
  var cognition = $('[name=cognition_13]').val();
  $.post( "set_cognition.php", {cognition_13: cognition});
});
$('[name=cognition_14]').change(function() {
  var cognition = $('[name=cognition_14]').val();
  $.post( "set_cognition.php", {cognition_14: cognition});
});

// 認知課題2のPOST通信
$('[name=cognition_21]').change(function() {
  var cognition = $('[name=cognition_21]').val();
  $.post( "set_cognition.php", {cognition_21: cognition}, function(data){
    console.log(data);
  });
});
$('[name=cognition_22]').change(function() {
  var cognition = $('[name=cognition_22]').val();
  $.post( "set_cognition.php", {cognition_22: cognition});
});
$('[name=cognition_23]').change(function() {
  var cognition = $('[name=cognition_23]').val();
  $.post( "set_cognition.php", {cognition_23: cognition});
});
$('[name=cognition_24]').change(function() {
  var cognition = $('[name=cognition_24]').val();
  $.post( "set_cognition.php", {cognition_24: cognition});
});

// 認知課題のカウントの順序のPOST通信
$('[name=count_order1]').change(function() {
  var count_order = $('[name=count_order1]').val();
  $.post("set_cognition.php", {count_order1: count_order});
});
$('[name=count_order2]').change(function() {
  var count_order = $('[name=count_order2]').val();
  $.post("set_cognition.php", {count_order2: count_order});
});
$('[name=count_order3]').change(function() {
  var count_order = $('[name=count_order3]').val();
  $.post("set_cognition.php", {count_order3: count_order});
});
$('[name=count_order4]').change(function() {
  var count_order = $('[name=count_order4]').val();
  $.post("set_cognition.php", {count_order4: count_order});
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
