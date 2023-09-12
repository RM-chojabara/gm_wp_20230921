<div id="logly-lift-uaid"></div>
<script charset="UTF-8">
var ua = navigator.userAgent;
var lgy_id;
if (ua.indexOf('iPhone') > 0 || ua.indexOf('iPod') > 0 || ua.indexOf('Android') > 0 && ua.indexOf('Mobile') > 0) {
 ua = 'sp';
} else if (ua.indexOf('iPad') > 0 || ua.indexOf('Android') > 0){
 ua = 'tab';
} else {
 ua = 'pc';
}

if (ua=='sp') {
  lgy_id = '4296311';
} else {
  lgy_id = '4295487';
}
document.getElementById('logly-lift-uaid').id = "logly-lift-" + lgy_id;

(function(){
  var _lgy_lw = document.createElement("script");
  _lgy_lw.type = "text/javascript";
  _lgy_lw.charset = "UTF-8";
  _lgy_lw.async = true;
  _lgy_lw.src= "https://l.logly.co.jp/lift_widget.js?adspot_id=" + lgy_id;
  var _lgy_lw_0 = document.getElementsByTagName("script")[0];
  _lgy_lw_0.parentNode.insertBefore(_lgy_lw, _lgy_lw_0);
})();
</script>