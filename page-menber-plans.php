<?php
/*
 Template Name: member-plans

 *
 * This is your custom page template. You can create as many of these as you need.
 * Simply name is "page-whatever.php" and in add the "Template Name" title at the
 * top, the same way it is here.
 *
 * When you create your page, you can just select the template and viola, you have
 * a custom page template to call your very own. Your mother would be so proud.
 *
 * For more info: http://codex.wordpress.org/Page_Templates
*/
?>

<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

						<main id="main" class="m-all cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<header class="article-header">

									<h1 class="page-title"><?php the_title(); ?></h1>

								</header>

								<section class="entry-content cf" itemprop="articleBody">

									<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/parts/piano/style/register-lp-style.css">

									<section class="piano-register__lp-block">
									<div >

 									 <div>
												<h2 class="is-style-black-title-big">ギタマガ・メンバーズ（無料）</h2>
											    <div>
													<p>「ギタマガ・メンバーズ」とはギター・マガジンのWEB会員サービスです。メンバーズになると、会員限定のメルマガやお知らせが届きます。また、メンバーズ限定のコンテンツや限定クーポンなども準備中なのでお楽しみに！</p>
												  <p>
												  <ol>
												    <li><strong id="docs-internal-guid-5d09f3cd-7fff-52ee-5dc2-dead6e38f217">ギタマガWEB画面右上の「GM会員ログイン」ボタン、もしくは下の「無料会員プランを登録する！」をクリック</strong></li>
															  <li><strong id="docs-internal-guid-1cfc9c17-7fff-d5e4-6abc-9879e0006f88">ログイン画面下部の「アカウント新規登録」をクリック</strong></li>
															  <li><strong id="docs-internal-guid-004625fe-7fff-f09b-a576-092e253e1a05">必要情報を記入。登録アドレスにメールを送信</strong></li>
															  <li><strong id="docs-internal-guid-1f2a8d99-7fff-0bbe-047e-f0a1d0672501">登録アドレスに確認メールが届く</strong></li>
															  <li><strong id="docs-internal-guid-1f2a8d99-7fff-0bbe-047e-f0a1d0672501">登録画面に確認用コードを入力したら登録完了</strong></li>
													</ol>
													</p>
													<div align="center">
											<!-- wp:buttons {"className":"is-style-outline js-PianoLoginBtn"} -->
											<div class="wp-block-buttons is-style-outline js-PianoLoginBtn"></div>
											<!-- wp:button {"className":"is-style-outline js-PianoRegisterBtn"} -->
											<div class="wp-block-button is-style-outline js-PianoRegisterBtn"><a class="wp-block-button__link has-background">ギタマガ・メンバーズ（無料）に登録する！</a></div>
												</div>
											
										  <div class="piano-register__lp-main">
<!--
												<div class="piano-register__lp-main-inner">
													<h2>ギター・マガジンWEBの会員サービスについて</h2>

													<?php /*
														3プラン全表示 <div id="piano-plans" class="piano-register__lp-main-box"></div>
														無料プランだけ <div id="piano-plan-free" class="piano-register__lp-main-box"></div>
														読み放題だけ <div id="piano-plan-month" class="piano-register__lp-main-box"></div>
														＋定期購読だけ <div id="piano-plan-year" class="piano-register__lp-main-box"></div>
													*/ ?>

												  <div id="piano-plan-free" class="piano-register__lp-main-box"></div>

													<?php /*
													<p>ギター・マガジンWEBの「ウェブでギタマガ読み放題」プランは、月額制のサブスクリプション。創刊号である1980年12月をはじめ、もう手に入れることのできない貴重なギタマガのバックナンバーを43年分、全て読むことができるWEBサービスです。
													</p>

													<article class="piano-register__lp-card">
														<header class="piano-register__lp-card-header">
															<h2 class="piano-register__lp-card-title">
																ギタマガ・メンバーズ
															</h2>
														</header>

														<div class="piano-register__lp-body">
															<p class="piano-register__lp-price">
																￥ 0 <span> 会費無料</span>
															</p>
															<p class="piano-register__lp-detail">
																ギタマガ・メンバーズの特典いろいろ！<br>
																<br>
																■ 会員限定のコンテンツが視聴可能！<br>
																■ 不定期でお得なクーポン発行！<br>
																■ ギタマガのメルマガが毎週届く！
															</p>

															<button class="js-PianoRegisterBtn piano-register__lp-button">
																無料会員登録
															</button>

														</div>
													</article>

													<article class="piano-register__lp-card">
														<header class="piano-register__lp-card-header">
															<h2 class="piano-register__lp-card-title">
																ウェブでギタマガ読み放題
															</h2>
														</header>

														<div class="piano-register__lp-body">
															<p class="piano-register__lp-price">
																￥ 590 <span> (税込) 1ヶ月 </span>
															</p>
															<p class="piano-register__lp-detail">
																■ 月額¥590円（＋税10%）<br>
																■ ギター・マガジンWEBでバックナンバーが読み放題！<br>
																■ 創刊号の1980年12月から最新号までラインナップ！<br>
																■ 最新号は発売日に更新されるので、すぐに読める！
															</p>

															<button class="js-PianoRegisterBtn piano-register__lp-button">
																￥ 590 <span> (税込)/ 1ヶ月 </span>
															</button>

														</div>
													</article>

													<article class="piano-register__lp-card">
														<header class="piano-register__lp-card-header">
															<h2 class="piano-register__lp-card-title">
																WEB読み放題<br>
																＋ギタマガ本誌の年間購読
															</h2>
														</header>

														<div class="piano-register__lp-body">
															<p class="piano-register__lp-price">
																￥ 15,460<span> (税込) 1年 </span>
															</p>
															<p class="piano-register__lp-detail">
																■ 年間¥15,460円（＋税10%）<br>
																■ WEBでギタマガ読み放題（1年間）＋ギター・マガジン本誌（雑誌版）の年間購読がセットになったお得なプラン！<br>
																■ 登録月から１年間、毎月ギター・マガジン本誌（雑誌版）がお手元に届きます！
															</p>

															<button class="js-PianoRegisterBtn piano-register__lp-button">
																￥ 15,460<span> (税込)/ 1年 </span>
															</button>

														</div>
													</article>
												*/ ?>
											</div>
											  
											<div class="piano-register__lp-main">
