@extends('layouts.app', ['title' => 'お支払い情報｜マイメニュー','css'=>'mymenu'])

@section('content')

	

		<div id="page_tit" class="mode_mymenu">
			<div class="container">
				<h2>お支払い情報</h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li><a href="/mymenu">マイメニュー</a></li>
						<li>お支払い情報</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- /#page_tit -->

		<div id="cont_wrapper" class="container u_page">
			<main id="cont_main">
				<section id="my_payment" class="mid_sec">
					<h3 class="tit_big02">
						お支払い情報
					</h3>
					<div class="txt_box">
						<p>
							お支払い情報が登録されておりません。
						</p>
						<p><a href="">登録はこちらから</a></p>
					</div>
					<div class="txt_box">
						<p>
							お支払い情報登録済み。
						</p>
						<p><a href="">変更はこちらから</a></p>
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
				@include('layouts.my_menu')
			</aside>
			<!--/#cont_aside-->
		</div>
		<!-- /#cont_wrapper -->
@endsection