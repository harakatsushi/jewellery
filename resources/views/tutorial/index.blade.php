@extends('layouts.app', ['title' => '発注チュートリアル'])

@section('content')


		<div id="page_tit">
			<div class="container">
				<h2>発注チュートリアル</h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li>発注チュートリアル</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- /#page_tit -->

		<div id="cont_wrapper" class="container u_page mode_col1">
			<main id="cont_main">
				@if($text)
				<!-- ここから、TOPの「このような方にご利用いただいています」から飛んだ場合は下記を表示 -->

				<div class="modal modal_flom_baloon is-show">
					<div class="inner">
						<div class="bg"></div>
						<div class="cont">
							<div class="txt_box">
								<p>
									TOPページの「このような方にご利用いただいています」の「{{$text}}」内容をSTEP2の「カテゴリー」、STEP3の「タグ」に反映しています（ほかにも適切なものがありましたら選択してください）。
								</p>
								<p>
									必要な情報を入力し「依頼を公開する」を押してください。
								</p>
							</div>
							@if($category_name)
							<dl class="example">
								<dt>
									カテゴリー
								</dt>
								<dd>
									{{$category_name}}
								</dd>
							</dl>
							@endif
							@if($tag_name)
							<dl class="example">
								<dt>
									タグ
								</dt>
								<dd>
									<ul>
