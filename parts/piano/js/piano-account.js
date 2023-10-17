
/**
 * ピアノ初期設定
*/

tp = window["tp"] || [];

// アンケート表示
tp.push([
  "init",
  async function () {
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
      if (!e.data || typeof e.data != "string") return

      try {
        const eventData = JSON.parse(e.data);
        // console.log(eventData.event);

        if (eventData.event === "loginSuccess"
          || eventData.event === "registrationSuccess"
          || eventData.event === "closed") {
          if (tp.user.isUserValid()) {
            document.querySelectorAll('.js-PianoLoginBlock')
            .forEach(el => el.style.display = "none");
            document.querySelectorAll('.js-PianoAccountBlock')
            .forEach(el => el.style.display = "block");;
          }
        }

        // 完了画面の表示
        // if (eventData.event === "profileUpdated") {
        //   // alert('更新 2');
          // if (location.href.includes('https://st.guitarmagazine.jp/')) {
          //   tp.template.show({ templateId: 'OT30ZZ65STZX' });

          // } else if (location.href.includes('https://gm-st-new')) {
          //   tp.template.show({ templateId: 'OTSEFT69FVTJ' });

          // } else {
          //   tp.template.show({templateId: 'OTNDPQ6GHZV7'});
          // }
        //   // console.log("閉じた!");
        // }
      } catch (error) {
        console.error("Invalid JSON format:", e.data);
        return;
      }
    });

    const loginButtons = document.querySelectorAll(`.js-PianoLoginBtn`);
    const logoutButtons = document.querySelectorAll(`.js-PianoLogoutBtn`);
    const registerButtons = document.querySelectorAll(`.js-PianoRegisterBtn`);
    // console.log(loginButtons, logoutButtons, registerButtons, loginBlock, accountBlock);

    const auth0Client = await auth0.createAuth0Client({
      domain: "login-stg.rittor-music.co.jp",
      clientId: "BWX1WsaIQ5O5woKxIIfeQZFqO6YDRUil",
    });
    console.log('DOM after auth0Client');

    const loginBlock = document.querySelectorAll('.js-PianoLoginBlock');
    const accountBlock = document.querySelectorAll('.js-PianoAccountBlock');

    if (tp.user.isUserValid()) {
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
      if (e.currentTarget.dataset.id == "auth") {
        console.log('auth0 logout');
        auth0Client.logout();
      }
      tp.pianoId.logout(function () {
        console.log('piano logout');
        location.href = "/"
      });
    }));

    /**
     * 登録処理
     */
    registerButtons.forEach(el => el.addEventListener('click', (e) => {
      e.preventDefault();

      if (tp.user.isUserValid()) {
        alert('既に登録ずみです');
      } else {
        auth0Client.loginWithRedirect({
          authorizationParams: {
            redirect_uri: loginURL
          }
        });
      }
    }));
  }
]);


// タグの判定
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