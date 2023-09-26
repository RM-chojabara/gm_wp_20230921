
/**
 * ピアノ初期設定
*/


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