<!-- 										<li class="fs">
											タイプ別
										</li>
										<li>
											%タグ%
										</li>
										<li class="fs">
											用途
										</li>
										<li>
											%タグ%
										</li>
										<li class="fs">
											デザインイメージ
										</li>
										<li>
											%タグ%
										</li>
										<li class="fs">
											デザイン・特徴
										</li>
										<li>
											%タグ%
										</li>
										<li class="fs">
											素材別
										</li>
										<li>
											%タグ%
										</li>
										<li class="fs">
											宝石別
										</li>
										<li>
											%タグ%
										</li>
										<li class="fs">
											宝石の色
										</li>
										<li>
											%タグ%
										</li> -->
										<li class="fs">
											お答えできるご要望
										</li>
										<li>
											{{$tag_name}}
										</li>
									</ul>
								</dd>
								@endif
							</dl>
						</div>
					</div>
				</div>
				<!-- ここまで、TOPの「このような方にご利用いただいています」から飛んだ場合は下記を表示 -->
				@endif
				<div class="read">
					<div class="txt_box">
						<div class="img_box">
							<img src="/assets/images/tutorial/read_img01.jpg" alt="">
						</div>
						<p>
							ai-jewellyは簡単なシステムにそって発注すると全国のジュエラーがあなたのためのオリジナルジュエリーや金や宝石を使用したアイテムをお届けいたします。
						</p>
						<p>
							こちらのページは初めての発注をサポートするページです。<br>
							例に沿って入力すると「公開依頼」が実際に公開され、応募の中からジュエラーを選定・契約し世界に一つだけのジュエリーを作成しましょう！
						</p>
					</div>
					<dl class="info_dl">
						<dt>
							Info
						</dt>
						<dd class="txt_box">
							<p>
								ここから下は各項目の説明を見ながら入力していきます。<br>
								例として三人のモデルケースをご用意しました。
							</p>
							<ul class="baloon_li">
								<li>
									<div class="ico_box">
										<div class="icon">
											<img src="/assets/images/tutorial/img01.jpg" alt="">
										</div>
										<p class="tac">Aさん</p>
									</div>
									<div class="baloon">
										世界に一つのオリジナル婚約指輪を作成したい。
									</div>
								</li>
								<li>
									<div class="ico_box">
										<div class="icon">
											<img src="/assets/images/tutorial/img02.jpg" alt="">
										</div>
										<p class="tac">Bさん</p>
									</div>
									<div class="baloon">
										親戚からもらったネックレスを今風のデザインにしたい。
									</div>
								</li>
								<li>
									<div class="ico_box">
										<div class="icon">
											<img src="/assets/images/tutorial/img03.jpg" alt="">
										</div>
										<p class="tac">Cさん</p>
									</div>
									<div class="baloon">
										社章を作りたい。階級によって素材や宝石の有無を変えたい。
									</div>
								</li>
							</ul>
							<p>
								各項目でアイコンを押すとモデルケースごとの入力例が表示されますので参考にしてみてください。
							</p>
						</dd>
					</dl>
				</div>
				<form method="post" action="/order" enctype='multipart/form-data'>@csrf
					<div class="step_box">
						<div class="step_inner mid_sec">
							<h3 class="tit_big02">
								<span class="fs">STEP01</span><br>
								アイキャッチと依頼名の入力
							</h3>
							<dl class="baloon_dl">
								<dt>
									クリックで入力例を選択
								</dt>
								<dd>
									<ul class="baloon_li mode02">
										<li class="modal_btn" data-modal-link="modal01_01">
											<div class="ico_box">
												<div class="icon">
													<img src="/assets/images/tutorial/img01.jpg" alt="">
												</div>
												<p class="tac">Aさん</p>
											</div>
										</li>
										<li class="modal_btn" data-modal-link="modal01_02">
											<div class="ico_box">
												<div class="icon">
													<img src="/assets/images/tutorial/img02.jpg" alt="">
												</div>
												<p class="tac">Bさん</p>
											</div>
										</li>
										<li class="modal_btn" data-modal-link="modal01_03">
											<div class="ico_box">
												<div class="icon">
													<img src="/assets/images/tutorial/img03.jpg" alt="">
												</div>
												<p class="tac">Cさん</p>
											</div>
										</li>
									</ul>
									<div class="modal modal01_01">
										<div class="inner">
											<div class="bg"></div>
											<div class="cont">
												<ul class="baloon_li">
													<li>
														<div class="ico_box">
															<div class="icon">
																<img src="/assets/images/tutorial/img01.jpg" alt="">
															</div>
															<p class="tac">Aさん</p>
														</div>
														<div class="baloon">
															世界に一つのオリジナル婚約指輪を作成したい。
														</div>
													</li>
												</ul>
												<dl class="example">
													<dt>
														アイキャッチ
													</dt>
													<dd>
														<img src="/assets/images/tutorial/img04.jpg" alt="">
													</dd>
												</dl>
												<dl class="example">
													<dt>
														依頼タイトル
													</dt>
													<dd>
														フルオーダーメイドの婚約指輪制作
													</dd>
												</dl>
											</div>
										</div>
									</div>
									<div class="modal modal01_02">
										<div class="inner">
											<div class="bg"></div>
											<div class="cont">
												<ul class="baloon_li">
													<li>
														<div class="ico_box">
															<div class="icon">
																<img src="/assets/images/tutorial/img02.jpg" alt="">
															</div>
															<p class="tac">Bさん</p>
														</div>
														<div class="baloon">
															親戚からもらったネックレスを今風のデザインにしたい。
														</div>
													</li>
												</ul>
												<dl class="example">
													<dt>
														アイキャッチ
													</dt>
													<dd>
														<img src="/assets/images/tutorial/img05.jpg" alt="">
													</dd>
												</dl>
												<dl class="example">
													<dt>
														依頼タイトル
													</dt>
													<dd>
														ネックレスのリフォーム
													</dd>
												</dl>
											</div>
										</div>
									</div>
									<div class="modal modal01_03">
										<div class="inner">
											<div class="bg"></div>
											<div class="cont">
												<ul class="baloon_li">
													<li>
														<div class="ico_box">
															<div class="icon">
																<img src="/assets/images/tutorial/img03.jpg" alt="">
															</div>
															<p class="tac">Cさん</p>
														</div>
														<div class="baloon">
															社章を作りたい。階級によって素材や宝石の有無を変えたい。
														</div>
													</li>
												</ul>
												<dl class="example">
													<dt>
														アイキャッチ
													</dt>
													<dd>
														<img src="/assets/images/tutorial/img06.jpg" alt="">
													</dd>
												</dl>
												<dl class="example">
													<dt>
														依頼タイトル
													</dt>
													<dd>
														見た目で階級のわかる社章制作依頼
													</dd>
												</dl>
											</div>
										</div>
									</div>
								</dd>
							</dl>
							          @if (count($errors) > 0)
          <div class="error_txt txt_box">
              @foreach ($errors->all() as $error)
              <p class="tac"> {!! $error !!}</p>
              @endforeach
          </div>
          @endif
							<div class="txt_box">
								<p>
									一覧時に表示されるアイキャッチです。依頼のイメージやスケッチなどを登録してください。
								</p>

								<div class="table_style mode_contact">
									<dl>
										<dt class="req">
											アイキャッチ
											<span class="ico">
												<img src="/assets/images/common_img/ico-info.svg" alt="">
											</span>
											<div class="txt">
												<div class="inner">
													<span class="info_close">✕</span>
													一覧時に表示されるアイキャッチです。依頼のイメージやスケッチなどを登録してください。
												</div>
											</div>
										</dt>
								<dd>
									<div class="img_box mode_thum btn_mb disp_n">
										<img src="" alt="" id="imgChange">
									</div>
									<div class="file_input">
										<input type="file" name="image" id="myImage" accept="image/*" required="required">
										<input type="hidden" id="eyecatchInput" name="eyecatch" value="">
										<button class="btn_delete" type="button">画像を削除</button>
									</div>

									<script>
										$('#myImage').on('change', function (e) {
											var reader = new FileReader();
											reader.onload = function (e) {
												$("#imgChange").parent(".img_box").removeClass("disp_n");
												$("#imgChange").attr('src', e.target.result);
											}
											reader.readAsDataURL(e.target.files[0]);
										});
									</script>
								</dd>
									</dl>
								</div>
							</div>
							<div class="txt_box sml_sec">
								<p>
									一覧時に表示されるタイトルです。依頼の概要をわかりやすく入力してください。
								</p>

								<div class="table_style mode_contact">
									<dl>
										<dt class="req">
											依頼タイトル
											<span class="ico">
												<img src="/assets/images/common_img/ico-info.svg" alt="">
											</span>
											<div class="txt">
												<div class="inner">
													<span class="info_close">✕</span>
													一覧時に表示されるタイトルです。依頼の概要をわかりやすく入力してください。
												</div>
											</div>
										</dt>
										<dd>
											<input type="text" name="name" value="{{ old('name') }}" placeholder=" メニュー名を入力してください" required="required">
										</dd>
									</dl>
								</div>
							</div>
						</div>
						<div class="step_inner mid_sec">
							<h3 class="tit_big02">
								<span class="fs">STEP02</span><br>
								カテゴリーの入力
							</h3>
							<dl class="baloon_dl">
								<dt>
									クリックで入力例を選択
								</dt>
								<dd>
									<ul class="baloon_li mode02">
										<li class="modal_btn" data-modal-link="modal02_01">
											<div class="ico_box">
												<div class="icon">
													<img src="/assets/images/tutorial/img01.jpg" alt="">
												</div>
												<p class="tac">Aさん</p>
											</div>
										</li>
										<li class="modal_btn" data-modal-link="modal02_02">
											<div class="ico_box">
												<div class="icon">
													<img src="/assets/images/tutorial/img02.jpg" alt="">
												</div>
												<p class="tac">Bさん</p>
											</div>
										</li>
										<li class="modal_btn" data-modal-link="modal02_03">
											<div class="ico_box">
												<div class="icon">
													<img src="/assets/images/tutorial/img03.jpg" alt="">
												</div>
												<p class="tac">Cさん</p>
											</div>
										</li>
									</ul>
									<div class="modal modal02_01">
										<div class="inner">
											<div class="bg"></div>
											<div class="cont">
												<ul class="baloon_li">
													<li>
														<div class="ico_box">
															<div class="icon">
																<img src="/assets/images/tutorial/img01.jpg" alt="">
															</div>
															<p class="tac">Aさん</p>
														</div>
														<div class="baloon">
															世界に一つのオリジナル婚約指輪を作成したい。
														</div>
													</li>
												</ul>
												<dl class="example">
													<dt>
														カテゴリー
													</dt>
													<dd>
														フルオーダー
													</dd>
												</dl>
											</div>
										</div>
									</div>
									<div class="modal modal02_02">
										<div class="inner">
											<div class="bg"></div>
											<div class="cont">
												<ul class="baloon_li">
													<li>
														<div class="ico_box">
															<div class="icon">
																<img src="/assets/images/tutorial/img02.jpg" alt="">
															</div>
															<p class="tac">Bさん</p>
														</div>
														<div class="baloon">
															親戚からもらったネックレスを今風のデザインにしたい。
														</div>
													</li>
												</ul>
												<dl class="example">
													<dt>
														カテゴリー
													</dt>
													<dd>
														リフォーム
													</dd>
												</dl>
											</div>
										</div>
									</div>
									<div class="modal modal02_03">
										<div class="inner">
											<div class="bg"></div>
											<div class="cont">
												<ul class="baloon_li">
													<li>
														<div class="ico_box">
															<div class="icon">
																<img src="/assets/images/tutorial/img03.jpg" alt="">
															</div>
															<p class="tac">Cさん</p>
														</div>
														<div class="baloon">
															社章を作りたい。階級によって素材や宝石の有無を変えたい。
														</div>
													</li>
												</ul>
												<dl class="example">
													<dt>
														カテゴリー
													</dt>
													<dd>
														フルオーダー
													</dd>
												</dl>
											</div>
										</div>
									</div>
								</dd>
							</dl>
							<div class="txt_box">
								<p>
									依頼内容のカテゴリーを選択してください。
								</p>

								<div class="table_style mode_contact">
									<dd>
										<ul>
											<li class="fs">
											作る
										</li>
										<li>
											<label>
												<input type="radio" name="category_id" value="1"  @if(old('category_id')==1) checked="checked" @endif > フルオーダー
											</label>
										</li>
										<li>
											<label>
												<input type="radio" name="category_id" value="2"  @if(old('category_id')==2) checked="checked" @endif> セミオーダー
											</label>
										</li>
										<li>
											<label>
												<input type="radio" name="category_id" value="3"  @if(old('category_id')==3) checked="checked" @endif> リフォーム
											</label>
										</li>
										<li>
											<label>
												<input type="radio" name="category_id" value="4"  @if(old('category_id')==4) checked="checked" @endif> デザインのみ
											</label>
										</li>
										<li class="fs">
											素材
										</li>
										<li>
											<label>
												<input type="radio" name="category_id" value="5"  @if(old('category_id')==5) checked="checked" @endif> 素材を探す
											</label>
										</li>
										<li>
											<label>
												<input type="radio" name="category_id" value="6"  @if(old('category_id')==6) checked="checked" @endif> 素材を依頼する
											</label>
										</li>
										<li class="fs">
											修理・リサイクル
										</li>
										<li>
											<label>
												<input type="radio" name="category_id" value="7"  @if(old('category_id')==7) checked="checked" @endif> 修理
											</label>
										</li>
										<li>
											<label>
												<input type="radio" name="category_id" value="8"  @if(old('category_id')==8) checked="checked" @endif> サイズ直し
											</label>
										</li>
										<li>
											<label>
												<input type="radio" name="category_id" value="9"  @if(old('category_id')==9) checked="checked" @endif> 売却
											</label>
										</li>
										<li>
											<label>
												<input type="radio" name="category_id" value="10"  @if(old('category_id')==10) checked="checked" @endif> 査定
											</label>
										</li>
										<li class="fs">
											相談
										</li>
										<li>
											<label>
												<input type="radio" name="category_id" value="11"  @if(old('category_id')==11) checked="checked" @endif> アドバイス
											</label>
										</li>
										<li>
											<label>
												<input type="radio" name="category_id" value="12"  @if(old('category_id')==12) checked="checked" @endif> コーディネート
											</label>
										</li>
										<li>
											<label>
												<input type="radio" name="category_id" value="13"  @if(old('category_id')==13) checked="checked" @endif> 問い合わせ
											</label>
										</li>
										<li>
											<label>
												<input type="radio" name="category_id" value="14"  @if(old('category_id')==14) checked="checked" @endif> その他
											</label>
										</li>
										</ul>
									</dd>
							</dl>
								</div>
							</div>
						</div>
						<div class="step_inner mid_sec">
							<h3 class="tit_big02">
								<span class="fs">STEP03</span><br>
								タグの入力
							</h3>
							<dl class="baloon_dl">
								<dt>
									クリックで入力例を選択
								</dt>
								<dd>
									<ul class="baloon_li mode02">
										<li class="modal_btn" data-modal-link="modal03_01">
											<div class="ico_box">
												<div class="icon">
													<img src="/assets/images/tutorial/img01.jpg" alt="">
												</div>
												<p class="tac">Aさん</p>
											</div>
										</li>
										<li class="modal_btn" data-modal-link="modal03_02">
											<div class="ico_box">
												<div class="icon">
													<img src="/assets/images/tutorial/img02.jpg" alt="">
												</div>
												<p class="tac">Bさん</p>
											</div>
										</li>
										<li class="modal_btn" data-modal-link="modal03_03">
											<div class="ico_box">
												<div class="icon">
													<img src="/assets/images/tutorial/img03.jpg" alt="">
												</div>
												<p class="tac">Cさん</p>
											</div>
										</li>
									</ul>
									<div class="modal modal03_01">
										<div class="inner">
											<div class="bg"></div>
											<div class="cont">
												<ul class="baloon_li">
													<li>
														<div class="ico_box">
															<div class="icon">
																<img src="/assets/images/tutorial/img01.jpg" alt="">
															</div>
															<p class="tac">Aさん</p>
														</div>
														<div class="baloon">
															世界に一つのオリジナル婚約指輪を作成したい。
														</div>
													</li>
												</ul>
												<dl class="example">
													<dt>
														タグ
													</dt>
													<dd>
														<ul>
															<li class="fs">
																タイプ別
															</li>
															<li>
																リング（指輪）
															</li>
															<li class="fs">
																用途
															</li>
															<li>
																ブライダル
															</li>
															<li class="fs">
																デザインイメージ
															</li>
															<li>
																シンプル
															</li>
															<li>
																オリジナリティ
															</li>
															<li class="fs">
																デザイン・特徴
															</li>
															<li>
																ダイヤモンド付き
															</li>
															<li class="fs">
																素材別
															</li>
															<li>
																K18ホワイトゴールド
															</li>
															<li class="fs">
																宝石別
															</li>
															<li>
																ダイヤモンド
															</li>
														</ul>
													</dd>
												</dl>
											</div>
										</div>
									</div>
									<div class="modal modal03_02">
										<div class="inner">
											<div class="bg"></div>
											<div class="cont">
												<ul class="baloon_li">
													<li>
														<div class="ico_box">
															<div class="icon">
																<img src="/assets/images/tutorial/img02.jpg" alt="">
															</div>
															<p class="tac">Bさん</p>
														</div>
														<div class="baloon">
															親戚からもらったネックレスを今風のデザインにしたい。
														</div>
													</li>
												</ul>
												<dl class="example">
													<dt>
														タグ
													</dt>
													<dd>
														<ul>
															<li class="fs">
																タイプ別
															</li>
															<li>
																ネックレス
															</li>
															<li class="fs">
																用途
															</li>
															<li>
																レディース
															</li>
															<li class="fs">
																デザインイメージ
															</li>
															<li>
																かわいい
															</li>
															<li class="fs">
																お答えできるご要望
															</li>
															<li>
																いらないジュエリーをリフォームしたい
															</li>
														</ul>
													</dd>
												</dl>
											</div>
										</div>
									</div>
									<div class="modal modal03_03">
										<div class="inner">
											<div class="bg"></div>
											<div class="cont">
												<ul class="baloon_li">
													<li>
														<div class="ico_box">
															<div class="icon">
																<img src="/assets/images/tutorial/img03.jpg" alt="">
															</div>
															<p class="tac">Cさん</p>
														</div>
														<div class="baloon">
															社章を作りたい。階級によって素材や宝石の有無を変えたい。
														</div>
													</li>
												</ul>
												<dl class="example">
													<dt>
														タグ
													</dt>
													<dd>
														<ul>
															<li class="fs">
																タイプ別
															</li>
															<li>
																その他
															</li>
															<li class="fs">
																デザイン・特徴
															</li>
															<li>
																宝石付き
															</li>
															<li class="fs">
																お答えできるご要望
															</li>
															<li>
																会社の社章をまとめて作りたい
															</li>
														</ul>
													</dd>
												</dl>
											</div>
										</div>
									</div>
								</dd>
							</dl>
							<div class="txt_box">
								<p>
									ジュエラーが検索時に仕様するタグです。当てはまる物を選択してください（複数選択可能）。
								</p>

								<div class="table_style mode_contact">
									<dl>
										<dt class="req">
											タグ
											<span class="ico">
												<img src="/assets/images/common_img/ico-info.svg" alt="">
											</span>
											<div class="txt">
												<div class="inner">
													<span class="info_close">✕</span>
													検索時に仕様するタグです。当てはまる物を選択してください（複数選択可能）。
												</div>
											</div>
										</dt>
										<dd>
											<dl class="tag_dl">
												<dt>
													タイプ別
												</dt>
												<dd>
												<ul>
													<li class="tit_class">
														指回り
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(1,old('tag'))) checked @endif  value="1" > リング（指輪）
														</label>
													</li>
													<li class="tit_class">
														腕周り
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(2,old('tag'))) checked @endif  value="2"> ブレスレット（腕輪）
														</label>
													</li>
													<li class="tit_class">
														首回り
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(3,old('tag'))) checked @endif  value="3"> ネックレス
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(4,old('tag'))) checked @endif  value="4"> ペンダント
														</label>
													</li>
													<li class="tit_class">
														耳
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(5,old('tag'))) checked @endif  value="5"> ピアス
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(6,old('tag'))) checked @endif  value="6"> イヤリング
														</label>
													</li>
													<li class="tit_class">
														その他
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(7,old('tag'))) checked @endif  value="7"> リング&amp;ネックレス
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(8,old('tag'))) checked @endif  value="8"> リング&amp;ピアス
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(9,old('tag'))) checked @endif  value="9"> ネックレス&amp;ピアス
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(10,old('tag'))) checked @endif  value="10"> リング&amp;ネックレス&amp;ピアス
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(11,old('tag'))) checked @endif  value="11"> ブローチ
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(12,old('tag'))) checked @endif  value="12"> アンクレット
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(13,old('tag'))) checked @endif  value="13"> パーチ
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(14,old('tag'))) checked @endif  value="14"> 置物
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(15,old('tag'))) checked @endif  value="15"> ケース
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(16,old('tag'))) checked @endif  value="16"> その他
														</label>
													</li>
												</ul>
											</dd>
										</dl>
										<dl class="tag_dl">
											<dt>
												用途
											</dt>
											<dd>
												<ul>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(17,old('tag'))) checked @endif  value="17"> レディース
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(18,old('tag'))) checked @endif  value="18"> メンズ
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(19,old('tag'))) checked @endif  value="19"> ブライダル
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(20,old('tag'))) checked @endif  value="20"> ペア
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(21,old('tag'))) checked @endif  value="21"> エタニティ
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(22,old('tag'))) checked @endif  value="22"> ピンキー
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(23,old('tag'))) checked @endif  value="23"> シグネット
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(24,old('tag'))) checked @endif  value="24"> インテリア
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(25,old('tag'))) checked @endif  value="25">鑑定/鑑賞
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(26,old('tag'))) checked @endif  value="26"> ダイヤモンドルース
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(27,old('tag'))) checked @endif  value="27"> その他ルース
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(28,old('tag'))) checked @endif  value="28"> アイデア製品
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(29,old('tag'))) checked @endif  value="29"> 冠婚葬祭
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(30,old('tag'))) checked @endif  value="30"> その他
														</label>
													</li>
												</ul>
											</dd>
										</dl>
										<dl class="tag_dl">
											<dt>
												デザインイメージ
											</dt>
											<dd>
												<ul>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(31,old('tag'))) checked @endif  value="31"> シンプル
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(32,old('tag'))) checked @endif  value="32"> ゴージャス
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(33,old('tag'))) checked @endif  value="33"> かわいい
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(34,old('tag'))) checked @endif  value="34"> 高級感
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(35,old('tag'))) checked @endif  value="35"> オリジナリティ
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(36,old('tag'))) checked @endif  value="36"> 面白い
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(37,old('tag'))) checked @endif  value="37"> アンティーク調
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(38,old('tag'))) checked @endif  value="38"> 洋風
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(39,old('tag'))) checked @endif  value="39"> 和風
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(40,old('tag'))) checked @endif  value="40"> ハート
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(41,old('tag'))) checked @endif  value="41"> アニマル
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(42,old('tag'))) checked @endif  value="42"> フラワー
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(43,old('tag'))) checked @endif  value="43"> スター/ムーン
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(44,old('tag'))) checked @endif  value="44"> クロス
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(45,old('tag'))) checked @endif  value="45"> クラウン
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(46,old('tag'))) checked @endif  value="46"> アルファベット
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(47,old('tag'))) checked @endif  value="47"> その他
														</label>
													</li>
												</ul>
											</dd>
										</dl>
										<dl class="tag_dl">
											<dt>
												デザイン・特徴
											</dt>
											<dd>
												<ul>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(48,old('tag'))) checked @endif  value="48"> 地金のみ
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(49,old('tag'))) checked @endif  value="49"> ダイヤモンド付き
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(50,old('tag'))) checked @endif  value="50"> 宝石付き
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(51,old('tag'))) checked @endif  value="51"> 1粒タイプ
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(52,old('tag'))) checked @endif  value="52"> 宝石沢山
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(53,old('tag'))) checked @endif  value="53"> 模様あり
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(54,old('tag'))) checked @endif  value="54"> 裏側に加工
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(55,old('tag'))) checked @endif  value="55"> セット（重ね付け）
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(56,old('tag'))) checked @endif  value="56"> 華奢
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(57,old('tag'))) checked @endif  value="57"> 幅太
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(59,old('tag'))) checked @endif  value="58"> S字
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(59,old('tag'))) checked @endif  value="59"> V字
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(60,old('tag'))) checked @endif  value="60"> チェーンのみ
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(61,old('tag'))) checked @endif  value="61"> その他
														</label>
													</li>
												</ul>
											</dd>
										</dl>
										<dl class="tag_dl">
											<dt>
												素材別
											</dt>
											<dd>
												<ul>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(62,old('tag'))) checked @endif  value="62"> K18イエローゴールド
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(63,old('tag'))) checked @endif  value="63"> K18ピンクゴールド
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(64,old('tag'))) checked @endif  value="64"> K18ホワイトゴールド
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(65,old('tag'))) checked @endif  value="65"> K14
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(66,old('tag'))) checked @endif  value="66"> K10
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(67,old('tag'))) checked @endif  value="67"> K24純金
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(68,old('tag'))) checked @endif  value="68"> プラチナ850
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(69,old('tag'))) checked @endif  value="69"> プラチナ900
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(70,old('tag'))) checked @endif  value="70"> プラチナ950
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(71,old('tag'))) checked @endif  value="71"> プラチナ1000
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(72,old('tag'))) checked @endif  value="72"> K18/PTコンビ
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(73,old('tag'))) checked @endif  value="73"> シルバー
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(74,old('tag'))) checked @endif  value="74"> その他
														</label>
													</li>
												</ul>
											</dd>
										</dl>
										<dl class="tag_dl">
											<dt>
												宝石別
											</dt>
											<dd>
												<ul>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(75,old('tag'))) checked @endif  value="75"> ダイヤモンド
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(76,old('tag'))) checked @endif  value="76"> ルビー
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(77,old('tag'))) checked @endif  value="77"> サファイア
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(78,old('tag'))) checked @endif  value="78"> エメラルド
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(79,old('tag'))) checked @endif  value="79"> オパール
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(80,old('tag'))) checked @endif  value="80"> タンザナイト
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(81,old('tag'))) checked @endif  value="81"> アレキサンドライト
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(82,old('tag'))) checked @endif  value="82"> トルマリン
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(83,old('tag'))) checked @endif  value="83"> トパーズ
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(84,old('tag'))) checked @endif  value="84"> アクアマリン
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(85,old('tag'))) checked @endif  value="85"> ペリドット
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(86,old('tag'))) checked @endif  value="86"> 真珠
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(87,old('tag'))) checked @endif  value="87"> ガーネット
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(88,old('tag'))) checked @endif  value="88"> ターコイズ
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(89,old('tag'))) checked @endif  value="89"> ムーンストーン
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(90,old('tag'))) checked @endif  value="90"> 珊瑚
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(91,old('tag'))) checked @endif  value="91"> アメシスト
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(92,old('tag'))) checked @endif  value="92"> 誕生石
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(93,old('tag'))) checked @endif  value="93"> 原石
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(94,old('tag'))) checked @endif  value="94"> 合成ダイヤモンド
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(95,old('tag'))) checked @endif  value="95"> その他
														</label>
													</li>
												</ul>
											</dd>
										</dl>
										<dl class="tag_dl">
											<dt>
												宝石の色
											</dt>
											<dd>
												<ul>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(96,old('tag'))) checked @endif  value="96"> 無色/ホワイト
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(97,old('tag'))) checked @endif  value="97"> ブラック
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(98,old('tag'))) checked @endif  value="98"> ブラウン
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(99,old('tag'))) checked @endif  value="99"> レッド
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(100,old('tag'))) checked @endif  value="100"> ピンク
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(101,old('tag'))) checked @endif  value="101"> ブルー
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(102,old('tag'))) checked @endif  value="102"> ライトブルー
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(103,old('tag'))) checked @endif  value="103"> パープル
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(104,old('tag'))) checked @endif  value="104"> グリーン
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(105,old('tag'))) checked @endif  value="105"> オレンジ
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(106,old('tag'))) checked @endif  value="106"> イエロー
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(107,old('tag'))) checked @endif  value="107"> 混合色
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(108,old('tag'))) checked @endif  value="108"> その他
														</label>
													</li>
												</ul>
											</dd>
										</dl>
										<dl class="tag_dl">
											<dt>
												お答えできるご要望
											</dt>
											<dd>
												<ul>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(109,old('tag'))) checked @endif  value="109"> 世界でひとつのこだわりのものを作りたい
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(110,old('tag'))) checked @endif  value="110"> ジュエリーは高いから安ければ・・・
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(111,old('tag'))) checked @endif  value="111"> 自分好みの素材があったら作りたい
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(112,old('tag'))) checked @endif  value="112"> いらないジュエリーを処分したい
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(113,old('tag'))) checked @endif  value="113"> いらないジュエリーをリフォームしたい
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(114,old('tag'))) checked @endif  value="114"> 記念品としてジュエリーを量産したい
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(115,old('tag'))) checked @endif  value="115"> 珍しい素材のジュエリーがつくりたい
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(116,old('tag'))) checked @endif  value="116"> 自分のジュエリーを修理したい
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(117,old('tag'))) checked @endif  value="117"> 会社の社章をまとめて作りたい
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(118,old('tag'))) checked @endif  value="118"> 自分のブランドのジュエリーを作りたい
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(119,old('tag'))) checked @endif  value="119"> 自分のジュエリーを査定してもらたい
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(120,old('tag'))) checked @endif  value="120"> ジュエリーや宝石の知識をつけたい
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(121,old('tag'))) checked @endif  value="121"> できてるデザインから作りたい
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(122,old('tag'))) checked @endif  value="122"> 過去のデザインを作りたい
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(123,old('tag'))) checked @endif  value="123"> 手持ちのジュエリーと同じものを作りたい
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(old('tag')) && in_array(124,old('tag'))) checked @endif  value="124"> 信頼できるお店でつくりたい
														</label>
													</li>
												</ul>
											</dd>
										</dl>
										</dd>
									</dl>
								</div>
							</div>
						</div>
						<div class="step_inner mid_sec">
							<h3 class="tit_big02">
								<span class="fs">STEP04</span><br>
								説明文
							</h3>
							<dl class="baloon_dl">
								<dt>
									クリックで入力例を選択
								</dt>
								<dd>
									<ul class="baloon_li mode02">
										<li class="modal_btn" data-modal-link="modal04_01">
											<div class="ico_box">
												<div class="icon">
													<img src="/assets/images/tutorial/img01.jpg" alt="">
												</div>
												<p class="tac">Aさん</p>
											</div>
										</li>
										<li class="modal_btn" data-modal-link="modal04_02">
											<div class="ico_box">
												<div class="icon">
													<img src="/assets/images/tutorial/img02.jpg" alt="">
												</div>
												<p class="tac">Bさん</p>
											</div>
										</li>
										<li class="modal_btn" data-modal-link="modal04_03">
											<div class="ico_box">
												<div class="icon">
													<img src="/assets/images/tutorial/img03.jpg" alt="">
												</div>
												<p class="tac">Cさん</p>
											</div>
										</li>
									</ul>
									<div class="modal modal04_01">
										<div class="inner">
											<div class="bg"></div>
											<div class="cont">
												<ul class="baloon_li">
													<li>
														<div class="ico_box">
															<div class="icon">
																<img src="/assets/images/tutorial/img01.jpg" alt="">
															</div>
															<p class="tac">Aさん</p>
														</div>
														<div class="baloon">
															世界に一つのオリジナル婚約指輪を作成したい。
														</div>
													</li>
												</ul>
												<dl class="example">
													<dt>
														説明文
													</dt>
													<dd>
														世界に一つだけの婚約指輪の制作をお願いします。<br>
														宝石はダイヤ<br>
														素材はホワイトゴールド<br>
														蝶をモチーフにして、裏にはお互いのイニシャルを印字してください。
													</dd>
												</dl>
											</div>
										</div>
									</div>
									<div class="modal modal04_02">
										<div class="inner">
											<div class="bg"></div>
											<div class="cont">
												<ul class="baloon_li">
													<li>
														<div class="ico_box">
															<div class="icon">
																<img src="/assets/images/tutorial/img02.jpg" alt="">
															</div>
															<p class="tac">Bさん</p>
														</div>
														<div class="baloon">
															親戚からもらったネックレスを今風のデザインにしたい。
														</div>
													</li>
												</ul>
												<dl class="example">
													<dt>
														説明文
													</dt>
													<dd>
														親戚からネックレスを貰いました。<br>
														いつも身に着けたいのですが少しデザインが前時代的なので今風にリフォームしてもらいたいです。<br>
														全体的な雰囲気はそのままで古い印象だけ取り払ってもらいたいです。
													</dd>
												</dl>
											</div>
										</div>
									</div>
									<div class="modal modal04_03">
										<div class="inner">
											<div class="bg"></div>
											<div class="cont">
												<ul class="baloon_li">
													<li>
														<div class="ico_box">
															<div class="icon">
																<img src="/assets/images/tutorial/img03.jpg" alt="">
															</div>
															<p class="tac">Cさん</p>
														</div>
														<div class="baloon">
															社章を作りたい。階級によって素材や宝石の有無を変えたい。
														</div>
													</li>
												</ul>
												<dl class="example">
													<dt>
														説明文
													</dt>
													<dd>
														会社のロゴを模した社章の制作をお願いします。<br>
														重役→金・宝石付き（4個）<br>
														役員→金・宝石なし（8個）<br>
														管理職→銀（20個）<br>
														一般社員→銅（50個）<br>
														のような一目でわかるようにお願いします。<br>
														初期に必要なのは括弧の中の数です。<br><br>
														追加制作可能な業者様でお願いします。
													</dd>
												</dl>
											</div>
										</div>
									</div>
								</dd>
							</dl>
							<div class="txt_box">
								<p>
									依頼内容の詳細を入力してください。<br>
									画像を添えて説明したい事に関してはSTEP5の「補足画像」と「補足画像の説明文」に入力してください。
								</p>

								<div class="table_style mode_contact">
									<dl>
										<dt class="req">
											説明文
											<span class="ico">
												<img src="/assets/images/common_img/ico-info.svg" alt="">
											</span>
											<div class="txt">
												<div class="inner">
													<span class="info_close">✕</span>
													依頼内容を入力してください。
												</div>
											</div>
										</dt>
										<dd>
											<textarea name="detail" class="resize" style="overflow: hidden; overflow-wrap: break-word; resize: none; height: 62px;">{{old('detail')}}</textarea>
										</dd>
									</dl>
								</div>
							</div>
						</div>
						<div class="step_inner mid_sec">
							<h3 class="tit_big02">
								<span class="fs">STEP05</span><br>
								【任意】補足内容の入力
							</h3>
							<div class="txt_box">
								<p>
									内容説明の補足がある場合はここに入力してください。
								</p>
								<div class="table_style mode_contact">
									<dl>
										<dt class="any">
											補足画像1
											<span class="ico">
												<img src="/assets/images/common_img/ico-info.svg" alt="">
											</span>
											<div class="txt">
												<div class="inner">
													<span class="info_close">✕</span>
													補足画像がある場合は登録してください。
												</div>
											</div>
										</dt>
