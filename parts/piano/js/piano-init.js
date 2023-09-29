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



(async function () {
  if (location.pathname === '/member_plans/') {
    try {
      const auth0Client = await auth0.createAuth0Client({
        domain: "login-dev.rittor-music.co.jp",
        clientId: "YqJvsG9ITMx8duXhLUPHmZj7aUoCt369",
      });
      console.log('auth0Client');

      if (location.search.includes("state=") && (location.search.includes("code=") || location.search.includes("error="))) {
        await auth0Client.handleRedirectCallback();
        window.history.replaceState({}, document.title, location.pathname);
      }

      const token = await auth0Client.getIdTokenClaims();
      if(typeof token === 'undefined') throw new Error('token is undefined');
      console.log('token');

      tp.push(["setExternalJWT", token.__raw]);
    } catch (err) {
      console.log('err', err);
    }
  }
})();


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


window.addEventListener("DOMContentLoaded", async () => {
  const loginButtons = document.querySelectorAll(`.js-PianoLoginBtn`);
  const logoutButtons = document.querySelectorAll(`.js-PianoLogoutBtn`);
  const registerButtons = document.querySelectorAll(`.js-PianoRegisterBtn`);
  const loginBlock = document.querySelectorAll('.js-PianoLoginBlock');
  const accountBlock = document.querySelectorAll('.js-PianoAccountBlock');
  // console.log(loginButtons, logoutButtons, registerButtons, loginBlock, accountBlock);

  const auth0Client = await auth0.createAuth0Client({
    domain: "login-dev.rittor-music.co.jp",
    clientId: "YqJvsG9ITMx8duXhLUPHmZj7aUoCt369",
  });
  console.log('DOM after auth0Client');

    /**
   * ログイン中の判定
   */
  const isAuthenticated = await auth0Client.isAuthenticated();
  // console.log('isAuthenticated', isAuthenticated);

  if (isAuthenticated) {
    // ログイン中
    loginBlock.forEach(el => el.style.display = "none");
    accountBlock.forEach(el => el.style.display = "block");
  } else {
    // 未ログイン
    loginBlock.forEach(el => el.style.display = "block");
    accountBlock.forEach(el => el.style.display = "none");
  }

  /**
   * ログイン処理
   */
  const loginURL = window.location.origin + '/member_plans/';

  loginButtons.forEach(el => el.addEventListener('click', (e) => {
    e.preventDefault();
    auth0Client.loginWithRedirect({
      authorizationParams: {
        redirect_uri: loginURL
      }
    });
  }));

  /**
   * ログアウト処理
   */
  logoutButtons.forEach(el => el.addEventListener('click', (e) => {
    e.preventDefault();
    auth0Client.logout()
  }));


  /**
   * 新規無料登録
   */
  registerButtons.forEach(el => el.addEventListener('click', () => {
    console.log('register')
    tp.pianoId.show({
      screen: "register", loggedIn: function () {
        alert('無料会員登録が完了しました。');
        tp.pianoId.showForm({ formName:'initialForm', templateId:'OT6KFVJWHN20' });
    } });
  }));
});