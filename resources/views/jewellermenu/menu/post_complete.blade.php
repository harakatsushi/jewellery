@extends('layouts.app', ['title' => 'メニュー投稿完了｜メニュー登録｜ジュエラーメニュー','css'=>'mymenu'])

@section('content')


		<div id="page_tit" class="mode_mymenu">
			<div class="container">
				<h2>メニュー投稿完了</h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li><a href="/jewellermenu">ジュエラーメニュー</a></li>
						<li><a href="/jewellermenu/menu">メニュー登録</a></li>
						<li>メニュー投稿完了</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- /#page_tit -->

		<div id="cont_wrapper" class="container u_page">
			<main id="cont_main">
				<section id="my_favo" class="mid_sec">
					<h3 class="tit_big02">
						完了
					</h3>
					<div class="txt_box">
						<p>メニューが投稿されました。</p>
						<p class="btn_mt">
							<a href="/jewellermenu" class="btn01 mode_back">
								ジュエラーメニューTOPへ
							</a>
						</p>
					</div>
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