-->
											
											  
									  <div >
                                              <h2 id="faq" class="is-style-black-title-big">よくある質問</h2>

										    <table style="border-spacing:0;	margin-top: 5px;margin-bottom: 25px; border: none;">
											  <tbody>
												<tr style="border: none;">
												  <td colspan="3"><h3><strong id="docs-internal-guid-a9a3c73b-7fff-d4b4-1036-09f4c9ec3f96">●サービス全般について</strong></h3></td>
												</tr>
												<tr style="border: none;">
												  <td colspan="3"><strong>「ギタマガ・メンバーズ（無料）」に登録すると、どのようなサービスが受けられますか？</strong></td>
											    </tr>
												<tr style="border: none;">
												  <td width="18" align="center" style="border: none;">&nbsp;</td>
												  <td colspan="2">ギタマガ・メンバーズ限定のメール・マガジン、ギタマガ編集部からのお知らせメールの受信ができます。今後はメンバーズ限定のコンテンツや限定クーポンなども予定しています。</td>
											    </tr>
												<tr style="border: none;">
												  <td colspan="3" style="border: none;"><strong>機種変更をした際に、登録内容は引き継ぎできますか？</strong></td>
												</tr>
												<tr style="border: none;">
												  <td width="18" align="center" style="border: none;">&nbsp;</td>
												  <td colspan="2">登録済みのアカウント（メール・アドレスとパスワード）にてログインしていただくことで、同じアカウントを継続してご利用いただけます。</td>
												</tr>
												<tr>
												  <td colspan="3"><strong>コンテンツの二次利用について</strong></td>
												</tr>
												<tr style="border: none;">
												  <td width="18" align="center" style="border: none;">&nbsp;</td>
												  <td colspan="2">コンテンツの二次利用については禁止しております。その他の禁止事項については、<a href="/term/#8" target="_blank"><u>利用規約・第8条</u></a>をご参照ください。</td>
												</tr>
											  </tbody>
											</table>
												<!-- <p><div align="right"><a href="#"><h6>▲ページトップへ戻る</h6></a></div></p> -->
										    <table style="border-spacing:0;	margin-top: 5px;margin-bottom: 25px; border: none;">
										      <tbody>
										        <tr style="border: none;">
										          <td colspan="3"><h3>●ログイン・アカウント情報の変更</h3></td>
									            </tr>
										        <tr style="border: none;">
										          <td colspan="3"><strong>登録情報を変更するにはどうしたらいいですか？</strong></td>
									            </tr>
										        <tr style="border: none;">
												  <td width="18" align="center" style="border: none;">&nbsp;</td>
										          <td colspan="2"><ol>
										            <li>ログイン後、本サイト画面右上の「マイページ」ボタンをクリックし、マイページにアクセス</li>
										            <li>マイページ内の横スクロールのメニューから「プロフィール」タブをクリック</li>
										            <li>登録情報を変更のうえ、「変更を保存」をクリックすると変更が反映されます</li>
									              </ol></td>
									            </tr>
										        <tr style="border: none;">
										          <td colspan="3"><strong>登録したパスワードを忘れました。</strong></td>
									            </tr>
										        <tr style="border: none;">
												  <td width="18" align="center" style="border: none;">&nbsp;</td>
										          <td colspan="2"><p>パスワードをお忘れの場合は、下記の手順でパスワード再設定を行なってください。</p>
										            <ol>
										              <li>ログイン・ボタン下部の「パスワードを忘れた場合」をクリック</li>
										              <li>ギタマガ・メンバーズに登録したメール・アドレスを入力し「パスワードの再設定」をクリック</li>
										              <li>入力したメール・アドレス宛にパスワードリセット用のメールが届くので、本文に記載されているURLにアクセスのうえ、新しいパスワードを入力して「パスワードの保存」をクリックしてください</li>
							                      </ol></td>
									            </tr>
										        <tr style="border: none;">
										          <td colspan="3"><strong>新規アカウント登録の際に「このメール・アドレスはすでに使用されています」と表示されてログインできません。</strong></td>
									            </tr style="border: none;">
										        <tr style="border: none;">
												  <td width="18" align="center" style="border: none;">&nbsp;</td>
										          <td colspan="2"><p>既に登録済みのメール・アドレスです。この場合は、新規登録ではなく、以下手順にてログインを行なってください。<br>
										            ※パスワードが不明の場合は、「Q.登録したパスワードを忘れました。」を参照ください。</p>
										            <ol>
										              <li>ログイン・ボタン下部の「パスワードを忘れた場合」をクリック</li>
										              <li>ギタマガ・メンバーズに登録したメール・アドレスを入力し「パスワードの再設定」をクリック</li>
										              <li>入力したメール・アドレス宛にパスワードリセット用のメールが届くので、本文に記載されているURLにアクセスのうえ、新しいパスワードを入力して「パスワードの保存」をクリックしてください</li>
									                </ol>
										            <p>※ご登録のメール・アドレスをお忘れの場合、「Q.登録したパスワードを忘れました。」の手順からメール・アドレスを入力し、「パスワードの再設定」をクリックすると、メール・アドレスが誤っている場合は「指定されたメール・アドレスを持つユーザーが見つかりません」と表示されます。</p>
										            <p>※メール・アドレスが合っている場合はそのままパスワードを再設定メールが送信がされますので、入力したメール・アドレスが正しいものとなります。なお送信されたメールからそのままパスワード再設定を進めると、パスワード再設定が実行されますのでご注意ください。</p></td>
									            </tr>
										        <tr style="border: none;">
										          <td colspan="3"><strong> メール・アドレスの変更方法を教えてください。</strong></td>
									            </tr>
										        <tr style="border: none;">
												  <td width="18" align="center" style="border: none;">&nbsp;</td>
										          <td colspan="2"><p> メール・アドレスの変更は「マイページ」から行なえます。</p>
										            <ol>
										              <li>本サイトの画面をWebブラウザで開く</li>
										              <li>画面右上の「GM会員ログイン」ボタンをクリック</li>
										              <li>ログイン画面が立ち上がったら、メール・アドレスとパスワードを入力し「ログイン」ボタンをクリック</li>
										              <li>画面右上の「マイページ」ボタンをクリックし、マイページにアクセス</li>
										              <li>マイページ内の横スクロールのメニューから「プロフィール」タブをクリック</li>
										              <li>「プロフィール」タブをクリック</li>
										              <li> 「メール」に変更したいメール・アドレスを記入し「変更を保存」ボタンをクリック</li>
										              <li>同じ画面にて変更されたことを確認して完了</li>
										            </ol></td>
									            </tr>
										        <tr style="border: none;">
										          <td colspan="3"><strong> 退会について</strong></td>
									            </tr>
										        <tr style="border: none;">
												  <td width="18" align="center" style="border: none;">&nbsp;</td>
										          <td colspan="2">アカウントの削除をご希望の場合は、当サイトのページ下部にある「<a href="https://docs.google.com/forms/d/e/1FAIpQLSdzKhvZgsLC0gp3RElYnNIwsu1dLKOdAtwGOY2oyD3EHyS1sw/viewform?gxids=7628" target="_blank">お問い合せ</a>」よりお申し込みください。</td>
									            </tr>
									          </tbody>
									        </table>
											</div>
										    <p><div align="right"><a href="#"><h6>▲ページトップへ戻る</h6></a></div></p>
											</div>
											</div>
										</div>
									</section>
									<p style="text-align: center;"><a href="/law/">特定商取引に関する表示</a>はこちら</p>

									<?php
										// the content (pretty self explanatory huh)
										the_content();

										/*
										 * Link Pages is used in case you have posts that are set to break into
										 * multiple pages. You can remove this if you don't plan on doing that.
										 *
										 * Also, breaking content up into multiple pages is a horrible experience,
										 * so don't do it. While there are SOME edge cases where this is useful, it's
										 * mostly used for people to get more ad views. It's up to you but if you want
										 * to do it, you're wrong and I hate you. (Ok, I still love you but just not as much)
										 *
										 * http://gizmodo.com/5841121/google-wants-to-help-you-avoid-stupid-annoying-multiple-page-articles
										 *
										*/
										wp_link_pages( array(
											'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'bonestheme' ) . '</span>',
											'after'       => '</div>',
											'link_before' => '<span>',
											'link_after'  => '</span>',
										) );
									?>
								</section>


								<footer class="article-footer">

                  <?php the_tags( '<p class="tags"><span class="tags-title">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '</p>' ); ?>

								</footer>

								<?php comments_template(); ?>

							</article>

							<?php endwhile; else : ?>

									<article id="post-not-found" class="hentry cf">
											<header class="article-header">
												<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
											<section class="entry-content">
												<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the page-custom.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</main>

				</div>

			</div>


<?php get_footer(); ?>
