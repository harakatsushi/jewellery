@extends('layouts.app', ['title' => 'プロフィールの編集｜運営メニュー','css'=>'mymenu'])

@section('content')

		

		<div id="page_tit" class="mode_mymenu">
			<div class="container">
				<h2>プロフィールの編集</h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li><a href="/operationmenu/">運営メニュー</a></li>
						<li>プロフィールの編集</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- /#page_tit -->

		<div id="cont_wrapper" class="container u_page">
			<main id="cont_main">
				<section class="mid_sec">
					<h3 class="tit_big02">
						現在の登録情報
					</h3>
					<div class="txt_box">
						<p>プロフィールが変更されました。</p>
						<p class="btn_mt">
							<a href="/operationmenu/" class="btn01 mode_back">
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
</html>