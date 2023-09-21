/**
 * ヘッドタグ下で読み込み
*/
tp = window.tp || [];

if (location.href.includes('https://st.guitarmagazine.jp/')) {
  tp.push(["setAid", "5Cp4t1hysu"]);
  tp.push(["setSandbox", true]);
  tp.push(["setUseTinypassAccounts", false]);
  tp.push(["setUsePianoIdUserProvider", true]);
} else if (location.href.includes('https://gm-st-new')) {
  // auth0 sandbox
  console.log('auth0 sandbox');
  tp.push(["setAid", "kcIxJRMlsu"]);
  tp.push(["setSandbox", true]);
  tp.push(["setUseTinypassAccounts", false]);
  tp.push(["setUsePianoIdUserProvider", true]);
} else {
  tp.push(["setAid", 'QVaB3Ceypj']);
  tp.push(["setUseTinypassAccounts", false ]);
  tp.push(["setUsePianoIdUserProvider", true ]);
}


/**
 * メタタグデータをクローラーに渡す
 */
var metas = document.getElementsByTagName('meta');
var i, meta, property, content, contents = [];

for (i = 0; i < metas.length; i++) {
    meta = metas[i];
    property = meta.getAttribute('property');
    //metaから記事に設定されているタグを取得
    if (property === 'article:tag') {
        content = meta.getAttribute('content');
        contents.push(content);
        //タイアップ記事判定
        // if (content === 'PR') {
        //     tp.push(["setContentIsNative", true]);
        // } else {
        //     tp.push(["setContentIsNative", false]);
        // }
    }
}

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