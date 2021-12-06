
@extends('layouts.app', ['title' => '退会｜ジュエラーメニュー','css'=>'mymenu'])

@section('content')



		<div id="page_tit" class="mode_mymenu">
			<div class="container">
				<h2>退会</h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li><a href="/jewellermenu">ジュエラーメニュー</a></li>
						<li>退会</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- /#page_tit -->

		<div id="cont_wrapper" class="container u_page">
			<main id="cont_main">
				<section id="my_leave" class="mid_sec">
					<h3 class="tit_big02">
						退会手続き
					</h3>
					<div class="txt_box">
						<p class="bold">【ご注意】一度アカウントを削除すると、このアカウントは使用できなくなります。</p>
						<p class="bold">【ご注意】現在進行中の案件がないか今一度ご確認ください。</p>
						<p>登録したままでも月額費用等は掛かりません。<br>
						それでも退会を希望される方は以下の「退会する」をタップ/クリックしてください。</p>
						<p class="tac"><a href="/leave_complete">退会する</a></p>
					</div>
					<p class="btn_mt">
						<a href="#" onclick="javascript:window.history.back(-1);return false;" class="btn01 mode_back">
							BACK
						</a>
					</p>
				</section>
				<!--/#my_history-->
			</main>
			<!--/#cont_main-->

			<aside id="cont_aside" class="mode_menu">
			@include('layouts.jeweller_menu')
			</aside>
			<!--/#cont_aside-->
		</div>
		<!-- /#cont_wrapper -->

@endsection