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
								}

								@media screen and (max-width: 768px) {
									.header a.subscribe-gm:visited {
										color: #FFF;
									}
								}
							</style>

							<div id="piano-login-container" class="piano-login-container">
								<span class="js-PianoLoginBlock" style="display:none;">
								<?php /*
									<button id="js-PianoLoginBtn" class="js-PianoLoginBtn">
										<span class="hidden-769-1099">GM会員ログイン</span><i class="fas fa-sign-in-alt"></i>
									</button>
									*/ ?>
									<a id="js-PianoLoginBtn" class="js-PianoLoginBtn" href="/login/">
										<span class="hidden-769-1099">GM会員ログイン</span><i class="fas fa-sign-in-alt"></i>
									</a>
								</span>

								<span class="js-PianoAccountBlock" style="display:none;">
									<a href="/my-account"><span class="hidden-769-1099">マイページ</span><i class="far fa-user-circle fa-lg"></i></a>
								</span>
							</div>

							<?php /* 有料プランのため一旦 コメントアウト */ ?>
							<a href="https://backnumber.guitarmagazine.jp/" class="subscribe-gm"  target="_blank" rel="noopener noreferrer">
								<span class="hidden-769-1099">ギタマガ読み放題</span><i class="fas fa-book"></i>
							</a>