@extends('layouts.app', ['title' => 'プロフィール編集完了｜ジュエラーメニュー','css'=>'mymenu'])

@section('content')

		

		<div id="page_tit" class="mode_mymenu">
			<div class="container">
				<h2>プロフィール編集完了</h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li><a href="/jewellermenu">ジュエラーメニュー</a></li>
						<li>プロフィール編集完了</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- /#page_tit -->

		<div id="cont_wrapper" class="container u_page">
			<main id="cont_main">
				<section id="my_profile" class="mid_sec">
					<form action="">
						<h3 class="tit_big02">
							完了
						</h3>
						<div class="txt_box">
							<p>プロフィールが変更されました。</p>
							<p class="btn_mt">
								<a href="/jewellermenu/" class="btn01 mode_back">
									ジュエラーメニューTOPへ
								</a>
							</p>
						</div>
					</form>
				</section>
				<!--/#my_profile-->
			</main>
			<!--/#cont_main-->
			<aside id="cont_aside" class="mode_menu">
				@include('layouts.jeweller_menu')
			</aside>
			<!--/#cont_aside-->
		</div>
		<!-- /#cont_wrapper -->
@endsection
</html>