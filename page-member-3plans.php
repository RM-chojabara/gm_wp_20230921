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
												<h2 class="is-style-black-title-big" style="margin-top:50px">ギタマガ・メンバーズ（無料）</h2>
											    <div>
													<p>「ギタマガ・メンバーズ」とはギター・マガジンのWEB会員サービスです。メンバーズになると、会員限定のメルマガやお知らせが届きます。また、メンバーズ限定のコンテンツや限定クーポンなども準備中なのでお楽しみに！												  </p>
												<h3 style="background-color: #f0f8ff;">「ギタマガ・メンバーズ」の登録方法</h3>
										 		<div style="margin:0px 0px 0px 20px;">
												  <ol>
												    <li>ギタマガWEBで画面上部の「GM会員ログイン」ボタン、<br>
											        もしくは下の「ギタマガ・メンバーズ（無料）に登録する！」ボタンをクリック</li>
												  <li>ログイン画面エリア下部の「アカウント新規登録」をクリック</li>
												  <li>プロセスに従い必要情報を記入。登録アドレスに認証コードを送信（画面は閉じない）</li>
												  <li>登録アドレスに認証コードが届く</li>
												  <li>登録画面に確認用コードを入力したらメンバー基本登録完了</li>
												  <li>続けてアンケートに回答（スキップ可／マイページより変更可）</li>
												  <li>「登録ありがとうございます」が表示されて完了</li>
												  </ol>
												  <div align="center">
													<!-- wp:buttons {"className":"is-style-outline js-PianoLoginBtn"} -->
													<div class="wp-block-buttons is-style-outline js-PianoLoginBtn"></div>
													<!-- wp:button {"className":"is-style-outline js-PianoRegisterBtn"} -->
													<div class="wp-block-button is-style-outline js-PianoRegisterBtn"><a class="wp-block-button__link has-background">ギタマガ・メンバーズ（無料）に登録する！</a></div>
												</div>
										</div>
										<p><div align="right"><a href="#"><h6>▲ページトップへ戻る</h6></a></div></p>
									  <div id="plan02"></div>

									<h2 class="is-style-black-title-big" style="margin-top:50px;">WEBでギタマガ読み放題（¥649/月）</h2>
											    <div>
												  <p>「WEBでギタマガ読み放題（¥649/月）」とはギター・マガジンのWEBの月額制サブスクリプション・サービスです。月額649円（税込）で、ギター・マガジンのバックナンバーをWEBブラウザ上で読むことができます。また、同サービスに登録すると、自動的にギタマガ・メンバーズ（無料）にも登録したことになるので、メンバーズ限定のメルマガやお知らせが届きます。サービスに関する<a href="#faq"><u>FAQを参照する</u></a></p>
										  <h3 style="background-color: #f0f8ff;">「WEBでギタマガ読み放題（¥649）」の初回購入方法</h3>
										  <div style="margin:0px 0px 0px 20px;">
												  <strong>■方法その１：ギタマガWEBで画面上部の「ギタマガ読み放題」ボタンから</strong>
												  <ol>
												    <li>ギタマガWEBで、画面上部の「ギタマガ読み放題」ボタンをクリック</li>
                                                    <li>ログイン・パネル下部の「WEBでギタマガ読み放題（¥649）に新規登録する！」をクリック</li>
                                                    <li>プロセスに従い必要情報を記入。登録アドレスに認証コードを送信（画面は閉じない）</li>
                                                    <li>登録アドレスに認証コードが届く</li>
                                                    <li>３の登録画面に確認用コードを入力</li>
                                                    <li>続けて支払い情報（クレジットカード／デビットカード）を入力</li>
                                                    <li>購入内容の最終確認を行い、「購入」ボタンにより確定</li>
                                                    <li>「購入ありがとうございます」のメッセージが表示される</li>
                                                    <li>「ギタマガ読み放題」ボタンを押してプランへのログイン画面へ</li>
                                                    <li>３の登録情報にて再度ログインすると「ギタマガ読み放題ページ」の本棚が表示されると完了</li>
                                                  </ol>
											  <div></div>
												  <p><strong>■方法その2：下の「WEBでギタマガ読み放題（¥649）に新規登録する！」ボタンから</strong></p>
											<div>
													<!-- wp:buttons {"className":"is-style-outline js-PianoLoginBtn"} -->
													<!-- <div class="wp-block-buttons aligncenter is-style-outline" id="js-canRead"></div>-->
													<!-- wp:button {"className":"is-style-outline js-PianoRegisterBtn"} -->
													<div class="wp-block-button is-style-outline js-PianoRegisterBtn" id="js-canRead" align="center">
													<a class="wp-block-button__link" href="https://backnumber.guitarmagazine.jp/#/home" target="_blank"><strong>WEBでギタマガ読み放題へ</strong></a></div>
												</div>
                                                  <ol>
                                                    <li>「WEBでギタマガ読み放題（¥649）に新規登録する！」ボタンをクリック<!--<br><span  style="font-size: 0.9em; color:#ff0000;">※すでにプラン申し込み済みでログインしている場合、「WEBでギタマガ読み放題へ」ボタンが表示されます。</span><br>--></li>
                                                    <li>プロセスに従い必要情報を記入。登録アドレスに認証コードを送信（画面は閉じない）</li>
                                                    <li>登録アドレスに認証コードが届く</li>
                                                    <li>３の登録画面に確認用コードを入力</li>
                                                    <li>続けて支払い情報（クレジットカード／デビットカード）を入力</li>
                                                    <li>購入内容の最終確認を行い、「購入」ボタンにより確定</li>
                                                    <li>「購入ありがとうございます」のメッセージが表示される</li>
                                                    <li>「ギタマガ読み放題」ボタンを押してプランへのログイン画面へ</li>
                                                    <li>３の登録情報にて再度ログインすると「ギタマガ読み放題ページ」の本棚が表示されると完了</li>
                                                  </ol>
													</p>
											</div>
										<p><div align="right"><a href="#"><h6>▲ページトップへ戻る</h6></a></div></p>
									  <div ></div>

											<h2 class="is-style-black-title-big" style="margin-top:50px">WEBで1年ギタマガ読み放題 ＋ ギター・マガジン本誌定期購読(¥17,006)</h2>
											    <div>
												  <p>「WEBで1年ギタマガ読み放題 ＋ ギター・マガジン本誌定期購読(¥17,006)」は、「WEBでギタマガ読み放題」の一年間と、雑誌ギター・マガジンの一年間定期購読がセットになったサービスです。ご登録頂くと、年間定額17,006円（税込）でギター・マガジンのバックナンバーをWEBブラウザ上で読むことができるのと、雑誌ギター・マガジンの最新号が毎月お手元に届きます。また、同サービスに登録すると、自動的にギタマガ・メンバーズ（無料）にも登録したことになるので、メンバーズ限定のメルマガやお知らせが届きます。</p>
										  <h3 style="background-color: #f0f8ff;">「WEBで1年ギタマガ読み放題 ＋ ギター・マガジン本誌定期購読(¥17,006)」の初回購入方法</h3>
											<div style="margin:0px 0px 0px 20px;">
                                                  <ol>
                                                    <li>説明文下の「WEBで1年ギタマガ読み放題 ＋ ギター・マガジン本誌定期購読(¥17,006)」ボタンをクリック<!--<br><span  style="font-size: 0.9em; color:#ff0000;">※すでにプラン申し込み済みでログインしている場合、「WEBでギタマガ読み放題へ」ボタンが表示されます。</span><br>--></li>
                                                    <li>プロセスに従い必要情報を記入。登録アドレスに認証コードを送信（画面は閉じない）</li>
                                                    <li>登録アドレスに認証コードが届く</li>
                                                    <li>３の登録画面に確認用コードを入力</li>
                                                    <li>続けて、送付先情報（宛名・住所・電話）を入力</li>
                                                    <li>支払い情報（クレジットカード／デビットカード）を入力</li>
                                                    <li>購入内容の最終確認を行い、「購入」ボタンにより確定</li>
                                                    <li>「購入ありがとうございます」のメッセージが表示される</li>
                                                    <li>「ギタマガ読み放題」ボタンを押してプランへのログイン画面へ</li>
                                                    <li>３の登録情報にて再度ログインすると「ギタマガ読み放題ページ」の本棚が表示されると完了<br>
