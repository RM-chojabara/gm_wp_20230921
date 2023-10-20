							<style>
								.header .subscribe-gm, .header .piano-login-container button, .header .piano-login-container a {
										color: #fff;
										font-weight: 700;
										white-space: nowrap;
										line-height: 1.5;
								}

								.header .piano-login-container button, .header .piano-login-container a {
										padding: 0.3em 0.9rem;
										border: 1px solid #fff;
										background-color: rgba(0,0,0,0);
										font-weight: bold;
										border: none;
										font-size: 14.22px;
										-webkit-transition: opacity .24s ease-in-out;
										-o-transition: opacity .24s ease-in-out;
										transition: opacity .24s ease-in-out;
										text-align: center;
										display: -webkit-box;
										display: -ms-flexbox;
										display: flex;
										-webkit-box-pack: center;
										-ms-flex-pack: center;
										justify-content: center;
										-webkit-box-align: center;
										-ms-flex-align: center;
										align-items: center;
										width: 100%;
								}
								.header .subscribe-gm i, .header .piano-login-container button i, .header .piano-login-container a i {
										color: #fff;
										display: inline-block;
										margin-left: 0.5rem;
								}
								.header .subscribe-gm {
									background-color: #000;
								}
								.header a.subscribe-gm:visited {
									color: #FFF;
								}
								.header a.subscribe-gm:hover {
									color: #000;
								}

								.header .piano-login-container-wrap,
								.header .piano-login-container__flex {
									display: flex;
								}

								@media screen and (max-width: 769px) {
									.header .piano-login-container {
											border: none;
									}
									.header .piano-login-container::before {
										content: "";
										position: absolute;
										width: 1px;
										height: 100%;
										background-color: rgba(255,255,255,.12);
										left: -1rem;
										top: 0;
									}
									.header .piano-login-container button, .header .piano-login-container a {
											display: inline-block;
											padding: 1rem 0;
											text-align: left;
									}

									.header .piano-login-container-wrap,
									.header .piano-login-container__flex {
										display: block;
									}
								}

								@media screen and (max-width: 768px) {
									.header a.subscribe-gm:visited {
										color: #FFF;
									}

									.header .wrap nav { margin-top: 4rem; }
								}
							</style>

							<div class="js-PianoLoginBlock" style="display:none;">
								<div class="piano-login-container-wrap">
									<div id="piano-login-container" class="piano-login-container piano-login-container__flex">
										<span>
											<button class="js-PianoAuthRegisterBtn">
												<span class="hidden-769-1099">会員登録</span><i class="fas fa-address-card"></i>
											</button>
										</span>

										<span>
											<button id="js-PianoLoginBtn" class="js-PianoLoginBtn">
												<span class="hidden-769-1099">ログイン</span><i class="fas fa-sign-in-alt"></i>
											</button>
										</span>
									</div>

									<a href="javascript:void(0);" class="js-PianoLoginBtn subscribe-gm">
										<span class="hidden-769-1099">読み放題</span><i class="fas fa-book"></i>
									</a>
								</div>
							</div>


							<div class="js-PianoAccountBlock" style="display:none;">
								<div class="piano-login-container-wrap">
									<div id="piano-login-container" class="piano-login-container">
										<span>
											<a href="/my-account"><span class="hidden-769-1099">マイページ</span><i class="far fa-user-circle fa-lg"></i></a>
										</span>
									</div>

									<?php /* Piano & リブラの時のURL https://backnumber.guitarmagazine.jp/ */ ?>
									<a href="https://guitarmagazine-test.sae.logosware.net" class="subscribe-gm"  target="_blank" rel="noopener noreferrer">
										<span class="hidden-769-1099">読み放題</span><i class="fas fa-book"></i>
									</a>
								</div>
							</div>