<style>.cta-nav__item .subscribe-gm { background-color: #000; }
  .cta-nav__item .subscribe-gm:visited { color: #FFF; }
  .cta-nav__item .account-gm {font-size: 13px;line-height: 21px;}
  .cta-nav__item a.account-gm {padding: 1px 0;}

  @media screen and (max-width: 768px) {

  }
</style>
  <div class="cta-nav">
    <div class="cta-nav__list">

      <div class="js-PianoLoginBlock" style="display: none; width: 100%;">
        <div style="display: flex;">
          <li class="cta-nav__item">
            <button class="account-gm js-PianoAuthRegisterBtn">会員登録<i class="fas fa-address-card"></i>
            </button>
          </li>
          <li class="cta-nav__item">
            <button type="button" class="js-PianoLoginBtn account-gm">ログイン<i class="fas fa-sign-in-alt"></i></button>
          </li>
          <li class="cta-nav__item">
            <button class="js-PianoLoginBtn subscribe-gm" >
              読み放題
              <i class="fas fa-book"></i>
            </button>
          </li>
        </div>
      </div>

      <div class="js-PianoAccountBlock" style="display: none; width: 100%;">
        <div style="display: flex;">
          <li class="cta-nav__item">
            <a href="/my-account" class="account-gm">マイページ<i class="far fa-user-circle"></i></a>
          </li>
          <?php /* Piano & リブラの時のURL https://backnumber.guitarmagazine.jp/ */ ?>
          <li class="cta-nav__item">
            <a href="https://guitarmagazine-test.sae.logosware.net" class="subscribe-gm" target="_blank" rel="noopener noreferrer">
              読み放題
              <i class="fas fa-book"></i>
            </a>
          </li>
        </div>
      </div>
    </div>
  </div>