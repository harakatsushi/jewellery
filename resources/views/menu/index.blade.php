@extends('layouts.app', ['title' => 'メニュー'])

@section('content')


		<div id="page_tit">
			<div class="container">
				<h2>メニュー</h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li>メニュー</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- /#page_tit -->

		<div id="cont_wrapper" class="container u_page mode_item">
			<main id="cont_main">
				<div class="search_conditions mid_sec">
					<p class="tit">検索条件</p>
					@if($cond1)
					<dl>
						<dt>
							カテゴリー：
						</dt>
						<dd>
							{{implode("、",$cond1)}}
						</dd>
					</dl>
					@endif
					@if($cond2)
					<dl>
						<dt>
							タグ：
						</dt>
						<dd>
							{{implode("、",$cond2)}}
						</dd>
					</dl>
					@endif
					@if($cond3)
					<dl>
						<dt>
							お悩み別：
						</dt>
						<dd>
							{{implode("、",$cond3)}}
						</dd>
					</dl>
					@endif
					@if($cond4)
					<dl>
						<dt>
							価格：
						</dt>
						<dd>
							{{implode("、",$cond4)}}
						</dd>
					</dl>
					@endif
				</div>
				<section id="sec_prod" class="mid_sec">
					<h3 class="tit_big02">
						メニュー一覧
					</h3>
					<p class="sort_box">
						<select name="" id="" onchange="chgSort('menu',this.value)">
							<option value="0" @if($sort_number==0) selected @endif>おすすめ</option>
							<option value="1" @if($sort_number==1) selected @endif>新着順</option>
						</select>
					</p>
					<ul class="item_box mode_menu">
						@foreach($menus as $menu)
						<li>
							<button onclick="addBookmark('menu',{{$menu->id}})" class="btn_favo mode_s @if($bookmarks && $bookmarks->contains('item_id',$menu->id)) active @endif"></button>
							<a href="/jeweller/menu/detail/{{$menu->id}}">
								<div class="img_box mode_thum">
									<img src="/upload/profile/{{$menu->image}}" alt="">
									<div class="data">
										@if($menu->price)
										<ul class="tag_li">
											<li class="price">{{number_format($menu->price)}}円~</li>
										</ul>
										@endif
										<p class="txt">{{$menu->name}}</p>
									</div>
								</div>
							</a>
						</li>
						@endforeach
					</ul>
					<nav class="pager">
						{{ $menus->appends(request()->input())->render() }}
					</nav>
					</nav>
					<p class="btn_mt">
						<a href="#" onclick="javascript:window.history.back(-1);return false;" class="btn01 mode_back">
							BACK
						</a>
					</p>
				</section>
				<!--/#my_history-->
			</main>
			<!--/#cont_main-->

			<aside id="cont_aside" class="mode_search">
				<dl class="menu_box">
					<dt>
						絞り込み検索
					</dt>
					<dd>
						<form >
							<div class="table_style mode_contact">