<dd>
										<div class="img_box mode02 btn_mb disp_n">
											<img src="" alt="" id="preview01">
										</div>
										<div class="file_input">
											<input type="file" id="myImage01" name="sub_img1" accept="image/*">
											<button class="btn_delete" type="button"  onclick="delImg('01')">画像を削除</button>
										</div>

										<script>
											$('#myImage01').on('change', function (e) {
												var reader = new FileReader();
												reader.onload = function (e) {
													$("#preview01").parent(".img_box").removeClass("disp_n");
													$("#preview01").attr('src', e.target.result);
												}
												reader.readAsDataURL(e.target.files[0]);
											});
										</script>
									</dd>
									</dl>
									<dl>
										<dt class="any">
											補足画像1の説明文
											<span class="ico">
												<img src="/assets/images/common_img/ico-info.svg" alt="">
											</span>
											<div class="txt">
												<div class="inner">
													<span class="info_close">✕</span>
													補足画像のテキストがある場合は入力してください。
												</div>
											</div>
										</dt>
										<dd>
											<textarea name="annotation01" class="resize" style="overflow: hidden; overflow-wrap: break-word; resize: none; height: 62px;">{{old('annotation01')}}</textarea>
										</dd>
									</dl>
									<dl>
										<dt class="any">
											補足画像2
											<span class="ico">
												<img src="/assets/images/common_img/ico-info.svg" alt="">
											</span>
											<div class="txt">
												<div class="inner">
													<span class="info_close">✕</span>
													補足画像のテキストがある場合は入力してください。
												</div>
											</div>
										</dt>
										<dd>
										<div class="img_box mode02 btn_mb disp_n">
											<img src="" alt="" id="preview02">
										</div>
										<div class="file_input">
											<input type="file" id="myImage02" name="sub_img2" accept="image/*">
											<button class="btn_delete" type="button" onclick="delImg('02')">画像を削除</button>
										</div>

										<script>
											$('#myImage02').on('change', function (e) {
												var reader = new FileReader();
												reader.onload = function (e) {
													$("#preview02").parent(".img_box").removeClass("disp_n");
													$("#preview02").attr('src', e.target.result);
												}
												reader.readAsDataURL(e.target.files[0]);
											});
										</script>
									</dd>
									</dl>
									<dl>
										<dt class="any">
											補足画像2の説明文
											<span class="ico">
												<img src="/assets/images/common_img/ico-info.svg" alt="">
											</span>
											<div class="txt">
												<div class="inner">
													<span class="info_close">✕</span>
													補足画像のテキストがある場合は入力してください。
												</div>
											</div>
										</dt>
										<dd>
											<textarea name="annotation02" class="resize" style="overflow: hidden; overflow-wrap: break-word; resize: none; height: 62px;">{{old('annotation02')}}</textarea>
										</dd>
									</dl>
									<dl>
										<dt class="any">
											補足画像3
											<span class="ico">
												<img src="/assets/images/common_img/ico-info.svg" alt="">
											</span>
											<div class="txt">
												<div class="inner">
													<span class="info_close">✕</span>
													補足画像のテキストがある場合は入力してください。
												</div>
											</div>
										</dt>
										<dd>
										<div class="img_box mode02 btn_mb disp_n">
											<img src="" alt="" id="preview03">
										</div>
										<div class="file_input">
											<input type="file" id="myImage03" name="sub_img3" accept="image/*">
											<button class="btn_delete" type="button" onclick="delImg('03')">画像を削除</button>
										</div>

										<script>
											$('#myImage03').on('change', function (e) {
												var reader = new FileReader();
												reader.onload = function (e) {
													$("#preview03").parent(".img_box").removeClass("disp_n");
													$("#preview03").attr('src', e.target.result);
												}
												reader.readAsDataURL(e.target.files[0]);
											});
										</script>
									</dd>
									</dl>
									<dl>
										<dt class="any">
											補足画像3の説明文
											<span class="ico">
												<img src="/assets/images/common_img/ico-info.svg" alt="">
											</span>
											<div class="txt">
												<div class="inner">
													<span class="info_close">✕</span>
													補足画像のテキストがある場合は入力してください。
												</div>
											</div>
										</dt>
										<dd>
											<textarea name="annotation03" class="resize" style="overflow: hidden; overflow-wrap: break-word; resize: none; height: 62px;">{{old('annotation03')}}</textarea>
										</dd>
									</dl>
								</div>
							</div>
						</div>
						<div class="step_inner mid_sec">
							<h3 class="tit_big02">
								<span class="fs">STEP06</span><br>
								制作希望価格
							</h3>
							<dl class="baloon_dl">
								<dt>
									クリックで入力例を選択
								</dt>
								<dd>
									<ul class="baloon_li mode02">
										<li class="modal_btn" data-modal-link="modal05_01">
											<div class="ico_box">
												<div class="icon">
													<img src="/assets/images/tutorial/img01.jpg" alt="">
												</div>
												<p class="tac">Aさん</p>
											</div>
										</li>
										<li class="modal_btn" data-modal-link="modal05_02">
											<div class="ico_box">
												<div class="icon">
													<img src="/assets/images/tutorial/img02.jpg" alt="">
												</div>
												<p class="tac">Bさん</p>
											</div>
										</li>
										<li class="modal_btn" data-modal-link="modal05_03">
											<div class="ico_box">
												<div class="icon">
													<img src="/assets/images/tutorial/img03.jpg" alt="">
												</div>
												<p class="tac">Cさん</p>
											</div>
										</li>
									</ul>
									<div class="modal modal05_01">
										<div class="inner">
											<div class="bg"></div>
											<div class="cont">
												<ul class="baloon_li">
													<li>
														<div class="ico_box">
															<div class="icon">
																<img src="/assets/images/tutorial/img01.jpg" alt="">
															</div>
															<p class="tac">Aさん</p>
														</div>
														<div class="baloon">
															世界に一つのオリジナル婚約指輪を作成したい。
														</div>
													</li>
												</ul>
												<dl class="example">
													<dt>
														制作希望価格
													</dt>
													<dd>
														220,000円（税込）
													</dd>
												</dl>
											</div>
										</div>
									</div>
									<div class="modal modal05_02">
										<div class="inner">
											<div class="bg"></div>
											<div class="cont">
												<ul class="baloon_li">
													<li>
														<div class="ico_box">
															<div class="icon">
																<img src="/assets/images/tutorial/img02.jpg" alt="">
															</div>
															<p class="tac">Bさん</p>
														</div>
														<div class="baloon">
															親戚からもらったネックレスを今風のデザインにしたい。
														</div>
													</li>
												</ul>
												<dl class="example">
													<dt>
														制作希望価格
													</dt>
													<dd>
														30,000円（税込）
													</dd>
												</dl>
											</div>
										</div>
									</div>
									<div class="modal modal05_03">
										<div class="inner">
											<div class="bg"></div>
											<div class="cont">
												<ul class="baloon_li">
													<li>
														<div class="ico_box">
															<div class="icon">
																<img src="/assets/images/tutorial/img03.jpg" alt="">
															</div>
															<p class="tac">Cさん</p>
														</div>
														<div class="baloon">
															社章を作りたい。階級によって素材や宝石の有無を変えたい。
														</div>
													</li>
												</ul>
												<dl class="example">
													<dt>
														制作希望価格
													</dt>
													<dd>
														300,000円（税込）
													</dd>
												</dl>
											</div>
										</div>
									</div>
								</dd>
							</dl>
							<div class="txt_box">
								<p>
									制作希望価格を入力してください。<br>
									この金額は制作の提案の目安になる価格となります。
									税・送料込み（ぺアリング等複数のものは総額）での入力になります。
								</p>
								<p class="annotation">
									※コンマは入力できませんが公開時自動で入ります。
								</p>

								<div class="table_style mode_contact">
									<dl>
										<dt class="req">
											制作希望価格
										</dt>
										<dd>
											<input type="number" name="price" value="{{old('price')}}" class="input_price"> 円（税込）
										</dd>
									</dl>
								</div>
							</div>
						</div>
						<div class="step_inner mid_sec">
							<h3 class="tit_big02">
								<span class="fs">STEP07</span><br>
								募集期限
							</h3>
							<div class="txt_box">
								<p>
									公開依頼の募集期限を入力してください。
								</p>
								<div class="table_style mode_contact">
									<dl>
										<dt class="req">
											募集期限
										</dt>
										<dd>
											<input type="date" name="limit_date1" value="{{old('limit_date1')}}" required="required">
										</dd>
									</dl>
								</div>
							</div>
						</div>
						<div class="step_inner mid_sec">
							<h3 class="tit_big02">
								<span class="fs">STEP08</span><br>
								【任意】納品期限
							</h3>
							<div class="txt_box">
								<p>
									納品期限を入力してください。目安としてフルオーダーは着手より2-4週間ほどお時間がかかります。
								</p>
								<div class="table_style mode_contact">
									<dl>
										<dt class="any">
											納品期限
										</dt>
										<dd>
											<input type="date" name="limit_date2" value="{{old('limit_date2')}}">
										</dd>
									</dl>
								</div>
							</div>
						</div>
					</div>
					<p class="btn_mt btn_mb">
						<input type="button" class="btn01" value="依頼を公開する">
					</p>
				</form>
			</main>
			<!--/#cont_main-->
		</div>
		<!-- /#cont_wrapper -->
@endsection