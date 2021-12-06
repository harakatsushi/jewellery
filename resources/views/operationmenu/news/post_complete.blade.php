
@extends('layouts.app', ['title' => 'お知らせ投稿完了s｜お知らせ｜運営メニュー','css'=>'mymenu'])

@section('content')
		

		<div id="page_tit" class="mode_mymenu">
			<div class="container">
				<h2>お知らせ投稿完了</h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li><a href="/operationmenu">運営メニュー</a></li>
						<li><a href="/operationmenu/news">お知らせ</a></li>
						<li>お知らせ投稿完了</li>
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
						<p>お知らせが投稿されました。</p>
						<p class="btn_mt">
							<a href="/operationmenu" class="btn01 mode_back">
								運営メニューTOPへ
							</a>
						</p>
					</div>
				</section>
				<!--/#my_favo-->
			</main>
			<!--/#cont_main-->

			<aside id="cont_aside" class="mode_menu">
@include('layouts.admin_menu')
			</aside>
			<!--/#cont_aside-->
		</div>
		<!-- /#cont_wrapper -->
@endsection