/**
 * ヘッドタグ下で読み込み
*/

/**
 * 広告ブロック検知
 */
document.cookie = "__adblocker=; expires=Thu, 01 Jan 1970 00:00:00 GMT; path=/";

var setNptTechAdblockerCookie = function ( adblocker ) {
    var d = new  Date ();
    d.setTime(d.getTime() + 60 * 5 * 1000 );
    document .cookie = "__adblocker=" + (adblocker ? "true" : "false" ) + "; expires=" + d.toUTCString() + "; path=/" ;
};

script = document.createElement( "script" );
script.setAttribute( "async" , true );
script.setAttribute( "src" , "//www.npttech.com/advertising.js" );
script.setAttribute( "onerror" , "setNptTechAdblockerCookie(true);" );
document.getElementsByTagName("head")[0].appendChild(script);


if (location.href.includes('https://st.guitarmagazine.jp/')) {
  // テスト環境
  (function (src) { var a = document.createElement("script"); a.type = "text/javascript"; a.async = true; a.src = src; var b = document.getElementsByTagName("script")[0]; b.parentNode.insertBefore(a, b) })("https://sandbox.tinypass.com/xbuilder/experience/load?aid=5Cp4t1hysu");

} else if (location.href.includes('https://gm-st-new')) {
  // auth0 sandbox
  (function(src){var a=document.createElement("script");a.type="text/javascript";a.async=true;a.src=src;var b=document.getElementsByTagName("script")[0];b.parentNode.insertBefore(a,b)})("https://sandbox.tinypass.com/xbuilder/experience/load?aid=kcIxJRMlsu");
} else {
  // 本番環境
  (function(src){var a=document.createElement("script");a.type="text/javascript";a.async=true;a.src=src;var b=document.getElementsByTagName("script")[0];b.parentNode.insertBefore(a,b)})("https://experience-ap.piano.io/xbuilder/experience/load?aid=QVaB3Ceypj");
}