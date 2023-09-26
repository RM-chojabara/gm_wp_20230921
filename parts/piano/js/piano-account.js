
/**
 * ピアノ初期設定
*/

(async function () {
  const auth0Client = await auth0.createAuth0Client({
    domain: "login-dev.rittor-music.co.jp",
    clientId: "YqJvsG9ITMx8duXhLUPHmZj7aUoCt369",
  });
  console.log('auth0Client');

  // 特定のページの場合、リダイレクト処理
  if (location.search.includes("state=") && (location.search.includes("code=") || location.search.includes("error="))) {
    await auth0Client.handleRedirectCallback();
    window.history.replaceState({}, document.title, "/");
  }

  /**
   * ログイン中の判定
   */
  const isAuthenticated = await auth0Client.isAuthenticated();
  console.log('isAuthenticated', isAuthenticated);

  if (isAuthenticated) {
    const token = await auth0Client.getTokenSilently();
    console.log('token', token);

    tp.push(["setExternalJWT", token]);
  }


  window.addEventListener("DOMContentLoaded", async () => {
    const loginButtons = document.querySelectorAll(`.js-PianoLoginBtn`);
    const logoutButtons = document.querySelectorAll(`.js-PianoLogoutBtn`);
    const registerButtons = document.querySelectorAll(`.js-PianoRegisterBtn`);
    const loginBlock = document.querySelectorAll('.js-PianoLoginBlock');
    const accountBlock = document.querySelectorAll('.js-PianoAccountBlock');
    // console.log(loginButtons, logoutButtons, registerButtons, loginBlock, accountBlock);

    /**
     * ログイン処理
     */
    loginButtons.forEach(el => el.addEventListener('click', (e) => {
      e.preventDefault();
      auth0Client.loginWithRedirect({
        authorizationParams: {
          redirect_uri: window.location.origin + '/my-account'
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


    if (isAuthenticated) {
      // ログイン中
      loginBlock.forEach(el => el.style.display = "none");
      accountBlock.forEach(el => el.style.display = "block");
    } else {
      // 未ログイン
      loginBlock.forEach(el => el.style.display = "block");
      accountBlock.forEach(el => el.style.display = "none");
    }
  });
})();


// タグの判定
tp = window["tp"] || [];
var metas = document.getElementsByTagName("meta");
var i,
  meta,
  property,
  content,
  contents = [];

for (i = 0; i < metas.length; i++) {
  meta = metas[i];
  property = meta.getAttribute("property");
  //metaから記事に設定されているタグを取得
  if (property === "article:tag") {
    content = meta.getAttribute("content");
    contents.push(content);
    //タイアップ記事判定
    if (content === "PR") {
      tp.push(["setContentIsNative", true]);
    } else {
      tp.push(["setContentIsNative", false]);
    }
  }
}
//タグをPianoに送信
tp.push(["setTags", contents]);

// アンケート表示
tp.push([
  "init",
  function () {
    // リセットパスワードの呼び出し
    // Password can be reset only if user is anonymous
    if (!tp.user.isUserValid()) {
      // If URL has reset_token parameter
      var tokenMatch = location.search.match(/reset_token=([A-Za-z0-9]+)/);
      if (tokenMatch) {
        // Get value of the token
        var token = tokenMatch[1];
        // Present password reset form with the found token
        tp.pianoId.show({
            'resetPasswordToken': token, loggedIn: function () {
                // Once user logs in - refresh the page
                // location.reload();
                location.href = "/my-account"
            }
        });
      }
    }


    window.addEventListener('message', (e) => {
      if (!e.data || typeof e.data != "string" ) return
      const eventData = JSON.parse(e.data);
      // console.log(eventData.event);

      if (eventData.event === "loginSuccess"
        || eventData.event === "registrationSuccess"
        || eventData.event === "closed") {
        if (tp.user.isUserValid())
          tpAccount.accountBlockShow() //ログイン中
      }

      // 完了画面の表示
      if (eventData.event === "profileUpdated") {
        // alert('更新 2');
        if (location.href.includes('https://st.guitarmagazine.jp/')) {
          tp.template.show({templateId: 'OT30ZZ65STZX'});
        } else {
          tp.template.show({templateId: 'OTNDPQ6GHZV7'});
        }
        // console.log("閉じた!");
      }
    });
  }
]);