※雑誌の年間購読に関しての情報は別途メールにてお知らせします。<br>
                                                    </li>
                                                  </ol>
													</p>
											</div>
													</p>
													<div align="center">
													<!-- wp:buttons {"className":"is-style-outline js-PianoLoginBtn"} -->
													<!-- <div class="wp-block-buttons aligncenter is-style-outline" id="js-canRead"></div>-->
													<!-- wp:button {"className":"is-style-outline js-PianoRegisterBtn"} -->
													<div class="wp-block-button is-style-outline js-PianoRegisterBtn" id="js-subscribers">
													<a class="wp-block-button__link" href="https://backnumber.guitarmagazine.jp/#/home" target="_blank"><strong>WEBでギタマガ読み放題へ</strong></a></div>
													<!-- <div id="piano-plan-month" class="piano-register__lp-main-box"></div>-->

												</div>
										 
<!--
										  <div class="piano-register__lp-main">

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
											
									
										 <div style="margin-top:50px;" id="js-subscribers"></div>
										 <div style="margin-top:50px;" id="piano-plans"></div>
-->																							
										<p><div align="right"><a href="#"><h6>▲ページトップへ戻る</h6></a></div></p> 
									  <div ></div>
								 <h2 id="faq" class="is-style-black-title-big">よくある質問</h2>
										<div>
										<div class="wp-block-buttons aligncenter">
										<div class="wp-block-button is-style-outline" style="background-color: #f0f8ff;"><a href="#faq-1">サービス全般について</a></div>
										<div class="wp-block-button is-style-outline" style="background-color: #f0f8ff;"><a href="#faq-2">請求・支払いについて</a></div>
										<div class="wp-block-button is-style-outline" style="background-color: #f0f8ff;"><a href="#faq-3">ログイン・アカウント情報の変更</a></div>
										<div class="wp-block-button is-style-outline" style="background-color: #f0f8ff;"><a href="#faq-4">自動更新（サブスク）について</a></div>
										<div class="wp-block-button is-style-outline" style="background-color: #f0f8ff;"><a href="#faq-5">ギタマガ読み放題について</a></div>

										</div>
									  </div>

										<table style="border-spacing:10px;	margin-top: 5px;margin-bottom: 25px; border: none;" id="faq-1">
										  <tbody>
											<tr style="border: none; margin-bottom: 20px;">
											  <td colspan="3"><h3 style="background-color: #f0f8ff;"><strong id="docs-internal-guid-a9a3c73b-7fff-d4b4-1036-09f4c9ec3f96">●サービス全般について</strong></h3></td>
											</tr>
											<tr style="border: none;">
											  <td colspan="3"><strong>Q「ギタマガ・メンバーズ（無料）」に登録すると、どのようなサービスが受けられますか？</strong></td>
											</tr>
											<tr style="border: none; ">
											  <td width="18" align="center" style="border: none; ">&nbsp;</td>
											  <td colspan="2" style="border: none; padding-bottom: 40px;">ギタマガ・メンバーズ限定のメール・マガジン、ギタマガ編集部からのお知らせメールの受信ができます。今後はメンバーズ限定のコンテンツや限定クーポンなども予定しています。</td>
											</tr>
											<tr style="border: none;">
											  <td colspan="3"><strong>Q「WEBで1年ギタマガ読み放題 ＋ ギター・マガジン本誌定期購読(¥17,006)」に登録すると、どのようなサービスが受けられますか？