<!-- 								<dl>
									<dt>
										カテゴリー
									</dt>
									<dd>
										<ul>
											<li class="fs">
												作る
											</li>
											<li>
												<label>
													<input type="radio" name="category" value="フルオーダー"> フルオーダー
												</label>
											</li>
											<li>
												<label>
													<input type="radio" name="category" value="セミオーダー"> セミオーダー
												</label>
											</li>
											<li>
												<label>
													<input type="radio" name="category" value="リフォーム"> リフォーム
												</label>
											</li>
											<li>
												<label>
													<input type="radio" name="category" value="デザインのみ"> デザインのみ
												</label>
											</li>
											<li class="fs">
												素材
											</li>
											<li>
												<label>
													<input type="radio" name="category" value="素材を探す"> 素材を探す
												</label>
											</li>
											<li>
												<label>
													<input type="radio" name="category" value="素材を依頼する"> 素材を依頼する
												</label>
											</li>
											<li class="fs">
												修理・リサイクル
											</li>
											<li>
												<label>
													<input type="radio" name="category" value="修理"> 修理
												</label>
											</li>
											<li>
												<label>
													<input type="radio" name="category" value="サイズ直し"> サイズ直し
												</label>
											</li>
											<li>
												<label>
													<input type="radio" name="category" value="売却"> 売却
												</label>
											</li>
											<li>
												<label>
													<input type="radio" name="category" value="査定"> 査定
												</label>
											</li>
											<li class="fs">
												相談
											</li>
											<li>
												<label>
													<input type="radio" name="category" value="アドバイス"> アドバイス
												</label>
											</li>
											<li>
												<label>
													<input type="radio" name="category" value="コーディネート"> コーディネート
												</label>
											</li>
											<li>
												<label>
													<input type="radio" name="category" value="問い合わせ"> 問い合わせ
												</label>
											</li>
											<li>
												<label>
													<input type="radio" name="category" value="その他"> その他
												</label>
											</li>
										</ul>
									</dd>
								</dl> -->
								<dl>
									<dt>
										タグ
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
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(1,request()->input('tag'))) checked @endif  value="1" > リング（指輪）
														</label>
													</li>
													<li class="tit_class">
														腕周り
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(2,request()->input('tag'))) checked @endif  value="2"> ブレスレット（腕輪）
														</label>
													</li>
													<li class="tit_class">
														首回り
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(3,request()->input('tag'))) checked @endif  value="3"> ネックレス
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(4,request()->input('tag'))) checked @endif  value="4"> ペンダント
														</label>
													</li>
													<li class="tit_class">
														耳
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(5,request()->input('tag'))) checked @endif  value="5"> ピアス
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(6,request()->input('tag'))) checked @endif  value="6"> イヤリング
														</label>
													</li>
													<li class="tit_class">
														その他
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(7,request()->input('tag'))) checked @endif  value="7"> リング&amp;ネックレス
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(8,request()->input('tag'))) checked @endif  value="8"> リング&amp;ピアス
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(9,request()->input('tag'))) checked @endif  value="9"> ネックレス&amp;ピアス
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(10,request()->input('tag'))) checked @endif  value="10"> リング&amp;ネックレス&amp;ピアス
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(11,request()->input('tag'))) checked @endif  value="11"> ブローチ
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(12,request()->input('tag'))) checked @endif  value="12"> アンクレット
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(13,request()->input('tag'))) checked @endif  value="13"> パーチ
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(14,request()->input('tag'))) checked @endif  value="14"> 置物
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(15,request()->input('tag'))) checked @endif  value="15"> ケース
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(16,request()->input('tag'))) checked @endif  value="16"> その他
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
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(17,request()->input('tag'))) checked @endif  value="17"> レディース
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(18,request()->input('tag'))) checked @endif  value="18"> メンズ
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(19,request()->input('tag'))) checked @endif  value="19"> ブライダル
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(20,request()->input('tag'))) checked @endif  value="20"> ペア
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(21,request()->input('tag'))) checked @endif  value="21"> エタニティ
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(22,request()->input('tag'))) checked @endif  value="22"> ピンキー
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(23,request()->input('tag'))) checked @endif  value="23"> シグネット
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(24,request()->input('tag'))) checked @endif  value="24"> インテリア
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(25,request()->input('tag'))) checked @endif  value="25">鑑定/鑑賞
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(26,request()->input('tag'))) checked @endif  value="26"> ダイヤモンドルース
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(27,request()->input('tag'))) checked @endif  value="27"> その他ルース
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(28,request()->input('tag'))) checked @endif  value="28"> アイデア製品
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(29,request()->input('tag'))) checked @endif  value="29"> 冠婚葬祭
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(30,request()->input('tag'))) checked @endif  value="30"> その他
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
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(31,request()->input('tag'))) checked @endif  value="31"> シンプル
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(32,request()->input('tag'))) checked @endif  value="32"> ゴージャス
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(33,request()->input('tag'))) checked @endif  value="33"> かわいい
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(34,request()->input('tag'))) checked @endif  value="34"> 高級感
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(35,request()->input('tag'))) checked @endif  value="35"> オリジナリティ
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(36,request()->input('tag'))) checked @endif  value="36"> 面白い
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(37,request()->input('tag'))) checked @endif  value="37"> アンティーク調
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(38,request()->input('tag'))) checked @endif  value="38"> 洋風
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(39,request()->input('tag'))) checked @endif  value="39"> 和風
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(40,request()->input('tag'))) checked @endif  value="40"> ハート
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(41,request()->input('tag'))) checked @endif  value="41"> アニマル
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(42,request()->input('tag'))) checked @endif  value="42"> フラワー
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(43,request()->input('tag'))) checked @endif  value="43"> スター/ムーン
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(44,request()->input('tag'))) checked @endif  value="44"> クロス
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(45,request()->input('tag'))) checked @endif  value="45"> クラウン
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(46,request()->input('tag'))) checked @endif  value="46"> アルファベット
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(47,request()->input('tag'))) checked @endif  value="47"> その他
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
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(48,request()->input('tag'))) checked @endif  value="48"> 地金のみ
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(49,request()->input('tag'))) checked @endif  value="49"> ダイヤモンド付き
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(50,request()->input('tag'))) checked @endif  value="50"> 宝石付き
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(51,request()->input('tag'))) checked @endif  value="51"> 1粒タイプ
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(52,request()->input('tag'))) checked @endif  value="52"> 宝石沢山
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(53,request()->input('tag'))) checked @endif  value="53"> 模様あり
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(54,request()->input('tag'))) checked @endif  value="54"> 裏側に加工
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(55,request()->input('tag'))) checked @endif  value="55"> セット（重ね付け）
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(56,request()->input('tag'))) checked @endif  value="56"> 華奢
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(57,request()->input('tag'))) checked @endif  value="57"> 幅太
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(59,request()->input('tag'))) checked @endif  value="58"> S字
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(59,request()->input('tag'))) checked @endif  value="59"> V字
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(60,request()->input('tag'))) checked @endif  value="60"> チェーンのみ
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(61,request()->input('tag'))) checked @endif  value="61"> その他
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
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(62,request()->input('tag'))) checked @endif  value="62"> K18イエローゴールド
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(63,request()->input('tag'))) checked @endif  value="63"> K18ピンクゴールド
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(64,request()->input('tag'))) checked @endif  value="64"> K18ホワイトゴールド
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(65,request()->input('tag'))) checked @endif  value="65"> K14
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(66,request()->input('tag'))) checked @endif  value="66"> K10
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(67,request()->input('tag'))) checked @endif  value="67"> K24純金
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(68,request()->input('tag'))) checked @endif  value="68"> プラチナ850
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(69,request()->input('tag'))) checked @endif  value="69"> プラチナ900
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(70,request()->input('tag'))) checked @endif  value="70"> プラチナ950
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(71,request()->input('tag'))) checked @endif  value="71"> プラチナ1000
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(72,request()->input('tag'))) checked @endif  value="72"> K18/PTコンビ
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(73,request()->input('tag'))) checked @endif  value="73"> シルバー
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(74,request()->input('tag'))) checked @endif  value="74"> その他
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
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(75,request()->input('tag'))) checked @endif  value="75"> ダイヤモンド
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(76,request()->input('tag'))) checked @endif  value="76"> ルビー
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(77,request()->input('tag'))) checked @endif  value="77"> サファイア
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(78,request()->input('tag'))) checked @endif  value="78"> エメラルド
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(79,request()->input('tag'))) checked @endif  value="79"> オパール
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(80,request()->input('tag'))) checked @endif  value="80"> タンザナイト
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(81,request()->input('tag'))) checked @endif  value="81"> アレキサンドライト
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(82,request()->input('tag'))) checked @endif  value="82"> トルマリン
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(83,request()->input('tag'))) checked @endif  value="83"> トパーズ
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(84,request()->input('tag'))) checked @endif  value="84"> アクアマリン
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(85,request()->input('tag'))) checked @endif  value="85"> ペリドット
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(86,request()->input('tag'))) checked @endif  value="86"> 真珠
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(87,request()->input('tag'))) checked @endif  value="87"> ガーネット
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(88,request()->input('tag'))) checked @endif  value="88"> ターコイズ
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(89,request()->input('tag'))) checked @endif  value="89"> ムーンストーン
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(90,request()->input('tag'))) checked @endif  value="90"> 珊瑚
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(91,request()->input('tag'))) checked @endif  value="91"> アメシスト
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(92,request()->input('tag'))) checked @endif  value="92"> 誕生石
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(93,request()->input('tag'))) checked @endif  value="93"> 原石
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(94,request()->input('tag'))) checked @endif  value="94"> 合成ダイヤモンド
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(95,request()->input('tag'))) checked @endif  value="95"> その他
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
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(96,request()->input('tag'))) checked @endif  value="96"> 無色/ホワイト
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(97,request()->input('tag'))) checked @endif  value="97"> ブラック
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(98,request()->input('tag'))) checked @endif  value="98"> ブラウン
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(99,request()->input('tag'))) checked @endif  value="99"> レッド
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(100,request()->input('tag'))) checked @endif  value="100"> ピンク
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(101,request()->input('tag'))) checked @endif  value="101"> ブルー
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(102,request()->input('tag'))) checked @endif  value="102"> ライトブルー
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(103,request()->input('tag'))) checked @endif  value="103"> パープル
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(104,request()->input('tag'))) checked @endif  value="104"> グリーン
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(105,request()->input('tag'))) checked @endif  value="105"> オレンジ
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(106,request()->input('tag'))) checked @endif  value="106"> イエロー
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(107,request()->input('tag'))) checked @endif  value="107"> 混合色
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(108,request()->input('tag'))) checked @endif  value="108"> その他
														</label>
													</li>
												</ul>
											</dd>
										</dl>
											</dd>
								</dl>
								<dl>
									<dt>
										お悩み別
									</dt>
									<dd>
										<dl class="tag_dl">
											<dt>
												お悩み
											</dt>
											<dd>
												<ul>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(109,request()->input('tag'))) checked @endif  value="109"> 世界でひとつのこだわりのものを作りたい
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(110,request()->input('tag'))) checked @endif  value="110"> ジュエリーは高いから安ければ・・・
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(111,request()->input('tag'))) checked @endif  value="111"> 自分好みの素材があったら作りたい
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(112,request()->input('tag'))) checked @endif  value="112"> いらないジュエリーを処分したい
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(113,request()->input('tag'))) checked @endif  value="113"> いらないジュエリーをリフォームしたい
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(114,request()->input('tag'))) checked @endif  value="114"> 記念品としてジュエリーを量産したい
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(115,request()->input('tag'))) checked @endif  value="115"> 珍しい素材のジュエリーがつくりたい
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(116,request()->input('tag'))) checked @endif  value="116"> 自分のジュエリーを修理したい
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(117,request()->input('tag'))) checked @endif  value="117"> 会社の社章をまとめて作りたい
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(118,request()->input('tag'))) checked @endif  value="118"> 自分のブランドのジュエリーを作りたい
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(119,request()->input('tag'))) checked @endif  value="119"> 自分のジュエリーを査定してもらたい
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(120,request()->input('tag'))) checked @endif  value="120"> ジュエリーや宝石の知識をつけたい
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(121,request()->input('tag'))) checked @endif  value="121"> できてるデザインから作りたい
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(122,request()->input('tag'))) checked @endif  value="122"> 過去のデザインを作りたい
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(123,request()->input('tag'))) checked @endif  value="123"> 手持ちのジュエリーと同じものを作りたい
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" @if(is_array(request()->input('tag')) && in_array(124,request()->input('tag'))) checked @endif  value="124"> 信頼できるお店でつくりたい
														</label>
													</li>
												</ul>
											</dd>
										</dl>
									</dd>
								</dl>
								<dl>
									<dt>
										価格
									</dt>
									<dd>
										<ul>
								<li>
												<input type="number" name="min_price" value="{{request()->input('min_price')}}" class="input_price"> <span class="fs">円（税込）以上、</span>
											</li>
											<li>
												<input type="number" name="max_price" value="{{request()->input('max_price')}}" class="input_price"> <span class="fs">円（税込）未満</span>
											</li>
										</ul>
									</dd>
								</dl>
							</div>
							<p class="btn_mt mode_s">
								<input type="submit" class="btn01" value="検索する">
							</p>
						</form>
						<p class="btn_mt mode_s tac fs">
							<a href="/menu">全て表示</a>
						</p>
					</dd>
				</dl>
			</aside>
			<!--/#cont_main-->
		</div>
		<!-- /#cont_wrapper -->
@endsection