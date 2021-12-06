
@extends('layouts.app', ['title' => '【編集】'.$product->name.'｜作品登録｜ジュエラーメニュー','css'=>'mymenu'])

@section('content')

<script type="text/javascript">
	function delImg(id){
		$("#myImage"+id).val("")
		$("#preview"+id).prop('src','/white.jpg')
	}


</script>

		<div id="page_tit" class="mode_mymenu">
			<div class="container">
				<h2>【編集】{{$product->name}}</h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li><a href="/jewellermenu/">ジュエラーメニュー</a></li>
						<li><a href="/jewellermenu/product">作品登録</a></li>
						<li>【編集】{{$product->name}}</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- /#page_tit -->

		<div id="cont_wrapper" class="container u_page">
			<main id="cont_main">
				<section id="my_favo" class="mid_sec">
					<form action="" method="post">@csrf
						<h3 class="tit_big02">
							登録内容編集
						</h3>
						<div class="profile_box">
							<div class="table_style mode_contact">
          @if (count($errors) > 0)
          <div class="error_txt txt_box">
              @foreach ($errors->all() as $error)
              <p class="tac"> {!! $error !!}</p>
              @endforeach
          </div>
          @endif
								<dl>
									<dt class="req">
										アイキャッチ
									</dt>
									<dd>
										<div class="img_box mode_thum btn_mb">
											<img src="/upload/profile/{{$product->image}}" alt="" id="preview">
										</div>
										<div class="file_input">
											<input type="file" id="myImage" name="image" accept="image/*">
											<button class="btn_delete" type="button"  onclick="delImg('')">画像を削除</button>
										</div>

										<script>
											$('#myImage').on('change', function (e) {
												var reader = new FileReader();
												reader.onload = function (e) {
													$("#preview").attr('src', e.target.result);
												}
												reader.readAsDataURL(e.target.files[0]);
											});
										</script>
									</dd>
								</dl>
								<dl>
									<dt class="req">
										作品名
									</dt>
									<dd>
										<input type="text" name="name" value="{{old('name')}}" placeholder="作品名を入力してください" required="required">
									</dd>
								</dl>
								<dl>
									<dt class="any">
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
								<dl>
									<dt class="any">
										説明文
									</dt>
									<dd>
										<textarea name="detail" class="resize">{{old('detail')}}</textarea>
									</dd>
								</dl>
								<dl>
									<dt class="any">
										補足画像1
									</dt>
									<dd>
										<div class="img_box mode02 btn_mb @if(!$product->sub_img1) disp_n @endif">
											<img src="/upload/profile/{{$product->sub_img1}}" alt="" id="preview01">
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
									</dt>
									<dd>
										<textarea name="annotation01" class="resize">{{old('annotation01')}}</textarea>
									</dd>
								</dl>
								<dl>
									<dt class="any">
										補足画像2
									</dt>
									<dd>
										<div class="img_box mode02 btn_mb  @if(!$product->sub_img2) disp_n @endif">
											<img src="/upload/profile/{{$product->sub_img2}}" alt="" id="preview02">
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
									</dt>
									<dd>
										<textarea name="annotation02" class="resize">{{old('annotation02')}}</textarea>
									</dd>
								</dl>
								<dl>
									<dt class="any">
										補足画像3
									</dt>
									<dd>
										<div class="img_box mode02 btn_mb  @if(!$product->sub_img3) disp_n @endif">
											<img src="/upload/profile/{{$product->sub_img3}}" alt="" id="preview03">
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
									</dt>
									<dd>
										<textarea name="annotation03" class="resize">{{old('annotation03')}}</textarea>
									</dd>
								</dl>
								<dl>
									<dt class="any">
										価格
									</dt>
									<dd>
										<input type="number" name="price" value="{{old('price')}}" class="input_price"> 円（税込）
										<select name="price_option">
											<option value="1" @if(old('price_option')==1) selected @endif >―</option>
											<option value="2" @if(old('price_option')==2) selected @endif >～</option>
										</select>
									</dd>
								</dl>
								<dl>
									<dt class="req">
										制作経由
									</dt>
									<dd>
										<ul>
											<li>
												<label>
													<input type="radio" value="1" name="via" @if(old('via')==1) checked @endif > ai-jewelly
												</label>
											</li>
											<li>
												<label>
													<input type="radio" value="2" name="via" @if(old('via')==1) checked @endif> ai-jewelly以外
												</label>
											</li>
										</ul>
									</dd>
								</dl>
								<dl>
									<dt class="req">
										公開状況
									</dt>
									<dd>
										<ul>
											<li>
												<label>
													<input type="radio" name="status" value="1" @if(old('status')==1) checked @endif> 公開
												</label>
											</li>
											<li>
												<label>
													<input type="radio" name="status" value="2" @if(old('status')==2) checked @endif> 非公開
												</label>
											</li>
										</ul>
									</dd>
								</dl>
							</div>
						</div>
						<p class="btn_mt btn_mb">
							<input type="submit" class="btn01" value="変更する">
						</p>
						<p class="btn_mt">
							<a href="#" onclick="javascript:window.history.back(-1);return false;" class="btn01 mode_back">
								BACK
							</a>
						</p>
					</form>
				</section>
				<!--/#my_favo-->
			</main>
			<!--/#cont_main-->

			<aside id="cont_aside" class="mode_menu">
			@include('layouts.jeweller_menu')
			</aside>
			<!--/#cont_aside-->
		</div>
		<!-- /#cont_wrapper -->

@endsection