</strong></td>
											</tr>
											<tr style="border: none; margin-bottom: 20px;">
											  <td width="18" align="center" style="border: none;">&nbsp;</td>
											<td colspan="2" style="border: none; padding-bottom: 40px;">WEBブラウザ上でギター・マガジンのバックナンバーを読むことができるのと、ギター・マガジンの最新号をお届けします。また、ギタマガ編集部からのお知らせメールの受信ができるほか、今後は会員限定のコンテンツや限定クーポンなども予定しています。<br>
												<p>雑誌の場合は、発売日から2営業日前を目安に発送いたします。<br>
												  毎月27日までの申し込みで翌月発売号、毎月28日以降の申し込みで翌々月発売号を送付いたします。<br>
												  <br>
												  例）<br>
												2/28～3/27のお申込み → 4月発売号（5月号）から発送開始<br>
												3/28～4/27のお申込み →5月発売号（6月号）から発送開始<br>
											    <br>
										      デジタルコンテンツの場合は、決済完了後、閲覧可能となります。<br>
										      <br>
										      自動更新を有効としている場合、購入日の翌月同日の「次回更新日」中に順次商品の購入が実行されます。</p>
												<p>また購入日が翌月に存在しない日付の場合、翌月の末日が「次回更新日」となります。<br>
											  例）<br>
											  1月31日に購入の場合、2月28日が「次回更新日」</p>
												<p><br>
											  </p>
											</td>
											</tr>
											<tr style="border: none; margin-bottom: 20px;">
											  <td colspan="3" style="border: none;"><strong>Q 途中でプランの変更は可能ですか？</strong></td>
											</tr>
											<tr style="border: none;">
											  <td width="18" align="center" style="border: none;">&nbsp;</td>
											  <td colspan="2" style="border: none; padding-bottom: 40px;">マイページよりプランのアップグレードができます。現在契約しているプランの契約終了日に、自動的にアップグレード・プランへ切り替わります。<br>※印刷版の発送は、プランが切り替わったタイミングによって異なります。詳しくは「WEBで1年ギタマガ読み放題 ＋ ギター・マガジン本誌定期購読(¥17,006)」に登録すると、どのようなサービスが受けられますか？」をご参照ください。</td>
											</tr>
											<tr style="border: none; margin-bottom: 20px;">
											  <td colspan="3" style="border: none;"><strong>Q ギター・マガジンの定期購読をしている場合、「WEBで1年ギタマガ読み放題 ＋ ギター・マガジン本誌定期購読(¥17,006)」のサービスも受けられますか？</strong></td>
											</tr>
											<tr style="border: none;">
											  <td width="18" align="center" style="border: none;">&nbsp;</td>
											  <td colspan="2" style="border: none; padding-bottom: 40px;">定期購読サービスと本サイトのサービスは異なります。「WEBで1年ギタマガ読み放題 ＋ ギター・マガジン本誌定期購読(¥17,006)」のサービスを受けるには、新たにご登録いただく必要があります。</td>
											</tr>
											<tr style="border: none; margin-bottom: 20px;">
											  <td colspan="3" style="border: none;"><strong>Q 会員限定記事やバックナンバーを別の端末で閲覧できますか？</strong></td>
											</tr>
											<tr style="border: none;">
											  <td width="18" align="center" style="border: none;">&nbsp;</td>
											  <td colspan="2" style="border: none; padding-bottom: 40px;">同じメール・アドレスとパスワードでログインしていただくことで、他の端末からもご利用いただけます。
