
@extends('layouts.app', ['title' => 'キャンペーン登録完了｜運営メニュー','css'=>'mymenu'])

@section('content')


		<div id="page_tit" class="mode_mymenu">
			<div class="container">
				<h2>キャンペーン登録完了</h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li><a href="/operationmenu/">運営メニュー</a></li>
						<li>キャンペーン登録完了</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- /#page_tit -->

		<div id="cont_wrapper" class="container u_page">
			<main id="cont_main">
				<div class="txt_box">
					<p>キャンペーンが登録されました。</p>
					<p class="btn_mt">
						<a href="/" class="btn01 mode_back">
							運営メニューTOPへ
						</a>
					</p>
				</div>
			</main>
			<!--/#cont_main-->
			<aside id="cont_aside" class="mode_menu">
				@include('layouts.admin_menu')
			</aside>
			<!--/#cont_aside-->
		</div>
		<!-- /#cont_wrapper -->
@endsection