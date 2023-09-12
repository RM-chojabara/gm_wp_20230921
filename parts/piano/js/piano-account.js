
/**
 * ピアノ初期設定
*/


//タグをPianoに送信
// tp.push(["setTags", contents]);
// tp.push(["setTags", ["article", "subscribers_only"]]);

window.tpAccount = window.tpAccount || {};

// elements
tpAccount = {
  loginBlocks: document.querySelectorAll('.js-PianoLoginBlock'),
  accountBlocks: document.querySelectorAll('.js-PianoAccountBlock'),
  btns: {
    login: document.querySelectorAll(`.js-PianoLoginBtn`),
    logout: document.querySelectorAll(`.js-PianoLogoutBtn`),
    register: document.querySelectorAll(`.js-PianoRegisterBtn`),
  }
}

// 関数
tpAccount.styleSwitch = function (target, flg = true) {
  target.style.display = flg ? "block" : "none";
};

/**
 * ログイン中、マイページボタンを表示
*/
tpAccount.accountBlockShow = function () {
  this.accountBlocks.forEach(el => this.styleSwitch(el));
  this.loginBlocks.forEach(el => this.styleSwitch(el, false));
}

/**
 * 未ログイン中、ログインボタンを表示
*/
tpAccount.loginBlockShow = function () {
  this.accountBlocks.forEach(el => this.styleSwitch(el, false));
  this.loginBlocks.forEach(el => this.styleSwitch(el));
}

// 各ボタンのイベント処理関数
tpAccount.btnsAction = function (btns, action) {
  if (btns.length == 0 || btns == null) return;
  btns.forEach(btn => btn.addEventListener('click', action));
}


tp.push([
  'init',
  function () {
    tp.experience.init();

    // header表示ボタンの切り替え
    const accountBtnsSwitch = function () {
      (tp.user.isUserValid())
      ? tpAccount.accountBlockShow() //ログイン中
      : tpAccount.loginBlockShow(); //未ログイン
    }
    accountBtnsSwitch(); // 読み込まれた時にボタンの表示を切り替える

    // ログアウト処理
    const logoutAction = (function () {
      const callBack = tp.pianoId.logout.bind(null, () => {
        accountBtnsSwitch();
        location.href = '/';
      });

      tpAccount.btnsAction(tpAccount.btns.logout, callBack);
    })();

    // ログイン処理
    const loginAction = (function () {
      tpAccount.btnsAction(tpAccount.btns.login, () => {
        tp.pianoId.show({ screen: "login", loggedIn: accountBtnsSwitch()});
      })
    })();

    // 新規登録処理
    const registerAction = (function () {
      tpAccount.btnsAction(tpAccount.btns.register, () => {
        tp.pianoId.show({ screen: "register", loggedIn: accountBtnsSwitch() });
      });
    })();
  }
]);


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

      // アンケートフォームの表示
      // registrationSuccess
      // loginSuccess
      // if (eventData.event === "successDOI" || eventData.event === "startCheckout") {
      //   console.log('Display Show');

      //   if (tp.user.isUserValid()) { // ログイン済みかどうか
      //     // アンケート表示コールバック お気に入りデータがなければアンケート表示
      //     const callBack = function (data) {
      //       let flg = false;

      //       for (var i in data.custom_field_values) {
      //         var fieldName = data.custom_field_values[i].field_name;
      //         var fieldValue = data.custom_field_values[i].value;

      //         if (fieldName == 'favorite_brand1') {
      //           if (!fieldValue) fieldValue = [];
      //           if (fieldValue || fieldValue.length > 0) flg = true;
      //         }
      //       }

      //       if (!flg) return tp.pianoId.showForm({ formName: 'initialForm' });
      //     }

      //     tp.pianoId.loadExtendedUser({
      //       extendedUserLoaded: function(data) { callBack(data)},
      //       formName: 'initialForm'
      //     });
      //   }
      // }

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