
@extends('layouts.app', ['title' => $menu->name.'｜メニュー登録｜ジュエラーメニュー','css'=>'mymenu'])

@section('content')



		<div id="page_tit" class="mode_mymenu">
			<div class="container">
				<h2>{{$menu->name}}</h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li><a href="/jewellermenu/">ジュエラーメニュー</a></li>
						<li><a href="/jewellermenu/menu">作品登録</a></li>
						<li>{{$menu->name}}</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- /#page_tit -->

		<div id="cont_wrapper" class="container u_page">
			<main id="cont_main">
				<section id="my_favo" class="mid_sec">
					<h3 class="tit_big02">
						登録内容
					</h3>
										<div class="prod_box">
						<ul class="tag_li">
							@foreach($menu->tags as $tag)
							<li>{{$tag->name}}</li>
							@endforeach
						</ul>
						<p class="prod_name">
							{{$menu->name}}
						</p>
						<div class="img_box mode_thum">
							<img src="/upload/profile/{{$menu->image}}" alt="">
						</div>
						<div class="txt">
							<pre>{{$menu->detail}}</pre>
						</div>
						<div class="postscript_box txt_box">
							<div class="img_box">
								@if($menu->sub_img1)<img src="/upload/profile/{{$menu->sub_img1}}" alt="">@endif
							</div>
							<p>
								{!! nl2br(htmlspecialchars($menu->annotation01)) !!}
							</p>
						</div>
						<div class="postscript_box txt_box">
							<div class="img_box">
								@if($menu->sub_img2)<img src="/upload/profile/{{$menu->sub_img2}}" alt="">@endif
							</div>
							<p>
								{!! nl2br(htmlspecialchars($menu->annotation02)) !!}
							</p>
						</div>
						<div class="postscript_box txt_box">
							<div class="img_box">
								@if($menu->sub_img3)<img src="/upload/profile/{{$menu->sub_img3}}" alt="">@endif
							</div>
							<p>
								{!! nl2br(htmlspecialchars($menu->annotation03)) !!}
							</p>
						</div>
						<dl class="price_box">
							<dt>
								参考価格
							</dt>
							<dd>
								{{number_format($menu->price)}}円（入力がないと非表示になります）
							</dd>
						</dl>
						<div class="data_box">
							@if($menu->status==1)<p>公開状況：公開</p>@endif
							@if($menu->status==2)<p>公開状況：非公開</p>@endif
							@if($menu->via==1)<p>制作経由：ai-jewelly</p>@endif
							@if($menu->via==2)<p>制作経由：ai-jewelly以外</p>@endif
						</div>
					</div>
					<p class="btn_mt btn_mb">
						<a href="/jewellermenu/menu/edit/{{$menu->id}}" class="btn01">
							<span>登録作品を編集する</span>
						</a>
					</p>
					<p class="btn_mt">
						<a href="#" onclick="javascript:window.history.back(-1);return false;" class="btn01 mode_back">
							BACK
						</a>
					</p>
				</section>
				<!--/#my_favo-->
			</main>
			<!--/#cont_main-->

			<aside id="cont_aside" class="mode_menu">
				<dl class="menu_box">
					<dt>
						ジュエラーメニュー
					</dt>
					<dd>
						<div class="data">
							<div class="img_box">
								<img src="../../assets/images/jeweller/img01.jpg" alt="">
							</div>
							<p class="name">
								jeweller_name
							</p>
						</div>
						<nav class="my_menu">
							<ul class="nav_menu">
								<li><a href="../../jewellermenu/index.html">ジュエラーメニューTOP</a></li>
								<li><a href="../../jewellermenu/message/index.html">メッセージ</a></li>
								<li><a href="../../jewellermenu/favorite/index.html">お気に入り一覧</a></li>
								<li><a href="../../jewellermenu/profile/index.html">プロフィール</a></li>
								<li><a href="../../jewellermenu/orderhistory/index.html">発注履歴</a></li>
								<li><a href="../../jewellermenu/orderreceived/index.html">受注履歴</a></li>
								<li><a href="../../jewellermenu/product/index.html">作品登録</a></li>
								<li><a href="../../jewellermenu/menu/index.html">メニュー登録</a></li>
								<li><a href="../../jewellermenu/material/index.html">素材・デザイン登録</a></li>
								<li><a href="../../jewellermenu/leave/index.html">退会</a></li>
							</ul>
						</nav>
					</dd>
				</dl>
			</aside>
			<!--/#cont_aside-->
		</div>
		<!-- /#cont_wrapper -->

		<footer id="footer">
			<a href="#pagetop" id="top_btn"></a>
			<div class="container mode_l">
				<div class="f_top">
					<div class="left">
						<div class="f_logo">
							<p class="fs_pc12_sp10 mincho">全国のジュエラーがあなただけの<br class="rwd_disp_ox">オリジナルジュエリーをお作りします</p>
							<a href="../../index.html" id="f_logo"><img src="../../assets/images/common_img/logo_white.svg" alt="ai-jewelly"></a>
						</div>
						<nav class="f_nav">
							<ul>
								<li><a href="../../product/index.html">制作実績</a></li>
								<li><a href="../../jeweller/index.html">ジュエラー一覧</a></li>
								<li><a href="../../material/index.html">素材・デザイン一覧</a></li>
								<li><a href="../../menu/index.html">制作メニュー</a></li>
								<li><a href="../../order_list/index.html">公開依頼一覧</a></li>
								<li><a href="../../price/index.html">料金の目安</a></li>
								<li><a href="../../guide/index.html">ご利用ガイド</a></li>
								<li><a href="../../company/index.html">運営会社</a></li>
							</ul>
						</nav>
						<ul class="btn_area">
							<li><a href="../../order/index.html"><img src="../../assets/images/common_img/h-button_pc.svg" alt="制作依頼はこちら"></a></li>
							<li><a href=""><img src="../../assets/images/common_img/ico-insta.svg" alt="Instagram"></a></li>
							<li><a href=""><img src="../../assets/images/common_img/ico-twi.svg" alt="Twitter"></a></li>
						</ul>
					</div>
					<div class="right">
						<div class="sns">SNS_area</div>
					</div>
				</div>
				<div class="f_bottom">
					<ul>
						<li><a href="../../contact/index.html#pp">プライバシーポリシー</a></li>
						<li><a href="../../terms/index.html">規約・特定商取引法に基づく表記</a></li>
					</ul>
				</div>
			</div>
			<div class="copy">
				<div class="container mode_l">
					<small>@ Rain .inc All Rights Reserved.</small>
				</div>
			</div>
		</footer>
		<!-- /#footer -->
	</body>
</html>