</td>
											</tr>
											<tr>
											  <td colspan="3"><strong>Q 機種変更時に会員プランは引き継ぎできますか？</strong></td>
											</tr>
											<tr style="border: none; margin-bottom: 20px;">
											  <td width="18" align="center" style="border: none;">&nbsp;</td>
											  <td colspan="2" style="border: none; padding-bottom: 40px;">登録済みのアカウント（メール・アドレスとパスワード）にてログインしていただくことで、同じアカウントを継続してご利用いただけます。</td>
											</tr>
										  </tbody>
										</table>								
										<p><div align="right"><a href="#"><h6>▲ページトップへ戻る</h6></a></div></p>
								
										<table style="border-spacing:10px;	margin-top: 5px;margin-bottom: 25px; border: none;" id="faq-2">
										  <tbody>
											<tr style="border: none; margin-bottom: 20px;">
											  <td colspan="3"><h3 style="background-color: #f0f8ff;"><strong id="docs-internal-guid-a9a3c73b-7fff-d4b4-1036-09f4c9ec3f96">●請求・支払いについて</strong></h3></td>
											</tr>
											<tr style="border: none;">
											  <td colspan="3"><strong>Q 支払い方法は何がありますか？</strong></td>
											</tr>
											<tr style="border: none; ">
											  <td width="18" align="center" style="border: none; ">&nbsp;</td>
											  <td colspan="2" style="border: none; padding-bottom: 40px;">クレジット・カード決済のみとなります。ご利用いただけるカードは、VISA、MASTER、American Express、JCB、Dinersです。</td>
											</tr>
											<tr style="border: none;">
											  <td colspan="3"><strong>Q 領収書の発行はできますか？</strong></td>
											</tr>
											<tr style="border: none; margin-bottom: 20px;">
											  <td width="18" align="center" style="border: none;">&nbsp;</td>
											<td colspan="2" style="border: none; padding-bottom: 40px;">ご購入完了時にご登録のメール・アドレス宛に「Rittor Musicからの領収書」というタイトルで送信されます。											</td>
											</tr>
											<tr style="border: none;">
											<td colspan="3"><strong>Q 登録したクレジット・カードの情報を変更するにはどうしたらいいですか？</strong></td>
											</tr>
											<tr style="border: none; margin-bottom: 20px;">
											  <td width="18" align="center" style="border: none;">&nbsp;</td>
											<td colspan="2" style="border: none; padding-bottom: 40px;">
											<ol>
											  <li>「マイページ」にアクセスし「カード」タブをクリック</li>
											  <li>「カードを追加」をクリックし、変更したいクレジット・カードの情報を入力し、「保存」をクリック</li>
											  <li>「契約のプラン」タブをクリックし、購読中のプランの右端にある「設定」の「クレジット・3.カードの変更」をクリック</li>
											  <li> 変更したいクレジット・カードを選択し、「更新」をクリックすると変更内容が反映されます</li>
											  </ol></td>
											</tr>
										  </tbody>
										</table>								
										<p><div align="right"><a href="#"><h6>▲ページトップへ戻る</h6></a></div></p>
										
									<table style="border-spacing:0;	margin-top: 5px;margin-bottom: 25px; border: none;" id="faq-3">
										      <tbody>
										        <tr style="border: none; margin-bottom: 20px;">
										          <td colspan="3"><h3 style="background-color: #f0f8ff;">●ログイン・アカウント情報の変更</h3></td>
									            </tr>
										        <tr style="border: none;">
										          <td colspan="3"><strong>Q 登録情報を変更するにはどうしたらいいですか？</strong></td>
									            </tr>
										        <tr style="border: none; margin-bottom: 20px;">
												  <td width="18" align="center" style="border: none;">&nbsp;</td>
										          <td colspan="2" style="border: none; padding-bottom: 40px;"><ol>
										            <li>ログイン後、本サイト画面右上の「マイページ」ボタンをクリックし、マイページにアクセス</li>
										            <li>マイページ内の横スクロールのメニューから「プロフィール」タブをクリック</li>
										            <li>登録情報を変更のうえ、「変更を保存」をクリックすると変更が反映されます</li>
									              </ol></td>
									            </tr>
										        <tr style="border: none;">
										          <td colspan="3"><strong>Q 登録したパスワードを忘れました。</strong></td>
									            </tr>
										        <tr style="border: none;">
												  <td width="18" align="center" style="border: none;">&nbsp;</td>
										          <td colspan="2" style="border: none; padding-bottom: 40px;"><p>パスワードをお忘れの場合は、下記の手順でパスワード再設定を行なってください。</p>
										            <ol>
										              <li>ログイン・ボタン下部の「パスワードを忘れた場合」をクリック</li>
										              <li>ギタマガ・メンバーズに登録したメール・アドレスを入力し「パスワードの再設定」をクリック</li>
										              <li>入力したメール・アドレス宛にパスワードリセット用のメールが届くので、本文に記載されているURLにアクセスのうえ、新しいパスワードを入力して「パスワードの保存」をクリックしてください</li>
							                      </ol></td>
									            </tr>
										        <tr style="border: none;">
										          <td colspan="3"><strong>Q 新規アカウント登録の際に「このメール・アドレスはすでに使用されています」と表示されてログインできません。</strong></td>
									            </tr style="border: none;">
										        <tr style="border: none;">
												  <td width="18" align="center" style="border: none;">&nbsp;</td>
										          <td colspan="2" style="border: none; padding-bottom: 40px;"><p>既に登録済みのメール・アドレスです。この場合は、新規登録ではなく、以下手順にてログインを行なってください。<br>
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
										          <td colspan="3"><strong> Q メール・アドレスの変更方法を教えてください。</strong></td>
									            </tr>
										        <tr style="border: none;">
												  <td width="18" align="center" style="border: none;">&nbsp;</td>
										          <td colspan="2" style="border: none; padding-bottom: 40px;"><p> メール・アドレスの変更は「マイページ」から行なえます。</p>
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
										          <td colspan="3"><strong> Q 退会について</strong></td>
									            </tr>
										        <tr style="border: none;">
												  <td width="18" align="center" style="border: none;">&nbsp;</td>
										          <td colspan="2" style="border: none; padding-bottom: 40px;">アカウントの削除をご希望の場合は、当サイトのページ下部にある「<a href="https://docs.google.com/forms/d/e/1FAIpQLSdzKhvZgsLC0gp3RElYnNIwsu1dLKOdAtwGOY2oyD3EHyS1sw/viewform?gxids=7628" target="_blank">お問い合せ</a>」よりお申し込みください。</td>
									            </tr>
									          </tbody>
									        </table>
											</div>
										    <p><div align="right"><a href="#"><h6>▲ページトップへ戻る</h6></a></div></p>
											</div>

								<table style="border-spacing:0;	margin-top: 5px;margin-bottom: 25px; border: none;" id="faq-4">
										      <tbody>
										        <tr style="border: none; margin-bottom: 20px;">
										          <td colspan="3"><h3 style="background-color: #f0f8ff;">●サービスの自動更新（サブスクリプション）について </h3></td>
									            </tr>
										        <tr style="border: none;">
										          <td colspan="3"><strong>Q 自動更新日がいつか知りたい</strong></td>
									            </tr>
										        <tr style="border: none; margin-bottom: 20px;">
												  <td width="18" align="center" style="border: none;">&nbsp;</td>
										          <td colspan="2" style="border: none; padding-bottom: 40px;"><ol>
										            <li>ログイン後、本サイト画面右上の「マイページ」ボタンをクリックし、マイページにアクセス</li>
										            <li>マイページ内の横スクロールのメニューから「ご契約内容」タブをクリック</li>
										            <li>「契約中のプラン一覧」にて更新日をご確認できます</li>
									              </ol></td>
									            </tr>
										        <tr style="border: none;">
										          <td colspan="3"><strong>Q 自動更新の停止方法を教えてください。</strong></td>
									            </tr>
										        <tr style="border: none;">
												  <td width="18" align="center" style="border: none;">&nbsp;</td>
										          <td colspan="2" style="border: none; padding-bottom: 40px;"><p>自動更新停止手続きは、お客様ご自身での実施をお願いしております。※停止のお手続きは、自動更新日の前日までに行なって下さい。</p>
										            <ol>
										              <li>ログイン後、本サイト画面右上の「マイページ」ボタンをクリックし、マイページにアクセス</li>
										            <li>マイページ内の横スクロールのメニューから「ご契約内容」タブをクリック</li>
										            <li>「契約中のプラン一覧」の自動更新のボタンをOFFにしてください</li>
							                      </ol></td>
									            </tr>
										        <tr style="border: none;">
										          <td colspan="3"><strong>Q 自動更新を停止したのに請求が届きました。</strong></td>
									            </tr style="border: none;">
										        <tr style="border: none;">
												  <td width="18" align="center" style="border: none;">&nbsp;</td>
										          <td colspan="2" style="border: none; padding-bottom: 40px;"><p>申し込み日を過ぎた、自動更新日以降に自動停止の手続きを行なっています。 「WEBでギタマガ読み放題（¥649）」については、停止の手続きを行った「翌月」からの解約となります（当月分は課金されます）。「WEBで1年ギタマガ読み放題 ＋ ギター・マガジン本誌定期購読(¥17,006)」については、停止の手続きを行なった「翌年」からの解約となります（当年分は課金されます）。 解約されているかは「<a href="/my-page/">マイページ</a>」より確認できます。</p>
										          </td>
									            </tr>
										        <tr style="border: none;">
										          <td colspan="3"><strong> Q 自動更新停止手続きをしていないのにプランを解約されました。</strong></td>
									            </tr>
										        <tr style="border: none;">
												  <td width="18" align="center" style="border: none;">&nbsp;</td>
										          <td colspan="2" style="border: none; padding-bottom: 40px;"><p> 登録したクレジット・カードから引き落としができなかった場合は、登録プランが無効となります。登録しているクレジット・カード情報（有効期限等）を確認してください。再度、お申し込みを行なう際は「マイページ」で有効なクレジット・カード情報の登録をお願いします。</p>
										          </td>
									            </tr>
								
									          </tbody>
									        </table>
											</div>
										    <p><div align="right"><a href="#"><h6>▲ページトップへ戻る</h6></a></div></p>
											</div>
										<table style="border-spacing:10px;	margin-top: 5px;margin-bottom: 25px; border: none;" id="faq-5">
										  <tbody>
											<tr style="border: none; margin-bottom: 20px;">
											  <td colspan="3"><h3 style="background-color: #f0f8ff;"><strong id="docs-internal-guid-a9a3c73b-7fff-d4b4-1036-09f4c9ec3f96">●ギタマガ読み放題について</strong></h3></td>
											</tr>
											<tr style="border: none;">
											  <td colspan="3"><strong>Q WEBのブックビュワーの動作環境は？</strong></td>
											</tr>
											<tr style="border: none; ">
											  <td width="18" align="center" style="border: none; ">&nbsp;</td>
											  <td colspan="2" style="border: none; padding-bottom: 40px;"><p><strong>[パソコン]</strong><br>
											    Windows®<br>
											    OS：Windows® 11　64bit（＊1）、Windows® 10　32bitまたは64bit（＊1）（＊2）<br>
											    ブラウザ：Chrome 最新版、Edge 最新版、Firefox 最新版<br>
											    ＊1 タブレット用のUI（キーボードを取り外したときのUI）でのご利用は推奨動作環境対象外です。キーボードを取り付けてご利用ください。<br>
											    ＊2 Windows10 Enterprise版またはEducation版をご利用の場合、こちらの注意事項をご確認ください。</p>
											    <p>Mac®<br>
											      OS：macOS 10.15以上<br>
											      ブラウザ：Chrome 最新版、Safari 最新版、Firefox 最新版</p>
											    <p>Chromebook<br>
											      OS：ChromeOS 最新版<br>
											      ブラウザ：Chrome 最新版</p>
											    <p><strong>[モニタ]</strong><br>
											      解像度1024 x 768、16 ビット以上を表示可能なカラーモニタ</p>
											    <p><strong>[環境]</strong><br>
											      インターネット接続環境</p>
											    <p><strong>[スマートフォン／タブレット]</strong><br>
											      Android<br>
											      OS：Android OS 9.0以上 ※2023年4月以降、Android 10.0以上に変更予定<br>
											      ブラウザ：Chrome 最新版</p>
											    <p>iPhone・iPad<br>
											      OS：iOS 14以上、iPadOS 14以上<br>
										      ブラウザ：Safari 最新版</p></td>
											</tr>
										  </tbody>
										</table>		
										<p><div align="right"><a href="#"><h6>▲ページトップへ戻る</h6></a></div></p>

									   </div>
								      </div>
									<p style="text-align: center;  style="background-color: #f0f8ff;""><a href="/law/">「特定商取引」に関する説明</a></p>

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
